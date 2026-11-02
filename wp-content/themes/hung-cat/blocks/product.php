<?php
$products = hc_featured_products();
if ( ! $products ) {
	return;
}
?>

<section class="product">
  <div class="product-container container">
    <div class="heading">
      <h2 class="heading-title">Sản phẩm tiêu biểu</h2>
      <a href="/products/" class="text-link">
        Xem thêm
        <span class="material-symbols-outlined">chevron_right</span>
      </a>

    </div>

    <ul class="product-list">
      <?php foreach ($products as $product) : ?>
        <li class="product-item js-animate">
          <a href="<?= esc_url( $product['url'] ) ?>" class="product-link">
            <span class="product-image">
              <img src="<?= esc_url( $product['image'] ) ?>" alt="<?= esc_attr( $product['title'] ) ?>" width="239" height="239" loading="lazy">
            </span>
            <h3 class="product-name"><?= esc_html( $product['title'] ) ?></h3>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
