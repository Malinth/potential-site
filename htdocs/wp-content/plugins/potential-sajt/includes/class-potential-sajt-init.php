<?php
/**
 * Generic init functionality of the plugin.
 * Could be registering post types, taxonomies etc. that is not
 * directly related to admin or public and not warrant of
 * it's own folder directory.
 *
 * @since 1.0
 */

class Potential_Sajt_Init {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since	1.0
	 */
	public function __construct(){

		// Example action hook usage. Uncomment or delete.
		//sadd_action( 'init', array( $this, 'init' ) );
	}


	/**
	 * Init.
	 * This could contain registration of post types etc.
	 *
	 * @since	1.0
	 */
	public function init() {



	}




}
new Potential_Sajt_Init();



