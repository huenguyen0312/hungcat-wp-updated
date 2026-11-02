<?php
// Page title and meta tags (taken from hungcat-static views/pages/*.ejs)
function hc_page_meta() {
	$meta = array(
		'home'           => array(
			'title'       => 'Bao bì Hưng Cát | Trang chủ',
			'description' => 'Công ty cổ phần Hưng Cát chuyên sản xuất, in ấn bao bì túi PE, PP, túi zip, màng PE khổ lớn. Đạt chuẩn ISO 9001:2015, miễn phí thiết kế, giao hàng toàn quốc.',
		),
		'about'          => array(
			'title'       => 'Bao bì Hưng Cát | Giới thiệu',
			'description' => 'Giới thiệu Công ty cổ phần Hưng Cát: thành lập năm 2005 tại Nam Định, chuyên sản xuất và in ấn bao bì màng PE, PP cho ngành may mặc, giày dép, mỹ phẩm, đồ gỗ.',
		),
		'contact'        => array(
			'title'       => 'Bao bì Hưng Cát | Liên hệ',
			'description' => 'Liên hệ Bao bì Hưng Cát để được tư vấn và báo giá túi PE, PP, túi zip. Hotline ' . hc_contact( 'contact_hotline' ) . ' - CSKH ' . hc_contact( 'contact_cskh' ) . '. ' . hc_contact( 'contact_address', 'Km110+500 QL10, Mỹ Xá, Nam Định' ) . '.',
		),
		'products'       => array(
			'title'       => 'Bao bì Hưng Cát | Sản phẩm',
			'description' => 'Sản phẩm bao bì Hưng Cát: túi PE, PP, túi trùm pallet, màng PE khổ lớn, túi zip chỉ đỏ. In ấn sắc nét theo yêu cầu, giá sỉ cạnh tranh, giao hàng toàn quốc.',
		),
		'product-detail' => array(
			'title'       => 'Bao bì Hưng Cát | Chi tiết sản phẩm',
			'description' => 'Chi tiết sản phẩm bao bì của Hưng Cát: chất liệu PE, PP bền, thân thiện môi trường, in ấn theo yêu cầu. Liên hệ để được tư vấn và báo giá sỉ tốt nhất.',
		),
		'news'           => array(
			'title'       => 'Bao bì Hưng Cát | Tin tức - sự kiện',
			'description' => 'Tin tức và sự kiện từ Bao bì Hưng Cát: kiến thức về bao bì nhựa, quy trình sản xuất túi PE, PP, túi zip và các tiêu chuẩn chất lượng, môi trường.',
		),
		'news-detail'    => array(
			'title'       => 'Bao bì Hưng Cát | Tin tức - sự kiện',
			'description' => 'Bài viết từ Bao bì Hưng Cát chia sẻ kiến thức về sản xuất, in ấn bao bì nhựa PE, PP và các tiêu chuẩn chất lượng, bảo vệ môi trường.',
		),
		'policy'         => array(
			'title'       => 'Bao bì Hưng Cát | Chính sách khách hàng',
			'description' => 'Chính sách bảo hành, giao nhận hàng, phương thức thanh toán, đổi trả và kiểm hàng khi đặt sản xuất bao bì tại Bao bì Hưng Cát.',
		),
		'404'            => array(
			'title'       => 'Bao bì Hưng Cát | Không tìm thấy trang',
			'description' => 'Không tìm thấy trang bạn yêu cầu. Quay lại trang chủ Bao bì Hưng Cát để xem các sản phẩm bao bì túi PE, PP, túi zip và thông tin liên hệ.',
			'robots'      => 'noindex',
		),
	);

	$static_page = get_query_var( 'hc_static_page' );

	if ( is_404() ) {
		return $meta['404'];
	}
	if ( $static_page && isset( $meta[ $static_page ] ) ) {
		return $meta[ $static_page ];
	}
	if ( is_post_type_archive( 'products' ) ) {
		return $meta['products'];
	}
	if ( is_singular( 'products' ) ) {
		return $meta['product-detail'];
	}
	if ( is_singular( 'post' ) ) {
		return $meta['news-detail'];
	}
	if ( is_page( 'about' ) ) {
		return $meta['about'];
	}
	if ( is_page( 'contact' ) ) {
		return $meta['contact'];
	}
	if ( is_front_page() || is_home() ) {
		return $meta['home'];
	}

	return array(
		'title'       => 'Bao bì Hưng Cát | ' . single_post_title( '', false ),
		'description' => $meta['home']['description'],
	);
}

function hc_page_meta_tags() {
	$meta = hc_page_meta();
	?>
    <title><?= esc_html( $meta['title'] ) ?></title>
    <meta name="description" content="<?= esc_attr( $meta['description'] ) ?>">
		<?php if ( ! empty( $meta['robots'] ) ) : ?>
      <meta name="robots" content="<?= esc_attr( $meta['robots'] ) ?>">
		<?php endif; ?>
    <meta property="og:title" content="<?= esc_attr( $meta['title'] ) ?>">
    <meta property="og:description" content="<?= esc_attr( $meta['description'] ) ?>">
    <meta property="og:type" content="website">
	<?php
}

add_action( 'wp_head', 'hc_page_meta_tags', 1 );
