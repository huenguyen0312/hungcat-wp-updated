<?php
// Contact info managed in Admin → Theme Settings (fields registered in inc/acf.php)
function hc_contact_defaults() {
	return array(
		'company_name'       => 'CÔNG TY CỔ PHẦN HƯNG CÁT',
		'contact_hotline'    => '0917.388.591',
		'contact_cskh'       => '0834.121.193',
		'contact_email'      => 'vthungcat@gmail.com',
		'contact_address'    => 'Km110+500 quốc lộ 10, phường Mỹ Xá, thành phố Nam Định, tỉnh Nam Định',
		'contact_website'    => 'baobihungcat.com',
		'contact_map'        => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3669.7290453851856!2d106.14862474415844!3d20.407977411633407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135de101d6109f9%3A0xa8c001c45f5044a3!2zTeG7uSBYw6EsIFRQLiBOYW0gxJDhu4tuaCwgTmFtIMSQ4buLbmgsIFZp4buHdCBOYW0!5e1!3m2!1svi!2s!4v1726630021859!5m2!1svi!2s',
		'contact_work_hours' => '07h15-17h00',
		'contact_work_days'  => 'thứ 2 - thứ 7',
		'contact_messenger'  => 'https://www.facebook.com/profile.php?id=61564076172519',
		'contact_facebook'   => 'https://www.facebook.com/profile.php?id=61564076172519',
		'contact_youtube'    => 'https://www.youtube.com/watch?v=ylURjTSqfEw',
		'about_description'  => 'Công ty cổ phần Hưng Cát chuyên sản xuất , in ấn trên chất liệu màng PE, PP. Sản phẩm của chúng tôi được sử dụng trong các ngành may mặc, giày dép, mỹ phẩm, đồ gỗ …<br><br>
          Được thành lập vào năm 2005, với đội ngũ công nhân lành nghề, chúng tôi luôn sử dụng hệ thống máy móc hiện đại nhằm không ngừng gia tăng lợi ích của khách hàng: Sản phẩm chất lượng - Giá thành hợp lý …',
	);
}

// Empty field → $fallback (the original static text at that spot), or the default above
function hc_contact( $key, $fallback = null ) {
	$value = function_exists( 'get_field' ) ? trim( (string) get_field( $key, 'option' ) ) : '';
	if ( $value !== '' ) {
		return $value;
	}

	return $fallback ?? hc_contact_defaults()[ $key ] ?? '';
}

// Google Maps embed URL; the field accepts either the URL or the whole <iframe> code copied from Google Maps
function hc_map_embed_url() {
	$value = hc_contact( 'contact_map' );
	if ( preg_match( '/src=["\']([^"\']+)["\']/i', $value, $m ) ) {
		$value = html_entity_decode( $m[1] );
	}

	return $value;
}

// Image for products without a featured image as [ 'src', 'width', 'height' ]:
// picked in Theme Settings, or the static sample from hungcat-static
function hc_product_default_image( $size = 'medium' ) {
	$id  = function_exists( 'get_field' ) ? get_field( 'product_default_image', 'option' ) : 0;
	$img = $id ? wp_get_attachment_image_src( $id, $size ) : false;
	if ( $img ) {
		return array( 'src' => $img[0], 'width' => $img[1], 'height' => $img[2] );
	}

	return array( 'src' => get_template_directory_uri() . '/assets/images/product-sample.webp', 'width' => 239, 'height' => 239 );
}

// Product image URL: featured image, or the default product image
function hc_product_image( $post = null, $size = 'medium' ) {
	return get_the_post_thumbnail_url( $post, $size ) ?: hc_product_default_image( $size )['src'];
}

// Product detail slider as [ [ 'src', 'thumb', 'alt', 'width', 'height' ], ... ].
// Empty gallery → featured image → default product image, so the slider is never empty.
function hc_product_gallery( $post_id = null ) {
	$post_id = $post_id ?: get_the_ID();
	$ids     = function_exists( 'get_field' ) ? (array) get_field( 'gallery', $post_id ) : array();
	if ( ! array_filter( $ids ) && has_post_thumbnail( $post_id ) ) {
		$ids = array( get_post_thumbnail_id( $post_id ) );
	}

	$slides = array();
	foreach ( array_filter( $ids ) as $id ) {
		$img = wp_get_attachment_image_src( $id, 'large' );
		if ( $img ) {
			$alt      = get_post_meta( $id, '_wp_attachment_image_alt', true );
			$slides[] = array(
				'src'    => $img[0],
				'thumb'  => wp_get_attachment_image_url( $id, 'thumbnail' ) ?: $img[0],
				'alt'    => $alt ?: get_the_title( $post_id ),
				'width'  => $img[1],
				'height' => $img[2],
			);
		}
	}
	if ( $slides ) {
		return $slides;
	}

	$default = hc_product_default_image( 'large' );

	return array( $default + array( 'thumb' => hc_product_default_image( 'thumbnail' )['src'], 'alt' => get_the_title( $post_id ) ) );
}

