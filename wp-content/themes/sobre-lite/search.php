<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Sobre Lite
 */

get_header(); ?>
	<?php
		$bg_image = sobre_lite_get_option('search_heading_image');
	
	?>
    <!-- Page Title -->
    <section class="page-title text-center" 
	<?php if($bg_image){ echo 'style="background-image: url('.esc_url($bg_image).');"';}?>>
      <div class="container relative clearfix">
        <div class="title-holder">
          <div class="title-text">
            <h1><?php printf( esc_html__( 'Search Results for: %s', 'sobre-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
          </div>
        </div>
      </div>
    </section> <!-- end page title -->
	
	<?php if ( have_posts() ) : ?>
	
		<!-- Blog -->
		<section class="section-wrap">
		  <div class="container-fluid semi-fluid">      
			<div class="row blog-content">

			  <div id="isotope-grid" class="works-grid grid-4-col gutter">

				<?php while ( have_posts() ) : the_post();?>

					<?php get_template_part( 'template-parts/content', get_post_format() );?>

				<?php endwhile;?>
				
			  </div>

			</div>
			<?php if(sobre_lite_get_option('blog_nav_type','ajax') == 'ajax'):?>
			
				<!-- Ajax Navigation -->
				<?php if($wp_query->max_num_pages > 1):?>
					<div class="row mt-40">
					  <div class="col-md-12 text-center">
						<a href="#" class="btn btn-lg btn-light" id="load-more"><span><?php esc_html_e('Load More', 'sobre-lite');?></span></a>
						<input id="query" 	  type="hidden" value="<?php echo esc_js(json_encode($wp_query->query)); ?>">
						<input id="max_pages" type="hidden" value="<?php echo esc_js($wp_query->max_num_pages); ?>">
					  </div>
					</div>
				<?php endif; ?>

			<?php else: ?>
			
				<!-- Standart WP Navigation -->
				<?php the_posts_navigation();?>
				
			<?php endif; ?>
				
		  </div>
		</section> <!-- end Blog -->
		

	<?php else :?>

		<?php get_template_part( 'template-parts/content', 'none' );?>

	<?php endif;?>
	


<?php
get_footer();
