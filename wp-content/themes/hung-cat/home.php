<?php
get_header();
$directoryUri = get_template_directory_uri();
?>
  <main>
    <?php echo get_template_part('blocks/keyvisual'); ?>
    <?php echo get_template_part('blocks/reasons'); ?>
    <?php echo get_template_part('blocks/about'); ?>
    <?php echo get_template_part('blocks/product'); ?>
    <?php echo get_template_part('blocks/target'); ?>
    <?php echo get_template_part('blocks/gallery'); ?>
    <?php echo get_template_part('blocks/news'); ?>
    <?php echo get_template_part('blocks/banner'); ?>
    <?php echo get_template_part('blocks/customer'); ?>
    <?php echo get_template_part('blocks/contact'); ?>
  </main>
<?php
get_footer();
