<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bosa Shopfront 1.0.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>

    <style>
    .d-none.d-lg-flex {
        justify-content: space-between;
        align-items: center;
    }
	.site-logo {
		max-width: 80px;
	}
	.site-header.sticky-header .fixed-header {
		height: 90px;
	}
	.mobile-menu-container {
		display: none;
	}
	/* For product page  */
	div.fpf-fields-config-wrapper {
		display:none!important;
	}
	/* for color swatches */
	div.fpf-fields {
		width: 100%;
	}
	@media screen and (max-width: 992px) {
		.mobile-menu-container {
			width: 100%;
			display: flex;
			flex-direction: row-reverse;
			justify-content: space-around;
			align-items: center;
			padding: 10px 0px 10px 0px;
		}
		.mobile-menu-container .site-logo {
			max-width: 60px;
		}
		.slicknav_btn {
			position: relative;
		}
		.slicknav_nav {
			position: absolute;
			z-index: 99999;
		}
	}
    </style>
</head>

<body <?php body_class(); ?>>
    <?php do_action( 'wp_body_open' ); ?>

    <?php if( !get_theme_mod( 'disable_preloader', false )): ?>
    <div id="site-preloader">
        <div class="preloader-content">
            <?php
				$src = '';
				if( get_theme_mod( 'preloader_animation', 'animation_one' ) == 'animation_one' ){
					$src = get_template_directory_uri() . '/assets/images/preloader1.gif';
				}elseif( get_theme_mod( 'preloader_animation', 'animation_one' ) == 'animation_two' ){
					$src = get_template_directory_uri() . '/assets/images/preloader2.gif';
				}elseif( get_theme_mod( 'preloader_animation', 'animation_one' ) == 'animation_three' ){
					$src = get_template_directory_uri() . '/assets/images/preloader3.gif';
				}elseif( get_theme_mod( 'preloader_animation', 'animation_one' ) == 'animation_four' ){
					$src = get_template_directory_uri() . '/assets/images/preloader4.gif';
				}elseif( get_theme_mod( 'preloader_animation', 'animation_one' ) == 'animation_five' ){
					$src = get_template_directory_uri() . '/assets/images/preloader5.gif';
				}

				echo apply_filters( 'bosa_preloader',
				sprintf( '<img src="%s" alt="%s">',
					$src, ''
				)); 
			?>
        </div>
    </div>
    <?php endif; ?>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#content"><?php esc_html_e( 'Skip to content', 'bosa-shopfront' ); ?></a>

        <?php 
	
	// if( get_theme_mod( 'header_layout', 'header_four' ) == '' || get_theme_mod( 'header_layout', 'header_four' ) == 'header_one' ){
	// 	get_template_part( 'template-parts/header/header', 'one' );
	// }elseif( get_theme_mod( 'header_layout', 'header_four' ) == 'header_two' ){
	// 	get_template_part( 'template-parts/header/header', 'two' );
	// }elseif( get_theme_mod( 'header_layout', 'header_four' ) == 'header_three' ) {
	// 	get_template_part( 'template-parts/header/header', 'three' );
	// }elseif( get_theme_mod( 'header_layout', 'header_four' ) == 'header_four' ) {
	// 	get_template_part( 'template-parts/header/header', 'four' );
	// } 
	
	?>


<header id="masthead" class="site-header header-four">
<div class="fixed-header header-image-wrap">
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

                </div><!-- .site-branding -->
            </div>
            <!-- myaccount link -->
            <div class="">
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

	<div class="mobile-menu-container">
            <!-- myaccount link -->
            <div class="">
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
			 <!-- Logo -->
			 <div>
                <div class="site-branding">

                    <?php if ( has_custom_logo() && ! $show_title ) : ?>
                    <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>

                 </div> <!-- .site-branding  -->
            </div>
	</div>
</div>
<?php get_template_part('template-parts/offcanvas', 'menu'); ?>
</header>