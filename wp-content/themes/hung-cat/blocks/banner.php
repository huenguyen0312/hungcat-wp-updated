<?php
$images = get_template_directory_uri() . '/assets/images';
$banners = array(
  array( 'image' => 'banner-01.webp', 'alt_text' => '' ),
);
?>
<section class="banner">
  <div class="banner-container container">
    <div class="banner-list js-slider-banner js-animate">
      <?php foreach( $banners as $banner ): ?>
      <div class="banner-item">
        <div class="banner-image">
          <img src="<?= $images ?>/<?= $banner['image'] ?>" alt="<?= $banner['alt_text'] ?>" width="1244" height="420" loading="lazy">
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
