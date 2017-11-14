<?php

/**
 * Register a meta box using a class.
 */
class Page_Meta_Box {

	/**
	 * Constructor.
	 */
	public function __construct() {
		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	/**
	 * Meta box initialization.
	 */
	public function init_metabox() {
		add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
		add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );
	}

	/**
	 * Adds the meta box.
	 */
	public function add_metabox() {
		add_meta_box(
			'page-meta-box',
			__( 'Page settings', 'sobre-lite' ),
			array( $this, 'render_metabox' ),
			'page',
			'advanced',
			'default'
		);

	}

	/**
	 * Renders the meta box.
	 */
	public function render_metabox( $post ) {
		// Add nonce for security and authentication.
		wp_nonce_field( 'page_nonce_action', 'page_nonce' );
		$page_subheading_text = get_post_meta( $post->ID, 'page_subheading_text', true );

		echo '<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="page_subheading_text">'.esc_html__('Page subheading','sobre-lite').'</label></p>';
		echo '<input type="text" name="page_subheading_text" id="page_subheading_text" value="'.$page_subheading_text.'">';
	}

	/**
	 * Handles saving the meta box.
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post    Post object.
	 * @return null
	 */
	public function save_metabox( $post_id, $post ) {
		// Add nonce for security and authentication.
		$nonce_name   = isset( $_POST['page_nonce'] ) ? $_POST['page_nonce'] : '';
		$nonce_action = 'page_nonce_action';

		// Check if nonce is set.
		if ( ! isset( $nonce_name ) ) {
			return;
		}

		// Check if nonce is valid.
		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) ) {
			return;
		}

		// Check if user has permissions to save data.
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// Check if not an autosave.
		if ( wp_is_post_autosave( $post_id ) ) {
			return;
		}

		// Check if not a revision.
		if ( wp_is_post_revision( $post_id ) ) {
			return;
		}

		if(isset($_POST['page_subheading_text'])){
			add_post_meta( $post_id, 'page_subheading_text', $_POST['page_subheading_text'], true );
		}
		if(empty($_POST['page_subheading_text'])){
			delete_post_meta($post_id, 'page_subheading_text');
		}else{
			update_post_meta( $post_id, 'page_subheading_text', $_POST['page_subheading_text']);
		}
	}
}

new Page_Meta_Box();