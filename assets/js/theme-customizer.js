/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here.
 */
( function( $ ) {

	// Update the site title in real time...
	wp.customize( 'top_navigation_color', function( value ) {
		value.bind( function( to ) {
			$( '#top-navigation' ).css( 'background-color', to );
		} );
	} );
	
} )( jQuery );
