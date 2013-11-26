<?php
/**
 * Template Name: Contributors
 *
 * The template for displaying contributors.
 *
 * @package Comunidade_WordPress_BR
 * @since 1.0.0
 */

$contributors = cmm_wpbr_github_contributors();
get_header();
?>
<div id="primary" class="col-md-12">
	<div id="content" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> (<?php echo esc_attr( $contributors['total'] ); ?>)</a></h1>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<?php the_content(); ?>
					<div class="row">
						<?php foreach ( $contributors['contributors'] as $contributor ) : ?>
							<div class="col-md-4 contributor">
								<a href="<?php echo esc_url( $contributor['html_url'] ); ?>" class="btn btn-primary clearfix">
									<img src="<?php echo esc_url( $contributor['avatar_url'] ); ?>" alt="<?php echo esc_attr( $contributor['login'] ); ?>" class="pull-left" />
									<strong><?php echo esc_attr( $contributor['login'] ); ?></strong>
									<small><?php printf( __( '%d commits', 'comunidade-wordpress-br'), esc_attr( $contributor['contributions'] ) ); ?></small>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div><!-- .entry-content -->
			</article>
		<?php endwhile; ?>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>