// "Sản phẩm tiêu biểu" cards as [ [ 'url', 'image', 'title' ], ... ]:
// products picked in Theme Settings (in that order), or the 4 latest products when none are picked
function hc_featured_products() {
	$ids   = function_exists( 'get_field' ) ? array_filter( (array) get_field( 'featured_products', 'option' ) ) : array();
	$posts = get_posts( $ids
		? array( 'post_type' => 'products', 'post__in' => $ids, 'orderby' => 'post__in', 'posts_per_page' => count( $ids ) )
		: array( 'post_type' => 'products', 'posts_per_page' => 4 ) );

	return array_map( function ( $post ) {
		return array(
			'url'   => get_permalink( $post ),
			'image' => hc_product_image( $post ),
			'title' => get_the_title( $post ),
		);
	}, $posts );
}

// Banner in the news/product detail sidebar; empty field → original static image
function hc_sidebar_banner() {
	$id  = function_exists( 'get_field' ) ? get_field( 'detail_sidebar_banner', 'option' ) : 0;
	$img = $id ? wp_get_attachment_image_src( $id, 'medium_large' ) : false;
	if ( ! $img ) {
		return array(
			'src'    => get_template_directory_uri() . '/assets/images/about-us/img-01.webp',
			'alt'    => '',
			'width'  => 330,
			'height' => 220,
		);
	}

	return array(
		'src'    => $img[0],
		'alt'    => (string) get_post_meta( $id, '_wp_attachment_image_alt', true ),
		'width'  => 330,
		'height' => $img[1] && $img[2] ? (int) round( 330 * $img[2] / $img[1] ) : 220,
	);
}

// Sidebar list for news/product detail as [ [ 'url', 'image', 'title' ], ... ]:
// same post type, same category as the current post first, then filled up with the latest posts.
// No featured image → default product image / news sample image.
function hc_related_posts( $count = 5, $post_id = null ) {
	$post_id = $post_id ?: get_the_ID();
	$args    = array(
		'post_type'      => get_post_type( $post_id ),
		'posts_per_page' => $count,
		'post__not_in'   => array( $post_id ),
	);

	$categories = wp_get_post_terms( $post_id, 'category', array( 'fields' => 'ids' ) );
	$posts      = ! is_wp_error( $categories ) && $categories ? get_posts( $args + array( 'category__in' => $categories ) ) : array();
	if ( count( $posts ) < $count ) {
		$posts = array_merge( $posts, get_posts( array_merge( $args, array(
			'posts_per_page' => $count - count( $posts ),
			'post__not_in'   => array_merge( array( $post_id ), wp_list_pluck( $posts, 'ID' ) ),
		) ) ) );
	}

	$fallback = $args['post_type'] === 'products'
		? hc_product_default_image( 'thumbnail' )['src']
		: get_template_directory_uri() . '/assets/images/news-sample.webp';

	return array_map( function ( $post ) use ( $fallback ) {
		return array(
			'url'   => get_permalink( $post ),
			'image' => get_the_post_thumbnail_url( $post, 'thumbnail' ) ?: $fallback,
			'title' => get_the_title( $post ),
		);
	}, $posts );
}

// Certificate images as [ [ 'src' => ..., 'alt' => ... ], ... ]; empty gallery → original static images
function hc_certificates() {
	$ids    = function_exists( 'get_field' ) ? get_field( 'contact_certificates', 'option' ) : array();
	$images = array();
	foreach ( (array) $ids as $i => $id ) {
		$src = wp_get_attachment_image_url( $id, 'medium' );
		if ( $src ) {
			$alt      = get_post_meta( $id, '_wp_attachment_image_alt', true );
			$images[] = array( 'src' => $src, 'alt' => $alt ?: 'Chứng nhận ' . ( $i + 1 ) );
		}
	}
	if ( $images ) {
		return $images;
	}

	$dir = get_template_directory_uri() . '/assets/images';

	return array(
		array( 'src' => $dir . '/certificate-01.webp', 'alt' => 'Chứng nhận 1' ),
		array( 'src' => $dir . '/certificate-02.webp', 'alt' => 'Chứng nhận 1' ),
	);
}

