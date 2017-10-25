<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sobre Lite
 */

?>

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
</article> <!-- end post -->
