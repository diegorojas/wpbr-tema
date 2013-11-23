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
</div><!-- .container -->
<footer id="footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-md-8 footer-area">
				<div class="row">
					<div class="col-sm-6">
						<p class="text-left"><?php echo sprintf( __( 'Powered by %s', 'comunidade-wordpress-br' ), '<a href="http://wordpress.org/" rel="nofollow" itemprop="copyrightHolder" target="_blank">' . __( 'WordPress', 'comunidade-wordpress-br' ) . '</a>' ); ?></p>

					</div><!-- .col-sm-6 -->
					<div class="col-sm-6">
						<p class="text-right"><?php _e( 'Some rights reserved', 'comunidade-wordpress-br' ); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-cc.png" alt="<?php _e( 'Some rights reserved', 'comunidade-wordpress-br' ); ?>"></p>
					</div><!-- . col-sm-6 -->
				</div>
			</div><!-- .footer-area -->
			<div class="col-md-4 hidden-xs logo-area">
				<img class="logo-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-footer.png" alt="<?php bloginfo('name' ); ?>">
				<div class="logo-title">
					<span>
						<?php _e( 'Community', 'comunidade-wordpress-br' ); ?>
					</span>
					<?php _e( 'WordPress-BR', 'comunidade-wordpress-br' ); ?>
				</div>
			</div><!-- .logo-area -->
		</div><!-- .row -->
	</div><!-- .container -->
</footer><!-- #footer -->
<?php wp_footer(); ?>
</body>
</html>
