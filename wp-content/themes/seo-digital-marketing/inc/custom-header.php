<?php
/**
 * Custom header
 */

function seo_digital_marketing_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'seo_digital_marketing_custom_header_args', array(
		'default-image'          => get_parent_theme_file_uri( '/assets/images/header-img.png' ),
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 100,
		'flex-width'			 => true,
		'flex-height'			 => true,
		'wp-head-callback'       => 'seo_digital_marketing_header_style',
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/images/header-img.png',
			'thumbnail_url' => '%s/assets/images/header-img.png',
			'description'   => __( 'Default Header Image', 'seo-digital-marketing' ),
		),
	) );
}

add_action( 'after_setup_theme', 'seo_digital_marketing_custom_header_setup' );

if ( ! function_exists( 'seo_digital_marketing_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see seo_digital_marketing_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'seo_digital_marketing_header_style' );
function seo_digital_marketing_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
		.header-image, .woocommerce-page .single-post-image {
			background-image:url('".esc_url(get_header_image())."');
			background-position: top;
			background-size:cover !important;
			background-repeat:no-repeat !important;
		}";
	   	wp_add_inline_style( 'seo-digital-marketing-style', $custom_css );
	endif;
}
endif;
