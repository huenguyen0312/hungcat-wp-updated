<?php
get_header();
$images       = get_template_directory_uri() . '/assets/images';
?>
  <main class="news-page">
	  <?php
	  while ( have_posts() ) : the_post();
		  the_content();
	  endwhile;
	  ?>
  </main>
<?php
get_footer();
