<?php
$hotline = hc_contact( 'contact_hotline' );
$cskh    = hc_contact( 'contact_cskh' );
?>
<section class="not-found">
  <div class="not-found-container container">
    <p class="not-found-code" aria-hidden="true">4<span class="not-found-code__accent">0</span>4</p>
    <h1 class="not-found-title">Không tìm thấy trang</h1>
    <p class="not-found-text">
      Trang bạn đang tìm có thể đã bị xoá, đổi tên hoặc tạm thời không truy cập được.<br class="pc-visible">
      Vui lòng kiểm tra lại đường dẫn hoặc quay về trang chủ.
    </p>
    <div class="not-found-actions">
      <a href="/" class="button">Về trang chủ</a>
      <a href="/contact/" class="button button--outline">Liên hệ tư vấn</a>
    </div>
    <p class="not-found-hotline">
      <span class="material-symbols-outlined not-found-hotline__icon">phone_in_talk</span>
      Hotline: <a href="tel:<?= esc_attr( hc_tel( $hotline ) ) ?>" class="font-bold"><?= esc_html( $hotline ) ?></a>
      &nbsp;-&nbsp; CSKH: <a href="tel:<?= esc_attr( hc_tel( $cskh ) ) ?>" class="font-bold"><?= esc_html( $cskh ) ?></a>
    </p>
  </div>
</section>
