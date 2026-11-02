<?php
$news = hc_featured_news();
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
            <a href="<?= esc_url( $newsItem['url'] ) ?>" class="news-content">
              <div class="news-image">
                <img src="<?= esc_url( $newsItem['image'] ) ?>" alt="<?= esc_attr( $newsItem['alt'] ) ?>" loading="lazy">
              </div>
              <div class="news-description">
                <h3 class="news-title"><?= esc_html( $newsItem['title'] ) ?></h3>
                <p class="news-text"><?= esc_html( $newsItem['description'] ) ?></p>
              </div>
            </a>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