// Home key visual slides for <picture>: img attrs + 'sources' (<source> attrs). Empty repeater → original static slide.
function hc_keyvisuals() {
	$rows   = function_exists( 'get_field' ) ? get_field( 'home_keyvisuals', 'option' ) : array();
	$slides = array();
	foreach ( (array) $rows as $row ) {
		$img = ! empty( $row['image'] ) ? wp_get_attachment_image_src( $row['image'], 'full' ) : false;
		if ( ! $img ) {
			continue;
		}
		$alt     = trim( (string) ( $row['alt_text'] ?? '' ) );
		$sources = array();
		$sp      = ! empty( $row['image_sp'] ) ? wp_get_attachment_image_src( $row['image_sp'], 'full' ) : false;
		if ( $sp ) {
			$sources[] = array(
				'media'  => '(max-width: 767px)',
				'srcset' => wp_get_attachment_image_srcset( $row['image_sp'], 'full' ) ?: $sp[0],
				'sizes'  => '100vw',
				'width'  => $sp[1],
				'height' => $sp[2],
			);
		}
		$slides[] = array(
			'sources' => $sources,
			'src'     => $img[0],
			'srcset'  => (string) wp_get_attachment_image_srcset( $row['image'], 'full' ),
			'sizes'   => '100vw',
			'alt'     => $alt !== '' ? $alt : (string) get_post_meta( $row['image'], '_wp_attachment_image_alt', true ),
			'width'   => $img[1],
			'height'  => $img[2],
		);
	}
	if ( $slides ) {
		return $slides;
	}

	$dir = get_template_directory_uri() . '/assets/images';

	return array(
		array(
			'sources' => array(
				array(
					'media'  => '(min-width: 1920px)',
					'srcset' => $dir . '/keyvisual-01-lg.webp 1920w, ' . $dir . '/keyvisual-01-xl.webp 2480w',
					'sizes'  => '100vw',
					'width'  => 1920,
					'height' => 335,
				),
				array(
					'media'  => '(max-width: 767px)',
					'srcset' => $dir . '/keyvisual-01-sp.webp',
					'sizes'  => '',
					'width'  => 1024,
					'height' => 825,
				),
			),
			'src'     => $dir . '/keyvisual-01.webp',
			'srcset'  => $dir . '/keyvisual-01-md.webp 1024w, ' . $dir . '/keyvisual-01.webp 1632w',
			'sizes'   => '100vw',
			'alt'     => 'Nhà máy sản xuất Hưng Cát: diện tích nhà máy 5000 m², năng suất 250 tấn/tháng, máy móc hiện đại nhập khẩu từ Đài Loan, Trung Quốc',
			'width'   => 1632,
			'height'  => 656,
		),
	);
}

// The 4 Material Symbols icons from the original design (name => label)
function hc_reason_icons() {
	return array(
		'forum'           => 'Tư vấn (forum)',
		'developer_guide' => 'Chứng nhận (developer_guide)',
		'compost'         => 'Chất lượng (compost)',
		'local_shipping'  => 'Giao hàng (local_shipping)',
	);
}

// Home reasons as [ [ 'title', 'description', 'icon', 'image' ], ... ]; empty repeater → original static items.
// 'image' (uploaded icon URL) wins over 'icon' (Material Symbols name).
function hc_reasons() {
	$rows    = function_exists( 'get_field' ) ? get_field( 'home_reasons', 'option' ) : array();
	$reasons = array();
	foreach ( (array) $rows as $row ) {
		if ( empty( $row['title'] ) ) {
			continue;
		}
		$icon      = $row['icon'] ?? '';
		$reasons[] = array(
			'title'       => $row['title'],
			'description' => $row['description'] ?? '',
			'icon'        => isset( hc_reason_icons()[ $icon ] ) ? $icon : 'forum',
			'image'       => ! empty( $row['icon_image'] ) ? (string) wp_get_attachment_image_url( $row['icon_image'], 'thumbnail' ) : '',
		);
	}
	if ( $reasons ) {
		return $reasons;
	}

	return array(
		array(
			'title'       => 'tư vấn 24/7',
			'description' => 'Đội ngũ nhân viên tư vấn hỗ trợ nhiệt tình. Luôn sát cánh đồng hành cùng doanh nghiệp',
			'icon'        => 'forum',
			'image'       => '',
		),
		array(
			'title'       => 'Chứng nhận tiêu chuẩn',
			'description' => 'Hưng Cát tuân thủ và áp dụng thành công tiêu chuẩn ISO 9001:2015 vào hệ thống quản lý chất lượng của mình',
			'icon'        => 'developer_guide',
			'image'       => '',
		),
		array(
			'title'       => 'Cam kết chất lượng',
			'description' => 'Top 10 Công ty sản xuất in ấn bao bì sản phẩm ổn định, uy tín hàng đầu tại Việt Nam',
			'icon'        => 'compost',
			'image'       => '',
		),
		array(
			'title'       => 'Đáp ứng tiến độ',
			'description' => 'Hưng Cát luôn cam kết sản xuất đúng tiến độ, đảm bảo cho mọi dự án của khách hàng',
			'icon'        => 'local_shipping',
			'image'       => '',
		),
	);
}

