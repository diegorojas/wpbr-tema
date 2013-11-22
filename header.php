<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Comunidade_WordPress_BR
 * @since 1.0.0
 */
?><!DOCTYPE html>
<!--[if IE 7]><html class="no-js ie7 lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js ie8 lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.min.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope="" itemtype="http://schema.org/WebPage">
	<header id="header" role="banner">
		<nav id="top-navigation" class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
				<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'comunidade-wordpress-br' ); ?>"><?php _e( 'Skip to content', 'comunidade-wordpress-br' ); ?></a>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-top-navigation">
					<span class="sr-only"><?php _e( 'Toggle navigation', 'comunidade-wordpress-br' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse navbar-top-navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'top-menu',
								'depth'          => 2,
								'container'      => false,
								'menu_class'     => 'nav navbar-nav',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);
					?>
					<div id="top-navigation-icon" class="navbar-text navbar-right hidden-xs"></div>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav><!-- #top-navigation -->

        <?php if ( $mapurl = get_map_url() ) : ?>
		    <div id="wp-brasil-map">
			    <iframe src="<?php echo $mapurl; ?>/?embed" frameborder="0"></iframe>
		    </div>
        <?php endif; ?>

		<nav id="main-navigation" class="navbar navbar-inverse navbar-static-main" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-navigation">
					<span class="sr-only"><?php _e( 'Toggle navigation', 'comunidade-wordpress-br' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse navbar-main-navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'depth'          => 2,
								'container'      => false,
								'menu_class'     => 'nav navbar-nav',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);
					?>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav><!-- #main-navigation -->

		<div class="container">
			<?php if ( is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php else: ?>
				<div class="site-title h1"><a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
				<div class="site-description h2"><?php bloginfo( 'description' ); ?></div>
			<?php endif ?>
		</div>

	</header><!-- #header -->

	<div class="container">
		<div id="main" class="row">
