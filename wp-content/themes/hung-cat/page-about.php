<?php
/**
 * Template Name: About
 */

get_header();
$images = get_template_directory_uri() . '/assets/images';
?>
  <main class="about-page">
    <!-- contact form-->

    <section class="sub-keyvisual">
      <div class="sub-keyvisual-container container">
        <picture>
          <source media="(min-width:768px)" srcset="<?= $images ?>/about-us/sub-kv.webp" type="image/webp">
          <source media="(max-width:767px)" srcset="<?= $images ?>/about-us/sub-kv-sp.webp" type="image/webp">
          <img src="<?= $images ?>/about-us/sub-kv.webp" alt="" class="sub-keyvisual-image" fetchpriority="high">
        </picture>
      </div>
    </section>

    <div class="breadcrumb">
      <div class="breadcrumb-container container">
        <div class="breadcrumb-inner">
          <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
              <a href="/" class="breadcrumb-link">
                Trang chủ
              </a>
            </li>
            <li class="breadcrumb-item">
              <span class="breadcrumb-link">Giới thiệu</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <section class="company">
      <div class="company-container container">
        <div class="company-content">
          <div class="company-media js-animate">
            <img src="<?= $images ?>/about-us/img-01.webp" alt="" class="company-image">
            <a href="/contact/" class="button">Liên hệ tư vấn</a>
          </div>
          <div class="company-description js-animate">
            <h2 class="company-title">Công ty cổ phần Hưng Cát</h2>
            <p class="company-description__text">
              <b>Công ty cổ phần Hưng Cát</b> chuyên <span class="text-blue">sản xuất , in ấn trên chất liệu màng PE, PP</span>. Sản phẩm của chúng tôi được sử dụng trong các ngành may mặc, giày dép, mỹ phẩm, đồ gỗ …<br><br>
              Được thành lập vào năm 2005, với đội ngũ công nhân lành nghề, chúng tôi luôn sử dụng hệ thống máy móc hiện đại nhằm không ngừng gia tăng lợi ích của khách hàng: <span class="text-blue">Sản phẩm chất lượng - Giá thành hợp lý - Dịch vụ tận tâm.</span><br><br>
              Chúng tôi tự hào về sự đoàn kết và nỗ lực không ngừng của đội ngũ để đóng góp vào sự phát triển của nền kinh tế đất nước.<br><br>
              Ngoài ra, chúng tôi cũng cam kết về việc bảo vệ môi trường. Chúng tôi sử dụng các nguyên liệu tái chế và hướng tới việc giảm thiểu lượng chất thải trong quy trình sản xuất. Chúng tôi đảm bảo rằng các sản phẩm bao bì của chúng tôi đáp ứng tiêu chuẩn bảo vệ môi trường và có thể tái chế sau khi sử dụng.<br><br>
              Với uy tín, chất lượng và dịch vụ chuyên nghiệp, <b>Công ty cổ phần Hưng Cát</b> đã trở thành đối tác tin cậy của nhiều doanh nghiệp lớn tại Việt Nam và trên thị trường quốc tế. Chúng tôi luôn nỗ lực để đáp ứng và vượt qua sự mong đợi của khách hàng, mang lại giá trị thực sự và sự hài lòng cho mọi đối tác của chúng tôi.<br><br>
              Nếu bạn đang tìm kiếm một công ty sản xuất bao bì uy tín, chất lượng và đáng tin cậy tại Việt Nam, hãy liên hệ với <b>Công ty cổ phần Hưng Cát</b> ngay hôm nay. <span class="text-blue">Chúng tôi cam kết cung cấp những sản phẩm bao bì tốt nhất, phù hợp với yêu cầu của bạn và chuẩn mực quốc tế.</span>
            </p>
          </div>
        </div>
        <div class="company-info js-animate">
          <div class="company-image">
            <img src="<?= $images ?>/about-us/img-02.webp" alt="" class="company-image">
          </div>
          <p class="company-contact">
            <span class="company-contact__title">Thông tin liên hệ</span>
            <span class="company-contact__name">Công ty Cổ phần Hưng Cát</span>
            - Mã số thuế: 0600341499<br>
            - Địa chỉ: Km110+500 quốc lộ 10, phường Mỹ Xá, TP Nam Định, tỉnh Nam Định<br>
            - Điện thoại: <span class="text-blue font-bold">0834.121193</span><br class="sp-visible"> - Hotline: <span
              class="text-blue font-bold">0917.388.591</span><br>
            - Email: <a href="mailto:vthungcat@gmail.com" class="text-blue underline">vthungcat@gmail.com</a><br>
            - Thời gian làm việc: <b>07h15-17h00</b> từ <b>thứ 2 - thứ 7</b><br>
            - Website: <a href="https://baobihungcat.vn" class="text-blue underline">baobihungcat.vn</a>
          </p>
        </div>
      </div>
    </section>

	  <?php echo get_template_part( 'blocks/product' ); ?>
	  <?php echo get_template_part( 'blocks/banner' ); ?>

	  <?php echo get_template_part( 'blocks/customer' ); ?>
  </main>
<?php
get_footer();
