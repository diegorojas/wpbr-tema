<?php
/**
 * Theme Options.
 *
 * @return void
 */
function cmm_wpbr_theme_options() {

	$settings = new Odin_Theme_Options(
		'cmm-wpbr-options',
		__( 'Site options', 'comunidade-wordpress-br' ),
		'manage_options'
	);

	$settings->set_tabs(
		array(
			array(
				'id' => 'cmm_wpbr_homepage',
				'title' => __( 'Homepage', 'comunidade-wordpress-br' )
			)
		)
	);

	$settings->set_fields(
		array(
			'cmm_wpbr_homepage_header_section' => array(
				'tab'   => 'cmm_wpbr_homepage',
				'title' => __( 'Header', 'comunidade-wordpress-br' ),
				'fields' => array(
					array(
						'id'    => 'welcome_text',
						'label' => __( 'Welcome message', 'odin' ),
						'type'  => 'editor',
					),
				)
			)
		)
	);
}

add_action( 'init', 'cmm_wpbr_theme_options', 1 );

/**
 * Valid theme options data.
 */
function cmm_wpbr_theme_options_validate( $value, $id ) {

	switch ( $id ) {
		case 'welcome_text':
			return wp_kses_post( $value );
			break;

		default:
			return sanitize_text_field( $value );
			break;
	}

	return $value;
}

add_filter( 'odin_theme_options_validate_cmm-wpbr-options', 'cmm_wpbr_theme_options_validate', 1, 2 );
