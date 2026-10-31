<?php
$target = hc_target();
?>
<section class="target">
  <div class="target-container container">
    <div class="target-column js-animate">
      <p class="target-text"><?= wp_kses_post( $target['intro'] ) ?></p>
      <p class="target-text target-text--blue target-text--medium mt-[30px]">
        <?php foreach ( $target['points'] as $point ) : ?>
        - <?= esc_html( $point ) ?><br>
        <?php endforeach; ?>
      </p>
      <div class="target-button">
        <a href="#contact" class="button js-anchor"><?= esc_html( $target['button'] ) ?></a>
      </div>
    </div>
    <div class="target-column js-animate">
      <ul class="target-list">
        <?php foreach ( $target['items'] as $item ) : ?>
        <li class="target-item">
          <span class="material-symbols-outlined target-icon"><?= esc_html( $item['icon'] ) ?></span>
          <h3 class="target-title"><?= esc_html( $item['title'] ) ?></h3>
          <p class="target-text target-text--sm"><?= esc_html( $item['description'] ) ?></p>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>
