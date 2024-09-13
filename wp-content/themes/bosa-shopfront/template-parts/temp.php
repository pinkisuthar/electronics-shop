<div class="fixed-header">
    <div class="container">
        <!-- Menu -->
        <div class="d-none d-lg-flex">
            <div class="main-navigation-wrap">
                <nav id="site-navigation" class="main-navigation d-none d-lg-block">
                    <button class="menu-toggle" aria-controls="primary-menu"
                        aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'bosa' ); ?></button>
                    <?php if ( has_nav_menu( 'menu-1' ) ) :
								wp_nav_menu( 
									array(
										'container'      => '',
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
										'menu_class'     => 'menu nav-menu',
									)
								);
							?>
                    <?php else :
								wp_page_menu(
									array(
										'menu_class' => 'menu-wrap',
					                    'before'     => '<ul id="primary-menu" class="menu nav-menu">',
					                    'after'      => '</ul>',
									)
								);
							?>
                    <?php endif; ?>
                </nav><!-- #site-navigation -->
                <?php 
						if ( !get_theme_mod( 'disable_header_button', false ) ){
							if( $has_header_btn ){ ?>
                <div class="header-btn d-none d-lg-block">
                    <?php 
										$i = 1;
						            	foreach( $header_buttons as $value ){
						            		if( !empty( $value['header_btn_text'] ) ){
						            			$link_target = '';
												if( $value['header_btn_target'] ){
													$link_target = '_blank';
												}else {
													$link_target = '';
												} ?>

                    <a href="<?php echo esc_url( $value['header_btn_link'] ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"
                        class="header-btn-<?php echo $i.' '.esc_attr( $value['header_btn_type'] ); ?>">
                        <?php echo esc_html( $value['header_btn_text'] ); ?>
                    </a>

                    <?php
						            		}
						            		$i++;
						            	}
						            ?>
                </div>
                <?php }
						} ?>
            </div>
            <!-- Logo -->
            <div>
                <div class="site-branding">

                    <?php if ( has_custom_logo() && ! $show_title ) : ?>
                    <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>

                    <?php if ( $blog_info ) : ?>
                    <?php if ( is_front_page() && ! is_paged() ) : ?>
                    <h1 class="<?php echo esc_attr( $header_class ); ?>"><?php echo esc_html( $blog_info ); ?>
                    </h1>
                    <?php elseif ( is_front_page() && ! is_home() ) : ?>
                    <h1 class="<?php echo esc_attr( $header_class ); ?>"><a
                            href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a>
                    </h1>
                    <?php else : ?>
                    <p class="<?php echo esc_attr( $header_class ); ?>"><a
                            href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a>
                    </p>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if ( $description && true === get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
                    <p class="site-description">
                        <?php echo $description; // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    </p>
                    <?php endif; ?>
                </div><!-- .site-branding -->
            </div>
            <!-- myaccount link -->
            <div class="col-6 col-md-3">
                <?php if (class_exists('WooCommerce')) { ?>
                <div class="header-right">
                    <?php
							if (!get_theme_mod('disable_woocommerce_compare', false)) {
								bosa_shopfront_head_compare();
							}
							if (!get_theme_mod('disable_woocommerce_wishlist', false)) {
								bosa_shopfront_head_wishlist();
							}
							if (!get_theme_mod('disable_woocommerce_account', false)) {
								bosa_shopfront_my_account();
							}
							if (!get_theme_mod('disable_woocommerce_cart', false)) {
								bosa_shopfront_header_cart();
							}
							?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>