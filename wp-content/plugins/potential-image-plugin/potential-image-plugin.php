<?php
/**
 * Plugin Name: Potential image plugin
 * Plugin URI:  http://potential-site.se
 * Description: Give your images some extra attention with this plugin.
 * Version:     1.0
 * Author:      Malin
 * Author URI:  http://potential-site.se
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: potential-image-plugin
 * Domain Path: /languages
 *
 * @since	1.0
 */
 

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Potential_Image_Plugin {

	protected $plugin_name;
	protected $plugin_version;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since	1.0
	 */
	public function __construct(){

		$this->plugin_name = 'potential-image-plugin';
		$this->plugin_version = '1.0';

		// Load all dependency files.
		$this->load_dependencies();

		// Activation hook
		register_activation_hook( __FILE__, array( $this, 'activate' ) );

		// Deactivation hook
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

		// Localization
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

	}

	/**
	 * Loads all dependencies in our plugin.
	 *
	 * @since	1.0
	 */
	public function load_dependencies() {

		// Admin specific includes
		if ( is_admin() ) {
			$this->include_file( 'admin/class-potential-image-plugin-admin.php' );
		}

		$this->include_file( 'class-potential-image-plugin-init.php' );
		$this->include_file( 'public/class-potential-image-plugin-public.php' );

	}


	/**
	 * Includes a single file located inside /includes
	 *
	 * @param	string $path relative path to /includes
	 * @since	1.0
	 */
	private function include_file( $path ) {
		$plugin_name = $this->plugin_name;
		$plugin_version = $this->plugin_version;

		$includes_dir = trailingslashit( plugin_dir_path( __FILE__ ) . 'includes' );
		if ( file_exists( $includes_dir . $path ) ) {
			include_once( $includes_dir . $path );
		} else {
			error_log( sprintf( 'Incorrect path %1$s supplied for include_once in %2$s. Full path to file that does not exist: %3$s', $path, $this->plugin_name, $includes_dir . $path ) );
		}
	}


	/**
	 * The code that runs during plugin activation.
	 *
	 * @since    1.0
	 */
	public function activate() {

	}


	/**
	 * The code that runs during plugin deactivation.
	 *
	 * @since    1.0
	 */
	public function deactivate() {

	}


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0
	 */
	public function load_textdomain() {

		load_plugin_textdomain(
			'potential-image-plugin',
			false,
			basename( dirname( __FILE__ ) ) . '/languages/'
		);

	}

}


		/* Metabox for URL shows here */
		/* Fire our meta box setup function on the post editor screen. */
		add_action( 'load-post.php', 'smashing_post_meta_boxes_setup' );
		add_action( 'load-post-new.php', 'smashing_post_meta_boxes_setup' );
		
		/* Meta box setup function. */
		function smashing_post_meta_boxes_setup() {
		
		  /* Add meta boxes on the 'add_meta_boxes' hook. */
		  add_action( 'add_meta_boxes', 'smashing_add_post_meta_boxes' );
		
		  /* Save post meta on the 'save_post' hook. */
		  add_action( 'save_post', 'smashing_save_post_class_meta', 10, 2 );
		}
		
		/* Create one or more meta boxes to be displayed on the post editor screen. */
		function smashing_add_post_meta_boxes() {
		
		  add_meta_box(
		    'carousel_url',      // Unique ID
		    esc_html__( 'Image URL', 'carousel' ),    // Title
		    'carousel_url_meta_box',   // Callback function
		    'carousel',         // Admin page (or post type)
		    'side',         // Context
		    'default'         // Priority
		  );
		}
		
		/* Display the post meta box. */
		function carousel_url_meta_box( $post ) { ?>
		
		  <?php wp_nonce_field( basename( __FILE__ ), 'carousel_url_nonce' ); ?>
		
		  <p>
		    <label for="my_carousel_url"><?php _e( "Add an image URL:", 'carousel' ); ?></label>
		    <br />
		    <input class="carouselurl" type="url" name="my_carousel_url" id="my_carousel_url" value="<?php echo esc_attr( get_post_meta( $post->ID, 'my_carousel_url', true ) ); ?>" maxlength="200" />
		  </p>
		  
		  
		  
		<?php }
			
			
			/* Save the meta box's post metadata. */
		function smashing_save_post_class_meta( $post_id, $post ) {
		
		  /* Verify the nonce before proceeding. */
		  if ( !isset( $_POST['carousel_url_nonce'] ) || !wp_verify_nonce( $_POST['carousel_url_nonce'], basename( __FILE__ ) ) )
		    return $post_id;
		
		  /* Get the post type object. */
		  $post_type = get_post_type_object( $post->post_type );
		
		  /* Check if the current user has permission to edit the post. */
		  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		    return $post_id;
		
		  /* Get the posted data and sanitize it for use as an HTML class. */
		  $new_meta_value = ( isset( $_POST['carousel_url_nonce'] ) ? sanitize_html_class( $_POST['carousel_url_nonce'] ) : '' );

		  error_log($_POST['my_carousel_url']);


		  /* Get the meta key. */
		  $meta_key = 'my_carousel_url';
		
		  /* Get the meta value of the custom field key. */
		  $meta_value = get_post_meta( $post_id, $meta_key, true );
		
		  /* If a new meta value was added and there was no previous value, add it. */
		  if ( $new_meta_value && '' == $meta_value )
		    add_post_meta( $post_id, $meta_key, $new_meta_value, true );
		
		  /* If the new meta value does not match the old value, update it. */
		  elseif ( $new_meta_value && $new_meta_value != $meta_value )
		    update_post_meta( $post_id, $meta_key, $new_meta_value );
		
		  /* If there is no new meta value but an old value exists, delete it. */
		  elseif ( '' == $new_meta_value && $meta_value )
		    delete_post_meta( $post_id, $meta_key, $meta_value );
		}
			

