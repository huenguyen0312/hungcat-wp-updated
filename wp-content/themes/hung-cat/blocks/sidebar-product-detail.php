<?php
$about_us_banner_image = get_field('about_us_banner_image', 'option');
$otherProducts = get_posts(array(
  'post_type' => 'products',
  'posts_per_page' => 5,
  'orderby' => 'date',
  'order' => 'DESC',
  'post__not_in' => array(get_the_ID())
));

?>
<div class="detail-temp__sidebar js-animate">
  <?php if($otherProducts) { ?>
  <div class="related-product">
    <h3 class="related-product__heading">Sản phẩm khác</h3>
    <ul class="related-product__list">
      <?php foreach ($otherProducts as $product) : ?>
      <li class="related-product__item">
        <a href="<?= get_permalink($product) ?>" class="related-product__content">
          <div class="related-product__image">
            <img src="<?= get_the_post_thumbnail_url($product) ?>" alt="<?= $product->post_title ?>" width="100" height="100">
          </div>
          <h4 class="related-product__title"><?= $product->post_title ?></h4>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php } ?>
  <div class="news-banner">
    <picture>
      <source media="(min-width:768px)" srcset="<?= $about_us_banner_image['pc_image']['url'] ?? '' ?>" type="image/png">
      <source media="(max-width:767px)" srcset="<?= $about_us_banner_image['sp_image']['url'] ?? '' ?>" type="image/png">
      <img src="<?= $about_us_banner_image['pc_image']['url'] ?? '' ?>" alt="" width="330" height="220">
    </picture>
  </div>
  <div class="news-sidebar-button">
    <a href="/contact/" class="button">Liên hệ tư vấn</a>
  </div>
</div>