<?php

function my_theme_enqueue_styles() {

    $parent_style = 'twentyfifteen-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}



add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


function my_scripts_method() {

wp_enqueue_script('child_theme_script_handle', get_stylesheet_directory_uri().'/js/script-min.js', array('jquery'));

}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );


/*
 * Add reference to Malin in the admin footer
 */
function custom_admin_footer() {
	echo '<a href="http://potential-site.dev/">' . __( 'Webbplats byggd av Malin Thunberg - Potential-Site', 'translate' ) . '</a>';
}
add_filter( 'admin_footer_text', 'custom_admin_footer' );


add_filter('pre_option_link_manager_enabled', '__return_true');

?>


