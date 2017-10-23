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