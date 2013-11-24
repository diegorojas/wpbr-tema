jQuery(document).ready(function($) {
	// fitVids.
	$( '.entry-content' ).fitVids();

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Comunidade WordPress-BR Core shortcodes
	 */

	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();

	// Map header
	var y_position = $(window).scrollTop();
	if ( $( '#wp-brasil-map' ) && 0 === y_position ) {
		$( 'body.home' ).parent( 'html' ).delay( 1000 ).animate({
			scrollTop: '360px'
		}, 1000 );
	}

});
