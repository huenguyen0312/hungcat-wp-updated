<?php
$images = get_template_directory_uri() . '/assets/images';
$galleries = array(
  array( 'image' => 'gallery-01.webp', 'title' => 'Bộ phận in trục' ),
  array( 'image' => 'gallery-02.webp', 'title' => 'Bộ phận cắt' ),
  array( 'image' => 'gallery-03.webp', 'title' => 'Bộ phận văn phòng' ),
  array( 'image' => 'gallery-02.webp', 'title' => 'Bộ phận máy thổi' ),
);
?>
<section class="gallery">
  <div class="gallery-container container">
    <h2 class="gallery-title">Hình ảnh công ty</h2>
    <div class="gallery-list js-gallery-slider js-animate">
      <?php foreach ($galleries as $gallery) : ?>
      <div class="gallery-item">
        <div class="gallery-image">
          <img src="<?= $images ?>/<?= $gallery['image'] ?>" alt="<?= $gallery['title'] ?>" width="324" height="243" loading="lazy">
        </div>
        <h3 class="gallery-name"><?= $gallery['title'] ?></h3>
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
