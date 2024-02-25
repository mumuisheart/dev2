<?php 

$seo_digital_marketing_custom_style= "";

/*---------------------------Width -------------------*/

$seo_digital_marketing_theme_width = get_theme_mod( 'seo_digital_marketing_width_options','full_width');

if($seo_digital_marketing_theme_width == 'full_width'){

$seo_digital_marketing_custom_style .='body{';

	$seo_digital_marketing_custom_style .='max-width: 100%;';

$seo_digital_marketing_custom_style .='}';

}else if($seo_digital_marketing_theme_width == 'Container'){

$seo_digital_marketing_custom_style .='body{';

	$seo_digital_marketing_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

$seo_digital_marketing_custom_style .='}';

$seo_digital_marketing_custom_style .='@media screen and (max-width:600px){';

$seo_digital_marketing_custom_style .='body{';

    $seo_digital_marketing_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$seo_digital_marketing_custom_style .='} }';

}else if($seo_digital_marketing_theme_width == 'container_fluid'){

$seo_digital_marketing_custom_style .='body{';

	$seo_digital_marketing_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

$seo_digital_marketing_custom_style .='}';

$seo_digital_marketing_custom_style .='@media screen and (max-width:600px){';

$seo_digital_marketing_custom_style .='body{';

    $seo_digital_marketing_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$seo_digital_marketing_custom_style .='} }';
}

/*---------------------------Scroll-top-position -------------------*/

$seo_digital_marketing_scroll_options = get_theme_mod( 'seo_digital_marketing_scroll_options','right_align');

if($seo_digital_marketing_scroll_options == 'right_align'){

$seo_digital_marketing_custom_style .='.scroll-top button{';

	$seo_digital_marketing_custom_style .='';

$seo_digital_marketing_custom_style .='}';

}else if($seo_digital_marketing_scroll_options == 'center_align'){

$seo_digital_marketing_custom_style .='.scroll-top button{';

	$seo_digital_marketing_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

$seo_digital_marketing_custom_style .='}';

}else if($seo_digital_marketing_scroll_options == 'left_align'){

$seo_digital_marketing_custom_style .='.scroll-top button{';

	$seo_digital_marketing_custom_style .='right: auto; left:5%; margin: 0 auto';

$seo_digital_marketing_custom_style .='}';
}

$seo_digital_marketing_logo_max_height = get_theme_mod('seo_digital_marketing_logo_max_height');

if($seo_digital_marketing_logo_max_height != false){

$seo_digital_marketing_custom_style .='.custom-logo-link img{';

	$seo_digital_marketing_custom_style .='max-height: '.esc_html($seo_digital_marketing_logo_max_height).'px;';

$seo_digital_marketing_custom_style .='}';
}


/*---------------------------text-transform-------------------*/

$seo_digital_marketing_text_transform = get_theme_mod( 'seo_digital_marketing_menu_text_transform','CAPITALISE');
if($seo_digital_marketing_text_transform == 'CAPITALISE'){

$seo_digital_marketing_custom_style .='nav#top_gb_menu ul li a{';

	$seo_digital_marketing_custom_style .='text-transform: capitalize ; font-size: 14px;';

$seo_digital_marketing_custom_style .='}';

}else if($seo_digital_marketing_text_transform == 'UPPERCASE'){

$seo_digital_marketing_custom_style .='nav#top_gb_menu ul li a{';

	$seo_digital_marketing_custom_style .='text-transform: uppercase ; font-size: 14px;';

$seo_digital_marketing_custom_style .='}';

}else if($seo_digital_marketing_text_transform == 'LOWERCASE'){

$seo_digital_marketing_custom_style .='nav#top_gb_menu ul li a{';

	$seo_digital_marketing_custom_style .='text-transform: lowercase ; font-size: 14px;';

$seo_digital_marketing_custom_style .='}';
}

/*-------------------------Slider-content-alignment-------------------*/

$seo_digital_marketing_slider_content_alignment = get_theme_mod( 'seo_digital_marketing_slider_content_alignment','LEFT-ALIGN');

