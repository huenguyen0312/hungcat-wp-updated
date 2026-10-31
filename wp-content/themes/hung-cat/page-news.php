<?php
/**
 * Template Name: News
 */
get_header();
$images = get_template_directory_uri() . '/assets/images';
include get_template_directory() . '/inc/news-data.php';
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
            <a href="/news/00/" class="news-content">
              <div class="news-image">
                <img src="<?= $images ?>/<?= $newsItem['image'] ?>" alt="" loading="lazy">
              </div>
              <div class="news-description">
                <h3 class="news-title"><?= $newsItem['title'] ?></h3>
                <p class="news-text"><?= $newsItem['description'] ?></p>
              </div>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>

	  <?php echo get_template_part( 'blocks/product' ); ?>
	  <?php echo get_template_part( 'blocks/banner' ); ?>
	  <?php echo get_template_part( 'blocks/customer' ); ?>
  </main>
<?php
get_footer();
