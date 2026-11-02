<?php
/**
 * Template Name: News
 */
get_header();
$current_page = max( 1, (int) get_query_var( 'hc_page' ) );
$news_query   = new WP_Query( array(
	'post_type'           => 'post',
	'posts_per_page'      => 9,
	'paged'               => $current_page,
	'ignore_sticky_posts' => true,
) );
$news         = array_map( 'hc_news_item', $news_query->posts );
?>
  <main class="news-page">
    <?php get_template_part( 'blocks/sub-keyvisual', null, array( 'page' => 'news' ) ); ?>

    <div class="breadcrumb">
      <div class="breadcrumb-container container">
        <div class="breadcrumb-inner">
          <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
              <a href="/" class="breadcrumb-link">
                Trang chủ
              </a>
            </li>
            <li class="breadcrumb-item">
              <span class="breadcrumb-link">Tin tức - Sự kiện</span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <section class="news">
      <div class="news-container container">
        <ul class="news-list news-list--grid">
          <?php foreach ($news as $newsItem) : ?>
          <li class="news-item js-animate">
            <a href="<?= esc_url( $newsItem['url'] ) ?>" class="news-content">
              <div class="news-image">
                <img src="<?= esc_url( $newsItem['image'] ) ?>" alt="<?= esc_attr( $newsItem['alt'] ) ?>" loading="lazy">
              </div>
              <div class="news-description">
                <h3 class="news-title"><?= esc_html( $newsItem['title'] ) ?></h3>
                <p class="news-text"><?= esc_html( $newsItem['description'] ) ?></p>
              </div>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php if ( ! $news ) : ?>
          <p class="text-center">Chưa có bài viết nào.</p>
        <?php endif; ?>
        <?php hc_pagination( $current_page, (int) $news_query->max_num_pages, 'hc_news_page_url' ); ?>
      </div>
    </section>

	  <?php echo get_template_part( 'blocks/product' ); ?>
	  <?php echo get_template_part( 'blocks/banner' ); ?>
	  <?php echo get_template_part( 'blocks/customer' ); ?>
  </main>
<?php
get_footer();
