<?php
$images = get_template_directory_uri() . '/assets/images';
?>
<section class="about">
  <div class="about-container container">
    <div class="about-content">
      <div class="about-description js-animate">
        <h2 class="about-title">Về chúng tôi</h2>
        <p class="about-description__text">
          Công ty cổ phần Hưng Cát chuyên sản xuất , in ấn trên chất liệu màng PE, PP. Sản phẩm của chúng tôi được sử dụng trong các ngành may mặc, giày dép, mỹ phẩm, đồ gỗ …<br><br>
          Được thành lập vào năm 2005, với đội ngũ công nhân lành nghề, chúng tôi luôn sử dụng hệ thống máy móc hiện đại nhằm không ngừng gia tăng lợi ích của khách hàng: Sản phẩm chất lượng - Giá thành hợp lý …
        </p>

        <a href="/about/" class="text-link">
          Xem thêm
          <span class="material-symbols-outlined">chevron_right</span>
        </a>
      </div>
      <div class="about-media js-show-modal-video js-animate">
        <img src="<?= $images ?>/video-thumbnail.webp" alt="" class="about-image" width="409" height="227" loading="lazy">
      </div>
    </div>
  </div>
</section>
