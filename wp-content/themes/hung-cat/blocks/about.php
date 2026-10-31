<?php
$video     = hc_about_video();
$more_link = hc_about_more_link();
?>
<section class="about">
  <div class="about-container container">
    <div class="about-content">
      <div class="about-description js-animate">
        <h2 class="about-title">Về chúng tôi</h2>
        <p class="about-description__text">
          <?= wp_kses_post( hc_contact( 'about_description' ) ) ?>
        </p>

        <?php if ( $more_link ) : ?>
        <a href="<?= esc_url( $more_link['url'] ) ?>" class="text-link"<?= $more_link['target'] ? ' target="' . esc_attr( $more_link['target'] ) . '" rel="noopener"' : '' ?>>
          <?= esc_html( $more_link['title'] ) ?>
          <span class="material-symbols-outlined">chevron_right</span>
        </a>
        <?php endif; ?>
      </div>
      <div class="about-media js-show-modal-video js-animate">
        <img src="<?= esc_url( $video['thumbnail'] ) ?>" alt="" class="about-image" width="409" height="227" loading="lazy"<?= $video['cover'] ? ' style="object-fit:cover"' : '' ?>>
      </div>
    </div>
  </div>
</section>
