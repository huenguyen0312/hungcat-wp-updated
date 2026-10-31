<?php
get_header();
$images = get_template_directory_uri() . '/assets/images';
?>
  <main class="news-page">
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
              <a href="/news/" class="breadcrumb-link">
                Tin tức
              </a>
            </li>
            <li class="breadcrumb-item">
              <span class="breadcrumb-link">
              <?php the_title(); ?>
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
	  <?php
	  while ( have_posts() ) : the_post();
		  ?>
        <div class="detail-temp">
          <div class="detail-temp__container container">
            <div class="detail-temp__content">
              <h2 class="news-detail-title"><?php the_title(); ?></h2>
              <div class="news-detail">
                <p class="news-detail__info">
                  <time class="news-detail__date" datetime="<?php the_time( 'Y-m-d' ); ?>">
                    <span class="material-symbols-outlined">calendar_month</span><?php the_time( 'Y-m-d' ); ?></time>
                  <?php
                  $categories = get_the_category();
                  if ( ! empty( $categories ) ) {
                    echo '<span class="news-detail__category"><span class="material-symbols-outlined">category</span>' . esc_html( $categories[0]->name ) . '</span>';
                  }
                  ?>
                  <span class="news-detail__creator"> <span
                      class="material-symbols-outlined">person</span><?= get_author_name() ?></span>
                </p>
                <p class="news-detail__slug">
                  <?= get_the_excerpt() ?>
                </p>
                <article class="news-detail__content">
                  <?php the_content(); ?>
                </article>
                <p class="news-detail__info news-detail__info--bottom">
                  <time class="news-detail__date" datetime="<?php the_time( 'Y-m-d' ); ?>"><span class="material-symbols-outlined">calendar_month</span><?php the_time( 'Y-m-d' ); ?></time>
                  <?php
                  $categories = get_the_category();
                  if ( ! empty( $categories ) ) {
                    echo '<span class="news-detail__category"><span class="material-symbols-outlined">category</span>' . esc_html( $categories[0]->name ) . '</span>';
                  }
                  ?>
                  <span class="news-detail__creator"> <span
                      class="material-symbols-outlined">person</span><?= get_author_name() ?></span>
                </p>
              </div>
            </div>
            <?php echo get_template_part('blocks/sidebar-news-detail'); ?>
          </div>
        </div>
	  <?php
	  endwhile;
	  ?>

	  <?php echo get_template_part( 'blocks/banner' ); ?>
	  <?php echo get_template_part( 'blocks/customer' ); ?>
  </main>
<?php
get_footer();