<?php

function sobre_lite_customize_sections_register( $wp_customize ) {
	$wp_customize->add_section( 'global_settings' , array(
		'title' => esc_html__( 'Global settings', 'sobre-lite' ),
		'priority' => 5,
	) );
	$wp_customize->add_section( 'header_settings' , array(
		'title' => esc_html__( 'Header settings', 'sobre-lite' ),
		'priority' => 6, // Before Widgets.
	) );
	$wp_customize->add_section( 'blog_settings' , array(
		'title' => esc_html__( 'Blog settings', 'sobre-lite' ),
		'priority' => 7, // Before Widgets.
	) );
	$wp_customize->add_section( 'social_settings' , array(
		'title' => esc_html__( 'Social settings', 'sobre-lite' ),
		'priority' => 8, // Before Widgets.
	) );
	$wp_customize->add_section( 'footer_settings' , array(
		'title' => esc_html__( 'Footer settings', 'sobre-lite' ),
		'priority' => 9, // Before Widgets.
	) );
	$wp_customize->add_section( 'error_page_settings' , array(
		'title' => esc_html__( 'Error page settings', 'sobre-lite' ),
		'priority' => 10, // Before Widgets.
	) );

}
add_action( 'customize_register', 'sobre_lite_customize_sections_register' );