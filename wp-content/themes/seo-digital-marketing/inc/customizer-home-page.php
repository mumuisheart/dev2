<?php
/**
 * SEO Digital Marketing: Customizer-home-page
 *
 * @subpackage SEO Digital Marketing
 * @since 1.0
 */

	//  Home Page Panel
	$wp_customize->add_panel( 'seo_digital_marketing_custompage_panel', array(
		'title' => esc_html__( 'Custom Page Settings', 'seo-digital-marketing' ),
		'priority' => 2,
	));
	// Top Header
    $wp_customize->add_section('seo_digital_marketing_top',array(
        'title' => __('Header Settings', 'seo-digital-marketing'),
        'panel' => 'seo_digital_marketing_custompage_panel',
    ) );
    $wp_customize->add_setting( 'seo_digital_marketing_section_contact_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_contact_heading', array(
		'label'       => esc_html__( 'header Settings', 'seo-digital-marketing' ),		
		'section'     => 'seo_digital_marketing_top',
		'settings'    => 'seo_digital_marketing_section_contact_heading',
	) ) );
    $wp_customize->add_setting('seo_digital_marketing_call_number',array(
		'default' => '',
		'sanitize_callback' => 'seo_digital_marketing_sanitize_phone_number'
	));
	$wp_customize->add_control('seo_digital_marketing_call_number',array(
		'label' => esc_html__('Add Phone Number','seo-digital-marketing'),
		'section' => 'seo_digital_marketing_top',
		'setting' => 'seo_digital_marketing_call_number',
		'type'    => 'text'
	));
	$wp_customize->add_setting('seo_digital_marketing_call_icon',array(
		'default'	=> 'fas fa-phone-volume',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Seo_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_call_icon',array(
		'label'	=> __('Add call Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_top',
		'setting'	=> 'seo_digital_marketing_call_icon',
		'type'		=> 'icon'
	)));
    $wp_customize->add_setting('seo_digital_marketing_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	));
	$wp_customize->add_control('seo_digital_marketing_email_address',array(
		'label' => esc_html__('Add Email Address','seo-digital-marketing'),
		'section' => 'seo_digital_marketing_top',
		'setting' => 'seo_digital_marketing_email_address',
		'type'    => 'text'
	));
	$wp_customize->add_setting('seo_digital_marketing_email_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Seo_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_email_icon',array(
		'label'	=> __('Add email Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_top',
		'setting'	=> 'seo_digital_marketing_email_icon',
		'type'		=> 'icon'
	)));
    $wp_customize->add_setting('seo_digital_marketing_talk_btn_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('seo_digital_marketing_talk_btn_text',array(
		'label' => esc_html__('Add Button Text','seo-digital-marketing'),
		'section' => 'seo_digital_marketing_top',
		'setting' => 'seo_digital_marketing_talk_btn_text',
		'type'    => 'text'
	));
    $wp_customize->add_setting('seo_digital_marketing_talk_btn_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('seo_digital_marketing_talk_btn_link',array(
		'label' => esc_html__('Add Button URL','seo-digital-marketing'),
		'section' => 'seo_digital_marketing_top',
		'setting' => 'seo_digital_marketing_talk_btn_link',
		'type'    => 'url'
	));

	// Social Media
    $wp_customize->add_section('seo_digital_marketing_urls',array(
        'title' => __('Social Media', 'seo-digital-marketing'),
        'panel' => 'seo_digital_marketing_custompage_panel',
    ) );
	$wp_customize->add_setting( 'seo_digital_marketing_section_social_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_social_heading', array(
		'label'       => esc_html__( 'Social Media Settings', 'seo-digital-marketing' ),
		'description' => __( 'Add social media links in the below feilds', 'seo-digital-marketing' ),			
		'section'     => 'seo_digital_marketing_urls',
		'settings'    => 'seo_digital_marketing_section_social_heading',
	) ) );
	$wp_customize->add_setting(
		'header_social_icon_enable',
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
			'header_social_icon_enable',
			array(
				'settings'        => 'header_social_icon_enable',
				'section'         => 'seo_digital_marketing_urls',
				'label'           => __( 'Check to show social fields', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'seo_digital_marketing_section_twitter_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_twitter_heading', array(
		'label'       => esc_html__( 'Twitter Settings', 'seo-digital-marketing' ),			
		'section'     => 'seo_digital_marketing_urls',
		'settings'    => 'seo_digital_marketing_section_twitter_heading',
	) ) );
    $wp_customize->add_setting('seo_digital_marketing_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Seo_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_twitter_icon',array(
		'label'	=> __('Add Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_urls',
		'setting'	=> 'seo_digital_marketing_twitter_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('seo_digital_marketing_twitter',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('seo_digital_marketing_twitter',array(
		'label' => esc_html__('Add URL','seo-digital-marketing'),
		'section' => 'seo_digital_marketing_urls',
		'setting' => 'seo_digital_marketing_twitter',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'seo_digital_marketing_header_twt_target',
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
			'seo_digital_marketing_header_twt_target',
			array(
				'settings'        => 'seo_digital_marketing_header_twt_target',
				'section'         => 'seo_digital_marketing_urls',
				'label'           => __( 'Open link in a new tab', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'seo_digital_marketing_section_linkedin_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_linkedin_heading', array(
		'label'       => esc_html__( 'Linkedin Settings', 'seo-digital-marketing' ),			
		'section'     => 'seo_digital_marketing_urls',
		'settings'    => 'seo_digital_marketing_section_linkedin_heading',
	) ) );
	$wp_customize->add_setting('seo_digital_marketing_linkedin_icon',array(
		'default'	=> 'fab fa-linkedin',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Seo_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_linkedin_icon',array(
		'label'	=> __('Add Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_urls',
		'setting'	=> 'seo_digital_marketing_linkedin_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('seo_digital_marketing_linkedin',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('seo_digital_marketing_linkedin',array(
		'label' => esc_html__('Add URL','seo-digital-marketing'),
		'section' => 'seo_digital_marketing_urls',
		'setting' => 'seo_digital_marketing_linkedin',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'seo_digital_marketing_header_linkedin_target',
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
			'seo_digital_marketing_header_linkedin_target',
			array(
				'settings'        => 'seo_digital_marketing_header_linkedin_target',
				'section'         => 'seo_digital_marketing_urls',
				'label'           => __( 'Open link in a new tab', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'seo_digital_marketing_section_youtube_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_youtube_heading', array(
		'label'       => esc_html__( 'Youtube Settings', 'seo-digital-marketing' ),			
		'section'     => 'seo_digital_marketing_urls',
		'settings'    => 'seo_digital_marketing_section_youtube_heading',
	) ) );
	$wp_customize->add_setting('seo_digital_marketing_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Seo_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_youtube_icon',array(
		'label'	=> __('Add Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_urls',
		'setting'	=> 'seo_digital_marketing_youtube_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('seo_digital_marketing_youtube',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('seo_digital_marketing_youtube',array(
		'label' => esc_html__('Add URL','seo-digital-marketing'),
		'section' => 'seo_digital_marketing_urls',
		'setting' => 'seo_digital_marketing_youtube',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'seo_digital_marketing_header_youtube_target',
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
			'seo_digital_marketing_header_youtube_target',
			array(
				'settings'        => 'seo_digital_marketing_header_youtube_target',
				'section'         => 'seo_digital_marketing_urls',
				'label'           => __( 'Open link in a new tab', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'seo_digital_marketing_section_instagram_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_instagram_heading', array(
		'label'       => esc_html__( 'Instagram Settings', 'seo-digital-marketing' ),			
		'section'     => 'seo_digital_marketing_urls',
		'settings'    => 'seo_digital_marketing_section_instagram_heading',
	) ) );
	$wp_customize->add_setting('seo_digital_marketing_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Seo_Digital_Marketing_Fontawesome_Icon_Chooser(
        $wp_customize,'seo_digital_marketing_instagram_icon',array(
		'label'	=> __('Add Icon','seo-digital-marketing'),
		'transport' => 'refresh',
		'section'	=> 'seo_digital_marketing_urls',
		'setting'	=> 'seo_digital_marketing_instagram_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('seo_digital_marketing_instagram',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('seo_digital_marketing_instagram',array(
		'label' => esc_html__('Add URL','seo-digital-marketing'),
		'section' => 'seo_digital_marketing_urls',
		'setting' => 'seo_digital_marketing_instagram',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'seo_digital_marketing_header_instagram_target',
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
			'seo_digital_marketing_header_instagram_target',
			array(
				'settings'        => 'seo_digital_marketing_header_instagram_target',
				'section'         => 'seo_digital_marketing_urls',
				'label'           => __( 'Open link in a new tab', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);

    //Slider
	$wp_customize->add_section( 'seo_digital_marketing_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'seo-digital-marketing' ),
		'panel' => 'seo_digital_marketing_custompage_panel',
	) );
	$wp_customize->add_setting( 'seo_digital_marketing_section_slide_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_slide_heading', array(
		'label'       => esc_html__( 'Slider Settings', 'seo-digital-marketing' ),
		'description' => __( 'Slider Image Dimension ( 600px x 700px )', 'seo-digital-marketing' ),		
		'section'     => 'seo_digital_marketing_slider_section',
		'settings'    => 'seo_digital_marketing_section_slide_heading',
	) ) );
	$wp_customize->add_setting(
		'seo_digital_marketing_hide_show',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_hide_show',
			array(
				'settings'        => 'seo_digital_marketing_hide_show',
				'section'         => 'seo_digital_marketing_slider_section',
				'label'           => __( 'Check To Show Slider', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$pst_sls[]= __('Select','seo-digital-marketing');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('seo_digital_marketing_post_setting'.$i,array(
			'sanitize_callback' => 'seo_digital_marketing_sanitize_select',
		));
		$wp_customize->add_control('seo_digital_marketing_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','seo-digital-marketing'),
			'section' => 'seo_digital_marketing_slider_section',
			'active_callback' => 'seo_digital_marketing_slider_dropdown',
		));
	}
	wp_reset_postdata();

	$wp_customize->add_setting(
		'seo_digital_marketing_slider_excerpt_show_hide',
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
			'seo_digital_marketing_slider_excerpt_show_hide',
			array(
				'settings'        => 'seo_digital_marketing_slider_excerpt_show_hide',
				'section'         => 'seo_digital_marketing_slider_section',
				'label'           => __( 'Show Hide excerpt', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => 'seo_digital_marketing_slider_dropdown',
			)
		)
	);
	$wp_customize->add_setting('seo_digital_marketing_slider_excerpt_count',array(
		'default'=> 25,
		'transport' => 'refresh',
		'sanitize_callback' => 'seo_digital_marketing_sanitize_integer'
	));
	$wp_customize->add_control(new Seo_Digital_Marketing_Slider_Custom_Control( $wp_customize, 'seo_digital_marketing_slider_excerpt_count',array(
		'label' => esc_html__( 'Excerpt Limit','seo-digital-marketing' ),
		'section'=> 'seo_digital_marketing_slider_section',
		'settings'=>'seo_digital_marketing_slider_excerpt_count',
		'input_attrs' => array(
			'reset'			   => 25,
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'active_callback' => 'seo_digital_marketing_slider_dropdown',
	)));
	$wp_customize->add_setting(
		'seo_digital_marketing_slider_button_show_hide',
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
			'seo_digital_marketing_slider_button_show_hide',
			array(
				'settings'        => 'seo_digital_marketing_slider_button_show_hide',
				'section'         => 'seo_digital_marketing_slider_section',
				'label'           => __( 'Show Hide Button', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => 'seo_digital_marketing_slider_dropdown',
			)
		)
	);
	$wp_customize->add_setting('seo_digital_marketing_slider_read_more',array(
		'default' => 'READ MORE',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('seo_digital_marketing_slider_read_more',array(
		'label' => esc_html__('Button Text','seo-digital-marketing'),
		'section' => 'seo_digital_marketing_slider_section',
		'setting' => 'seo_digital_marketing_slider_read_more',
		'type'    => 'text',
		'active_callback' => 'seo_digital_marketing_slider_dropdown',
	));

	$wp_customize->add_setting( 'seo_digital_marketing_slider_content_alignment',
		array(
			'default' => 'LEFT-ALIGN',
			'transport' => 'refresh',
			'sanitize_callback' => 'seo_digital_marketing_sanitize_choices'
		)
	);
	$wp_customize->add_control( new SEO_Digital_Marketing_Text_Radio_Button_Custom_Control( $wp_customize, 'seo_digital_marketing_slider_content_alignment',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Slider Content Alignment', 'seo-digital-marketing' ),
			'section' => 'seo_digital_marketing_slider_section',
			'choices' => array(
				'LEFT-ALIGN' => __('LEFT','seo-digital-marketing'),
	            'CENTER-ALIGN' => __('CENTER','seo-digital-marketing'),
	            'RIGHT-ALIGN' => __('RIGHT','seo-digital-marketing'),
			),
			'active_callback' => 'seo_digital_marketing_slider_dropdown',
		)
	) );

	// Skills Section
	$wp_customize->add_section( 'seo_digital_marketing_skill_section' , array(
    	'title'      => __( 'Skills Section Settings', 'seo-digital-marketing' ),
		'panel' => 'seo_digital_marketing_custompage_panel',
	) );
	$wp_customize->add_setting( 'seo_digital_marketing_section_skill_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_skill_heading', array(
		'label'       => esc_html__( 'Skills Section Settings', 'seo-digital-marketing' ),	
		'section'     => 'seo_digital_marketing_skill_section',
		'settings'    => 'seo_digital_marketing_section_skill_heading',
	) ) );
	$wp_customize->add_setting('seo_digital_marketing_skill_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'seo_digital_marketing_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Seo_Digital_Marketing_Customizer_Customcontrol_Switch(
			$wp_customize,
			'seo_digital_marketing_skill_enable',
			array(
				'settings'        => 'seo_digital_marketing_skill_enable',
				'section'         => 'seo_digital_marketing_skill_section',
				'label'           => __( 'Check To Show Section', 'seo-digital-marketing' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'seo-digital-marketing' ),
					'off'    => __( 'Off', 'seo-digital-marketing' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('seo_digital_marketing_skill_increament',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('seo_digital_marketing_skill_increament',array(
		'label'	=> esc_html__('skill Box Increament','seo-digital-marketing'),
		'section'	=> 'seo_digital_marketing_skill_section',
		'type'		=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 8,
		),
		'active_callback' => 'seo_digital_marketing_skill_dropdown',
	));
	$skill = get_theme_mod('seo_digital_marketing_skill_increament');
	for ($i=1; $i <= $skill ; $i++) {

		$wp_customize->add_setting('seo_digital_marketing_skill_box_icon'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('seo_digital_marketing_skill_box_icon'.$i,array(
			'label'	=> esc_html__('Icon ','seo-digital-marketing').$i,
			'input_attrs' => array(
            	'placeholder' => __( 'Ex: fas fa-server','seo-digital-marketing' ),
        	),
			'section'	=> 'seo_digital_marketing_skill_section',
			'type'		=> 'text',
			'active_callback' => 'seo_digital_marketing_skill_dropdown',
		));
		$wp_customize->add_setting('seo_digital_marketing_skill_box_number'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('seo_digital_marketing_skill_box_number'.$i,array(
			'label'	=> esc_html__('Title ','seo-digital-marketing').$i,
			'section'	=> 'seo_digital_marketing_skill_section',
			'type'		=> 'text',
			'active_callback' => 'seo_digital_marketing_skill_dropdown',
		));
		$wp_customize->add_setting('seo_digital_marketing_skill_box_title'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('seo_digital_marketing_skill_box_title'.$i,array(
			'label'	=> esc_html__('Text ','seo-digital-marketing').$i,
			'section'	=> 'seo_digital_marketing_skill_section',
			'type'		=> 'text',
			'active_callback' => 'seo_digital_marketing_skill_dropdown',
		));
	    $wp_customize->add_setting( 'seo_digital_marketing_skill_box_image'.$i, array(
	        'default' => '',
	        'sanitize_callback' => 'esc_url_raw'
	    ));
	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'seo_digital_marketing_skill_box_image'.$i, array(
	        'label' => esc_html__('Upload Image ','seo-digital-marketing').$i,
	        'section' => 'seo_digital_marketing_skill_section',
	        'settings' => 'seo_digital_marketing_skill_box_image'.$i,
	        'active_callback' => 'seo_digital_marketing_skill_dropdown',
	    )));
	}

	//Footer
    $wp_customize->add_section( 'seo_digital_marketing_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'seo-digital-marketing' ),
    	'panel' => 'seo_digital_marketing_custompage_panel',
	) );
	$wp_customize->add_setting( 'seo_digital_marketing_section_footer_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Seo_Digital_Marketing_Customizer_Customcontrol_Section_Heading( $wp_customize, 'seo_digital_marketing_section_footer_heading', array(
		'label'       => esc_html__( 'Footer Settings', 'seo-digital-marketing' ),		
		'section'     => 'seo_digital_marketing_footer_copyright',
		'settings'    => 'seo_digital_marketing_section_footer_heading',
	) ) );
    $wp_customize->add_setting('seo_digital_marketing_footer_text',array(
		'default'	=> 'Digital Marketing WordPress Theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('seo_digital_marketing_footer_text',array(
		'label'	=> esc_html__('Copyright Text','seo-digital-marketing'),
		'section'	=> 'seo_digital_marketing_footer_copyright',
		'type'		=> 'textarea'
	));
	$wp_customize->add_setting( 'seo_digital_marketing_footer_content_alignment',
		array(
			'default' => 'CENTER-ALIGN',
			'transport' => 'refresh',
			'sanitize_callback' => 'seo_digital_marketing_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Seo_Digital_Marketing_Text_Radio_Button_Custom_Control( $wp_customize, 'seo_digital_marketing_footer_content_alignment',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Footer Content Alignment', 'seo-digital-marketing' ),
			'section' => 'seo_digital_marketing_footer_copyright',
			'choices' => array(
				'LEFT-ALIGN' => __('LEFT','seo-digital-marketing'),
	            'CENTER-ALIGN' => __('CENTER','seo-digital-marketing'),
	            'RIGHT-ALIGN' => __('RIGHT','seo-digital-marketing'),
			),
			'active_callback' => '',
		)
	) );
	$wp_customize->add_setting( 'seo_digital_marketing_footer_widget',
		array(
			'default' => '4',
			'transport' => 'refresh',
			'sanitize_callback' => 'seo_digital_marketing_sanitize_choices'
		)
	);
	$wp_customize->add_control( new SEO_Digital_Marketing_Text_Radio_Button_Custom_Control( $wp_customize, 'seo_digital_marketing_footer_widget',
		array(
			'type' => 'select',
			'label' => esc_html__('Footer Per Column','seo-digital-marketing'),
			'section' => 'seo_digital_marketing_footer_copyright',
			'choices' => array(
				'1' => __('1','seo-digital-marketing'),
	            '2' => __('2','seo-digital-marketing'),
	            '3' => __('3','seo-digital-marketing'),
	            '4' => __('4','seo-digital-marketing'),
			)
		)
	) );