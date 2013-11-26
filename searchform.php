<?php
/**
 * The template for displaying Search Form.
 *
 * @package Comunidade_WordPress_BR
 * @since 1.0.0
 */
?>
<form method="get" id="searchform" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="form-group">
		<label for="s" class="sr-only"><?php _e( 'Search', 'comunidade-wordpress-br' ); ?></label>
		<input type="text" class="form-control" name="s" id="s" placeholder="<?php _e( 'Search', 'comunidade-wordpress-br' ); ?>" />
	</div>
	<button type="submit" class="btn btn-primary searchsubmit">
		<i class="glyphicon glyphicon-search"></i>
	</button>
</form>