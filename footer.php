<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Comunidade_WordPress_BR
 * @since 1.0.0
 */
?>
	</div><!-- #main -->
	<footer id="footer" role="contentinfo">
		<span>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'comunidade-wordpress-br' ); ?> | <?php echo sprintf( __( 'Powered by %s', 'comunidade-wordpress-br' ), '<a href="http://wordpress.org/" rel="nofollow" itemprop="copyrightHolder" target="_blank">' . __( 'WordPress', 'comunidade-wordpress-br' ) . '</a>' ); ?></span>
	</footer><!-- #footer -->
</div><!-- .container -->
<?php wp_footer(); ?>
</body>
</html>