if($seo_digital_marketing_slider_content_alignment == 'LEFT-ALIGN'){

$seo_digital_marketing_custom_style .='.carousel-caption {';

	$seo_digital_marketing_custom_style .='text-align:left; right: 50%; left: 15%;';

$seo_digital_marketing_custom_style .='}';


}else if($seo_digital_marketing_slider_content_alignment == 'CENTER-ALIGN'){

$seo_digital_marketing_custom_style .='.carousel-caption {';

	$seo_digital_marketing_custom_style .='text-align:center; right: 15%; left: 15%;';

$seo_digital_marketing_custom_style .='}';


}else if($seo_digital_marketing_slider_content_alignment == 'RIGHT-ALIGN'){

$seo_digital_marketing_custom_style .='.carousel-caption {';

	$seo_digital_marketing_custom_style .='text-align:right; right: 15%; left: 50%;';

$seo_digital_marketing_custom_style .='}';

}

//----------------Logo-Max-height-------------	
$seo_digital_marketing_logo_max_height = get_theme_mod('seo_digital_marketing_logo_max_height','100');

if($seo_digital_marketing_logo_max_height != false){

$seo_digital_marketing_custom_style .='.custom-logo-link img{';

	$seo_digital_marketing_custom_style .='max-height: '.esc_html($seo_digital_marketing_logo_max_height).'px;';

$seo_digital_marketing_custom_style .='}';
}

//--------------------sticky header----------------------
if (false === get_option('seo_digital_marketing_sticky_header')) {
    add_option('seo_digital_marketing_sticky_header', 'off');
}

// Define the custom CSS based on the 'seo_digital_marketing_sticky_header' option

if (get_option('seo_digital_marketing_sticky_header', 'off') !== 'on') {
    $seo_digital_marketing_custom_style .= '.fixed_header.fixed {';
    $seo_digital_marketing_custom_style .= 'position: static;';
    $seo_digital_marketing_custom_style .= '}';
}

if (get_option('seo_digital_marketing_sticky_header', 'off') !== 'off') {
    $seo_digital_marketing_custom_style .= '.fixed_header.fixed {';
    $seo_digital_marketing_custom_style .= 'position: fixed; background-color: #8a63f2;';
    $seo_digital_marketing_custom_style .= '}';

    $seo_digital_marketing_custom_style .= '.admin-bar .fixed {';
    $seo_digital_marketing_custom_style .= ' margin-top: 32px;';
    $seo_digital_marketing_custom_style .= '}';
}

//related products
if( get_option( 'seo_digital_marketing_related_product',true) != 'on') {

$seo_digital_marketing_custom_style .='.related.products{';

	$seo_digital_marketing_custom_style .='display: none;';
	
$seo_digital_marketing_custom_style .='}';
}

if( get_option( 'seo_digital_marketing_related_product',true) != 'off') {

$seo_digital_marketing_custom_style .='.related.products{';

	$seo_digital_marketing_custom_style .='display: block;';
	
$seo_digital_marketing_custom_style .='}';
}

// footer text alignment
$seo_digital_marketing_footer_content_alignment = get_theme_mod( 'seo_digital_marketing_footer_content_alignment','CENTER-ALIGN');

if($seo_digital_marketing_footer_content_alignment == 'LEFT-ALIGN'){

$seo_digital_marketing_custom_style .='.site-info{';

	$seo_digital_marketing_custom_style .='text-align:left; padding-left: 30px;';

$seo_digital_marketing_custom_style .='}';

$seo_digital_marketing_custom_style .='.site-info a{';

	$seo_digital_marketing_custom_style .='padding-left: 30px;';

$seo_digital_marketing_custom_style .='}';


}else if($seo_digital_marketing_footer_content_alignment == 'CENTER-ALIGN'){

$seo_digital_marketing_custom_style .='.site-info{';

	$seo_digital_marketing_custom_style .='text-align:center;';

$seo_digital_marketing_custom_style .='}';


}else if($seo_digital_marketing_footer_content_alignment == 'RIGHT-ALIGN'){

$seo_digital_marketing_custom_style .='.site-info{';

	$seo_digital_marketing_custom_style .='text-align:right; padding-right: 30px;';

$seo_digital_marketing_custom_style .='}';

$seo_digital_marketing_custom_style .='.site-info a{';

	$seo_digital_marketing_custom_style .='padding-right: 30px;';

$seo_digital_marketing_custom_style .='}';

}

