<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Comunidade_WordPress_BR
 * @since 1.0.0
 */

get_header(); ?>
<div id="primary" class="col-md-8">
	<div id="content" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?> itemscope="" itemtype="http://schema.org/Article">
				<header class="entry-header">
					<h1 class="entry-title" itemprop="name headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				</header><!-- .entry-header -->
				<div class="entry-content" itemprop="articleBody">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'comunidade-wordpress-br' ) . '</span>', 'after' => '</div>' ) ); ?>
					<?php echo cmm_wpbr_related_posts( 'category', 5, '', false ); ?>
				</div><!-- .entry-content -->
				<footer class="entry-footer-meta clearfix">
					<span><?php _e( 'In', 'comunidade-wordpress-br' ); ?> <?php the_category(', '); ?></span>
					<span class="sep"><?php _e( 'in', 'comunidade-wordpress-br' ); ?> </span>
					<time class="entry-date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time>
				</footer><!-- #entry-meta -->
			</article>
			<?php comments_template( '', true ); ?>
		<?php endwhile; ?>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
