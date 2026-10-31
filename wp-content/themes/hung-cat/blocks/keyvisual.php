<?php
$keyvisuals = hc_keyvisuals();
?>
<section class="keyvisual">
  <div class="keyvisual-container">
    <div class="keyvisual-list js-slider-keyvisual">
      <?php foreach( $keyvisuals as $index => $keyvisual ): ?>
      <div class="keyvisual-item">
        <picture>
          <?php foreach ( $keyvisual['sources'] as $source ) : ?>
          <source media="<?= esc_attr( $source['media'] ) ?>" srcset="<?= esc_attr( $source['srcset'] ) ?>"<?= $source['sizes'] ? ' sizes="' . esc_attr( $source['sizes'] ) . '"' : '' ?> width="<?= (int) $source['width'] ?>" height="<?= (int) $source['height'] ?>">
          <?php endforeach; ?>
          <img src="<?= esc_url( $keyvisual['src'] ) ?>"<?= $keyvisual['srcset'] ? ' srcset="' . esc_attr( $keyvisual['srcset'] ) . '" sizes="' . esc_attr( $keyvisual['sizes'] ) . '"' : '' ?> alt="<?= esc_attr( $keyvisual['alt'] ) ?>" class="keyvisual-image" width="<?= (int) $keyvisual['width'] ?>" height="<?= (int) $keyvisual['height'] ?>" <?= $index === 0 ? 'fetchpriority="high"' : 'loading="lazy"' ?>>
        </picture>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="keyvisual-slick-dots"></div>
</section>
