<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Sobre Lite
 */


if ( ! function_exists( 'sobre_lite_get_post_option' ) ) :
	function sobre_lite_get_post_option($post_id, $name, $default = false ) {
		if (defined('FW')) {
		   $options = fw_get_db_post_option($post_id, $name );
			if ( isset( $options ) ) {
				return $options;
			}else{
				return $default;
			}
		} else {
			return $default;
		}
		
	}
endif;

if ( ! function_exists( 'sobre_lite_get_option' ) ) :
	function sobre_lite_get_option( $name, $default = false ) {
		   $options = get_theme_mod( $name );
			if ( isset( $options ) ) {
				return $options;
			}else{
				return $default;
			}

		
	}
endif;





if ( ! function_exists( 'sobre_lite_copyright' ) ) :
	function sobre_lite_copyright(){
		
		echo '<div class="col-sm-12 copyright text-center"><span>';
		
			if (!sobre_lite_get_option('footer_copyright')){
					printf(wp_kses_post('&copy; %s Sobre Lite Theme | Made by <a target="blank" href="http://awothemes.pro">AwoThemes</a>', 'sobre-lite'), date('Y')) ;
			}
			else{
					echo wp_kses_post(sobre_lite_get_option('footer_copyright'));
			}
			
		echo '</span></div>';
	}
endif;
add_action('sobre_lite_footer', 'sobre_lite_copyright', 10);

if ( ! function_exists( 'sobre_lite_social' ) ) :
	function sobre_lite_social(){
			$social_mobile_links_instagram = sobre_lite_get_option('social_links_instagram', false);
			$social_mobile_links_facebook = sobre_lite_get_option('social_links_facebook', false);
			$social_mobile_links_twitter = sobre_lite_get_option('social_links_twitter', false);
			$social_mobile_links_vimeo = sobre_lite_get_option('social_links_vimeo', false);
			
			$links = '<div class="social-icons nobase dark clearfix hidden-sm hidden-xs">';
                  if($social_mobile_links_instagram){
					$links .= '<a target="_blank" href="'.esc_url($social_mobile_links_instagram).'"><i class="ui-instagram"></i></a>';
				  }
                  if($social_mobile_links_facebook){
					$links .= '<a target="_blank" href="'.esc_url($social_mobile_links_facebook).'"><i class="ui-facebook"></i></a>';
				  }
                  if($social_mobile_links_twitter){
					$links .= '<a target="_blank" href="'.esc_url($social_mobile_links_twitter).'"><i class="ui-twitter"></i></a>';
				  }
                  if($social_mobile_links_vimeo){
					$links .= '<a target="_blank" href="'.esc_url($social_mobile_links_vimeo).'"><i class="ui-vimeo"></i></a>';
				  }
		$links .= '</div>';
		
		if(sobre_lite_get_option('social_links_display') == 'enable'){
			echo wp_kses_post($links);	
		}
	}
endif;
add_action('after_menu', 'sobre_lite_social', 10);

if ( ! function_exists( 'sobre_lite_social_mobile' ) ) :
	function sobre_lite_social_mobile(){
			$social_links_instagram = sobre_lite_get_option('social_links_instagram', false);
			$social_links_facebook = sobre_lite_get_option('social_links_facebook', false);
			$social_links_twitter = sobre_lite_get_option('social_links_twitter', false);
			$social_links_vimeo = sobre_lite_get_option('social_links_vimeo', false);
			
			$output =  '<li> <div class="social-icons on-mobile nobase dark clearfix hidden-lg hidden-md">';
			
                  if($social_links_instagram){
					$output .= '<a href="'.esc_url($social_links_instagram).'"><i class="ui-instagram"></i></a>';
				  }
                  if($social_links_facebook){
					$output .= '<a href="'.esc_url($social_links_facebook).'"><i class="ui-facebook"></i></a>';
				  }
                  if($social_links_twitter){
					$output .= '<a href="'.esc_url($social_links_twitter).'"><i class="ui-twitter"></i></a>';
				  }
                  if($social_links_vimeo){
					$output .= '<a href="'.esc_url($social_links_vimeo).'"><i class="ui-twitter"></i></a>';
				  }
									  
            $output .= '</div></li>';
		if(sobre_lite_get_option('social_links_display') == 'enable'){
			return $output;	
		}
	}
endif;



if ( ! function_exists( 'sobre_lite_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function sobre_lite_entry_meta() {

		if ( 'post' === get_post_type() ) {
			$cat_links = array();
			$categories_object = wp_get_post_terms( get_the_ID(), 'category');
			foreach ($categories_object as $cat_item){
				$cat_slug = $cat_item->slug;
				$cat_name = $cat_item->name;
				$cat_link = get_term_link($cat_slug, 'category');
				$cat_links[] = '<a class="entry-category" href="'.$cat_link.'">'.$cat_name.'</a>';
			}
			$categories_list = '<div class="entry-meta">' . implode(', ', $cat_links) . '</div>';
			echo wp_kses_post($categories_list);
		}

}
endif;
if ( ! function_exists( 'sobre_lite_entry_tags' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function sobre_lite_entry_tags() {

		if ( 'post' === get_post_type() ) {

			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'sobre-lite' ) );
			if ( $tags_list ) {
				printf( '<div class="entry-meta mb-100 clearfix"><h5 class="mb-20">'.esc_html('Tags:','sobre-lite').'</h5>%s</div>', $tags_list ); // WPCS: XSS OK.
			}
		}

}
endif;
add_action('sobre_lite_single_footer', 'sobre_lite_entry_tags', 10);
/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function sobre_lite_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'sobre_lite_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'sobre_lite_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so sobre_lite_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so sobre_lite_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in sobre_lite_categorized_blog.
 */
function sobre_lite_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'sobre_lite_categories' );
}
add_action( 'edit_category', 'sobre_lite_category_transient_flusher' );
add_action( 'save_post',     'sobre_lite_category_transient_flusher' );
