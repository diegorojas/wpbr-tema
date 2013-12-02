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
	$wp_customize->add_setting( 'color_scheme', array(
		'default' => 'Default',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	) );
	$wp_customize->add_control( new Cmm_Wpbr_Color_Palette_Control( $wp_customize, 'color_scheme', array(
		'label' => __( 'Color Scheme', 'comunidade-wordpress-br' ),
		'section' => 'colors',
		'settings' => 'color_scheme',
	) ) );

	$wp_customize->add_setting( 'title_color', array(
		'default' => '#2E6EA4',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_color', array(
		'label' => __( 'Title Color', 'comunidade-wordpress-br' ),
		'section' => 'colors',
		'settings' => 'title_color',
	) ) );

	$wp_customize->add_setting( 'text_color', array(
		'default' => '#000',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
		'label' => __( 'Text Color', 'comunidade-wordpress-br' ),
		'section' => 'colors',
		'settings' => 'text_color',
	) ) );

	$wp_customize->add_setting( 'link_color', array(
		'default' => '#2E6EA4',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label' => __( 'Link Color', 'comunidade-wordpress-br' ),
		'section' => 'colors',
		'settings' => 'link_color',
	) ) );
}
add_action( 'customize_register', 'cmm_wpbr_customize_register' );

/**
 * Add the customize CSS
 */
function cmm_wpbr_customize_css() {
	?>
         <style type="text/css">
    		<?php 
    			if( get_theme_mod( 'color_scheme' ) != 'Default' ) : 
    				$colors = cmm_wpbr_get_color_scheme( get_theme_mod( 'color_scheme' ) );
    		?>
            body,
			#top-navigation .navbar-top-navigation li li.active > a,
			#top-navigation .navbar-top-navigation li li > a:hover,
			#main-navigation .navbar-main-navigation li li.active > a,
			#main-navigation .navbar-main-navigation li li > a:hover { 
				background-color: <?php echo $colors[0] ?>;
			}
			
			#top-navigation,
			#footer { 
				background-color: <?php echo $colors[1] ?>;
			}
			
			#top-navigation .navbar-top-navigation li.active > a,
			#top-navigation .navbar-top-navigation li > a:hover,
			#top-navigation .navbar-top-navigation .open > a {
				background-color: <?php echo $colors[2] ?>;
			}
			
			#main-navigation {
				background-color: <?php echo $colors[3] ?>;
			}
			
			#main-navigation .navbar-main-navigation li.active > a,
			#main-navigation .navbar-main-navigation li > a:hover,
			#main-navigation .navbar-main-navigation .open > a  {
				background-color: <?php echo $colors[4] ?>;
			}
            <?php endif; ?>
            
    		<?php if( get_theme_mod( 'title_color' ) ) : ?>
    		.entry-title a {
    			color: <?php echo get_theme_mod( 'title_color' ) ?>
    		}
    		<?php endif; ?>
            
    		<?php if( get_theme_mod( 'text_color' ) ) : ?>
    		.entry-content {
    			color: <?php echo get_theme_mod( 'text_color' ) ?>
    		}
    		<?php endif; ?>
            
    		<?php if( get_theme_mod( 'link_color' ) ) : ?>
    		.entry-content a {
    			color: <?php echo get_theme_mod( 'link_color' ) ?>
    		}
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
	
	wp_localize_script( 
		'cmm_wpbr-themecustomizer', 
		'cmm_wpbr_themecustomizer',
		array( 
			'schemes' => cmm_wpbr_color_schemes()
		) 
	);
}
add_action( 'customize_preview_init', 'cmm_wpbr_customizer_live_preview' );

if( class_exists( 'WP_Customize_Control' ) ) :

/**
 * 
 */
class Cmm_Wpbr_Color_Palette_Control extends WP_Customize_Control {

	function __construct( $manager, $id, $args = array() ) {
		$this->type = 'radio';
		$this->choices = cmm_wpbr_color_schemes();
		parent::__construct( $manager, $id, $args );
	}
	
	function enqueue() {
		wp_enqueue_style( 
			'color-palette-control',
			get_template_directory_uri() . '/assets/css/customize.css'
		);
	}
	
	function render_content() {
		if ( empty( $this->choices ) )
			return;
		
		$name = '_customize-radio-' . $this->id;
		
		?>
		<div class="customize-color-palette">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php
				foreach( $this->choices as $value => $colors ) :
				?>
				<label>
					<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>"
							<?php $this->link(); checked( $this->value(), $value ); ?> />
						
						<div class="palette">
							<?php foreach( $colors as $color ) : ?>
							<div class="color" style="background: <?php echo $color ?>"></div>
							<?php endforeach; ?>
						</div>
				</label>
				<?php
				endforeach;
			?>
		</div>
		<?php
	}
}

endif;
