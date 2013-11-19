<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package Comunidade_WordPress_BR
 * @since 1.0.0
 */
?>
<div class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'comunidade-wordpress-br' ); ?></h1>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<p><?php _e( 'No results were found for the requested archive. Maybe a search can help you to find any related post.', 'comunidade-wordpress-br' ); ?></p>
		<?php get_search_form(); ?>
	</div><!-- .entry-content -->
</div><!-- .no-results -->
