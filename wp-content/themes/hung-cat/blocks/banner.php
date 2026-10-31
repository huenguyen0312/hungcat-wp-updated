<?php
$banners = hc_banners();
?>
<section class="banner">
  <div class="banner-container container">
    <div class="banner-list js-slider-banner js-animate">
      <?php foreach( $banners as $banner ): ?>
      <div class="banner-item">
        <div class="banner-image">
          <picture>
            <?php if ( $banner['sp'] ) : ?>
            <source media="(max-width: 767px)" srcset="<?= esc_url( $banner['sp']['src'] ) ?>" width="<?= (int) $banner['sp']['width'] ?>" height="<?= (int) $banner['sp']['height'] ?>">
            <?php endif; ?>
            <img src="<?= esc_url( $banner['pc']['src'] ) ?>" alt="<?= esc_attr( $banner['alt'] ) ?>" width="<?= (int) $banner['pc']['width'] ?>" height="<?= (int) $banner['pc']['height'] ?>" loading="lazy">
          </picture>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
