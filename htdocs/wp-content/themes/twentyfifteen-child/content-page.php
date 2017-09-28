<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>


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
	
	
	<!--
		<div class="hero_link">
			<?php $link = get_field('hero_link');
				if( $link ): ?>
				<a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
		<?php endif; ?>
		</div>
	-->
	
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>




	<div id="intro">
		
		<h1 class="galleryh1">Gallery</h1>
		<?php 

	$images = get_field('hero_gallery');
	$size = 'full'; // (thumbnail, medium, large, full or custom size)
	
	if( $images ): ?>
	    <ul>
	        <?php foreach( $images as $image ): ?>
	            <li>
	            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
	            </li>
	        <?php endforeach; ?>
	    </ul>
	<?php endif; ?>
			
	
	</div><!-- intro -->

		<div id="content1">
		<div class="titlebox">Vocabularies</div>
			<?php  the_field("hero_border_text");  ?>
		</div>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
