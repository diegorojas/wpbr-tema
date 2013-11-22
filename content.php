<?php
/**
 * The default template for displaying content. Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Comunidade_WordPress_BR
 * @since 1.0.0
 */
?>
<article <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-featured<?php echo ( get_post_thumbnail_id() ) ? ' with-featured-image' : ' without-featured-image'; ?>">
			<?php echo cmm_wpbr_content_thumbnail(); ?>
			<div class="entry-meta text-right">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 45 ); ?>
				<span class="author">
					<span class="sep"><?php _e( 'By', 'comunidade-wordpress-br' ); ?> </span>
					<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( __( 'All posts by', 'comunidade-wordpress-br' ) . ' ' . get_the_author() ); ?>" rel="author"><?php echo get_the_author(); ?></a>
				</span>
			</div><!-- .entry-meta -->
		</div>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo __( 'Permalink to', 'comunidade-wordpress-br' ) . ' ' . get_the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php // if ( has_post_thumbnail() ) the_post_thumbnail( 'thumbnail' ); ?>
		<?php the_content( '' ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'comunidade-wordpress-br' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer-meta clearfix">
		<span><?php _e( 'In', 'comunidade-wordpress-br' ); ?> <?php the_category(', '); ?></span>
		<span class="sep"><?php _e( 'in', 'comunidade-wordpress-br' ); ?> </span>
		<time class="entry-date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time>
		<a href="<?php the_permalink(); ?>" title="<?php echo sprintf( __( 'Read more %s', 'comunidade-wordpress-br' ), get_the_title() ); ?>" class="read-more-btn btn btn-primary btn-lg pull-right"><?php _e( 'Read more &raquo;', 'comunidade-wordpress-br' ); ?></a>
	</footer><!-- #entry-meta -->
</article>
