<?php
$banner = hc_sidebar_banner();
$otherProducts = hc_related_posts();

?>
<div class="detail-temp__sidebar js-animate">
  <?php if($otherProducts) { ?>
  <div class="related-product">
    <h3 class="related-product__heading">Sản phẩm khác</h3>
    <ul class="related-product__list">
      <?php foreach ($otherProducts as $product) : ?>
      <li class="related-product__item">
        <a href="<?= esc_url( $product['url'] ) ?>" class="related-product__content">
          <div class="related-product__image">
            <img src="<?= esc_url( $product['image'] ) ?>" alt="<?= esc_attr( $product['title'] ) ?>" width="100" height="100">
          </div>
          <h4 class="related-product__title"><?= esc_html( $product['title'] ) ?></h4>
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