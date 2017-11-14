<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Sobre Lite
 */

get_header(); ?>
  <?php
  	$bg_image = sobre_lite_get_option('error_page_heading_bg/url');
  ?>
  <!-- Page Title -->
    <section class="page-title text-center" 
	<?php if($bg_image){ echo 'style="background-image: url('.esc_url($bg_image).');"';}?>>
      <div class="container relative clearfix">
        <div class="title-holder">
          <div class="title-text">
            <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'sobre-lite' ); ?></h1>
          </div>
        </div>
      </div>
    </section> <!-- end page title -->
	
	<!-- Error 404 page -->
	<section class="section-wrap">
	  <div class="container-fluid semi-fluid">      
		<div class="row blog-content text-center">
			<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'sobre-lite' ); ?></p>
		</div>
	  </div>
	</section>


<?php
get_footer();
