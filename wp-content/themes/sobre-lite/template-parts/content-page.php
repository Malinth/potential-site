<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sobre Lite
 */
$queried_object = get_queried_object();
$queried_object_id = $queried_object->ID;
?>
	<?php
		$bg_image = get_the_post_thumbnail_url( $queried_object_id, 'full' );
		$page_subheading_text = get_post_meta($queried_object_id, 'page_subheading_text', true);

	?>
		<!-- Page Title -->
		<section class="page-title text-center" 
		<?php if($bg_image){ echo 'style="background-image: url('.esc_url($bg_image).');"';}?>>
		  <div class="container relative clearfix">
			<div class="title-holder">
			  <div class="title-text">
				<?php sobre_lite_entry_meta();?>
				<h1><?php the_title();?></h1>
				<?php if($page_subheading_text):?>
					<h2 class="subheading"><?php echo esc_html($page_subheading_text);?></h2>
				<?php endif; ?>
			  </div>
			</div>
		  </div>
		</section> 
		<!-- end page title -->

    <!-- Page -->
    <section class="section-wrap post-page pb-0">
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
