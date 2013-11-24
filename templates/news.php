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
				<p><?php echo sprintf( __( 'Publish here too! %s', 'comunidade-wordpress-br' ), '<a href="">' . __( 'Sign up!', 'comunidade-wordpress-br' ) . '</a>' ); ?></p>
			</div>
		</div>
	</div>
</div>
