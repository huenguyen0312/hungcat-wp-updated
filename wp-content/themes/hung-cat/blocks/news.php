<?php
$images = get_template_directory_uri() . '/assets/images';
include get_template_directory() . '/inc/news-data.php';
?>
<section class="news">
      <div class="news-container container">
        <div class="heading">
          <h2 class="heading-title">Tin tức <span class="pc-visible">nổi bật</span></h2>
          <div class="heading-slider-button">
            <a href="/news/" class="text-link">
              Xem thêm
              <span class="material-symbols-outlined">chevron_right</span>
            </a>
            <button class="news-button-prev slider-button-prev">
              <span class="material-symbols-outlined slider-arrow-icon">chevron_left</span>
            </button>
            <button class="news-button-next slider-button-next">
              <span class="material-symbols-outlined slider-arrow-icon">chevron_right</span>
            </button>
          </div>
        </div>

        <div class="news-list js-news-slider">
          <?php foreach ($news as $newsItem) : ?>
          <div class="news-item js-animate">
            <a href="/news/00/" class="news-content">
              <div class="news-image">
                <img src="<?= $images ?>/<?= $newsItem['image'] ?>" alt="" loading="lazy">
              </div>
              <div class="news-description">
                <h3 class="news-title"><?= $newsItem['title'] ?></h3>
                <p class="news-text"><?= $newsItem['description'] ?></p>
              </div>
            </a>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
