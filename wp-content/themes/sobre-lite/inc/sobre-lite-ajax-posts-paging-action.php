<?php
/**
 *
 * Ajax Posts Loading Action
 *
 * @package     sobre
 * @copyright   Copyright (c) 2016, NetGon
 * @license     http://opensource.org/licenses/gpl-3.0.php GNU Public License
 * @since       1.0.0
 *
 */
 
add_action( 'wp_ajax_nopriv_ajax_posts_pagination', 'sobre_lite_ajax_posts_pagination' );
add_action( 'wp_ajax_ajax_posts_pagination', 'sobre_lite_ajax_posts_pagination' );

function sobre_lite_ajax_posts_pagination() {
    $query_vars = json_decode( stripslashes( $_POST['query'] ), true );

    $query_vars['paged'] = $_POST['page'];

    $the_query = new WP_Query( $query_vars );?>


    <?php if( $the_query->have_posts() ):?>
		
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<!-- posts item -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('work-item'); ?>>
		  <div class="entry-item">
			<div class="entry-img">
			  <a href="<?php the_permalink();?>" class="hover-scale">
				<?php the_post_thumbnail(array(410, 999));?>
			  </a>
			</div>
			<div class="entry-wrap">
			  <div class="entry">
				<?php sobre_lite_entry_meta();?>
				<h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				<?php the_excerpt();?>
			  </div>
			</div>                
		  </div>
		</article> 
		<!-- end post -->

         
		
        <?php endwhile;
	
			wp_reset_postdata();
	die();
		endif;

}