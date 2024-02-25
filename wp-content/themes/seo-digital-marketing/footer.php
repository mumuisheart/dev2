<?php
/**
 * The template for displaying the footer
 *
 * @subpackage SEO Digital Marketing
 * @since 1.0
 */

?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="copyright">
			<div class="container footer-content">
				<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
			</div>
		</div>
		<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
		<div class="scroll-top">
		<button type=button id="seo-digital-marketing-scroll-to-top" class="scrollup">
			<i class="<?php echo esc_attr(get_theme_mod('seo_digital_marketing_scroll_top_icon','fas fa-chevron-up')); ?>"></i>
		</button>
		</div>	
	</footer>

	<?php if (get_option('seo_digital_marketing_enable_custom_cursor', false) !== 'off') : ?>
	    <!-- Custom cursor -->
	    <div class="custom-cursor"></div>
	    <!-- .Custom cursor -->
	<?php endif; ?>
	
<?php wp_footer(); ?>

</body>
</html>