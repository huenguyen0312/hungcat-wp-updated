<?php
$images       = get_template_directory_uri() . "/assets/images";
?>
<footer class="footer">
  <div class="footer-container container">
    <div class="footer-column">
      <div class="footer-logo">
        <div class="company-logo">
          <img src="<?= $images ?>/logo-footer.webp" alt="Bao bì Hưng Cát" width="95" height="64">
        </div>
        <h2 class="company-name">CÔNG TY CỔ PHẦN HƯNG CÁT</h2>
      </div>
      <div class="company-info">
        <p class="footer-text"><span class="material-symbols-outlined footer-text-icon">pin_drop</span>
          Địa chỉ: Km110+500 quốc lộ 10, phường Mỹ Xá, thành phố Nam Định, tỉnh Nam Định</p>
        <p class="footer-text"><span class="material-symbols-outlined footer-text-icon">mail</span><span class="block">
            Email: <b>vthungcat@gmail.com</b></span>
        </p>
        <p class="footer-text"><span class="material-symbols-outlined footer-text-icon">call</span><span class="block">
            Hotline: &nbsp;<b>0917.388.591</b> &nbsp; - CSKH: &nbsp;<b>0834.121193</b></span>
        </p>
        <p class="footer-text"><span class="material-symbols-outlined footer-text-icon">schedule</span><span
            class="block">Thời gian làm việc: <b>07h15-17h00</b> Từ <b>thứ 2 - thứ 7</b></span></p>
      </div>
    </div>
    <div class="footer-column">
      <div class="footer-group footer-group--about">
        <h3 class="footer-title">Về chúng tôi</h3>
        <ul class="footer-list">
          <li class="footer-item"><a href="/contact/" class="footer-link">- Liên hệ</a></li>
          <li class="footer-item"><a href="/about/" class="footer-link">- Giới thiệu</a></li>
          <li class="footer-item"><a href="/products/" class="footer-link">- Sản phầm</a></li>
          <li class="footer-item"><a href="#" class="footer-link">- Tuyển dụng</a></li>
          <li class="footer-item"><a href="/news/" class="footer-link">- Tin tức</a></li>
        </ul>
      </div>

      <div class="footer-group footer-group--certificate">
        <h3 class="footer-title">Chứng nhận</h3>
        <div class="footer-certificate">
          <div class="certificate-image">
            <img src="<?= $images ?>/certificate-01.webp" alt="Chứng nhận 1" loading="lazy">
          </div>
          <div class="certificate-image">
            <img src="<?= $images ?>/certificate-02.webp" alt="Chứng nhận 1" loading="lazy">
          </div>
        </div>
      </div>
    </div>
    <div class="footer-column">
      <div class="footer-group footer-group--customer">
        <h3 class="footer-title">Khách hàng cần biết</h3>
        <ul class="footer-list">
          <li class="footer-item"><a href="#" class="footer-link">- Chính sách bảo hành</a></li>
          <li class="footer-item"><a href="#" class="footer-link">- Giao hàng và nhận hàng</a></li>
          <li class="footer-item"><a href="#" class="footer-link">- Phương thức thanh toán</a></li>
          <li class="footer-item"><a href="#" class="footer-link">- Chính sách đổi trả</a></li>
          <li class="footer-item"><a href="#" class="footer-link">- Chính sách kiểm hàng</a></li>
        </ul>
      </div>
      <div class="footer-group footer-group--facebook">
        <h3 class="footer-title">Kết nối Facebook</h3>
        <!-- Temporary link until the Facebook page plugin is embedded -->
        <a href="https://www.facebook.com/profile.php?id=61564076172519" class="footer-facebook" target="_blank" rel="noopener">
          <span class="footer-facebook__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M13.5 21v-7.5h2.5l.4-3h-2.9V8.6c0-.9.3-1.5 1.5-1.5h1.5V4.4c-.3 0-1.2-.1-2.2-.1-2.2 0-3.7 1.3-3.7 3.8v2.4H8.1v3h2.5V21h2.9z"/></svg>
          </span>
          <span class="footer-facebook__text">
            <span class="footer-facebook__name">Bao bì Hưng Cát</span>
            <span class="footer-facebook__sub">Theo dõi fanpage trên Facebook</span>
          </span>
          <span class="material-symbols-outlined footer-facebook__arrow" aria-hidden="true">chevron_right</span>
        </a>
      </div>
    </div>
  </div>
  <button id="scroll-top" class="scroll-top">
    <span class="material-symbols-outlined scroll-top-icon">arrow_upward</span>
  </button>
  <div class="social-ref">
    <div class="social-link">
      <button type="button" class="social-icon social-icon--loopflicker js-show-phone-number" aria-label="Hiện số điện thoại" aria-expanded="false" aria-controls="footer-phone-number">
        <img src="<?= $images ?>/icon-call.webp" alt="" height="30" width="30">
      </button>
      <a href="https://www.facebook.com/profile.php?id=61564076172519" class="social-icon" target="_blank" rel="noopener" aria-label="Nhắn tin qua Messenger">
        <img src="<?= $images ?>/icon-messenger.webp" alt="" height="30" width="30">
      </a>
      <a href="https://zalo.me/0834121193" class="social-icon" target="_blank" rel="noopener" aria-label="Nhắn tin qua Zalo">
        <img src="<?= $images ?>/icon-zalo.webp" alt="" height="30" width="30">
      </a>
      <div class="phone-number js-phone-number" id="footer-phone-number">
        <ul>
          <li class="phone-number-item">CSKH: <a href="tel:0834121193">0834.121.193</a></li>
          <li class="phone-number-item">Hotline: <a href="tel:0917388591">0917.388.591</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="copy-right">
    <div class="copy-right-container container">
      <p class="copy-right-text">Bao bì Hưng Cát - © <span class="js-current-year"><?= date('Y') ?></span></p>
    </div>
  </div>
</footer>
<!-- include Modal -->
<?php echo get_template_part('inc/modal'); ?>
