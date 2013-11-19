<?php
/**
 * The template for displaying Category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Comunidade_WordPress_BR
 * @since 1.0.0
 */

get_header(); ?>
<div id="primary" class="col-md-8">
	<section id="content" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title" itemprop="name headline"><?php echo __( 'Category Archives:', 'comunidade-wordpress-br' ) . ' <span>' . single_cat_title( '', false ) . '</span>'; ?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) ) {
						echo '<div class="category-archive-meta" itemprop="description">' . $category_description . '</div>';
					}
				?>
			</header>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			<?php echo cmm_wpbr_pagination(); ?>
		<?php else : ?>
			<?php get_template_part( 'no-results' ); ?>
		<?php endif; ?>
	</section><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
