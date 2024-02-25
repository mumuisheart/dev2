<?php
/**
 * SEO Digital Marketing: Customizer
 *
 * @subpackage SEO Digital Marketing
 * @since 1.0
 */

function seo_digital_marketing_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');
	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.
 
  	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

  	require get_parent_theme_file_path( 'inc/custom-control.php' );

  	//Register the sortable control type.
	$wp_customize->register_control_type( 'SEO_Digital_Marketing_Control_Sortable' );

  	// Add homepage customizer file
  	require get_template_directory() . '/inc/customizer-home-page.php';

	// pro section
 	$wp_customize->add_section('seo_digital_marketing_pro', array(
        'title'    => __('UPGRADE SEO MARKETING PREMIUM', 'seo-digital-marketing'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('seo_digital_marketing_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new SEO_Digital_Marketing_Pro_Control($wp_customize, 'seo_digital_marketing_pro', array(
        'label'    => __('BUSINESS SEO MARKETING PREMIUM', 'seo-digital-marketing'),
        'section'  => 'seo_digital_marketing_pro',
        'settings' => 'seo_digital_marketing_pro',
        'priority' => 1,
    )));

    // logo 
	$wp_customize->add_setting('seo_digital_marketing_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_logo_title',
			array(
				'settings'        => 'seo_digital_marketing_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('seo_digital_marketing_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_logo_text',
			array(
				'settings'        => 'seo_digital_marketing_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
    $wp_customize->add_setting('seo_digital_marketing_logo_max_height',array(
		'default'=> '100',
		'transport' => 'refresh',
		'sanitize_callback' => 'seo_digital_marketing_sanitize_integer'
	));
	$wp_customize->add_control(new Seo_Digital_Marketing_Slider_Custom_Control( $wp_customize, 'seo_digital_marketing_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','seo-digital-marketing'),
		'section'=> 'title_tagline',
		'settings'=>'seo_digital_marketing_logo_max_height',
		'input_attrs' => array(
			'reset'			   => 100,
            'step'             => 1,
			'min'              => 0,
			'max'              => 250,
        ),
        'priority' => 9,
	)));

	// typography
	$wp_customize->add_section( 'seo_digital_marketing_typography_settings', array(
		'title'       => __( 'Typography', 'seo-digital-marketing' ),
		'priority'       => 2,
	) );
	$font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);
	$wp_customize->add_setting( 'seo_digital_marketing_section_typo_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_typo_heading', array(
		'label'       => esc_html__( 'Typography Settings', 'seo-digital-marketing' ),
		'section'     => 'seo_digital_marketing_typography_settings',
		'settings'    => 'seo_digital_marketing_section_typo_heading',
	) ) );
	$wp_customize->add_setting( 'seo_digital_marketing_headings_text', array(
		'sanitize_callback' => 'seo_digital_marketing_sanitize_fonts',
	));
	$wp_customize->add_control( 'seo_digital_marketing_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'seo-digital-marketing'),
		'section' => 'seo_digital_marketing_typography_settings',
		'choices' => $font_choices
	));
	$wp_customize->add_setting( 'seo_digital_marketing_body_text', array(
		'sanitize_callback' => 'seo_digital_marketing_sanitize_fonts'
	));
	$wp_customize->add_control( 'seo_digital_marketing_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'seo-digital-marketing' ),
		'section' => 'seo_digital_marketing_typography_settings',
		'choices' => $font_choices
	) );

    // Theme General Settings
    $wp_customize->add_section('seo_digital_marketing_theme_settings',array(
        'title' => __('Theme General Settings', 'seo-digital-marketing'),
        'priority' => 2,
    ) );
    $wp_customize->add_setting( 'seo_digital_marketing_section_sticky_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_sticky_heading', array(
		'label'       => esc_html__( 'Sticky Header Setting', 'seo-digital-marketing' ),
		'section'     => 'seo_digital_marketing_theme_settings',
		'settings'    => 'seo_digital_marketing_section_sticky_heading',
	) ) );
    $wp_customize->add_setting(
		'seo_digital_marketing_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_sticky_header',
			array(
				'settings'        => 'seo_digital_marketing_sticky_header',
				'section'         => 'seo_digital_marketing_theme_settings',
				'label'           => __( 'Show Sticky Header', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'seo_digital_marketing_section_loader_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_loader_heading', array(
		'label'       => esc_html__( 'Loader Setting', 'seo-digital-marketing' ),
		'section'     => 'seo_digital_marketing_theme_settings',
		'settings'    => 'seo_digital_marketing_section_loader_heading',
	) ) );
	$wp_customize->add_setting(
		'seo_digital_marketing_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_theme_loader',
			array(
				'settings'        => 'seo_digital_marketing_theme_loader',
				'section'         => 'seo_digital_marketing_theme_settings',
				'label'           => __( 'Show Site Loader', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('seo_digital_marketing_loader_style',array(
        'default' => 'style_one',
        'sanitize_callback' => 'seo_digital_marketing_sanitize_choices'
	));
	$wp_customize->add_control('seo_digital_marketing_loader_style',array(
        'type' => 'select',
        'label' => __('Select Loader Design','seo-digital-marketing'),
        'section' => 'seo_digital_marketing_theme_settings',
        'choices' => array(
            'style_one' => __('Circle','seo-digital-marketing'),
            'style_two' => __('Bar','seo-digital-marketing'),
        ),
	) );
	
	$wp_customize->add_setting( 'seo_digital_marketing_section_theme_width_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_theme_width_heading', array(
		'label'       => esc_html__( 'Post Structure', 'seo-digital-marketing' ),
		'section'     => 'seo_digital_marketing_theme_settings',
		'settings'    => 'seo_digital_marketing_section_theme_width_heading',
	) ) );
	$wp_customize->add_setting('seo_digital_marketing_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'seo_digital_marketing_sanitize_choices'
	));
	$wp_customize->add_control('seo_digital_marketing_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','seo-digital-marketing'),
        'section' => 'seo_digital_marketing_theme_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','seo-digital-marketing'),
            'Container' => __('Container','seo-digital-marketing'),
            'container_fluid' => __('Container Fluid','seo-digital-marketing'),
        ),
	) );
	$wp_customize->add_setting( 'seo_digital_marketing_section_menu_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_menu_heading', array(
		'label'       => esc_html__( 'Menu Setting', 'seo-digital-marketing' ),
		'section'     => 'seo_digital_marketing_theme_settings',
		'settings'    => 'seo_digital_marketing_section_menu_heading',
	) ) );
	$wp_customize->add_setting('seo_digital_marketing_menu_text_transform',array(
        'default' => 'CAPITALISE',
        'sanitize_callback' => 'seo_digital_marketing_sanitize_choices'
	));
	$wp_customize->add_control('seo_digital_marketing_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','seo-digital-marketing'),
        'section' => 'seo_digital_marketing_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','seo-digital-marketing'),
            'UPPERCASE' => __('UPPERCASE','seo-digital-marketing'),
            'LOWERCASE' => __('LOWERCASE','seo-digital-marketing'),
        ),
	) );
	$wp_customize->add_setting( 'seo_digital_marketing_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Settings', 'seo-digital-marketing' ),
		'section'     => 'seo_digital_marketing_theme_settings',
		'settings'    => 'seo_digital_marketing_section_scroll_heading',
	) ) );
	$wp_customize->add_setting(
		'seo_digital_marketing_scroll_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_scroll_enable',
			array(
				'settings'        => 'seo_digital_marketing_scroll_enable',
				'section'         => 'seo_digital_marketing_theme_settings',
				'label'           => __( 'show Scroll Top', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'seo_digital_marketing_scroll_options',
		array(
			'default' => 'right_align',
			'transport' => 'refresh',
			'sanitize_callback' => 'seo_digital_marketing_sanitize_choices'
		)
	);
	$wp_customize->add_control( new SEO_Digital_Marketing_Text_Radio_Button_Custom_Control( $wp_customize, 'seo_digital_marketing_scroll_options',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Scroll Top Alignment', 'seo-digital-marketing' ),
			'section' => 'seo_digital_marketing_theme_settings',
			'choices' => array(
				'left_align' => __('LEFT','seo-digital-marketing'),
				'center_align' => __('CENTER','seo-digital-marketing'),
				'right_align' => __('RIGHT','seo-digital-marketing'),
			)
		)
	) );
	$wp_customize->add_setting('seo_digital_marketing_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Seo_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_theme_settings',
		'setting'	=> 'seo_digital_marketing_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting(
		'seo_digital_marketing_enable_custom_cursor',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_enable_custom_cursor',
			array(
				'settings'        => 'seo_digital_marketing_enable_custom_cursor',
				'section'         => 'seo_digital_marketing_theme_settings',
				'label'           => __( 'show custom cursor', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Post Layouts
	$wp_customize->add_panel( 'seo_digital_marketing_post_panel', array(
		'title' => esc_html__( 'Post Layout', 'seo-digital-marketing' ),
		'priority' => 3,
	));
    $wp_customize->add_section('seo_digital_marketing_layout',array(
        'title' => __('Single-Post Layout', 'seo-digital-marketing'), 
        'panel' => 'seo_digital_marketing_post_panel',
    ) );
    $wp_customize->add_setting( 'seo_digital_marketing_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_post_heading', array(
		'label'       => esc_html__( 'single Post Structure', 'seo-digital-marketing' ),
		'section'     => 'seo_digital_marketing_layout',
		'settings'    => 'seo_digital_marketing_section_post_heading',
	) ) );
	$wp_customize->add_setting( 'seo_digital_marketing_single_post_option',
		array(
			'default' => 'single_right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Seo_Digital_Marketing_Radio_Image_Control( $wp_customize, 'seo_digital_marketing_single_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Single Post Page Layout', 'seo-digital-marketing' ),
			'section' => 'seo_digital_marketing_layout',
			'choices' => array(

				'single_right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'seo-digital-marketing' )
				),
				'single_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'seo-digital-marketing' )
				),
				'single_full_width' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'seo-digital-marketing' )
				),
			)
		)
	) );
	$wp_customize->add_setting('seo_digital_marketing_single_post_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new SEO_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_single_post_date',
			array(
				'settings'        => 'seo_digital_marketing_single_post_date',
				'section'         => 'seo_digital_marketing_layout',
				'label'           => __( 'Show Date', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'seo_digital_marketing_single_post_date', array(
		'selector' => '.date-box',
		'render_callback' => 'seo_digital_marketing_customize_partial_seo_digital_marketing_single_post_date',
	) );
	$wp_customize->add_setting('seo_digital_marketing_single_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new SEO_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_single_date_icon',array(
		'label'	=> __('date Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_layout',
		'setting'	=> 'seo_digital_marketing_single_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('seo_digital_marketing_single_post_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new SEO_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_single_post_admin',
			array(
				'settings'        => 'seo_digital_marketing_single_post_admin',
				'section'         => 'seo_digital_marketing_layout',
				'label'           => __( 'Show Author/Admin', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'seo_digital_marketing_single_post_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'seo_digital_marketing_customize_partial_seo_digital_marketing_single_post_admin',
	) );
	$wp_customize->add_setting('seo_digital_marketing_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new SEO_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_single_author_icon',array(
		'label'	=> __('Author Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_layout',
		'setting'	=> 'seo_digital_marketing_single_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('seo_digital_marketing_single_post_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new SEO_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_single_post_comment',
			array(
				'settings'        => 'seo_digital_marketing_single_post_comment',
				'section'         => 'seo_digital_marketing_layout',
				'label'           => __( 'Show Comment', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('seo_digital_marketing_single_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new SEO_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_single_comment_icon',array(
		'label'	=> __('comment Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_layout',
		'setting'	=> 'seo_digital_marketing_single_comment_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('seo_digital_marketing_single_post_tag_count',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new SEO_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_single_post_tag_count',
			array(
				'settings'        => 'seo_digital_marketing_single_post_tag_count',
				'section'         => 'seo_digital_marketing_layout',
				'label'           => __( 'Show tag count', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('seo_digital_marketing_single_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new SEO_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_single_tag_icon',array(
		'label'	=> __('tag Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_layout',
		'setting'	=> 'seo_digital_marketing_single_tag_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('seo_digital_marketing_single_post_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new SEO_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_single_post_tag',
			array(
				'settings'        => 'seo_digital_marketing_single_post_tag',
				'section'         => 'seo_digital_marketing_layout',
				'label'           => __( 'Show Tags', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'seo_digital_marketing_single_post_tag', array(
		'selector' => '.single-tags',
		'render_callback' => 'seo_digital_marketing_customize_partial_seo_digital_marketing_single_post_tag',
	) );
	$wp_customize->add_setting('seo_digital_marketing_similar_post',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_similar_post',
			array(
				'settings'        => 'seo_digital_marketing_similar_post',
				'section'         => 'seo_digital_marketing_layout',
				'label'           => __( 'Show Similar post', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('seo_digital_marketing_similar_text',array(
		'default' => 'Explore More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('seo_digital_marketing_similar_text',array(
		'label' => esc_html__('Similar Post Heading','seo-digital-marketing'),
		'section' => 'seo_digital_marketing_layout',
		'setting' => 'seo_digital_marketing_similar_text',
		'type'    => 'text'
	));
	$wp_customize->add_section('seo_digital_marketing_archieve_post_layot',array(
        'title' => __('Archieve-Post Layout', 'seo-digital-marketing'),
        'panel' => 'seo_digital_marketing_post_panel',
    ) );
	$wp_customize->add_setting( 'seo_digital_marketing_section_archive_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_archive_post_heading', array(
		'label'       => esc_html__( 'Archieve Post Structure', 'seo-digital-marketing' ),
		'section'     => 'seo_digital_marketing_archieve_post_layot',
		'settings'    => 'seo_digital_marketing_section_archive_post_heading',
	) ) );
    $wp_customize->add_setting( 'seo_digital_marketing_post_option',
		array(
			'default' => 'right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Seo_Digital_Marketing_Radio_Image_Control( $wp_customize, 'seo_digital_marketing_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Post Page Layout', 'seo-digital-marketing' ),
			'section' => 'seo_digital_marketing_archieve_post_layot',
			'choices' => array(
				'right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'seo-digital-marketing' )
				),
				'left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'seo-digital-marketing' )
				),
				'one_column' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'seo-digital-marketing' )
				),
				'three_column' => array(
					'image' => get_template_directory_uri().'/assets/images/3column.jpg',
					'name' => __( 'Three Column', 'seo-digital-marketing' )
				),
				'four_column' => array(
					'image' => get_template_directory_uri().'/assets/images/4column.jpg',
					'name' => __( 'Four Column', 'seo-digital-marketing' )
				),
				'grid_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-sidebar.jpg',
					'name' => __( 'Grid-Sidebar Layout', 'seo-digital-marketing' )
				),
				'grid_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-left.png',
					'name' => __( 'Grid-Sidebar Layout', 'seo-digital-marketing' )
				),
				'grid_post' => array(
					'image' => get_template_directory_uri().'/assets/images/grid.jpg',
					'name' => __( 'Grid Layout', 'seo-digital-marketing' )
				)
			)
		)
	) );
	$wp_customize->add_setting( 'seo_digital_marketing_grid_column',
		array(
			'default' => '3_column',
			'transport' => 'refresh',
			'sanitize_callback' => 'seo_digital_marketing_sanitize_choices'
		)
	);
	$wp_customize->add_control( new SEO_Digital_Marketing_Text_Radio_Button_Custom_Control( $wp_customize, 'seo_digital_marketing_grid_column',
		array(
			'type' => 'select',
			'label' => esc_html__('Grid Post Per Row','seo-digital-marketing'),
			'section' => 'seo_digital_marketing_archieve_post_layot',
			'choices' => array(
				'1_column' => __('1','seo-digital-marketing'),
	            '2_column' => __('2','seo-digital-marketing'),
	            '3_column' => __('3','seo-digital-marketing'),
	            '4_column' => __('4','seo-digital-marketing'),
			)
		)
	) );
	$wp_customize->add_setting('archieve_post_order', array(
        'default' => array('title', 'image', 'meta','excerpt','btn'),
        'sanitize_callback' => 'seo_digital_marketing_sanitize_sortable',
    ));
    $wp_customize->add_control(new SEO_Digital_Marketing_Control_Sortable($wp_customize, 'archieve_post_order', array(
    	'label' => esc_html__('Post Order', 'seo-digital-marketing'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'seo-digital-marketing') ,
        'section' => 'seo_digital_marketing_archieve_post_layot',
        'choices' => array(
            'title' => __('title', 'seo-digital-marketing') ,
            'image' => __('media', 'seo-digital-marketing') ,
            'meta' => __('meta', 'seo-digital-marketing') ,
            'excerpt' => __('excerpt', 'seo-digital-marketing') ,
            'btn' => __('Read more', 'seo-digital-marketing') ,
        ) ,
    )));
	$wp_customize->add_setting('seo_digital_marketing_post_excerpt',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'seo_digital_marketing_sanitize_integer'
	));
	$wp_customize->add_control(new SEO_Digital_Marketing_Slider_Custom_Control( $wp_customize, 'seo_digital_marketing_post_excerpt',array(
		'label' => esc_html__( 'Excerpt Limit','seo-digital-marketing' ),
		'section'=> 'seo_digital_marketing_archieve_post_layot',
		'settings'=>'seo_digital_marketing_post_excerpt',
		'input_attrs' => array(
			'reset'			   => 30,
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
	$wp_customize->add_setting('seo_digital_marketing_read_more_text',array(
		'default' => 'Read More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('seo_digital_marketing_read_more_text',array(
		'label' => esc_html__('Read More Text','seo-digital-marketing'),
		'section' => 'seo_digital_marketing_archieve_post_layot',
		'setting' => 'seo_digital_marketing_read_more_text',
		'type'    => 'text'
	));
	$wp_customize->add_setting('seo_digital_marketing_read_more_icon',array(
		'default'	=> 'fas fa-arrow-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new SEO_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_read_more_icon',array(
		'label'	=> __('Read More Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_archieve_post_layot',
		'setting'	=> 'seo_digital_marketing_read_more_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('seo_digital_marketing_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new SEO_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_date',
			array(
				'settings'        => 'seo_digital_marketing_date',
				'section'         => 'seo_digital_marketing_archieve_post_layot',
				'label'           => __( 'Show Date', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'seo_digital_marketing_date', array(
		'selector' => '.date-box',
		'render_callback' => 'seo_digital_marketing_customize_partial_seo_digital_marketing_date',
	) );
	$wp_customize->add_setting('seo_digital_marketing_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new SEO_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_date_icon',array(
		'label'	=> __('date Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_archieve_post_layot',
		'setting'	=> 'seo_digital_marketing_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('seo_digital_marketing_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new SEO_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_admin',
			array(
				'settings'        => 'seo_digital_marketing_admin',
				'section'         => 'seo_digital_marketing_archieve_post_layot',
				'label'           => __( 'Show Author/Admin', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'seo_digital_marketing_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'seo_digital_marketing_customize_partial_seo_digital_marketing_admin',
	) );
	$wp_customize->add_setting('seo_digital_marketing_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new SEO_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_author_icon',array(
		'label'	=> __('Author Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_archieve_post_layot',
		'setting'	=> 'seo_digital_marketing_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('seo_digital_marketing_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new SEO_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_comment',
			array(
				'settings'        => 'seo_digital_marketing_comment',
				'section'         => 'seo_digital_marketing_archieve_post_layot',
				'label'           => __( 'Show Comment', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'seo_digital_marketing_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'seo_digital_marketing_customize_partial_seo_digital_marketing_comment',
	) );
	$wp_customize->add_setting('seo_digital_marketing_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new SEO_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_comment_icon',array(
		'label'	=> __('comment Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_archieve_post_layot',
		'setting'	=> 'seo_digital_marketing_comment_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('seo_digital_marketing_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new SEO_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_tag',
			array(
				'settings'        => 'seo_digital_marketing_tag',
				'section'         => 'seo_digital_marketing_archieve_post_layot',
				'label'           => __( 'Show tag count', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'seo_digital_marketing_tag', array(
		'selector' => '.tags',
		'render_callback' => 'seo_digital_marketing_customize_partial_seo_digital_marketing_tag',
	) );
	$wp_customize->add_setting('seo_digital_marketing_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new SEO_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_tag_icon',array(
		'label'	=> __('tag Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_archieve_post_layot',
		'setting'	=> 'seo_digital_marketing_tag_icon',
		'type'		=> 'icon'
	)));

	// header-image
	$wp_customize->add_setting( 'seo_digital_marketing_section_header_image_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_header_image_heading', array(
		'label'       => esc_html__( 'Header Image Settings', 'seo-digital-marketing' ),
		'section'     => 'header_image',
		'settings'    => 'seo_digital_marketing_section_header_image_heading',
		'priority'    =>'1',
	) ) );

	$wp_customize->add_setting('seo_digital_marketing_show_header_image',array(
        'default' => 'on',
        'sanitize_callback' => 'seo_digital_marketing_sanitize_choices'
	));
	$wp_customize->add_control('seo_digital_marketing_show_header_image',array(
        'type' => 'select',
        'label' => __('Select Option','seo-digital-marketing'),
        'section' => 'header_image',
        'choices' => array(
            'on' => __('With Header Image','seo-digital-marketing'),
            'off' => __('Without Header Image','seo-digital-marketing'),
        ),
	) );

	// breadcrumb
	$wp_customize->add_section('seo_digital_marketing_breadcrumb_settings',array(
        'title' => __('Breadcrumb Settings', 'seo-digital-marketing'),
        'priority' => 4
    ) );
	$wp_customize->add_setting( 'seo_digital_marketing_section_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_breadcrumb_heading', array(
		'label'       => esc_html__( 'Breadcrumb Settings', 'seo-digital-marketing' ),
		'section'     => 'seo_digital_marketing_breadcrumb_settings',
		'settings'    => 'seo_digital_marketing_section_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'seo_digital_marketing_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_enable_breadcrumb',
			array(
				'settings'        => 'seo_digital_marketing_enable_breadcrumb',
				'section'         => 'seo_digital_marketing_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('seo_digital_marketing_breadcrumb_separator', array(
        'default' => ' / ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seo_digital_marketing_breadcrumb_separator', array(
        'label' => __('Breadcrumb Separator', 'seo-digital-marketing'),
        'section' => 'seo_digital_marketing_breadcrumb_settings',
        'type' => 'text',
    ));
	$wp_customize->add_setting( 'seo_digital_marketing_single_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new SEO_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_single_breadcrumb_heading', array(
		'label'       => esc_html__( 'Single post & Page', 'seo-digital-marketing' ),
		'section'     => 'seo_digital_marketing_breadcrumb_settings',
		'settings'    => 'seo_digital_marketing_single_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'seo_digital_marketing_single_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new SEO_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_single_enable_breadcrumb',
			array(
				'settings'        => 'seo_digital_marketing_single_enable_breadcrumb',
				'section'         => 'seo_digital_marketing_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_setting( 'seo_digital_marketing_woocommerce_breadcrumb_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new SEO_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_woocommerce_breadcrumb_heading', array(
			'label'       => esc_html__( 'Woocommerce Breadcrumb', 'seo-digital-marketing' ),
			'section'     => 'seo_digital_marketing_breadcrumb_settings',
			'settings'    => 'seo_digital_marketing_woocommerce_breadcrumb_heading',
		) ) );
		$wp_customize->add_setting(
			'seo_digital_marketing_woocommerce_enable_breadcrumb',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(
			new SEO_Digital_Marketing_Customizer_Customcontrol_Switch(
				$wp_customize,
				'seo_digital_marketing_woocommerce_enable_breadcrumb',
				array(
					'settings'        => 'seo_digital_marketing_woocommerce_enable_breadcrumb',
					'section'         => 'seo_digital_marketing_breadcrumb_settings',
					'label'           => __( 'Show Breadcrumb', 'seo-digital-marketing' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'seo-digital-marketing' ),
						'off'    => __( 'Off', 'seo-digital-marketing' ),
					),
					'active_callback' => '',
				)
			)
		);
		$wp_customize->add_setting('woocommerce_breadcrumb_separator', array(
	        'default' => ' / ',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('woocommerce_breadcrumb_separator', array(
	        'label' => __('Breadcrumb Separator', 'seo-digital-marketing'),
	        'section' => 'seo_digital_marketing_breadcrumb_settings',
	        'type' => 'text',
	    ));
	}

	// woocommerce
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_section('seo_digital_marketing_woocommerce_settings',array(
	        'title' => __('WooCommerce Settings', 'seo-digital-marketing'), 
	        'priority'=> 4,       
	    ) );
		$wp_customize->add_setting( 'seo_digital_marketing_section_shoppage_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_shoppage_heading', array(
			'label'       => esc_html__( 'Sidebar Settings', 'seo-digital-marketing' ),
			'section'     => 'seo_digital_marketing_woocommerce_settings',
			'settings'    => 'seo_digital_marketing_section_shoppage_heading',
		) ) );
		$wp_customize->add_setting( 'seo_digital_marketing_shop_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new SEO_Digital_Marketing_Radio_Image_Control( $wp_customize, 'seo_digital_marketing_shop_page_sidebar',
			array(
				'type'=>'select',
				'label' => __( 'Show Shop Page Sidebar', 'seo-digital-marketing' ),
				'section'     => 'seo_digital_marketing_woocommerce_settings',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'seo-digital-marketing' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'seo-digital-marketing' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'seo-digital-marketing' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'seo_digital_marketing_wocommerce_single_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new SEO_Digital_Marketing_Radio_Image_Control( $wp_customize, 'seo_digital_marketing_wocommerce_single_page_sidebar',
			array(
				'type'=>'select',
				'label'           => __( 'Show Single Product Page Sidebar', 'seo-digital-marketing' ),
				'section'     => 'seo_digital_marketing_woocommerce_settings',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'seo-digital-marketing' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'seo-digital-marketing' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'seo-digital-marketing' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'seo_digital_marketing_section_archieve_product_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_archieve_product_heading', array(
			'label'       => esc_html__( 'Archieve Product Settings', 'seo-digital-marketing' ),
			'section'     => 'seo_digital_marketing_woocommerce_settings',
			'settings'    => 'seo_digital_marketing_section_archieve_product_heading',
		) ) );
		$wp_customize->add_setting('seo_digital_marketing_archieve_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'seo_digital_marketing_sanitize_choices'
		));
		$wp_customize->add_control('seo_digital_marketing_archieve_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','seo-digital-marketing'),
	        'section' => 'seo_digital_marketing_woocommerce_settings',
	        'choices' => array(
	            '1' => __('One Column','seo-digital-marketing'),
	            '2' => __('Two Column','seo-digital-marketing'),
	            '3' => __('Three Column','seo-digital-marketing'),
	            '4' => __('four Column','seo-digital-marketing'),
	            '5' => __('Five Column','seo-digital-marketing'),
	            '6' => __('Six Column','seo-digital-marketing'),
	        ),
		) );
		$wp_customize->add_setting( 'seo_digital_marketing_archieve_shop_perpage', array(
			'default'              => 6,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'seo_digital_marketing_archieve_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','seo-digital-marketing' ),
			'section'     => 'seo_digital_marketing_woocommerce_settings',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 30,
			),
		) );
		$wp_customize->add_setting( 'seo_digital_marketing_section_related_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_related_heading', array(
			'label'       => esc_html__( 'Related Product Settings', 'seo-digital-marketing' ),
			'section'     => 'seo_digital_marketing_woocommerce_settings',
			'settings'    => 'seo_digital_marketing_section_related_heading',
		) ) );
		$wp_customize->add_setting('woocommerce_related_products_heading', array(
	        'default' => 'Related products',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('woocommerce_related_products_heading', array(
	        'label' => __('Related Products Heading', 'seo-digital-marketing'),
	        'section' => 'seo_digital_marketing_woocommerce_settings',
	        'type' => 'text',
	    ));
		$wp_customize->add_setting('seo_digital_marketing_related_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'seo_digital_marketing_sanitize_choices'
		));
		$wp_customize->add_control('seo_digital_marketing_related_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','seo-digital-marketing'),
	        'section' => 'seo_digital_marketing_woocommerce_settings',
	        'choices' => array(
	            '1' => __('One Column','seo-digital-marketing'),
	            '2' => __('Two Column','seo-digital-marketing'),
	            '3' => __('Three Column','seo-digital-marketing'),
	            '4' => __('four Column','seo-digital-marketing'),
	            '5' => __('Five Column','seo-digital-marketing'),
	            '6' => __('Six Column','seo-digital-marketing'),
	        ),
		) );
		$wp_customize->add_setting( 'seo_digital_marketing_related_shop_perpage', array(
			'default'              => 3,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'seo_digital_marketing_related_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','seo-digital-marketing' ),
			'section'     => 'seo_digital_marketing_woocommerce_settings',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 10,
			),
		) );
		$wp_customize->add_setting(
			'seo_digital_marketing_related_product',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(new Seo_Digital_Marketing_Customizer_Customcontrol_Switch($wp_customize,'seo_digital_marketing_related_product',
			array(
				'settings'        => 'seo_digital_marketing_related_product',
				'section'         => 'seo_digital_marketing_woocommerce_settings',
				'label'           => __( 'Show Related Products', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		));
	}
	// mobile width
	$wp_customize->add_section('seo_digital_marketing_mobile_options',array(
        'title' => __('Mobile Media settings', 'seo-digital-marketing'),
        'priority' => 4,
    ) );
    $wp_customize->add_setting( 'seo_digital_marketing_section_mobile_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_mobile_heading', array(
		'label'       => esc_html__( 'Mobile Media settings', 'seo-digital-marketing' ),
		'section'     => 'seo_digital_marketing_mobile_options',
		'settings'    => 'seo_digital_marketing_section_mobile_heading',
	) ) );
	$wp_customize->add_setting(
		'seo_digital_marketing_slider_button_mobile_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_slider_button_mobile_show_hide',
			array(
				'settings'        => 'seo_digital_marketing_slider_button_mobile_show_hide',
				'section'         => 'seo_digital_marketing_mobile_options',
				'label'           => __( 'Show Slider Button', 'seo-digital-marketing' ),
				'description' => __('Control wont function if the button is off in the main slider settings.', 'seo-digital-marketing') ,			
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'seo_digital_marketing_scroll_enable_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_scroll_enable_mobile',
			array(
				'settings'        => 'seo_digital_marketing_scroll_enable_mobile',
				'section'         => 'seo_digital_marketing_mobile_options',
				'label'           => __( 'Show Scroll Top', 'seo-digital-marketing' ),
				'description' => __('Control wont function if scroll-top is off in the main settings.', 'seo-digital-marketing') ,				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'seo_digital_marketing_section_mobile_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_mobile_breadcrumb_heading', array(
		'label'       => esc_html__( 'Mobile Breadcrumb settings', 'seo-digital-marketing' ),
		'description' => __('Controls wont function if the breadcrumb is off in the main breadcrumb settings.', 'seo-digital-marketing') ,
		'section'     => 'seo_digital_marketing_mobile_options',
		'settings'    => 'seo_digital_marketing_section_mobile_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'seo_digital_marketing_enable_breadcrumb_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_enable_breadcrumb_mobile',
			array(
				'settings'        => 'seo_digital_marketing_enable_breadcrumb_mobile',
				'section'         => 'seo_digital_marketing_mobile_options',
				'label'           => __( 'Theme Breadcrumb', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'seo_digital_marketing_single_enable_breadcrumb_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_single_enable_breadcrumb_mobile',
			array(
				'settings'        => 'seo_digital_marketing_single_enable_breadcrumb_mobile',
				'section'         => 'seo_digital_marketing_mobile_options',
				'label'           => __( 'Single Post & Page', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) {
		$wp_customize->add_setting(
			'seo_digital_marketing_woocommerce_enable_breadcrumb_mobile',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(
			new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
				$wp_customize,
				'seo_digital_marketing_woocommerce_enable_breadcrumb_mobile',
				array(
					'settings'        => 'seo_digital_marketing_woocommerce_enable_breadcrumb_mobile',
					'section'         => 'seo_digital_marketing_mobile_options',
					'label'           => __( 'wooCommerce Breadcrumb', 'seo-digital-marketing' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'seo-digital-marketing' ),
						'off'    => __( 'Off', 'seo-digital-marketing' ),
					),
					'active_callback' => '',
				)
			)
		);
	}

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'seo_digital_marketing_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'seo_digital_marketing_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'seo_digital_marketing_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'seo_digital_marketing_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'seo-digital-marketing' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'seo-digital-marketing' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'seo_digital_marketing_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'seo_digital_marketing_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'seo_digital_marketing_customize_register' );

function seo_digital_marketing_customize_partial_blogname() {
	bloginfo( 'name' );
}
function seo_digital_marketing_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function seo_digital_marketing_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function seo_digital_marketing_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('SEO_DIGITAL_MARKETING_PRO_LINK',__('https://www.ovationthemes.com/wordpress/digital-marketing-wordpress-theme/','seo-digital-marketing'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('SEO_Digital_Marketing_Pro_Control')):
    class SEO_Digital_Marketing_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( SEO_DIGITAL_MARKETING_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE SEO MARKETING PREMIUM','seo-digital-marketing');?> </a>
	        </div>
            <div class="col-md">
                <img class="seo_digital_marketing_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('SEO MARKETING PREMIUM - Features', 'seo-digital-marketing'); ?></h3>
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
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( SEO_DIGITAL_MARKETING_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE SEO MARKETING PREMIUM','seo-digital-marketing');?> </a>
		    </div>
        </label>
    <?php } }
endif;
