<?php
$images = get_template_directory_uri() . '/assets/images';
$products = array(
  array( 'image' => 'product-sample.webp', 'title' => 'Túi pe, PP' ),
  array( 'image' => 'product-sample.webp', 'title' => 'TÚI trùm palette' ),
  array( 'image' => 'product-sample.webp', 'title' => 'MÀNG PE khổ lớn' ),
  array( 'image' => 'product-sample.webp', 'title' => 'Túi zip chỉ đỏ' ),
);
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
          <a href="/products/00/" class="product-link">
            <span class="product-image">
              <img src="<?= $images ?>/<?= $product['image'] ?>" alt="<?= $product['title'] ?>" width="239" height="239" loading="lazy">
            </span>
            <h3 class="product-name"><?= $product['title'] ?></h3>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
