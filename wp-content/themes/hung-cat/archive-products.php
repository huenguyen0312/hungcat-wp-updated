<?php
get_header();

$images       = get_template_directory_uri() . '/assets/images';
$current_page = $_GET['page'] ?? 1;
$current_page = (int) $current_page;
$perPage      = 8;

$posts = new WP_Query( array(
	'post_type'      => 'products',
	'posts_per_page' => $perPage,
	'paged'          => $current_page,
) );

?>
  <main class="product-page">
    <section class="sub-keyvisual">
      <div class="sub-keyvisual-container container">
        <picture>
          <source media="(min-width:768px)" srcset="<?= $images ?>/products/img-keyvisual.webp" type="image/webp">
          <source media="(max-width:767px)" srcset="<?= $images ?>/products/img-keyvisual-sp.webp" type="image/webp">
          <img src="<?= $images ?>/products/img-keyvisual.webp" alt="" class="sub-keyvisual-image" fetchpriority="high">
        </picture>
      </div>
    </section>

    <div class="breadcrumb">
      <div class="breadcrumb-container container">
        <div class="breadcrumb-inner">
          <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
              <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
              <span class="breadcrumb-link">Sản phẩm</span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <section class="product">
      <div class="product-container container">
        <?php if ( $posts->have_posts() ) { ?>
        <ul class="product-list">
        <?php while ( $posts->have_posts() ) {
          $posts->the_post(); ?>
          <li class="product-item js-animate">
            <a href="<?= get_permalink() ?>" class="product-link">
				<span class="product-image">
				<img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>">
				</span>
              <h3 class="product-name"><?= get_the_title() ?></h3>
            </a>
          </li>
          <?php }
          wp_reset_postdata(); ?>
        </ul>
        <?php } ?>
        <!-- Pagination-->
		  <?php
		  $total_page = $posts->max_num_pages;

		  //PC pagination
		  $max_page   = 5;
		  $start_page = $current_page - 2;
		  $end_page   = $current_page + 2;
		  $first_page = 1;
		  $last_page  = $total_page;
		  $prev_page  = $current_page - 1;
		  $next_page  = $current_page + 1;

		  if ( $start_page <= 0 ) {
			  $start_page = 1;
			  $end_page   = $max_page;
		  }
		  if ( $end_page > $total_page ) {
			  $start_page = $total_page - $max_page + 1;
			  $end_page   = $total_page;
		  }
		  if ( $start_page <= 0 ) {
			  $start_page = 1;
		  }

		  $base_url = '/';

		  ?>
		  <?php if ( $total_page > 1 ) { ?>
          <ul class="pagination">
				<?php if ( $current_page > 1 ) : ?>
            <li class="pagination__item pagination__item--first">
              <a href="?page=<?php echo $first_page ?>" class="pagination__link" aria-label="First page">
                <span class="material-symbols-outlined">first_page</span>
              </a>
            </li>
            <li class="pagination__item pagination__item--prev">
              <a href="?page=<?php echo $prev_page ?>" class="pagination__link" aria-label="Previous">
                <span class="material-symbols-outlined">chevron_left</span>
              </a>
            </li>
				<?php endif; ?>
				<?php for ( $i = $start_page; $i <= $end_page; $i ++ ): ?>
					<?php $active = ( $i == $current_page ? ' pagination__link--active' : '' ) ?>
            <li class="pagination__item"><a href="?page=<?php echo $i ?>"
                                            class="pagination__link<?php echo $active ?>"><?php echo $i ?></a>
            </li>
				<?php endfor; ?>
				<?php if ( $current_page < $total_page ): ?>
            <li class="pagination__item pagination__item--next">
              <a href="?page<?php echo $next_page ?>" class="pagination__link" aria-label="Next">
                <span class="material-symbols-outlined">chevron_right</span>
              </a>
            </li>
            <li class="pagination__item pagination__item--last">
              <a href="?page=<?php echo $last_page ?>" class="pagination__link" aria-label="Last page">
                <span class="material-symbols-outlined">last_page</span>
              </a>
            </li>
				<?php endif; ?>
          </ul>
		  <?php } ?>
<!--        end pagination-->
      </div>
    </section>

	  <?php echo get_template_part( 'blocks/news' ); ?>
	  <?php echo get_template_part( 'blocks/banner' ); ?>
	  <?php echo get_template_part( 'blocks/customer' ); ?>
  </main>
<?php
get_footer();
