<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sobre Lite
 */
$queried_object = get_queried_object();
$queried_object_id = $queried_object->ID;
?>
	<?php
		$bg_image_url = get_the_post_thumbnail_url( $queried_object_id, 'full' );
	?>
    <!-- Page Title -->
    <section class="page-title text-center" 
	<?php if($bg_image_url){ echo 'style="background-image: url('.esc_url($bg_image_url).');"';}?>>
      <div class="container relative clearfix">
        <div class="title-holder">
          <div class="title-text">
			<?php sobre_lite_entry_meta();?>
            <h1><?php the_title();?></h1>
          </div>
        </div>
      </div>
    </section> <!-- end page title -->

    <!-- Blog -->
    <section class="section-wrap post-single pb-0">
      <div class="container-fluid nopadding">      

        <!-- content -->
        <article id="post-<?php the_ID(); ?>" <?php post_class('post-content article mb-50'); ?>>
          <div class="entry">
			<?php the_content(); ?>
			<?php 
			wp_link_pages( array(
				'before' => '<div class="page-links mb-100 clearfix">' . esc_html__( 'Pages:', 'sobre-lite' ),
				'after'  => '</div>',
			) );
			?>
			<?php do_action('sobre_lite_single_footer');?>

          </div> <!-- end entry -->
        </article>

