<?php
// "Đăng ký để nhận thông tin tư vấn và báo giá" form (blocks/contact.php + page-contact.php), handled by Contact Form 7.
// The form is created once in Admin → Liên hệ (Contact) and can be edited there (fields, recipient, messages).
// Submissions are stored by Flamingo in Admin → Flamingo → Inbound Messages.

function hc_quote_form_markup() {
	return <<<'FORM'
<div class="form-group">
  <label for="name" class="form-label">Họ tên (*)</label>
  [text* your-name id:name class:form-input autocomplete:name placeholder "Họ và tên"]
</div>

<div class="sm:flex flex-row gap-4">
  <div class="form-group flex-1">
    <label for="email" class="form-label">Email (*)</label>
    [email* your-email id:email class:form-input autocomplete:email placeholder "Email của bạn"]
  </div>
  <div class="form-group flex-1">
    <label for="phone" class="form-label">Số điện thoại</label>
    [tel your-phone id:phone class:form-input autocomplete:tel placeholder "Số điện thoại"]
  </div>
</div>

<div class="form-group">
  <label for="title" class="form-label">Tiêu đề</label>
  [text your-subject id:title class:form-input placeholder "Tiêu đề"]
</div>
<div class="form-group">
  <label for="content" class="form-label">Nội dung</label>
  [textarea your-message id:content class:form-textarea placeholder "Nội dung"]
</div>

[response]

<div class="form-group form-button">
  [submit class:button "Gửi liên hệ"]
</div>

<p class="form-note">Chúng tôi cam kết bảo mật thông tin và không gửi email spam đến khách hàng.</p>
FORM;
}

// ID of the CF7 form; creates it on first call (or if it was deleted in admin). 0 if CF7 is inactive.
function hc_quote_form_id() {
	if ( ! class_exists( 'WPCF7_ContactForm' ) ) {
		return 0;
	}

	$id = (int) get_option( 'hc_quote_form_id' );
	if ( $id && get_post_type( $id ) === WPCF7_ContactForm::post_type ) {
		return $id;
	}

	$form = WPCF7_ContactForm::get_template( array(
		'title'  => 'Đăng ký tư vấn và báo giá',
		'locale' => 'vi',
	) );

	$form->set_properties( array(
		'form'     => hc_quote_form_markup(),
		'mail'     => array_merge( $form->prop( 'mail' ), array(
			'active'             => true,
			'subject'            => '[_site_title] Yêu cầu tư vấn và báo giá từ [your-name]',
			'recipient'          => hc_contact( 'contact_email' ),
			'body'               => "Họ tên: [your-name]\nEmail: [your-email]\nSố điện thoại: [your-phone]\nTiêu đề: [your-subject]\n\nNội dung:\n[your-message]\n\n-- \nEmail này được gửi từ form \"Đăng ký để nhận thông tin tư vấn và báo giá\" trên website [_site_title] ([_site_url]).",
			'additional_headers' => 'Reply-To: [your-email]',
		) ),
		'mail_2'   => array_merge( $form->prop( 'mail_2' ), array( 'active' => false ) ),
		'messages' => array_merge( $form->prop( 'messages' ), array(
			'mail_sent_ok'     => 'Cảm ơn bạn đã liên hệ. Chúng tôi sẽ phản hồi trong thời gian sớm nhất.',
			'mail_sent_ng'     => 'Đã có lỗi khi gửi liên hệ. Vui lòng thử lại sau hoặc gọi hotline.',
			'validation_error' => 'Vui lòng kiểm tra lại các trường bị lỗi.',
			'spam'             => 'Đã có lỗi khi gửi liên hệ. Vui lòng thử lại sau hoặc gọi hotline.',
			'invalid_required' => 'Vui lòng nhập trường này.',
			'invalid_too_long' => 'Nội dung quá dài.',
			'invalid_email'    => 'Email không hợp lệ.',
			'invalid_tel'      => 'Số điện thoại không hợp lệ.',
		) ),
	) );

	$id = (int) $form->save();
	if ( $id ) {
		update_option( 'hc_quote_form_id', $id );
	}

	return $id;
}

// Create the form as soon as an admin opens the dashboard, so it shows up under Liên hệ
add_action( 'admin_init', 'hc_quote_form_id' );

// Fit CF7's extra markup (field wrapper, error tip, response box, spinner) into the theme's form styles
function hc_quote_form_styles() {
	wp_add_inline_style( 'main-css', '
.form .wpcf7-form-control-wrap{display:block;width:100%}
.form .wpcf7-not-valid-tip{font-size:13px;margin-top:4px}
.form-button .wpcf7-spinner{margin:10px auto 0}
.contact .wpcf7 form .wpcf7-response-output{border-radius:8px;color:#fff;margin:20px 0 0;text-align:center}
.contact-main .wpcf7 form .wpcf7-response-output{border-radius:8px;margin:20px 0 0;text-align:center}
.contact-main .form-note{border-top-color:#e5e5e5;color:#666}
.form textarea.form-textarea{height:calc(3 * 1.5em + 20px)}
' );
}

add_action( 'wp_enqueue_scripts', 'hc_quote_form_styles', 20 );