// slider button
$mobile_button_setting = get_option('seo_digital_marketing_slider_button_mobile_show_hide', '1');
$main_button_setting = get_option('seo_digital_marketing_slider_button_show_hide', '1');

$seo_digital_marketing_custom_style .= '#slider .home-btn {';

if ($main_button_setting == 'off') {
    $seo_digital_marketing_custom_style .= 'display: none;';
}

$seo_digital_marketing_custom_style .= '}';

// Add media query for mobile devices
$seo_digital_marketing_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_button_setting == 'off' || $mobile_button_setting == 'off') {
    $seo_digital_marketing_custom_style .= '#slider .home-btn { display: none; }';
}
$seo_digital_marketing_custom_style .= '}';


// scroll button
$mobile_scroll_setting = get_option('seo_digital_marketing_scroll_enable_mobile', '1');
$main_scroll_setting = get_option('seo_digital_marketing_scroll_enable', '1');

$seo_digital_marketing_custom_style .= '.scrollup {';

if ($main_scroll_setting == 'off') {
    $seo_digital_marketing_custom_style .= 'display: none;';
}

$seo_digital_marketing_custom_style .= '}';

// Add media query for mobile devices
$seo_digital_marketing_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_scroll_setting == 'off' || $mobile_scroll_setting == 'off') {
    $seo_digital_marketing_custom_style .= '.scrollup { display: none; }';
}
$seo_digital_marketing_custom_style .= '}';

// theme breadcrumb
$mobile_breadcrumb_setting = get_option('seo_digital_marketing_enable_breadcrumb_mobile', '1');
$main_breadcrumb_setting = get_option('seo_digital_marketing_enable_breadcrumb', '1');

$seo_digital_marketing_custom_style .= '.archieve_breadcrumb {';

if ($main_breadcrumb_setting == 'off') {
    $seo_digital_marketing_custom_style .= 'display: none;';
}

$seo_digital_marketing_custom_style .= '}';

// Add media query for mobile devices
$seo_digital_marketing_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_breadcrumb_setting == 'off' || $mobile_breadcrumb_setting == 'off') {
    $seo_digital_marketing_custom_style .= '.archieve_breadcrumb { display: none; }';
}
$seo_digital_marketing_custom_style .= '}';

// single post and page breadcrumb
$mobile_single_breadcrumb_setting = get_option('seo_digital_marketing_single_enable_breadcrumb_mobile', '1');
$main_single_breadcrumb_setting = get_option('seo_digital_marketing_single_enable_breadcrumb', '1');

$seo_digital_marketing_custom_style .= '.single_breadcrumb {';

if ($main_single_breadcrumb_setting == 'off') {
    $seo_digital_marketing_custom_style .= 'display: none;';
}

$seo_digital_marketing_custom_style .= '}';

// Add media query for mobile devices
$seo_digital_marketing_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_single_breadcrumb_setting == 'off' || $mobile_single_breadcrumb_setting == 'off') {
    $seo_digital_marketing_custom_style .= '.single_breadcrumb { display: none; }';
}
$seo_digital_marketing_custom_style .= '}';

// woocommerce breadcrumb
$mobile_woo_breadcrumb_setting = get_option('seo_digital_marketing_woocommerce_enable_breadcrumb_mobile', '1');
$main_woo_breadcrumb_setting = get_option('seo_digital_marketing_woocommerce_enable_breadcrumb', '1');

$seo_digital_marketing_custom_style .= '.woocommerce-breadcrumb {';

if ($main_woo_breadcrumb_setting == 'off') {
    $seo_digital_marketing_custom_style .= 'display: none;';
}

$seo_digital_marketing_custom_style .= '}';

// Add media query for mobile devices
$seo_digital_marketing_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_woo_breadcrumb_setting == 'off' || $mobile_woo_breadcrumb_setting == 'off') {
    $seo_digital_marketing_custom_style .= '.woocommerce-breadcrumb { display: none; }';
}
$seo_digital_marketing_custom_style .= '}';