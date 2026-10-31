<?php
$reasons = hc_reasons();
?>
<section class="reasons">
  <div class="reasons-container container">
    <ul class="reasons-list">
      <?php foreach( $reasons as $reason ): ?>

      <li class="reasons-item js-animate">
        <div class="reasons-content">
          <?php if ( $reason['image'] ) : ?>
          <span class="text-base reasons-icon"><img src="<?= esc_url( $reason['image'] ) ?>" alt="" width="36" height="36" loading="lazy" style="width:1em;height:1em;object-fit:contain"></span>
          <?php else : ?>
          <span class="material-symbols-outlined text-base reasons-icon"><?= esc_html( $reason['icon'] ) ?></span>
          <?php endif; ?>
          <h3 class="reasons-title"><?= esc_html( $reason['title'] ) ?></h3>
          <p class="reasons-description"><?= esc_html( $reason['description'] ) ?></p>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
