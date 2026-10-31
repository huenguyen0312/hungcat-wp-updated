<?php
$galleries = hc_gallery();
?>
<section class="gallery">
  <div class="gallery-container container">
    <h2 class="gallery-title"><?= esc_html( hc_contact( 'gallery_title', 'Hình ảnh công ty' ) ) ?></h2>
    <div class="gallery-list js-gallery-slider js-animate">
      <?php foreach ($galleries as $gallery) : ?>
      <div class="gallery-item">
        <div class="gallery-image">
          <img src="<?= esc_url( $gallery['src'] ) ?>" alt="<?= esc_attr( $gallery['title'] ) ?>" width="324" height="243" loading="lazy"<?= $gallery['custom'] ? ' style="width:100%;height:auto;aspect-ratio:4/3;object-fit:cover"' : '' ?>>
        </div>
        <?php if ( $gallery['title'] !== '' ) : ?>
        <h3 class="gallery-name"><?= esc_html( $gallery['title'] ) ?></h3>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="gallery-button">
      <button class="gallery-button--prev slider-button-prev">
        <span class="material-symbols-outlined slider-arrow-icon">chevron_left</span>
      </button>
      <button class="gallery-button--next slider-button-next">
        <span class="material-symbols-outlined slider-arrow-icon">chevron_right</span>
      </button>
    </div>
  </div>
</section>
