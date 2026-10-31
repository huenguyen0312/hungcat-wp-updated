<?php
$images      = get_template_directory_uri() . "/assets/images";
$hotline     = hc_contact( 'contact_hotline' );
$cskh        = hc_contact( 'contact_cskh' );
$email       = hc_contact( 'contact_email' );
$logo        = hc_logo( 'logo_header', 'logo.webp', 93, 61 );

// Current section, to highlight its menu item (red + aria-current) like hungcat-static
$section = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
$section = strtok( $section, '/' ) ?: 'home';
if ( is_singular( 'products' ) || is_post_type_archive( 'products' ) ) {
	$section = 'products';
} elseif ( is_singular( 'post' ) || is_category() || is_tag() ) {
	$section = 'news';
}
$nav_items = array(
	'home'     => array( '/', 'Trang chủ' ),
	'about'    => array( '/about/', 'Giới thiệu' ),
	'products' => array( '/products/', 'Sản phẩm' ),
	'news'     => array( '/news/', 'Tin tức' ),
	'contact'  => array( '/contact/', 'Liên hệ' ),
);
?>
<header class="header">
  <div class="header-contact">
    <div class="header-contact-list">
      <div class="header-contact-item">
        <span class="material-symbols-outlined">phone_in_talk</span>
        <a href="tel:<?= esc_attr( hc_tel( $hotline ) ) ?>" class="font-bold phone-number">
          <span><?= esc_html( $hotline ) ?></span>
        </a>
        <span>-</span>
        <a href="tel:<?= esc_attr( hc_tel( $cskh ) ) ?>" class="font-bold phone-number">
          <span><?= esc_html( $cskh ) ?></span>
        </a>
      </div>
      <div class="header-contact-item">
        <span class="material-symbols-outlined">email</span>
        <a href="mailto:<?= esc_attr( $email ) ?>" class="font-bold email-address">
          <i class="fas fa-envelope"></i>
          <span><?= esc_html( $email ) ?></span>
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
        <img src="<?= esc_url( $logo['src'] ) ?>" alt="<?= esc_attr( $logo['alt'] ) ?>" width="<?= $logo['width'] ?>" height="<?= $logo['height'] ?>">
      </a>
    </div>
    <nav class="header-nav" id="header-nav">
      <ul class="header-nav-list">
        <?php foreach ( $nav_items as $key => list( $link, $label ) ) : ?>
          <li class="header-nav-item<?= $key === $section ? ' header-nav-item--active' : '' ?>">
            <a href="<?= esc_url( $link ) ?>" class="header-nav-link"<?= $key === $section ? ' aria-current="page"' : '' ?>><?= esc_html( $label ) ?></a>
          </li>
        <?php endforeach; ?>
        <li class="header-nav-item--small-only mt-10 w-[calc(100%-40px)]">
          <div class="flex gap-1.5 w-full justify-center">
            <a href="tel:<?= esc_attr( hc_tel( $hotline ) ) ?>" class="hotline-number">
              <span><?= esc_html( $hotline ) ?></span>
            </a>
            <a href="tel:<?= esc_attr( hc_tel( $cskh ) ) ?>" class="support-number">
              <span><?= esc_html( $cskh ) ?></span>
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