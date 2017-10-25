<?php
/**
 * Sobre functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sobre Lite
 */

if ( ! function_exists( 'sobre_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sobre_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Sobre, use a find and replace
	 * to change 'sobre-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sobre-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'sobre-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sobre_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for custom logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 170,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'sobre_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sobre_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sobre_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'sobre_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sobre_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sobre-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sobre-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'sobre_lite_widgets_init' );

if ( ! function_exists( 'sobre_lite_fonts_url' ) ) :
/**
 * Register Google fonts for Sobre.
 *
 * Create your own sobre_lite_fonts_url() function to override in a child theme.
 *
 * @since Sobre 1.0.0
 *
 * @return string Google fonts URL for the theme.
 */
function sobre_lite_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = '';
	$fonts[] = 'Hind:400,400i,700';
	$fonts[] = 'Poppins:400,600';
		
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}

endif;

/**
 * Enqueue scripts and styles.
 */
function sobre_lite_scripts() {
	wp_enqueue_style( 'sobre-style', get_stylesheet_uri() );
    wp_enqueue_style( 'sobre-fonts', sobre_lite_fonts_url(), array(), array(), 'all');
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .	'/css/bootstrap.css', array(), array(), 'all');
	wp_enqueue_style( 'sobre-font-icons', get_template_directory_uri() . '/css/font-icons.css', array(), array(), 'all');
	wp_enqueue_style( 'sobre-main-style', get_template_directory_uri() . '/css/style.css', array(), array(), 'all');
	wp_enqueue_style( 'sobre-core-styles', get_template_directory_uri() . '/css/core-styles.css', array(), array(), 'all');
	wp_enqueue_style( 'sobre-temp-styles', get_template_directory_uri() . '/css/temp.css', array(), array(), 'all');

	
	wp_enqueue_script('imagesloaded');


	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), array(), true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.js', array(), array(), true );
	wp_enqueue_script( 'sobre-scripts', get_template_directory_uri() . '/js/scripts.js', array(), array(), true );
	wp_enqueue_script( 'sobre-ajax-posts-load', get_template_directory_uri() . '/js/ajax-posts-load.js', array(), array(), true );
	
  	wp_localize_script( 'sobre-ajax-posts-load', 'ajaxpagination', array(
		'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
		'loading' => esc_html('Loading...', 'sobre-lite'),
		'loadmore' => esc_html('Load More', 'sobre-lite'),
	));
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'sobre_lite_scripts' );


/**
 * Sobre Lite TGMPA Init
 */
require get_template_directory() . '/inc/sobre-lite-plugins.php';

/**
 * Sobre Comments
 */
require get_template_directory() . '/inc/sobre-lite-comments.php';

/**
 * Custom Nav Walker
 */
require get_template_directory() . '/inc/sobre-lite-ajax-posts-paging-action.php';

/**
 * Custom Nav Walker
 */
require get_template_directory() . '/inc/sobre-lite-nav-walker.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox/metabox-init.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
