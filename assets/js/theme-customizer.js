/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here.
 */
( function( $ ) {
	
	console.log(cmm_wpbr_themecustomizer);

	// Update the site title in real time...
	wp.customize( 'color_scheme', function( value ) {
		
		value.bind( function( to ) {
			var scheme = cmm_wpbr_themecustomizer.schemes[to];
			$(
				"body," +
				"#top-navigation .navbar-top-navigation li li.active > a," +
				"#top-navigation .navbar-top-navigation li li > a:hover," +
				"#main-navigation .navbar-main-navigation li li.active > a," +
				"#main-navigation .navbar-main-navigation li li > a:hover"
			).css( 'background-color', scheme[0]);
			
			$(
				"#top-navigation," +
				"#footer"
			).css( 'background-color', scheme[1]);
			
			$(
				"#top-navigation .navbar-top-navigation li.active > a," +
				"#top-navigation .navbar-top-navigation li > a:hover"
			).css( 'background-color', scheme[2]);
			
			$("#main-navigation").css( 'background-color', scheme[3]);
			
			$(
				"#main-navigation .navbar-main-navigation li.active > a," +
				"#main-navigation .navbar-main-navigation li > a:hover"
			).css( 'background-color', scheme[4]);
		} );
	} );
	
} )( jQuery );
