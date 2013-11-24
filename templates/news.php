<div id="archive-categories">
	<div class="container">
		<div class="row">
			<div id="archive-categories-menu" class="col-md-6">
				<h3><?php _e( 'WordPress News', 'comunidade-wordpress-br' ); ?></h3>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'category-menu',
								'depth'          => 1,
								'container'      => false
							)
						);
					?>
			</div>
			<div id="archive-categories-register" class="col-md-6">
				<p>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo admin_url( 'post-new.php' ); ?>"><?php _e( 'Publish here too!', 'comunidade-wordpress-br' ); ?></a>
				<?php else : ?>
					<?php _e( 'Publish here too!', 'comunidade-wordpress-br' ); ?> <a href="<?php echo home_url( 'wp-signup.php' ); ?>"><?php _e( 'Sign up!', 'comunidade-wordpress-br' ); ?></a>
				<?php endif; ?>
				</p>
			</div>
		</div>
	</div>
</div>
