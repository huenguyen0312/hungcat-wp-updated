<?php
/**
 * Template Name: Contact
 */

get_header();
$images = get_template_directory_uri() . '/assets/images';

?>
  <main>
    <section class="contact-main">
      <div class="contact-main-container container">
        <div class="contact-main-content">
          <div class="contact-form js-animate">
            <p>Liên hệ ngay với chúng tôi để được tư vấn và hỗ trợ tốt nhất</p>
            <?php if ( $form_id = hc_quote_form_id() ) : ?>
              <?= do_shortcode( '[contact-form-7 id="' . $form_id . '" html_class="form"]' ) ?>
            <?php else : ?>
            <form action="" class="form">
              <div class="form-group">
                <label for="name" class="form-label">Họ tên (*)</label>
                <input type="text" id="name" class="form-input" placeholder="Họ và tên"/>
              </div>
              <div class="form-group">
                <label for="email" class="form-label">Email (*)</label>
                <input type="email" id="email" class="form-input" placeholder="Email của bạn" />
              </div>
              <div class="form-group">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="text" id="phone" class="form-input" placeholder="Số điện thoại"/>
              </div>
              <div class="form-group">
                <label for="content" class="form-label">Nội dung chia sẻ</label>
                <textarea id="content" class="form-textarea" placeholder="Nội dung chia sẻ"></textarea>
              </div>
              <div class="form-group">
                <p>Chúng tôi tuyệt đối tôn trọng quyền riêng tư của khách hàng. Chúng tôi không công khai hoặc sử dụng thông tin liên lạc cho mục đích khác.</p>
              </div>
              <div class="form-group form-button">
                <button type="button" class="button">Gửi liên hệ</button>
              </div>
            </form>
            <?php endif; ?>
          </div>
          <div class="contact-info js-animate">
            <h3 class="company-name">Công ty Cổ phần Hưng Cát</h3>
            <p class="company-description">
              Email: <b><span class="text-blue"><?= esc_html( hc_contact( 'contact_email' ) ) ?></span></b><br>
              Website: <b><span class="text-blue">baobihungcat.com</span></b><br>
              Hotline: <b><span class="text-blue"><?= esc_html( hc_contact( 'contact_hotline' ) ) ?></span></b><br>
              CSKH: <b><span class="text-blue"><?= esc_html( hc_contact( 'contact_cskh', '0834.121193' ) ) ?></span></b><br>
              Thời gian làm việc: <b><?= esc_html( hc_contact( 'contact_work_hours' ) ) ?> từ <?= esc_html( hc_contact( 'contact_work_days' ) ) ?></b><br>
            </p>
            <div class="map">
              <div class="iframe">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3669.7290453851856!2d106.14862474415844!3d20.407977411633407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135de101d6109f9%3A0xa8c001c45f5044a3!2zTeG7uSBYw6EsIFRQLiBOYW0gxJDhu4tuaCwgTmFtIMSQ4buLbmgsIFZp4buHdCBOYW0!5e1!3m2!1svi!2s!4v1726630021859!5m2!1svi!2s"
                  style="border:0;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
              <p>Địa chỉ: <?= esc_html( hc_contact( 'contact_address' ) ) ?></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php echo get_template_part('blocks/news'); ?>
    <?php echo get_template_part('blocks/banner'); ?>
    <?php echo get_template_part('blocks/customer'); ?>
  </main>
<?php
get_footer();
