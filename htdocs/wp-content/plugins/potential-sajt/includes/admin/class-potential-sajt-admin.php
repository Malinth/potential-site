<?php
/**
 * The admin specific functionality of the plugin.
 *
 * @since 1.0
 */

class Potential_Sajt_Admin {

	protected $plugin_name;
	protected $plugin_version;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since	1.0
	 */
	public function __construct( $plugin_name, $plugin_version ){
		$this->plugin_name = $plugin_name;
		$this->plugin_version = $plugin_version;

		// Example action hook usage. Uncomment or delete.
		//add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

	}


/**
 * Creates custom filter dropdowns for carousel post type
 *
 * @since   1.0.0
 * @return  void
 */
 
public function admin_posts_filter_restrict_manage_posts() {
    $type = ( isset( $_GET['post_type'] ) ? $_GET['post_type'] : false );
    if ( ! $type ) {
        return;
    }
    
    
   /* Kolla så att det är rätt custom-post-type */
    if ( 'carousel' == $type ) {
        
        
       		 /**
             * Filter by "tag" status or what you want to filter by 
             */
             
            echo '<select name="carousel">';
            echo '<option value="">' . __( 'Carousel', 'carousel_tag' ) . '</option>';
            $current_status = isset( $_GET['carousel'] ) && '' != $_GET['carousel'] ? $_GET['carousel'] : -1;
            $statuses = array(
                  0 => __( 'No found', 'carousel_tag' ),
                  1 => __( 'Tag', 'carousel_tag' ),
            );
            foreach ( $statuses as $value => $label ) {
                printf(
                    '<option value="%s"%s>%s</option>',
                    $value,
                    $value == $current_status ? ' selected="selected"':'',
                    $label
                );
            }
            echo '</select>';
    }
}

/**
 * Filter tavlingskort post type by custom dropdown filters in admin
 *
 * @since   1.0.0
 * @return  Void
 */
 
	public function do_posts_filter( $query ) {
	    global $pagenow;
	    $type = ( isset( $_GET['post_type'] ) ? $_GET['post_type'] : false );
	    if ( ! $query->is_main_query() || ! is_admin() || 'carousel' !== $type || 'edit.php' !== $pagenow ) {
	        return;
	    }
	    
    
    $query->query_vars['orderby'] = 'name';
    
    /**
     * Filter by suspensions
     */
    if ( isset( $_GET['carousel'] ) && '' != $_GET['carousel'] && -1 != $_GET['carousel'] ) {
    
    $meta_query = array(
        'key' => 'carousel_approved',
        'value' => '1',
        'compare' => '=',
    );
    $query->query_vars['meta_query'][] = $meta_query;
    
    }
}





	/**
	 * Enqueue scripts in WP admin
	 *
	 * @since	1.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( dirname( dirname( __FILE__ ) ) ) . 'assets/js/potential-sajt-admin.js', null, $this->plugin_version, true );

	}

}


new Potential_Sajt_Admin( $plugin_name, $plugin_version );

