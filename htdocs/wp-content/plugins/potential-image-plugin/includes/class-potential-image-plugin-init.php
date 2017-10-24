<?php
/**
 * Generic init functionality of the plugin.
 * Could be registering post types, taxonomies etc. that is not
 * directly related to admin or public and not warrant of
 * it's own folder directory.
 *
 * @since 1.0
 */

class Potential_Image_Plugin_Init {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since	1.0
	 */
	public function __construct(){

		// Example action hook usage. Uncomment or delete.
		//sadd_action( 'init', array( $this, 'init' ) );
		
		add_action( 'init', array( $this, 'my_carousel' ) );
	}



	/**
	 * Init.
	 * This could contain registration of post types etc.
	 *
	 * @since	1.0
	 */
	public function init() {

	}
	
	/**
	 * Init.
	 * This could contain registration of post types etc.
	 *
	 * @since	1.0
	 */
	 
	 

	 
	 // Register Custom Post Type
	 public function my_carousel() {


        $labels = array(
        'name'                  => _x( 'Carousels', 'Post Type General Name', 'potential-image-plugin' ),
		'singular_name'         => _x( 'Carousel', 'Post Type Singular Name', 'potential-image-plugin' ),
		'menu_name'             => __( 'Carousel', 'potential-image-plugin' ),
		'name_admin_bar'        => __( 'Post Type', 'potential-image-plugin' ),
		'archives'              => __( 'Item Archives', 'potential-image-plugin' ),
		'attributes'            => __( 'Item Attributes', 'potential-image-plugin' ),
		'parent_item_colon'     => __( 'Parent Item:', 'potential-image-plugin' ),
		'all_items'             => __( 'All Items', 'potential-image-plugin' ),
		'add_new_item'          => __( 'Add New Item', 'potential-image-plugin' ),
		'add_new'               => __( 'Add New', 'potential-image-plugin' ),
		'new_item'              => __( 'New Item', 'potential-image-plugin' ),
		'edit_item'             => __( 'Edit Item', 'potential-image-plugin' ),
		'update_item'           => __( 'Update Item', 'potential-image-plugin' ),
		'view_item'             => __( 'View Item', 'potential-image-plugin' ),
		'view_items'            => __( 'View Items', 'potential-image-plugin' ),
		'search_items'          => __( 'Search Item', 'potential-image-plugin' ),
		'not_found'             => __( 'Not found', 'potential-image-plugin' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'potential-image-plugin' ),
		'featured_image'        => __( 'Featured Image', 'potential-image-plugin' ),
		'set_featured_image'    => __( 'Set featured image', 'potential-image-plugin' ),
		'remove_featured_image' => __( 'Remove featured image', 'potential-image-plugin' ),
		'use_featured_image'    => __( 'Use as featured image', 'potential-image-plugin' ),
		'insert_into_item'      => __( 'Insert into item', 'potential-image-plugin' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'potential-image-plugin' ),
		'items_list'            => __( 'Items list', 'potential-image-plugin' ),
		'items_list_navigation' => __( 'Items list navigation', 'potential-image-plugin' ),
		'filter_items_list'     => __( 'Filter items list', 'potential-image-plugin' ),

        );
        $args = array(
		'label'                 => __( 'Carousel', 'potential-image-plugin' ),
		'description'           => __( 'Create a carousel', 'potential-image-plugin' ),
        'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
        'menu_icon'             => 'dashicons-camera',
        'rewrite'               => array( 'slug' => 'carousel', 'with_front' => true ),
        'taxonomies'            => array( 'url','category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        );
        register_post_type( 'my_carousel', $args );
        
        }


}
new Potential_Image_Plugin_Init();
