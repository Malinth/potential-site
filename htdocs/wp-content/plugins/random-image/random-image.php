<?php
/**
 * Plugin Name: Random Image
 * Plugin URI:  http://potential-site.se
 * Description: Gives a random image every time you refresh the site
 * Version:     1.0
 * Author:      Malin
 * Author URI:  http://potential-site.se
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: random-image
 * Domain Path: /languages
 *
 * @since	1.0
 */

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Random_Image {

	protected $plugin_name;
	protected $plugin_version;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since	1.0
	 */
	public function __construct(){

		$this->plugin_name = 'random-image';
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
			$this->include_file( 'admin/class-random-image-admin.php' );
		}

		$this->include_file( 'class-random-image-init.php' );
		$this->include_file( 'public/class-random-image-public.php' );

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
			'random-image',
			false,
			basename( dirname( __FILE__ ) ) . '/languages/'
		);

	}

}


/**
 * Begins execution of the plugin.
 *
 * @since    1.0
 */
new Random_Image();
