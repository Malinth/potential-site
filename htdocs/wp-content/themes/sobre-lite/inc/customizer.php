<?php
/**
 * Sobre Theme Customizer
 *
 * @package Sobre Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

require get_template_directory() . '/inc/customizer/sections.php';
require get_template_directory() . '/inc/customizer/sanitization.php';
require get_template_directory() . '/inc/customizer/settings.php';
require get_template_directory() . '/inc/customizer/controls.php';
