<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php locate_template( array( 'includes/components/hero.php' ), true ); ?>

		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry">
				<?php the_content(); ?>
				
				
			</div>
		</article>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
