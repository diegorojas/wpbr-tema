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
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo __( 'Permalink to', 'comunidade-wordpress-br' ) . ' ' . get_the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		<div class="entry-meta">
			<span class="sep"><?php _e( 'By', 'comunidade-wordpress-br' ); ?> </span>
			<span class="author vcard">
				<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( __( 'All posts by', 'comunidade-wordpress-br' ) . ' ' . get_the_author() ); ?>" rel="author"><?php echo get_the_author(); ?></a>
			</span>
			<span class="sep"> | <?php _e( 'Posted in', 'comunidade-wordpress-br' ); ?> </span>
			<time class="entry-date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php // if ( has_post_thumbnail() ) the_post_thumbnail( 'thumbnail' ); ?>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'comunidade-wordpress-br' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'comunidade-wordpress-br' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<span><?php _e( 'Posted in', 'comunidade-wordpress-br' ); ?>: <?php the_category(', '); ?></span>
		<?php the_tags( '<span> ' . __( 'and tagged as', 'comunidade-wordpress-br' ) . ' ', ', ', '</span>' ); ?>
		<?php if ( comments_open() && ! post_password_required() ) : ?>
			<span class="sep"> | </span>
			<?php comments_popup_link( __( 'Comment', 'comunidade-wordpress-br' ), __( '1 Comment', 'comunidade-wordpress-br' ), __( '% Comments', 'comunidade-wordpress-br' ) ); ?>
		<?php endif; ?>
		<?php get_template_part( 'share' ); ?>
	</footer><!-- #entry-meta -->
</article>
