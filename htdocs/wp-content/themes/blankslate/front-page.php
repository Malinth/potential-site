<?php get_header(); ?>
<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<header class="header">
	
<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
</header>


	<section class="entry-content">
	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
	<?php the_content(); ?>
	<div class="entry-links"><?php wp_link_pages(); ?></div>
	</section>

		<div class="hero_img">
		<?php 
	
			$image = get_field('hero_image');
			
			if( !empty($image) ): ?>
			
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			
			<?php endif; ?>
		</div>
		
		<div class="hero_text">
			<?php  the_field("hero_text");  ?>
		</div>
	
<div class="scroll">
<a href="#intro" rel="" id="anchor1" class="anchorLink"><button class="hero_link" href="#intro">Scroll down</button></a>
</div>
	
</article>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>