// Original static text of the home "target" section; icons stay fixed per item position
function hc_target_defaults() {
	return array(
		'intro'  => '<b>Công Ty Bao bì Hưng Cát</b> tự hào là đơn vị hàng đầu trong lĩnh vực sản xuất in ấn bao bì, túi nilon giá rẻ tại miền Bắc, với cam kết mang đến cho khách hàng những dịch vụ chất lượng và giá cả cạnh tranh nhất. Chúng tôi:',
		'points' => array(
			'MIỄN PHÍ thiết kế mẫu in bao bì theo yêu cầu',
			'Báo giá sỉ rẻ cực kỳ cạnh tranh',
			'Sản xuất túi PE, PP chất lượng.',
			'Công nghệ in ấn sắc nét',
			'Độ bền cao, thân thiện môi trường',
			'Giao hàng trên toàn quốc',
		),
		'button' => 'Liên hệ tư vấn',
		'items'  => array(
			array(
				'icon'        => 'public',
				'title'       => 'Cam kết chất lượng',
				'description' => 'Sản phầm ứng dụng da dạng trong nhiều lĩnh vực vì tính dễ tái chế và thân thiện với môi trường',
			),
			array(
				'icon'        => 'savings',
				'title'       => 'Chi phí rẻ và thấp nhất',
				'description' => 'Chúng tôi cam kết cung cấp dịch vụ với chất lượng tốt nhất, giá thành hợp lý nhất',
			),
			array(
				'icon'        => 'support_agent',
				'title'       => 'Phục vụ tận tâm',
				'description' => 'Đội ngũ nhân viên giàu kinh nghiệm, nhiệt tình, chuyên nghiệp phục vụ khách hàng 24/7',
			),
		),
	);
}

// Home "target" text; each empty field falls back to its original static text
function hc_target() {
	$defaults = hc_target_defaults();
	$field    = function ( $key ) {
		return function_exists( 'get_field' ) ? get_field( $key, 'option' ) : null;
	};

	$points = array();
	foreach ( preg_split( '/\R/', (string) $field( 'target_points' ) ) as $line ) {
		$line = trim( preg_replace( '/^\s*-\s*/', '', $line ) );
		if ( $line !== '' ) {
			$points[] = $line;
		}
	}

	$items = array();
	foreach ( $defaults['items'] as $i => $item ) {
		$row     = (array) $field( 'target_item_' . ( $i + 1 ) );
		$items[] = array(
			'icon'        => $item['icon'],
			'title'       => trim( (string) ( $row['title'] ?? '' ) ) ?: $item['title'],
			'description' => trim( (string) ( $row['description'] ?? '' ) ) ?: $item['description'],
		);
	}

	return array(
		'intro'  => trim( (string) $field( 'target_intro' ) ) ?: $defaults['intro'],
		'points' => $points ?: $defaults['points'],
		'button' => trim( (string) $field( 'target_button' ) ) ?: $defaults['button'],
		'items'  => $items,
	);
}

