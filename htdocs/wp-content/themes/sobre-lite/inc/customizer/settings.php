<?php
function sobre_lite_customize_settings_register( $wp_customize ) {
	$transport = 'refresh';

	/**
	 * Global settings
	 */
	$wp_customize->add_setting(
		'preloader_display',
		array(
			'default' => 'enable',
			'type'      => 'theme_mod',
			'transport' => $transport,
			'sanitize_callback' => 'sobre_lite_sanitize_select'
		)
	);


	/**
	 * Blog settings
	 */
	$wp_customize->add_setting(
		'blog_heading_image',
		array(
			'type'      => 'theme_mod',
			'transport' => $transport,
			'sanitize_callback' => 'sobre_lite_sanitize_image'
		)
	);
	$wp_customize->add_setting(
		'archive_heading_image',
		array(
			'type'      => 'theme_mod',
			'transport' => $transport,
			'sanitize_callback' => 'sobre_lite_sanitize_image'
		)
	);
	$wp_customize->add_setting(
		'search_heading_image',
		array(
			'type'      => 'theme_mod',
			'transport' => $transport,
			'sanitize_callback' => 'sobre_lite_sanitize_image'
		)
	);
	$wp_customize->add_setting(
		'blog_nav_type',
		array(
			'default'   => 'ajax',
			'type'      => 'theme_mod',
			'transport' => $transport,
			'sanitize_callback' => 'sobre_lite_sanitize_select'
		)
	);

	/**
	 * Social profile settings
	 */
	$wp_customize->add_setting(
		'social_links_display',
		array(
			'default'   => 'enable',
			'type'      => 'theme_mod',
			'transport' => $transport,
			'sanitize_callback' => 'sobre_lite_sanitize_select'
		)
	);
	$wp_customize->add_setting(
		'social_links_instagram',
		array(
			'type'      => 'theme_mod',
			'transport' => $transport,
			'sanitize_callback' => 'sobre_lite_sanitize_url'
		)
	);
	$wp_customize->add_setting(
		'social_links_facebook',
		array(
			'type'      => 'theme_mod',
			'transport' => $transport,
			'sanitize_callback' => 'sobre_lite_sanitize_url'
		)
	);
	$wp_customize->add_setting(
		'social_links_twitter',
		array(
			'type'      => 'theme_mod',
			'transport' => $transport,
			'sanitize_callback' => 'sobre_lite_sanitize_url'
		)
	);
	$wp_customize->add_setting(
		'social_links_vimeo',
		array(
			'type'      => 'theme_mod',
			'transport' => $transport,
			'sanitize_callback' => 'sobre_lite_sanitize_url'
		)
	);

	/**
	 * Footer settings
	 */
	$wp_customize->add_setting(
		'footer_copyright',
		array(
			'type'      => 'theme_mod',
			'transport' => $transport,
			'sanitize_callback' => 'sobre_lite_sanitize_nohtml'
		)
	);

	/**
	 * Footer settings
	 */
	$wp_customize->add_setting(
		'error_page_heading_bg',
		array(
			'type'      => 'theme_mod',
			'transport' => $transport,
			'sanitize_callback' => 'sobre_lite_sanitize_image'
		)
	);

}
add_action( 'customize_register', 'sobre_lite_customize_settings_register' );


