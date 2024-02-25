<?php

add_action( 'admin_menu', 'seo_digital_marketing_gettingstarted' );
function seo_digital_marketing_gettingstarted() {
	add_theme_page( esc_html__('Theme Documentation', 'seo-digital-marketing'), esc_html__('Theme Documentation', 'seo-digital-marketing'), 'edit_theme_options', 'seo-digital-marketing-guide-page', 'seo_digital_marketing_guide');
}

function seo_digital_marketing_admin_theme_style() {
   wp_enqueue_style('seo-digital-marketing-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'seo_digital_marketing_admin_theme_style');

if ( ! defined( 'SEO_DIGITAL_MARKETING_SUPPORT' ) ) {
	define('SEO_DIGITAL_MARKETING_SUPPORT',__('https://wordpress.org/support/theme/seo-digital-marketing','seo-digital-marketing'));
}
if ( ! defined( 'SEO_DIGITAL_MARKETING_REVIEW' ) ) {
	define('SEO_DIGITAL_MARKETING_REVIEW',__('https://wordpress.org/support/theme/seo-digital-marketing/reviews/#new-post','seo-digital-marketing'));
}
if ( ! defined( 'SEO_DIGITAL_MARKETING_LIVE_DEMO' ) ) {
	define('SEO_DIGITAL_MARKETING_LIVE_DEMO',__('https://www.ovationthemes.com/demos/seo-digital-marketing/','seo-digital-marketing'));
}
if ( ! defined( 'SEO_DIGITAL_MARKETING_BUY_PRO' ) ) {
	define('SEO_DIGITAL_MARKETING_BUY_PRO',__('https://www.ovationthemes.com/wordpress/digital-marketing-wordpress-theme/','seo-digital-marketing'));
}
if ( ! defined( 'SEO_DIGITAL_MARKETING_PRO_DOC' ) ) {
	define('SEO_DIGITAL_MARKETING_PRO_DOC',__('https://www.ovationthemes.com/docs/ot-seo-digital-marketing-pro-doc/','seo-digital-marketing'));
}
if ( ! defined( 'SEO_DIGITAL_MARKETING_FREE_DOC' ) ) {
define('SEO_DIGITAL_MARKETING_FREE_DOC',__('https://ovationthemes.com/docs/ot-seo-digital-marketing-free-doc','seo-digital-marketing'));
}
if ( ! defined( 'SEO_DIGITAL_MARKETING_THEME_NAME' ) ) {
	define('SEO_DIGITAL_MARKETING_THEME_NAME',__('Premium SEO Theme','seo-digital-marketing'));
}

/**
 * Theme Info Page
 */
function seo_digital_marketing_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme(); ?>

	<div class="getting-started__header">
		<div class="col-md-10">
			<h2><?php echo esc_html( $theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'seo-digital-marketing'); ?><?php echo esc_html($theme['Version']);?></p>
		</div>
		<div class="col-md-2">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( SEO_DIGITAL_MARKETING_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Instructions', 'seo-digital-marketing'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( SEO_DIGITAL_MARKETING_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'seo-digital-marketing'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( SEO_DIGITAL_MARKETING_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'seo-digital-marketing'); ?></a>
			</div>
		</div>
	</div>

	<div class="wrap getting-started">
		<div class="container">
			<div class="col-md-9">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','seo-digital-marketing'); ?></h3>
					<p><?php esc_html_e('To step the seo digital marketing studio theme follow the below steps.','seo-digital-marketing'); ?></p>

					<h4><?php esc_html_e('1. Setup Logo','seo-digital-marketing'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Site Identity >> Upload your logo or Add site title and site description.','seo-digital-marketing'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','seo-digital-marketing'); ?></a>

					<h4><?php esc_html_e('2. Setup Contact Info','seo-digital-marketing'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Contact info >> Add your phone number and email address.','seo-digital-marketing'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=seo_digital_marketing_top') ); ?>" target="_blank"><?php esc_html_e('Add Contact Info','seo-digital-marketing'); ?></a>

					<h4><?php esc_html_e('3. Setup Menus','seo-digital-marketing'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Menus >> Create Menus >> Add pages, post or custom link then save it.','seo-digital-marketing'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Add Menus','seo-digital-marketing'); ?></a>

					<h4><?php esc_html_e('4. Setup Social Icons','seo-digital-marketing'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Social Media >> Add social links.','seo-digital-marketing'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=seo_digital_marketing_urls') ); ?>" target="_blank"><?php esc_html_e('Add Social Icons','seo-digital-marketing'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer','seo-digital-marketing'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Widgets >> Add widgets in footer 1, footer 2, footer 3, footer 4. >> ','seo-digital-marketing'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','seo-digital-marketing'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer Text','seo-digital-marketing'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Footer Text >> Add copyright text. >> ','seo-digital-marketing'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=seo_digital_marketing_footer_copyright') ); ?>" target="_blank"><?php esc_html_e('Footer Text','seo-digital-marketing'); ?></a>

					<h3><?php esc_html_e('Setup Home Page','seo-digital-marketing'); ?></h3>
					<p><?php esc_html_e('To step the home page follow the below steps.','seo-digital-marketing'); ?></p>

					<h4><?php esc_html_e('1. Setup Page','seo-digital-marketing'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Pages >> Add New Page >> Select "Custom Home Page" from templates >> Publish it.','seo-digital-marketing'); ?></p>
					<a class="dashboard_add_new_page button-primary"><?php esc_html_e('Add New Page','seo-digital-marketing'); ?></a>

					<h4><?php esc_html_e('2. Setup Slider','seo-digital-marketing'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','seo-digital-marketing'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Slider Settings >> Select post.','seo-digital-marketing'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=seo_digital_marketing_slider_section') ); ?>" target="_blank"><?php esc_html_e('Add Slider','seo-digital-marketing'); ?></a>

					<h4><?php esc_html_e('3. Setup Skills','seo-digital-marketing'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Skills Section Settings >> Add Details','seo-digital-marketing'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=seo_digital_marketing_skill_section') ); ?>" target="_blank"><?php esc_html_e('Add Skills','seo-digital-marketing'); ?></a>
				</div>
          	</div>
			<div class="col-md-3">
				<h3><?php echo esc_html(SEO_DIGITAL_MARKETING_THEME_NAME); ?></h3>
				<img class="seo_digital_marketing_img_responsive" style="width: 100%;" src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
				<div class="pro-links">
					<hr>
					<a class="button-primary buynow" href="<?php echo esc_url( SEO_DIGITAL_MARKETING_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'seo-digital-marketing'); ?></a>
					<a class="button-primary livedemo" href="<?php echo esc_url( SEO_DIGITAL_MARKETING_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'seo-digital-marketing'); ?></a>
					<a class="button-primary docs" href="<?php echo esc_url( SEO_DIGITAL_MARKETING_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'seo-digital-marketing'); ?></a>
					<hr>
				</div>
				<ul style="padding-top:10px">
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'seo-digital-marketing');?> </li>
                    <li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'seo-digital-marketing');?> </li>
                   	<li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'seo-digital-marketing');?> </li>
                   	<li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'seo-digital-marketing');?> </li>
                   	<li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'seo-digital-marketing');?> </li>
                   	<li class="upsell-seo_digital_marketing"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'seo-digital-marketing');?> </li>
                </ul>
        	</div>
		</div>
	</div>

<?php }?>
