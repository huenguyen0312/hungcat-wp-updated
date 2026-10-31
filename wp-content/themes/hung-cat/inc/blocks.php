<?php
add_action( 'acf/init', 'bons_acf_init' );
function bons_acf_init() {
	if ( function_exists( 'acf_register_block' ) ) {
		acf_register_block( array(
			'name'            => 'price-table',
			'title'           => __( 'Price Table' ),
			'description'     => __( 'Price Table' ),
			'render_callback' => 'flexible_content_blocks_render_callback',
			'category'        => 'formatting',
			'mode'            => 'edit',
			'supports'        => array( 'mode' => false, 'align' => false ),
			'keywords'        => array( 'price-table' ),
		) );
		acf_register_block( array(
			'name'            => 'note',
			'title'           => __( 'Note' ),
			'description'     => __( 'Note' ),
			'render_callback' => 'flexible_content_blocks_render_callback',
			'category'        => 'formatting',
			'mode'            => 'edit',
			'supports'        => array( 'mode' => false, 'align' => false ),
			'keywords'        => array( 'note' ),
		) );
	}
}

function flexible_content_blocks_render_callback( $block ) {

	$slug = str_replace( 'acf/', '', $block['name'] );
	if ( file_exists( get_theme_file_path( "/blocks/{$slug}.php" ) ) ) {
		include( get_theme_file_path( "/blocks/{$slug}.php" ) );
	}
}