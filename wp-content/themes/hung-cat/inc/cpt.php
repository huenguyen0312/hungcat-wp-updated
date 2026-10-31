<?php
function create_post_type() {
	register_post_type(
		'products',
		array(
			'labels'             => array(
				'name'          => __( 'Sản phẩm' ),
				'singular_name' => __( 'products' )
			),
			'public'             => true,
			'publicly_queryable' => true,
			'has_archive'        => true,
			'rewrite'            => array( 'slug' => 'products', 'with_front' => false ),
			'show_in_rest'       => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'taxonomies'         => array( 'category', 'post_tag' ),
			'supports'           => array(
				'title',
				'editor',
				'excerpt',
				'author',
				'thumbnail',
				'revisions',
				'custom-fields',
			)
		)
	);
}

add_action( 'init', 'create_post_type' );