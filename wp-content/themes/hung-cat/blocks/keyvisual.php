<?php
$images = get_template_directory_uri() . '/assets/images';
$keyvisuals = array(
  array( 'image' => 'keyvisual-01.webp', 'alt_text' => '' ),
  array( 'image' => 'keyvisual-01.webp', 'alt_text' => '' ),
  array( 'image' => 'keyvisual-01.webp', 'alt_text' => '' ),
);
?>
<section class="keyvisual">
  <div class="keyvisual-container">
    <div class="keyvisual-list js-slider-keyvisual">
      <?php foreach( $keyvisuals as $index => $keyvisual ): ?>
      <div class="keyvisual-item">
        <img src="<?= $images ?>/<?= $keyvisual['image'] ?>" alt="<?= $keyvisual['alt_text'] ?>" class="keyvisual-image" width="1280" height="512" <?= $index === 0 ? 'fetchpriority="high"' : 'loading="lazy"' ?>>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="keyvisual-slick-dots"></div>
</section>
