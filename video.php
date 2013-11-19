<?php
/**
 * The template for displaying video attachments.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Comunidade_WordPress_BR
 * @since 1.0.0
 */

get_header(); ?>
<div id="primary" class="col-md-12">
	<div id="content" role="main" itemscope itemtype="http://schema.org/VideoObject">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?> itemscope itemtype="http://schema.org/AudioObject">
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<div class="entry-attachment">
						<?php echo wp_video_shortcode( array( 'src' => wp_get_attachment_url() ) ); ?>

						<p><strong><?php _e( 'URL:', 'comunidade-wordpress-br' ); ?></strong> <a href="<?php echo wp_get_attachment_url(); ?>" title="<?php the_title_attribute(); ?>" rel="attachment" itemprop="contentURL"><span itemprop="name"><?php echo basename( wp_get_attachment_url() ); ?></span></a></p>

						<div itemprop="description">
							<?php the_content(); ?>
						</div>
					</div><!-- .entry-attachment -->

					<?php if ( ! empty( $post->post_parent ) ) : ?>
						<ul class="pager page-title" itemprop="associatedMedia">
							<li class="previous"><a href="<?php echo get_permalink( $post->post_parent ); ?>" title="<?php echo esc_attr( sprintf( __( 'Back to %s', 'comunidade-wordpress-br' ), strip_tags( get_the_title( $post->post_parent ) ) ) ); ?>"><?php printf( __( '<span class="meta-nav">&larr;</span> %s', 'comunidade-wordpress-br' ), get_the_title( $post->post_parent ) ); ?></a></li>
						</ul><!-- .pager -->
					<?php endif; ?>
				</div><!-- .entry-content -->
			</article>
		<?php endwhile; ?>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>
