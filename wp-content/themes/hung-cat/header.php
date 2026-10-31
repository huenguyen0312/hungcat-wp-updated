<?php
$assets = get_template_directory_uri() . "/assets/";
?>
<!DOCTYPE html>
  <html lang="vi">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	  <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
  <div class="wrapper">
<?php get_template_part( 'inc/header' ); ?>