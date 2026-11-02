<?php
// Static pages taken from hungcat-static: /products/00/, /news/ and /news/00/
function hc_static_pages_rewrite() {
	add_rewrite_rule( '^products/00/?$', 'index.php?hc_static_page=product-detail', 'top' );
	add_rewrite_rule( '^news/?$', 'index.php?hc_static_page=news', 'top' );
	add_rewrite_rule( '^news/00/?$', 'index.php?hc_static_page=news-detail', 'top' );
	// Own page var: WP's "paged" would make the main query 404 past its own last page
	add_rewrite_rule( '^news/page/([0-9]+)/?$', 'index.php?hc_static_page=news&hc_page=$matches[1]', 'top' );

	// Bump when the rules above change, so a deploy picks them up without re-saving Permalinks
	if ( get_option( 'hc_rewrite_version' ) !== '2' ) {
		flush_rewrite_rules( false );
		update_option( 'hc_rewrite_version', '2' );
	}
}

add_action( 'init', 'hc_static_pages_rewrite' );

function hc_static_pages_query_vars( $vars ) {
	$vars[] = 'hc_static_page';
	$vars[] = 'hc_page';

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
