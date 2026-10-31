<?php
get_header();
$images = get_template_directory_uri() . '/assets/images';
$about_us_keyvisual_image = get_field('about_us_keyvisual_image', 'option');
?>
  <main class="about-page">
    <section class="sub-keyvisual">
      <div class="sub-keyvisual-container container">
        <picture>
          <source srcset="<?= $about_us_keyvisual_image['pc_image']['url'] ?? '' ?>" type="image/png">
          <img src="<?= $about_us_keyvisual_image['pc_image']['url'] ?? ''?>" alt="" class="sub-keyvisual-image">
        </picture>
      </div>
    </section>
	  <?php
	  while ( have_posts() ) : the_post();
		  ?>
        <ul class="breadcrumb container">
          <li>
            <a href="/" class="">Trang chủ</a>
            ／
          </li>
          <li>
            <label class="">Giới thiệu</label>
          </li>
        </ul>
        <section class="section about">
          <div class="container">
            <div class="about__content">
				<?php the_content(); ?>
            </div>
          </div>
        </section>
	  <?php
	  endwhile;
	  ?>
  </main>
<?php
get_footer();
