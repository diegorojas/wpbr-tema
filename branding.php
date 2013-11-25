<div id="branding">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <?php if ( is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a></h1>
                <?php else: ?>
                    <div class="site-title h1"><a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a></div>
                <?php endif ?>
                <div class="site-description"><?php echo cmm_wpbr_header_description() ?></div>
            </div>
            <div id="header-buttons" class="col-md-7">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <a href="http://br.wordpress.org/latest-pt_BR.zip" class="btn btn-primary clearfix">
                            <span class="glyphicon glyphicon-cloud-download"></span>
                            <span class="text"><?php _e( 'Last Version of<br />WordPress pt_BR', 'comunidade-wordpress-br' ) ?></span>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <a href="http://mapa.wp-brasil.org/" class="btn btn-primary clearfix">
                            <span class="glyphicon glyphicon-map-marker"></span>
                            <span class="text"><?php _e( 'WordPress map<br />in Brazil', 'comunidade-wordpress-br' ) ?></span>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <a href="http://br.forums.wordpress.org/" class="btn btn-primary clearfix">
                            <span class="glyphicon glyphicon-comment"></span>
                            <span class="text"><?php _e( 'WordPress.org<br />Brazilian Forum', 'comunidade-wordpress-br' ) ?></span>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <a href="http://codex.wordpress.org/pt-br:P%C3%A1gina_Inicial" class="btn btn-primary clearfix">
                            <span class="glyphicon glyphicon-book"></span>
                            <span class="text"><?php _e( 'Brazilian version<br />of the Codex', 'comunidade-wordpress-br' ) ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>