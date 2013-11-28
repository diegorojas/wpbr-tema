<?php

/**
 * WP Theme Customization API integration
 * https://codex.wordpress.org/Theme_Customization_API
 */

/**
 * Register customize options
 * 
 * @param WP_Customize_Manager $wp_customize
 */
function cmm_wpbr_customize_register( $wp_customize ) {
	// colors
	$wp_customize->add_setting( 'top_navigation_color', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
		'transport' => 'postMessage'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_navigation_color', array(
		'label' => __( 'Top Navigation Color', 'comunidade-wordpress-br' ),
		'section' => 'colors',
		'settings' => 'top_navigation_color',
	) ) );
}
add_action( 'customize_register', 'cmm_wpbr_customize_register' );

/**
 * Add the customize CSS
 */
function cmm_wpbr_customize_css() {
	?>
         <style type="text/css">
    		<?php if( get_theme_mod( 'top_navigation_color' ) ) : ?>
            #top-navigation { background-color: <?php echo get_theme_mod( 'top_navigation_color' ); ?>; }
            <?php endif; ?>
         </style>
    <?php
}
add_action( 'wp_head', 'cmm_wpbr_customize_css');

/**
 * Add the live preview javascript
 */
function cmm_wpbr_customizer_live_preview() {
	wp_enqueue_script(
		'cmm_wpbr-themecustomizer',
		get_template_directory_uri().'/assets/js/theme-customizer.js',
		array( 'jquery','customize-preview' ),
		'',
		true
	);
}
add_action( 'customize_preview_init', 'cmm_wpbr_customizer_live_preview' );
