<?php
/**
 * Comunidade WordPress-BR optimize functions.
 */

/**
 * Generates the title of the site optimized for SEO.
 */
function cmm_wpbr_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() ) {
		return $title;
	}

	// Add the blog name.
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= ' ' . $sep . ' ' . $site_description;
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= ' ' . $sep . ' ' . sprintf( __( 'Page %s', 'comunidade-wordpress-br' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'cmm_wpbr_wp_title', 10, 2 );

/**
 * Cleanup wp_head().
 */
function cmm_wpbr_head_cleanup() {
	// Category feeds.
	// remove_action( 'wp_head', 'feed_links_extra', 3 );

	// Post and comment feeds.
	// remove_action( 'wp_head', 'feed_links', 2 );

	// EditURI link.
	remove_action( 'wp_head', 'rsd_link' );

	// Windows live writer.
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// Index link.
	remove_action( 'wp_head', 'index_rel_link' );

	// Previous link.
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

	// Start link.
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

	// Links for adjacent posts.
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
}

add_action( 'init', 'cmm_wpbr_head_cleanup' );

/**
 * Remove injected CSS for recent comments widget.
 */
function cmm_wpbr_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

add_filter( 'wp_head', 'cmm_wpbr_remove_wp_widget_recent_comments_style', 1);

/**
 * Remove injected CSS from recent comments widget.
 */
function cmm_wpbr_remove_recent_comments_style() {
	global $wp_widget_factory;

	if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
}

add_action( 'wp_head', 'cmm_wpbr_remove_recent_comments_style', 1 );

/**
 * Remove injected CSS from gallery.
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Add rel="nofollow" and remove rel="category".
 */
function cmm_wpbr_modify_category_rel( $text ) {
	$search = array( 'rel="category"', 'rel="category tag"' );
	$text = str_replace( $search, 'rel="nofollow"', $text );

	return $text;
}

add_filter( 'wp_list_categories', 'cmm_wpbr_modify_category_rel' );
add_filter( 'the_category', 'cmm_wpbr_modify_category_rel' );

/**
 * Add rel="nofollow" and remove rel="tag".
 */
function cmm_wpbr_modify_tag_rel( $taglink ) {
	return str_replace( 'rel="tag">', 'rel="nofollow">', $taglink );
}

add_filter( 'wp_tag_cloud', 'cmm_wpbr_modify_tag_rel' );
add_filter( 'the_tags', 'cmm_wpbr_modify_tag_rel' );

/**
 * Add feed link.
 */
add_theme_support( 'automatic-feed-links' );