add_action( 'save_post', 'smashing_save_post_class_meta', 10, 3 );


			
		/* Filter the post class hook with our custom post class function. */
		add_filter( 'post_class', 'my_carousel_url' );
		
		function carousel_url( $classes ) {
		
		  /* Get the current post ID. */
		  $post_id = get_the_ID();
		
		  /* If we have a post ID, proceed. */
		  if ( !empty( $post_id ) ) {
		
		    /* Get the custom post class. */
		    $post_class = get_post_meta( $post_id, 'my_carousel_url', true );
		
		    /* If a post class was input, sanitize it and add it to the post class array. */
		    if ( !empty( $post_class ) )
		      $classes[] = sanitize_html_class( $post_class );
		  }
		
		  return $classes;
		}
		
		
	
	/**
		*
		* My Carousel function starts here
		*
		*/
	
	// Enqueues the style of the carousel
	function enqueue_carousel_style() {
	    wp_enqueue_style('carousel', plugin_dir_url(__FILE__) . '/assets/css/carousel.css');
	}
	add_action('wp_enqueue_scripts', 'enqueue_carousel_style');
	
	// Displays the carousel
	function display_carousel() {
		// Retrieves the right links
		$args = array(
			'category_name' => 'carousel',
			'orderby' => 'rating',
			'order' => 'DESC',
			'limit' => 5
		);
	
		$links = get_bookmarks($args);
		$n = count($links);
	
		// Displays the carousel only if there's something to display
		if (!empty($links)) {
			wp_enqueue_script('carousel', plugin_dir_url(__FILE__) . 'assets/js/carousel.js', array('jquery'), '1.0', true);
			?>
			<div id="carousel">
				<ul>
					<?php
					foreach ($links as $i => $link) {
						// Background (image or random color)
						$background = (!empty($link->link_image)) ? 'url(' . $link->link_image . ')' : 'rgb(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ')';
	
						// Target and rel attributes (if needed)
						$target = (!empty($link->link_target)) ? ' target="' . $link->link_target . '"' : ' target="' . $link->link_target . '"';
						$rel = (!empty($link->link_rel)) ? ' rel="' . $link->link_rel . '"' : '';
						?>
						<li style="background: <?php echo $background; ?>;">
							<a class="carousel-link" href="<?php echo $link->link_url; ?>" title="<?php echo $link->link_name; ?>" <?php echo $target . $rel; ?>>
								<strong><?php echo $link->link_name; ?></strong>
								<?php
								if (!empty($link->link_description)) {
									?>
									<em><?php echo $link->link_description; ?></em>
									<?php
								}
								?>
							</a>
	
							<?php
							// Previous link
							if ($i > 0) {
								?>
								<a href="#prev" class="carousel-prev">&#x21E6;</a>
								<?php
							}
	
							// Next link
							if ($i < $n - 1) {
								?>
								<a href="#next" class="carousel-next">&#x21E8;</a>
								<?php
							}
							?>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
			<?php
		}
}
?>
<?php

/**
 * Begins execution of the plugin.
 *
 * @since    1.0
 */
new Potential_Image_Plugin();