<?php
// Static pages taken from hungcat-static: /products/00/, /news/ and /news/00/
function hc_static_pages_rewrite() {
	add_rewrite_rule( '^products/00/?$', 'index.php?hc_static_page=product-detail', 'top' );
	add_rewrite_rule( '^news/?$', 'index.php?hc_static_page=news', 'top' );
	add_rewrite_rule( '^news/00/?$', 'index.php?hc_static_page=news-detail', 'top' );
}

add_action( 'init', 'hc_static_pages_rewrite' );

function hc_static_pages_query_vars( $vars ) {
	$vars[] = 'hc_static_page';

	return $vars;
}

add_filter( 'query_vars', 'hc_static_pages_query_vars' );

function hc_static_pages_template( $template ) {
	if ( get_query_var( 'hc_static_page' ) === 'product-detail' ) {
		return get_template_directory() . '/product-detail.php';
	}

	if ( get_query_var( 'hc_static_page' ) === 'news' ) {
		return get_template_directory() . '/page-news.php';
	}

	if ( get_query_var( 'hc_static_page' ) === 'news-detail' ) {
		return get_template_directory() . '/news-detail.php';
	}

	return $template;
}

add_filter( 'template_include', 'hc_static_pages_template' );
