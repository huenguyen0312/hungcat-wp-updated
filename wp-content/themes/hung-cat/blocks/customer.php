<?php
$customers = hc_customers();
?>
<section class="customer">
  <div class="customer-container container">
    <div class="heading">
      <h2 class="heading-title"><?= esc_html( hc_contact( 'customer_title', 'đối tác - khách hàng' ) ) ?></h2>
    </div>
    <ul class="customer-list js-animate">
      <?php foreach ($customers as $customer) : ?>
      <li class="customer-item">
        <div class="customer-image">
          <img src="<?= esc_url( $customer['src'] ) ?>" alt="<?= esc_attr( $customer['name'] ) ?>" loading="lazy">
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
