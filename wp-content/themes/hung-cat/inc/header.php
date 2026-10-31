<?php
$images      = get_template_directory_uri() . "/assets/images";
?>
<header class="header">
  <div class="header-contact">
    <div class="header-contact-list">
      <div class="header-contact-item">
        <span class="material-symbols-outlined">phone_in_talk</span>
        <a href="tel:0123456789" class="font-bold phone-number">
          <span>0917.388.591</span>
        </a>
        <span>-</span>
        <a href="tel:0123456789" class="font-bold phone-number">
          <span>0834.121.193</span>
        </a>
      </div>
      <div class="header-contact-item">
        <span class="material-symbols-outlined">email</span>
        <a href="mailto:vthungcat@gmail.com" class="font-bold email-address">
          <i class="fas fa-envelope"></i>
          <span>vthungcat@gmail.com</span>
        </a>
      </div>
      <div class="header-contact-item">
        <a href="/wp-admin/" class="btn-login text-sm">Đăng nhập</a>
      </div>
    </div>
  </div>
  <div class="container header-container flex justify-between items-center">
    <div class="header-logo image">
      <a href="/">
        <img src="<?= $images ?>/logo.webp" alt="Bao bì Hưng Cát" width="93" height="61">
      </a>
    </div>
    <nav class="header-nav" id="header-nav">
      <ul class="header-nav-list">
        <li class="header-nav-item header-nav-item--active">
          <a href="/" class="header-nav-link">Trang chủ</a>
        </li>
        <li class="header-nav-item">
          <a href="/about/" class="header-nav-link">Giới thiệu</a>
        </li>
        <li class="header-nav-item">
          <a href="/products/" class="header-nav-link">Sản phẩm</a>
        </li>
        <li class="header-nav-item">
          <a href="/news/" class="header-nav-link">Tin tức</a>
        </li>
        <li class="header-nav-item">
          <a href="/contact/" class="header-nav-link">Liên hệ</a>
        </li>
        <li class="header-nav-item--small-only mt-10 w-[calc(100%-40px)]">
          <div class="flex gap-1.5 w-full justify-center">
            <a href="tel:0917388591" class="hotline-number">
              <span>0917.388.591</span>
            </a>
            <a href="tel:0834121193" class="support-number">
              <span>0834.121.193</span>
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <button type="button" class="header-btn-menu js-menu-sp" aria-label="Mở menu" aria-expanded="false" aria-controls="header-nav">
      <span class="material-symbols-outlined header-btn-menu__icon" aria-hidden="true">menu</span>
    </button>
  </div>
</header>