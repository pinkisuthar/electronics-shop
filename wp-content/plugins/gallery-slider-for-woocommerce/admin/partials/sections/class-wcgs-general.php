<?php
/**
 * The general tab functionality of this plugin.
 *
 * Defines the sections of general tab.
 *
 * @package    Woo_Gallery_Slider
 * @subpackage Woo_Gallery_Slider/admin
 * @author     Shapedplugin <support@shapedplugin.com>
 */

/**
 * WCGS General class
 */
class WCGS_General {
	/**
	 * Specify the Generation tab for the WooGallery.
	 *
	 * @since    1.0.0
	 * @param string $prefix Define prefix wcgs_settings.
	 */
	public static function section( $prefix ) {
		WCGS::createSection(
			$prefix,
			array(
				'name'   => 'general',
				'title'  => __( 'General', 'gallery-slider-for-woocommerce' ),
				'icon'   => 'sp_wgs-icon-general-tab',
				'fields' => array(
					array(
						'id'      => 'gallery_layout',
						'type'    => 'image_select',
						'class'   => 'gallery_layout',
						'title'   => __( 'Gallery Layout', 'gallery-slider-for-woocommerce' ),
						'desc'    => sprintf(
							/* translators: 1: start strong tag, 2: close strong tag, 3: start link and strong tag, 4: close link and strong tag. */
							__( 'Want to %1$s boost your sales %2$s   by enhancing your product page layout and design? %3$sUpgrade To Pro!%4$s', 'gallery-slider-for-woocommerce' ),
							'<strong>',
							'</strong>',
							'<a href="' . WOO_GALLERY_SLIDER_PRO_LINK . '" target="_blank"><strong>',
							'</strong></a>',
						),
						'options' => array(
							'horizontal'        => array(
								'image'           => plugin_dir_url( __DIR__ ) . '../img/layout/horizontal_bottom.svg',
								'option_name'     => __( 'Thumbs Bottom', 'gallery-slider-for-woocommerce' ),
								'option_demo_url' => 'https://demo.woogallery.io/thumbnails-bottom/product/air-max-plus/',
							),
							'horizontal_top'    => array(
								'image'           => plugin_dir_url( __DIR__ ) . '../img/layout/horizontal_top.svg',
								'option_name'     => __( 'Thumbs Top', 'gallery-slider-for-woocommerce' ),
								'option_demo_url' => 'https://demo.woogallery.io/thumbnails-top/product/elemental-backpack/',
							),
							'vertical'          => array(
								'image'           => plugin_dir_url( __DIR__ ) . '../img/layout/vertical_left.svg',
								'option_name'     => __( 'Thumbs Left', 'gallery-slider-for-woocommerce' ),
								'option_demo_url' => 'https://demo.woogallery.io/thumbnails-left/product/featherlight-cap/',
								'pro_only'        => true,
							),
							'grid'              => array(
								'image'           => plugin_dir_url( __DIR__ ) . '../img/layout/grid.svg',
								'option_name'     => __( 'Grid', 'gallery-slider-for-woocommerce' ),
								'option_demo_url' => 'https://demo.woogallery.io/grid/product/sports-wear/',
								'pro_only'        => true,
							),
							'modern'            => array(
								'image'           => plugin_dir_url( __DIR__ ) . '../img/layout/modern.svg',
								'option_name'     => __( 'Hierarchy Grid', 'gallery-slider-for-woocommerce' ),
								'option_demo_url' => 'https://demo.woogallery.io/hierarchy-grid/product/cozy-pullover/',
								'pro_only'        => true,
							),
							'anchor_navigation' => array(
								'image'           => plugin_dir_url( __DIR__ ) . '../img/layout/anchor_navigation.svg',
								'option_name'     => __( 'Anchor Nav', 'gallery-slider-for-woocommerce' ),
								'option_demo_url' => 'https://demo.woogallery.io/anchor-navigation/product/jersey-sweat-shirt/',
								'pro_only'        => true,
							),
							'vertical_right'    => array(
								'image'           => plugin_dir_url( __DIR__ ) . '../img/layout/vertical_right.svg',
								'option_name'     => __( 'Thumbs Right', 'gallery-slider-for-woocommerce' ),
								'option_demo_url' => 'https://demo.woogallery.io/thumbnails-right/product/custom-dunk-low/',
								'pro_only'        => true,
							),
							'hide_thumb'        => array(
								'image'           => plugin_dir_url( __DIR__ ) . '../img/layout/hide_thumbnails.svg',
								'option_name'     => __( 'Slider', 'gallery-slider-for-woocommerce' ),
								'option_demo_url' => 'https://demo.woogallery.io/slider/product/duffel-bag/',
								'pro_only'        => true,
							),
						),
						'default' => 'horizontal',
					),
					array(
						'id'         => 'thumbnails_item_to_show',
						'min'        => 1,
						'max'        => 10,
						'step'       => 1,
						'default'    => 4,
						'type'       => 'slider',
						'title'      => __( 'Thumbnail Items Per View', 'gallery-slider-for-woocommerce' ),
						'dependency' => array( 'gallery_layout', '!=', 'hide_thumb' ),
						//'title_help' => '<div class="wcgs-info-label">' . __( 'Thumbnail Items Per View', 'gallery-slider-for-woocommerce' ) . '</div><div class="wcgs-short-content">' . __( 'Number of item per view (slides visible at the same time on thumbnail slider\'s container).', 'gallery-slider-for-woocommerce' ) . '</div>',
					),
					array(
						'id'          => 'thumbnails_sliders_space',
						'type'        => 'dimensions',
						'title'       => __( 'Thumbnails Space', 'gallery-slider-for-woocommerce' ),
						'title_help'  => '<div class="wcgs-img-tag"><img src="' . plugin_dir_url( __DIR__ ) . '/shapedplugin-framework/assets/images/help-visuals/th_space.svg" alt=""></div> <div class="wcgs-info-label">' . __( 'Thumbnails Space', 'gallery-slider-for-woocommerce' ) . '</div><a class="wcgs-open-docs" href="https://docs.shapedplugin.com/docs/gallery-slider-for-woocommerce-pro/configurations/how-to-set-space-between-thumbnails/" target="_blank">' . __( 'Open Docs', 'gallery-slider-for-woocommerce' ) . '</a><a class="wcgs-open-live-demo" href="https://demo.woogallery.io/thumbnails-space-padding-size-border/" target="_blank">' . __( 'Live Demo', 'gallery-slider-for-woocommerce' ) . '</a>',
						'width_text'  => __( 'Gap', 'gallery-slider-for-woocommerce' ),
						'height_text' => __( 'Vertical Gap', 'gallery-slider-for-woocommerce' ),
						'units'       => array( 'px' ),
						'unit'        => 'px',
						'default'     => array(
							'width'  => '6',
							'height' => '6',
						),
						'attributes'  => array(
							'min' => 0,
						),
						'dependency'  => array( 'gallery_layout', '!=', 'hide_thumb' ),
					),
					array(
						'id'         => 'thumbnails_sizes',
						'type'       => 'image_sizes',
						'title'      => __( 'Thumbnails Size', 'gallery-slider-for-woocommerce' ),
						'title_help' => '<div class="wcgs-info-label">' . __( 'Thumbnails Size', 'gallery-slider-for-woocommerce' ) . '</div><div class="wcgs-short-content">' . __( 'Adjust the thumbnail Size according to your website design.', 'gallery-slider-for-woocommerce' ) . '</div><a class="wcgs-open-docs" href="https://docs.shapedplugin.com/docs/gallery-slider-for-woocommerce-pro/configurations/how-to-configure-thumbnails-size/" target="_blank">' . __( 'Open Docs', 'gallery-slider-for-woocommerce' ) . '</a><a class="wcgs-open-live-demo" href="https://demo.woogallery.io/thumbnails-space-padding-size-border/#thumb-size" target="_blank">' . __( 'Live Demo', 'gallery-slider-for-woocommerce' ) . '</a>',
						'default'    => 'shop_thumbnail',
						'dependency' => array( 'gallery_layout', '!=', 'hide_thumb' ),
					),
					array(
						'id'         => 'thumb_crop_size',
						'type'       => 'dimensions',
						'class'      => 'pro_only_field',
						'title'      => __( 'Custom Size', 'gallery-slider-for-woocommerce' ),
						'units'      => array(
							'Soft-crop',
							'Hard-crop',
						),
						'default'    => array(
							'width'  => '100',
							'height' => '100',
							'unit'   => 'Soft-crop',
						),
						'attributes' => array(
							'min' => 0,
						),
						'dependency' => array( 'thumbnails_sizes|gallery_layout', '==|!=', 'custom|hide_thumb' ),
					),
					array(
						'id'         => 'thumbnails_load_2x_image',
						'type'       => 'switcher',
						'class'      => 'pro_switcher',
						'title'      => __( 'Load 2x Resolution Image in Retina Display', 'gallery-slider-for-woocommerce' ),
						'text_on'    => __( 'Enabled', 'gallery-slider-for-woocommerce' ),
						'text_off'   => __( 'Disabled', 'gallery-slider-for-woocommerce' ),
						'text_width' => 96,
						'default'    => false,
						'dependency' => array( 'thumbnails_sizes', '==', 'custom' ),
					),
					array(
						'id'         => 'border_normal_width_for_thumbnail',
						'class'      => 'border_active_thumbnail',
						'type'       => 'border',
						'title'      => __( 'Thumbnails Border', 'gallery-slider-for-woocommerce' ),
						'color'      => true,
						'style'      => false,
						'color2'     => false,
						'all'        => true,
						'radius'     => true,
						'default'    => array(
							'color'  => '#dddddd',
							// 'color2' => '#5EABC1',
							'color3' => '#0085BA',
							'all'    => 2,
							'radius' => 0,
						),
						'dependency' => array( 'gallery_layout', '!=', 'hide_thumb' ),
					),
					array(
						'id'         => 'thumbnails_hover_effect',
						'type'       => 'select',
						'title'      => __( 'Thumbnails Hover Effect', 'gallery-slider-for-woocommerce' ),
						'title_help' => '<div class="wcgs-info-label">' . __( 'Thumbnail Hover Effect', 'gallery-slider-for-woocommerce' ) . '</div><div class="wcgs-short-content">' . __( 'A hover effect will enhance user engagement and make the browsing experience more interactive.', 'gallery-slider-for-woocommerce' ) . '</div><a class="wcgs-open-docs" href="https://docs.shapedplugin.com/docs/gallery-slider-for-woocommerce-pro/configurations/how-to-set-thumbnails-hover-effects/" target="_blank">' . __( 'Open Docs', 'gallery-slider-for-woocommerce' ) . '</a><a class="wcgs-open-live-demo" href="https://demo.woogallery.io/thumbnails-hover-effects/" target="_blank">' . __( 'Live Demo', 'gallery-slider-for-woocommerce' ) . '</a>',
						'options'    => array(
							'none'       => __( 'Normal', 'gallery-slider-for-woocommerce' ),
							'zoom_in'    => __( 'Zoom In <span>(Pro)</span>', 'gallery-slider-for-woocommerce' ),
							'zoom_out'   => __( 'Zoom Out  <span>(Pro)</span>', 'gallery-slider-for-woocommerce' ),
							'slide_up'   => __( 'Slide Up <span>(Pro)</span>', 'gallery-slider-for-woocommerce' ),
							'slide_down' => __( 'Slide Down  <span>(Pro)</span>', 'gallery-slider-for-woocommerce' ),
						),
						'default'    => 'none',
						'dependency' => array( 'gallery_layout', '!=', 'hide_thumb' ),
					),
					array(
						'id'         => 'thumb_active_on',
						'type'       => 'radio',
						'title'      => __( 'Thumbnails Activate On', 'gallery-slider-for-woocommerce' ),
						'title_help' => '<div class="wcgs-info-label">' . __( 'Thumbnails Activate on', 'gallery-slider-for-woocommerce' ) . '</div><div class="wcgs-short-content">' . __( 'Choose thumbnail activator type.', 'gallery-slider-for-woocommerce' ) . '<p><b>' . __( 'Click:', 'gallery-slider-for-woocommerce' ) . '</b> ' . __( 'The user or visitor has to click on the thumbnail to change the product image.', 'gallery-slider-for-woocommerce' ) . '<br/><b>' . __( 'Mouseover:', 'gallery-slider-for-woocommerce' ) . '</b> ' . __( 'The product image will be replaced when the mouse hovers over the thumbnail.', 'gallery-slider-for-woocommerce' ) . '</p></div><a class="wcgs-open-docs" href="https://docs.shapedplugin.com/docs/gallery-slider-for-woocommerce-pro/configurations/how-do-you-want-to-activate-thumbnails/" target="_blank">' . __( 'Open Docs', 'gallery-slider-for-woocommerce' ) . '</a><a class="wcgs-open-live-demo" href="https://demo.woogallery.io/thumbnails-activation/" target="_blank">' . __( 'Live Demo', 'gallery-slider-for-woocommerce' ) . '</a>',
						'options'    => array(
							'click'     => __( 'Click', 'gallery-slider-for-woocommerce' ),
							'mouseover' => array(
								'option_name' => __( 'Mouseover', 'gallery-slider-for-woocommerce' ),
								'pro_only'    => true,
							),
						),
						'default'    => 'click',
					),
					array(
						'id'         => 'thumbnail_style',
						'class'      => 'thumbnail_style',
						'type'       => 'image_select',
						'title_help' => '<div class="wcgs-info-label">' . __( 'Active Thumbnail Style', 'gallery-slider-for-woocommerce' ) . '</div><div class="wcgs-short-content">' . __( 'The option refers to the visual presentation of a thumbnail when it is in an active or selected state.', 'gallery-slider-for-woocommerce' ) . '</div><a class="wcgs-open-docs" href="https://docs.shapedplugin.com/docs/gallery-slider-for-woocommerce-pro/configurations/how-to-choose-an-active-thumbnails-style/" target="_blank">' . __( 'Open Docs', 'gallery-slider-for-woocommerce' ) . '</a><a class="wcgs-open-live-demo" href="https://demo.woogallery.io/active-thumbnail-styles/" target="_blank">' . __( 'Live Demo', 'gallery-slider-for-woocommerce' ) . '</a>',
						'title'      => __( 'Active Thumbnail Style', 'gallery-slider-for-woocommerce' ),
						'options'    => array(
							'border_around' => array(
								'image'       => plugin_dir_url( __DIR__ ) . '../img/border-around.svg',
								'option_name' => __( 'Border Around', 'gallery-slider-for-woocommerce' ),
							),
							'bottom_line'   => array(
								'image'       => plugin_dir_url( __DIR__ ) . '../img/bottom-line.svg',
								'option_name' => __( 'Bottom Line', 'gallery-slider-for-woocommerce' ),
								'pro_only'    => true,
							),
							'zoom_out'      => array(
								'image'       => plugin_dir_url( __DIR__ ) . '../img/zoom-out.svg',
								'option_name' => __( 'Zoom Out', 'gallery-slider-for-woocommerce' ),
								'pro_only'    => true,
							),
							'opacity'       => array(
								'image'       => plugin_dir_url( __DIR__ ) . '../img/opacity.svg',
								'option_name' => __( 'Opacity', 'gallery-slider-for-woocommerce' ),
								'pro_only'    => true,
							),
						),
						'default'    => 'border_around',
					),
					array(
						'id'         => 'border_width_for_active_thumbnail',
						'class'      => 'border_active_thumbnail',
						'type'       => 'border',
						'title'      => __( 'Active Thumbnail Border', 'gallery-slider-for-woocommerce' ),
						'title_help' => '<div class="wcgs-img-tag"><img src="' . plugin_dir_url( __DIR__ ) . '/shapedplugin-framework/assets/images/help-visuals/active-thumbnail-border.svg" alt=""></div><div class="wcgs-info-label">' . __( 'Active Thumbnail Border', 'gallery-slider-for-woocommerce' ) . '</div>',
						'color'      => false,
						'color2'     => true,
						'color3'     => false,
						'style'      => false,
						'all'        => true,
						'radius'     => false,
						'default'    => array(
							'color2' => '#0085BA',
							'all'    => 2,
						),
						// 'dependency' => array( 'gallery_layout|thumbnail_style', '!=|!=', 'hide_thumb|bottom_line' ),
					),
					array(
						'id'         => 'inactive_thumbnails_effect',
						'type'       => 'select',
						'title'      => __( 'Inactive Thumbnails Effect', 'gallery-slider-for-woocommerce' ),
						'title_help' => '<div class="wcgs-info-label">' . __( 'Inactive Thumbnails Effect', 'gallery-slider-for-woocommerce' ) . '</div><div class="wcgs-short-content">' . __( 'Refers to the visual treatment of thumbnails that are not currently selected or in focus.', 'gallery-slider-for-woocommerce' ) . '</div><a class="wcgs-open-docs" href="https://docs.shapedplugin.com/docs/gallery-slider-for-woocommerce-pro/configurations/how-do-you-want-to-stylize-inactive-thumbnails/" target="_blank">' . __( 'Open Docs', 'gallery-slider-for-woocommerce' ) . '</a><a class="wcgs-open-live-demo" href="https://demo.woogallery.io/inactive-thumbnails-effect/" target="_blank">' . __( 'Live Demo', 'gallery-slider-for-woocommerce' ) . '</a>',
						'options'    => array(
							'none'      => __( 'Normal', 'gallery-slider-for-woocommerce' ),
							'opacity'   => __( 'Opacity (Pro)', 'gallery-slider-for-woocommerce' ),
							'grayscale' => __( 'Grayscale (Pro)', 'gallery-slider-for-woocommerce' ),
						),
						'default'    => 'none',
						// 'dependency' => array( 'gallery_layout|thumbnail_style', '!=|!=', 'hide_thumb|opacity' ),
					),
					array(
						'id'         => 'gallery_width',
						'type'       => 'slider',
						'title'      => __( 'Gallery Width', 'gallery-slider-for-woocommerce' ),
						'title_help' => '<div class="wcgs-img-tag"><img src="' . plugin_dir_url( __DIR__ ) . '/shapedplugin-framework/assets/images/help-visuals/gallery-width.svg" alt=""></div><div class="wcgs-info-label">' . __( 'Gallery Width', 'gallery-slider-for-woocommerce' ) . '</div><div class="wcgs-short-content">' . __( 'If you are using a Block theme or custom template for the single product page, set the gallery width to 100%.', 'gallery-slider-for-woocommerce' ) . '</div><a class="wcgs-open-docs" href="https://docs.shapedplugin.com/docs/gallery-slider-for-woocommerce-pro/configurations/how-to-set-gallery-width/" target="_blank">' . __( 'Open Docs', 'gallery-slider-for-woocommerce' ) . '</a>',
						'default'    => 50,
						'unit'       => '%',
						'min'        => 1,
						'step'       => 1,
						'max'        => 100,
					),
					array(
						'id'         => 'gallery_responsive_width',
						'class'      => 'gallery_responsive_width',
						'type'       => 'dimensions_res',
						'title'      => __( 'Responsive Gallery Width', 'gallery-slider-for-woocommerce' ),
						'default'    => array(
							'width'   => '0',
							'height'  => '720',
							'height2' => '480',
							'unit'    => 'px',
						),
						'title_help' => sprintf(
							/* translators: 1: start icon tag, 2: close icon tag. 3: start icon tag, 4: close icon tag. 5: start icon tag, 6: close icon tag. */
							__(
								'%1$sA default value of 0 means that the thumbnail gallery will inherit the Gallery Width value intended for large devices. This default Gallery width is set to 50% up above,%2$s Tablet -Screen size is smaller than 768px. Set the value in between 480-768,%3$s Mobile - Screen size is smaller than 480px.  Set a value between 0-480.',
								'gallery-slider-for-woocommerce'
							),
							'<i class="sp-wgsp-icon-laptop"></i>',
							'<br> <i class="sp-wgsp-icon-tablet"></i>',
							'<br> <i class="sp-wgsp-icon-mobile"></i>',
						),
					),
					array(
						'id'         => 'gallery_bottom_gap',
						'type'       => 'spinner',
						'title'      => __( 'Gallery Bottom Gap', 'gallery-slider-for-woocommerce' ),
						'title_help' => '<div class="wcgs-img-tag"><img src="' . plugin_dir_url( __DIR__ ) . '/shapedplugin-framework/assets/images/help-visuals/gallery-bottom-gap.svg" alt=""></div><div class="wcgs-info-label">' . __( 'Gallery Bottom Gap', 'gallery-slider-for-woocommerce' ) . '</div>',
						'default'    => 30,
						'unit'       => 'px',
					),

					array(
						'id'         => 'gallery_image_source',
						'type'       => 'radio',
						'title'      => __( 'Gallery Image Source', 'gallery-slider-for-woocommerce' ),
						'title_help' => '<div class="wcgs-info-label">' . __( 'Gallery Image Source', 'gallery-slider-for-woocommerce' ) . '</div><div class="wcgs-short-content">' . __( 'Choose a source from where you want to display the gallery images.', 'gallery-slider-for-woocommerce' ) . '</div>',
						'options'    => array(
							'attached' => __( 'All images attached to this product content', 'gallery-slider-for-woocommerce' ),
							'uploaded' => __( 'Only images uploaded to the product gallery', 'gallery-slider-for-woocommerce' ),
						),
						'default'    => 'uploaded',
					),
					array(
						'id'         => 'include_feature_image_to_gallery',
						'type'       => 'checkbox',
						'title'      => __( 'Include Feature Image', 'gallery-slider-for-woocommerce' ),
						'title_help' => '<div class="wcgs-info-label">' . __( 'Include Featured Image', 'gallery-slider-for-woocommerce' ) . '</div><div class="wcgs-short-content">' . __( 'Check to include featured images in the default gallery and variation gallery.', 'gallery-slider-for-woocommerce' ) . '</div>',
						'default'    => 'default_gl',
						'options'    => array(
							'default_gl'  => __( 'To Default Gallery', 'gallery-slider-for-woocommerce' ),
							'variable_gl' => __( 'To Variation Gallery', 'gallery-slider-for-woocommerce' ),
						),
					),
					array(
						'id'         => 'include_variation_and_default_gallery',
						'type'       => 'checkbox',
						'class'      => 'pro_checkbox',
						'title'      => esc_html__( 'Show Default Gallery with Variation Images', 'gallery-slider-for-woocommerce' ),
						'title_help' => '<div class="wcgs-info-label">Default Gallery with Variation Images</div><div class="wcgs-short-content">Check to show the default product gallery along with variation images.</div>',
						'default'    => false,
					),
					array(
						'id'         => 'single_combination',
						'type'       => 'radio',
						'title'      => esc_html__( 'Display Variation Images Based on Selection', 'gallery-slider-for-woocommerce' ),
						'title_help' => '<div class="wcgs-info-label">Display Variation Images Based on Selection</div><div class="wcgs-short-content">When \'Single Attribute\' chosen, variation images will show on a single variation attribute change; when \'All Attributes\' chosen, they will show only when all variation attributes are selected.</div>',
						'default'    => 'single',
						'options'    => array(
							'single' => __( 'Single Attribute', 'gallery-slider-for-woocommerce' ),
							'all'    => __( 'All Attributes', 'gallery-slider-for-woocommerce' ),
						),
					),
					array(
						'id'         => 'show_caption',
						'type'       => 'switcher',
						'class'      => 'pro_switcher',
						'title'      => __( 'Gallery Image Caption', 'gallery-slider-for-woocommerce' ),
						'title_help' => '<div class="wcgs-img-tag"><img src="' . plugin_dir_url( __DIR__ ) . '/shapedplugin-framework/assets/images/help-visuals/gallery_image_caption.svg" alt=""></div><div class="wcgs-info-label">' . __( 'Gallery Bottom Gap', 'gallery-slider-for-woocommerce' ) . '</div>',
						'text_on'    => __( 'Show', 'gallery-slider-for-woocommerce' ),
						'text_off'   => __( 'Hide', 'gallery-slider-for-woocommerce' ),
						'text_width' => 80,
						'default'    => false,
					),

				),
			)
		);
	}
}
