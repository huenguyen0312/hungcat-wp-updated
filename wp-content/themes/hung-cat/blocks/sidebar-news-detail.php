<?php
$banner = hc_sidebar_banner();
$relatedNews = hc_related_posts();

?>
<div class="detail-temp__sidebar js-animate">
  <?php if($relatedNews) { ?>
  <div class="related-news">
    <h3 class="related-news__heading">Tin tức liên quan</h3>
    <ul class="related-news__list">
      <?php foreach ($relatedNews as $news) : ?>
      <li class="related-news__item">
        <a href="<?= esc_url( $news['url'] ) ?>" class="related-news__content">
          <div class="related-news__image">
            <img src="<?= esc_url( $news['image'] ) ?>" alt="<?= esc_attr( $news['title'] ) ?>" width="100" height="100">
          </div>
          <h4 class="related-news__title"><?= esc_html( $news['title'] ) ?></h4>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php } ?>
  <div class="news-banner">
    <img src="<?= esc_url( $banner['src'] ) ?>" alt="<?= esc_attr( $banner['alt'] ) ?>" width="<?= $banner['width'] ?>" height="<?= $banner['height'] ?>">
  </div>
  <div class="news-sidebar-button">
    <a href="/contact/" class="button">Liên hệ tư vấn</a>
  </div>
</div>