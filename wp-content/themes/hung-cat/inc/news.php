<?php
// News cards from Admin → Bài viết, for blocks/news.php (featured slider) and page-news.php (list)

// One post as [ 'url', 'image', 'alt', 'title', 'description' ]; no featured image → sample image
function hc_news_item( $post ) {
	$thumb_id = get_post_thumbnail_id( $post );
	$image    = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'medium_large' ) : '';

	return array(
		'url'         => get_permalink( $post ),
		'image'       => $image ?: get_template_directory_uri() . '/assets/images/news-sample.webp',
		'alt'         => $thumb_id ? (string) get_post_meta( $thumb_id, '_wp_attachment_image_alt', true ) : '',
		'title'       => get_the_title( $post ),
		'description' => wp_trim_words( get_the_excerpt( $post ), 40 ),
	);
}

// Featured news: sticky posts ("Dính lên đầu trang" in the post editor) first, then the latest posts
function hc_featured_news( $count = 6 ) {
	$sticky = (array) get_option( 'sticky_posts' );
	$posts  = $sticky ? get_posts( array( 'post__in' => $sticky, 'posts_per_page' => $count ) ) : array();
	if ( count( $posts ) < $count ) {
		$posts = array_merge( $posts, get_posts( array(
			'posts_per_page' => $count - count( $posts ),
			'post__not_in'   => $sticky,
		) ) );
	}

	return array_map( 'hc_news_item', $posts );
}

// URL of a page of the news list: /news/, /news/page/2/, ...
function hc_news_page_url( $page ) {
	return home_url( $page > 1 ? "/news/page/{$page}/" : '/news/' );
}

// Pagination markup from hungcat-static components/pagination.ejs (first, prev, up to 5 numbers, next, last)
function hc_pagination( $current, $total, $url_callback ) {
	if ( $total < 2 ) {
		return;
	}
	$start = max( 1, min( $current - 2, $total - 4 ) );
	$end   = min( $total, $start + 4 );
	?>
	<ul class="pagination">
		<?php if ( $current > 1 ) : ?>
			<li class="pagination__item pagination__item--first">
				<a href="<?= esc_url( $url_callback( 1 ) ) ?>" class="pagination__link" aria-label="Trang đầu">
					<span class="material-symbols-outlined">first_page</span>
				</a>
			</li>
			<li class="pagination__item pagination__item--prev">
				<a href="<?= esc_url( $url_callback( $current - 1 ) ) ?>" class="pagination__link" aria-label="Trang trước">
					<span class="material-symbols-outlined">chevron_left</span>
				</a>
			</li>
		<?php endif; ?>
		<?php for ( $i = $start; $i <= $end; $i++ ) : ?>
			<li class="pagination__item">
				<a href="<?= esc_url( $url_callback( $i ) ) ?>" class="pagination__link<?= $i === $current ? ' pagination__link--active' : '' ?>"<?= $i === $current ? ' aria-current="page"' : '' ?>><?= $i ?></a>
			</li>
		<?php endfor; ?>
		<?php if ( $current < $total ) : ?>
			<li class="pagination__item pagination__item--next">
				<a href="<?= esc_url( $url_callback( $current + 1 ) ) ?>" class="pagination__link" aria-label="Trang sau">
					<span class="material-symbols-outlined">chevron_right</span>
				</a>
			</li>
			<li class="pagination__item pagination__item--last">
				<a href="<?= esc_url( $url_callback( $total ) ) ?>" class="pagination__link" aria-label="Trang cuối">
					<span class="material-symbols-outlined">last_page</span>
				</a>
			</li>
		<?php endif; ?>
	</ul>
	<?php
}
