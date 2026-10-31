<?php
// Page header banner; $args['page'] is about / products / news
$banner = hc_page_banner( $args['page'] );
?>
    <section class="sub-keyvisual">
      <div class="sub-keyvisual-container container">
        <picture>
          <source media="(min-width:768px)" srcset="<?= esc_url( $banner['pc'] ) ?>"<?= $banner['pc_type'] ? ' type="' . esc_attr( $banner['pc_type'] ) . '"' : '' ?>>
          <source media="(max-width:767px)" srcset="<?= esc_url( $banner['sp'] ) ?>"<?= $banner['sp_type'] ? ' type="' . esc_attr( $banner['sp_type'] ) . '"' : '' ?>>
          <img src="<?= esc_url( $banner['pc'] ) ?>" alt="<?= esc_attr( $banner['alt'] ) ?>" class="sub-keyvisual-image" fetchpriority="high">
        </picture>
      </div>
    </section>
