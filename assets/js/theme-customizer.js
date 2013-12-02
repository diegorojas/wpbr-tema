/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here.
 */
( function( $ ) {

	wp.customize( 'color_scheme', function( value ) {
		
		value.bind( function( to ) {
			var scheme = cmm_wpbr_themecustomizer.schemes[to];
			$(
				"body," +
				"#top-navigation .navbar-top-navigation li li.active > a," +
				"#top-navigation .navbar-top-navigation li li > a:hover," +
				"#main-navigation .navbar-main-navigation li li.active > a," +
				"#main-navigation .navbar-main-navigation li li > a:hover"
			).css( 'background-color', scheme[0] );
			
			$(
				"#top-navigation," +
				"#footer"
			).css( 'background-color', scheme[1] );
			
			$(
				"#top-navigation .navbar-top-navigation li.active > a," +
				"#top-navigation .navbar-top-navigation li > a:hover," + 
				"#top-navigation .navbar-top-navigation .open > a"
			).css( 'background-color', scheme[2] );
			
			$("#main-navigation").css( 'background-color', scheme[3] );
			
			$(
				"#main-navigation .navbar-main-navigation li.active > a," +
				"#main-navigation .navbar-main-navigation li > a:hover," + 
				"#main-navigation .navbar-main-navigation .open > a"
			).css( 'background-color', scheme[4] );
		} );
		
	} );
	
	wp.customize( 'title_color', function( value ) {
		
		value.bind( function( to ) {
			$( ".entry-title a" ).css( 'color', to );
		} );
		
	} );
	
	wp.customize( 'text_color', function( value ) {
		
		value.bind( function( to ) {
			$( ".entry-content" ).css( 'color', to );
		} );
		
	} );
	
	wp.customize( 'link_color', function( value ) {
		
		value.bind( function( to ) {
			$( ".entry-content a" ).css( 'color', to );
		} );
		
	} );
	
} )( jQuery );
