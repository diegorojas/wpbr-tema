<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Comunidade_WordPress_BR
 * @since 1.0.0
 */

get_header(); ?>
<div id="primary" class="col-md-12">
	<div id="content" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'comunidade-wordpress-br' ) . '</span>', 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
			</article>
			<?php
				if ( 'open' == $post->comment_status ) {
					comments_template( '', true );
				}
			?>
		<?php endwhile; ?>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>
