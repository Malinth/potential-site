<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sobre Lite
 */
$default_logo = get_template_directory_uri() . '/img/logo.png';

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  
  <?php if(sobre_lite_get_option('preloader_display', 'disable') == 'enable'):?>
	<!-- Preloader -->
	<div class="loader-mask">
		<div class="loader"></div>
	</div>
  <?php endif; ?>

  <!-- Navigation -->
  <header class="nav-type-1">
    <nav class="navbar">
      <div class="header-wrap relative">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="sr-only"><?php esc_html_e('Toggle navigation', 'sobre-lite');?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        <?php $image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );?>
          <!-- Logo -->
          <div class="logo-container">
            <div class="logo-wrap">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img class="logo" src="<?php echo esc_url($image[0])?>" alt="<?php bloginfo( 'name' ); ?>">
              </a>
            </div>
          </div>
        </div> <!-- end navbar-header -->

        <div class="nav-wrap">
          <div class="collapse navbar-collapse" id="navbar-collapse">
			<?php 
				wp_nav_menu( array(
					'theme_location'  => 'menu-1',
					'container'       => '', 
					'fallback_cb'     => '',
					'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s'.sobre_lite_social_mobile().'</ul>',
					'walker'          => new sobre_lite_nav_walker,
				) ); 
			?>          
          </div>
        </div> <!-- end nav-wrap -->

		<?php get_sidebar();?>

		<?php do_action('after_menu'); ?>
        
      </div> <!-- end header wrap -->


      <!-- Nav trigger -->
      <div id="nav-trigger">
        <div id="nav-icon">
          <div class="nav-icon-inner">
            <div id="nav-icon-trigger" class="nav-icon-trigger">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
        </div>
      </div> <!-- end nav trigger -->

    </nav> <!-- end navbar -->
  </header>
  
    <!-- Main -->
  <main class="main-wrapper oh pl-80">
