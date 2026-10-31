<?php
$images = get_template_directory_uri() . '/assets/images';
$customers = array(
  array( 'name' => 'Công ty TNHH ENTER.B', 'logo' => 'enter-b.webp' ),
  array( 'name' => 'Garment CO.,LTD', 'logo' => 'VJ-one.webp' ),
  array( 'name' => 'VINA DENIM', 'logo' => 'vina-denim.webp' ),
  array( 'name' => 'LAKELAND', 'logo' => 'lakeland.webp' ),
);
?>
<section class="customer">
  <div class="customer-container container">
    <div class="heading">
      <h2 class="heading-title">đối tác - khách hàng</h2>
    </div>
    <ul class="customer-list js-animate">
      <?php foreach ($customers as $customer) : ?>
      <li class="customer-item">
        <div class="customer-image">
          <img src="<?= $images ?>/<?= $customer['logo'] ?>" alt="<?= $customer['name'] ?>" loading="lazy">
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
