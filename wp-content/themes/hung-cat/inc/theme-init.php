<?php
function theme_assets() {
	$root_css = get_template_directory_uri() . '/assets/css/';
	$root_js  = get_template_directory_uri() . '/assets/js/';
	wp_enqueue_style( 'montserrat-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap', [], null );
	wp_enqueue_style( 'playfair-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700&display=swap', [], null );
	wp_enqueue_style( 'great-vibes-fonts', 'https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap', [], null );
	wp_enqueue_style( 'tailwind-fonts', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200', [], null );

	wp_enqueue_style( 'tailwind-css', $root_css . 'tailwind.css' );

	wp_enqueue_style( 'main-css', $root_css . 'style.css' );
//  if (is_single()) {
//    wp_enqueue_style('article-css', $root_css . '_article.css');
//  }
	wp_enqueue_script( 'main-js', $root_js . 'app.js', array(), true, true );
}

add_action( 'wp_enqueue_scripts', 'theme_assets' );

add_theme_support( 'post-thumbnails', array( 'post', 'products' ) );

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
}

function add_file_types_to_uploads( $file_types ) {
	$new_filetypes        = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types           = array_merge( $file_types, $new_filetypes );

	return $file_types;
}

add_filter( 'upload_mimes', 'add_file_types_to_uploads' );

function add_custom_taxonomy() {
	$labels = array(
		'name' => 'Các loại sản phẩm',
		'singular' => 'Loại sản phẩm',
		'menu_name' => 'Loại sản phẩm'
	);


	/* Biến $args khai báo các tham số trong custom taxonomy cần tạo
	 */
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy('loai-san-pham', 'post', $args);


}


// Hook into the ‘init’ action
add_action( 'init', 'add_custom_taxonomy', 0 );

add_filter('wpcf7_autop_or_not', '__return_false');

/*Contact form 7 remove br*/
// Keep the .wpcf7-form-control-wrap spans: CF7's JS needs them to show per-field validation errors
add_filter('wpcf7_form_elements', function($content) {
    $content = str_replace('<br />', '', $content);

    return $content;
});