<?php

function sobre_lite_customize_controls_register( $wp_customize ) {

	/**
	 * Global controls
	 */
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'preloader_display',
			array(
				'section'  => 'global_settings',
				'label' => esc_html__( 'Preloader', 'sobre-lite' ),
				'type'     => 'radio',
				'settings'   => 'preloader_display',
				'choices'  => array(
					'enable'  => 'Enable',
					'disable' => 'Disable',
				)
			)
		)
	);

	/**
	 * Blog settings
	 */
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'blog_heading_image',
			array(
				'label'      => esc_html__( 'Front Page BG', 'sobre-lite' ),
				'section'    => 'blog_settings',
				'settings'   => 'blog_heading_image',
				'type'       => 'upload'

			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'archive_heading_image',
			array(
				'label'      => esc_html__( 'Archive BG', 'sobre-lite' ),
				'section'    => 'blog_settings',
				'settings'   => 'archive_heading_image',
				'type'       => 'upload'

			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'search_heading_image',
			array(
				'label'      => esc_html__( 'Search BG', 'sobre-lite' ),
				'section'    => 'blog_settings',
				'settings'   => 'search_heading_image',
				'type'       => 'upload'

			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_heading',
			array(
				'section'  => 'blog_settings',
				'label' => esc_html__( 'Heading', 'sobre-lite' ),
				'type'     => 'text',
				'settings'   => 'blog_heading',

			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_description',
			array(
				'section'  => 'blog_settings',
				'label' => esc_html__( 'Description', 'sobre-lite' ),
				'type'     => 'text',
				'settings'   => 'blog_description',

			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_nav_type',
			array(
				'section'  => 'blog_settings',
				'label' => esc_html__( 'Blog Navigation', 'sobre-lite' ),
				'type'     => 'radio',
				'settings'   => 'blog_nav_type',
				'choices'  => array(
					'ajax'  => 'Ajax',
					'standart' => 'Standart',
				)
			)
		)
	);

	/**
	 * Social profile settings controls
	 */
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'social_links_display',
			array(
				'section'  => 'social_settings',
				'label' => esc_html__( 'Display Settings', 'sobre-lite' ),
				'type'     => 'radio',
				'settings'   => 'social_links_display',
				'choices'  => array(
					'enable'  => 'Enable',
					'disable' => 'Disable',
				)
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'social_links_instagram',
			array(
				'section'  => 'social_settings',
				'label' => esc_html__( 'Instagram', 'sobre-lite' ),
				'type'     => 'text',
				'settings'   => 'social_links_instagram',

			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'social_links_facebook',
			array(
				'section'  => 'social_settings',
				'label' => esc_html__( 'Facebook', 'sobre-lite' ),
				'type'     => 'text',
				'settings'   => 'social_links_facebook',

			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'social_links_twitter',
			array(
				'section'  => 'social_settings',
				'label' => esc_html__( 'Twitter', 'sobre-lite' ),
				'type'     => 'text',
				'settings'   => 'social_links_twitter',

			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'social_links_vimeo',
			array(
				'section'  => 'social_settings',
				'label' => esc_html__( 'Vimeo', 'sobre-lite' ),
				'type'     => 'text',
				'settings'   => 'social_links_vimeo',

			)
		)
	);


	/**
	 * Footer Settings controls
	 */
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_copyright',
			array(
				'section'  => 'footer_settings',
				'label' => esc_html__( 'Copyright', 'sobre-lite' ),
				'type'     => 'text',
				'settings'   => 'footer_copyright',

			)
		)
	);


	/**
	 * 404 Page Settings controls
	 */
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'error_page_heading_bg',
			array(
				'label'      => esc_html__( 'Error Page Heading Image BG', 'sobre-lite' ),
				'section'    => 'error_page_settings',
				'settings'   => 'error_page_heading_bg',
				'type'       => 'upload'

			)
		)
	);

}
add_action( 'customize_register', 'sobre_lite_customize_controls_register' );
