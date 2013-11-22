<?php
/**
 * Comunidade WordPress-BR functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Comunidade_WordPress_BR
 * @since 1.0.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
// require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
// require_once get_template_directory() . '/core/classes/class-post-type.php';
// require_once get_template_directory() . '/core/classes/class-taxonomy.php';
// require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';

/**
 * Setup theme features
 */
function cmm_wpbr_setup_features() {

	/**
	 * Add support for multiple languages.
	 */
	load_theme_textdomain( 'comunidade-wordpress-br', get_template_directory() . '/languages' );

	/**
	 * Register nav menus.
	 */
	register_nav_menus(
		array(
			'top-menu' => __( 'Top Menu', 'comunidade-wordpress-br' ),
			'main-menu' => __( 'Main Menu', 'comunidade-wordpress-br' )
		)
	);

	/*
	 * Add post_thumbnails suport.
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Support Custom Editor Style.
	 */
	add_editor_style( 'assets/css/editor-style.css' );

	/**
	 * Add support for Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat'
	) );
}

add_action( 'after_setup_theme', 'cmm_wpbr_setup_features' );

/**
 * Register sidebars.
 */
function cmm_wpbr_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'comunidade-wordpress-br' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'comunidade-wordpress-br' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'cmm_wpbr_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 */
function cmm_wpbr_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'cmm_wpbr_flush_rewrite' );

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * Load site scripts.
 */
function cmm_wpbr_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Comunidade WordPress-BR main stylesheet.
	wp_enqueue_style( 'cmm-wp-br-style', get_stylesheet_uri(), array(), null, 'all' );
	wp_enqueue_style( 'source-sans-pro', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700italic,700,600italic,600,400italic', array(), null, 'all' );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// Twitter Bootstrap.
	wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/bootstrap.min.js', array(), null, true );

	// Main jQuery.
	wp_enqueue_script( 'cmm-wp-br-main-min', $template_url . '/assets/js/main.min.js', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'cmm_wpbr_enqueue_scripts', 1 );

/**
 * Comunidade WordPress-BR custom stylesheet URI.
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function cmm_wpbr_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}

add_filter( 'stylesheet_uri', 'cmm_wpbr_stylesheet_uri', 10, 2 );

/**
 * Content thumbnail.
 *
 * @return string
 */
function cmm_wpbr_content_thumbnail() {
	if ( ! class_exists( 'Odin_Thumbnail_Resizer' ) ) {
		return;
	}

	$thumb  = get_post_thumbnail_id();
	$width  = 780;
	$height = 315;

	if ( $thumb ) {
		$resizer = Odin_Thumbnail_Resizer::get_instance();
		$url     = wp_get_attachment_url( $thumb, 'full' );
		$image   = $resizer->process( $url, $width, $height, true, true );
		$html    = '<img class="wp-image-thumb img-responsive" src="' . esc_url( $image ) . '" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '" alt="' . esc_attr( get_the_title() ) . '" />';

		return apply_filters( 'cmm_wpbr_thumbnail_html', $html );
	} else {
		$html = '<img src="' . get_template_directory_uri() . '/assets/images/featured-image-default.png" alt="' . esc_attr( get_the_title() ) . '" />';

		return $html;
	}
}

function get_map_url() {
    if ( !$details = get_blog_details( 'mapa' ) )
        return false;
    return $details->siteurl;
}