// Home gallery cards as [ [ 'src', 'title', 'custom' ], ... ]; empty repeater → original static cards
function hc_gallery() {
	$rows  = function_exists( 'get_field' ) ? get_field( 'home_gallery', 'option' ) : array();
	$cards = array();
	foreach ( (array) $rows as $row ) {
		$src = ! empty( $row['image'] ) ? wp_get_attachment_image_url( $row['image'], 'medium_large' ) : '';
		if ( $src ) {
			$cards[] = array( 'src' => $src, 'title' => trim( (string) ( $row['title'] ?? '' ) ), 'custom' => true );
		}
	}
	if ( $cards ) {
		return $cards;
	}

	$dir = get_template_directory_uri() . '/assets/images';

	return array(
		array( 'src' => $dir . '/gallery-01.webp', 'title' => 'Bộ phận in trục', 'custom' => false ),
		array( 'src' => $dir . '/gallery-02.webp', 'title' => 'Bộ phận cắt', 'custom' => false ),
		array( 'src' => $dir . '/gallery-03.webp', 'title' => 'Bộ phận văn phòng', 'custom' => false ),
		array( 'src' => $dir . '/gallery-02.webp', 'title' => 'Bộ phận máy thổi', 'custom' => false ),
	);
}

// <img>/<source> data for an attachment: [ src, width, height, type ], or null
function hc_image( $id, $size = 'full' ) {
	$img = $id ? wp_get_attachment_image_src( $id, $size ) : false;
	if ( ! $img ) {
		return null;
	}

	return array(
		'src'    => $img[0],
		'width'  => $img[1],
		'height' => $img[2],
		'type'   => (string) get_post_mime_type( $id ),
	);
}

// Home banner slides; empty repeater → original static banner. 'sp' is null when there is no mobile image.
function hc_banners() {
	$rows    = function_exists( 'get_field' ) ? get_field( 'home_banners', 'option' ) : array();
	$banners = array();
	foreach ( (array) $rows as $row ) {
		$pc = hc_image( $row['image'] ?? 0 );
		if ( ! $pc ) {
			continue;
		}
		$alt       = trim( (string) ( $row['alt_text'] ?? '' ) );
		$banners[] = array(
			'pc'  => $pc,
			'sp'  => hc_image( $row['image_sp'] ?? 0 ),
			'alt' => $alt !== '' ? $alt : (string) get_post_meta( $row['image'], '_wp_attachment_image_alt', true ),
		);
	}
	if ( $banners ) {
		return $banners;
	}

	$dir = get_template_directory_uri() . '/assets/images';

	return array(
		array(
			'pc'  => array( 'src' => $dir . '/banner-01.webp', 'width' => 1244, 'height' => 420, 'type' => '' ),
			'sp'  => array( 'src' => $dir . '/banner-01-sp.webp', 'width' => 377, 'height' => 1024, 'type' => '' ),
			'alt' => 'Công ty CP Hưng Cát - Sản xuất, in ấn bao bì nilon theo yêu cầu: túi PE, PP, túi dán băng keo, túi súp, túi thùng, túi zip. Hotline 0917.388.591, email vthungcat@gmail.com',
		),
	);
}

// Sub key visual of the about / products / news pages. Each image falls back separately:
// no PC upload → original static image; no SP upload → the uploaded PC image, else the original SP image.
function hc_page_banner( $page ) {
	$static = array(
		'about'    => array( 'about-us/sub-kv.webp', 'about-us/sub-kv-sp.webp' ),
		'products' => array( 'products/img-keyvisual.webp', 'products/img-keyvisual-sp.webp' ),
		'news'     => array( 'news/img-keyvisual.webp', 'news/img-keyvisual-sp.webp' ),
	);
	$dir    = get_template_directory_uri() . '/assets/images/';
	$group  = (array) ( function_exists( 'get_field' ) ? get_field( 'page_banner_' . $page, 'option' ) : array() );
	$pc     = hc_image( $group['image'] ?? 0 );
	$sp     = hc_image( $group['image_sp'] ?? 0 );

	return array(
		'pc'  => $pc ? $pc['src'] : $dir . $static[ $page ][0],
		'sp'  => $sp ? $sp['src'] : ( $pc ? $pc['src'] : $dir . $static[ $page ][1] ),
		'pc_type' => $pc ? $pc['type'] : 'image/webp',
		'sp_type' => $sp ? $sp['type'] : ( $pc ? $pc['type'] : 'image/webp' ),
		'alt' => trim( (string) ( $group['alt_text'] ?? '' ) ),
	);
}

// Home partner logos; empty repeater → original static list
function hc_customers() {
	$rows      = function_exists( 'get_field' ) ? get_field( 'home_customers', 'option' ) : array();
	$customers = array();
	foreach ( (array) $rows as $row ) {
		$logo = hc_image( $row['logo'] ?? 0, 'medium' );
		if ( $logo ) {
			$customers[] = array( 'src' => $logo['src'], 'name' => trim( (string) ( $row['name'] ?? '' ) ) );
		}
	}
	if ( $customers ) {
		return $customers;
	}

	$dir = get_template_directory_uri() . '/assets/images';

	return array(
		array( 'src' => $dir . '/enter-b.webp', 'name' => 'Công ty TNHH ENTER.B' ),
		array( 'src' => $dir . '/VJ-one.webp', 'name' => 'Garment CO.,LTD' ),
		array( 'src' => $dir . '/vina-denim.webp', 'name' => 'VINA DENIM' ),
		array( 'src' => $dir . '/lakeland.webp', 'name' => 'LAKELAND' ),
	);
}

// Logo <img> attributes; empty field → original static file. Height follows the uploaded image's ratio.
function hc_logo( $key, $file, $width, $height ) {
	$id  = function_exists( 'get_field' ) ? get_field( $key, 'option' ) : 0;
	$img = $id ? wp_get_attachment_image_src( $id, 'medium' ) : false;
	if ( ! $img ) {
		return array(
			'src'    => get_template_directory_uri() . '/assets/images/' . $file,
			'alt'    => 'Bao bì Hưng Cát',
			'width'  => $width,
			'height' => $height,
		);
	}

	return array(
		'src'    => $img[0],
		'alt'    => get_post_meta( $id, '_wp_attachment_image_alt', true ) ?: 'Bao bì Hưng Cát',
		'width'  => $width,
		'height' => $img[1] && $img[2] ? (int) round( $width * $img[2] / $img[1] ) : $height,
	);
}

// About-section "Xem thêm" link, or null when hidden. Never-saved toggle counts as shown.
function hc_about_more_link() {
	$show = function_exists( 'get_field' ) ? get_field( 'about_more_show', 'option', false ) : null;
	if ( null !== $show && '' !== $show && ! $show ) {
		return null;
	}

	$link = function_exists( 'get_field' ) ? get_field( 'about_more_link', 'option' ) : null;

	return array(
		'url'    => ! empty( $link['url'] ) ? $link['url'] : '/about/',
		'title'  => ! empty( $link['title'] ) ? $link['title'] : 'Xem thêm',
		'target' => ! empty( $link['target'] ) ? $link['target'] : '',
	);
}

// Video ID from watch?v= / youtu.be / shorts / embed / live URLs
function hc_youtube_id( $url ) {
	if ( preg_match( '~(?:youtu\.be/|youtube(?:-nocookie)?\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/|live/|v/))([A-Za-z0-9_-]{11})~', $url, $m ) ) {
		return $m[1];
	}

	return '';
}

// About-section video: empty field → original static video and thumbnail
function hc_about_video() {
	$thumbnail_id = function_exists( 'get_field' ) ? get_field( 'contact_youtube_thumbnail', 'option' ) : 0;
	$thumbnail    = $thumbnail_id ? wp_get_attachment_image_url( $thumbnail_id, 'large' ) : '';
	$id           = hc_youtube_id( hc_contact( 'contact_youtube', '' ) );

	if ( ! $id ) {
		return array(
			'embed'     => 'https://www.youtube.com/embed/ylURjTSqfEw',
			'title'     => 'PE PP Injection Blow Molding Machine Small Empty Round Plastic Bottle Making',
			'thumbnail' => $thumbnail ?: get_template_directory_uri() . '/assets/images/video-thumbnail.webp',
			'cover'     => false,
		);
	}

	$title = get_transient( 'hc_youtube_title_' . $id );
	if ( false === $title ) {
		$data  = _wp_oembed_get_object()->get_data( 'https://www.youtube.com/watch?v=' . $id );
		$title = $data && ! empty( $data->title ) ? $data->title : '';
		set_transient( 'hc_youtube_title_' . $id, $title, $title ? WEEK_IN_SECONDS : HOUR_IN_SECONDS );
	}

	return array(
		'embed'     => 'https://www.youtube.com/embed/' . $id,
		'title'     => $title ?: 'Video giới thiệu Bao bì Hưng Cát',
		'thumbnail' => $thumbnail ?: 'https://i.ytimg.com/vi/' . $id . '/hqdefault.jpg',
		// hqdefault is 4:3 with letterbox bars; crop them off
		'cover'     => ! $thumbnail,
	);
}

// "0917.388.591" → "0917388591" for tel: / zalo links
function hc_tel( $phone ) {
	return preg_replace( '/[^0-9+]/', '', $phone );
}
