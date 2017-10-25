<?php 
/**
 *
 * Sobre Comment Template.
 *
 * @package     greco
 * @copyright   Copyright (c) 2016, NetGon
 * @license     http://opensource.org/licenses/gpl-3.0.php GNU Public License
 * @since       1.0.0
 *
 */

function sobre_lite_comment($comment, $args, $depth){
   ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 60, '', '', array('class'=>'comment-avatar') ); ?>
			<div class="comment-content">
			  <span class="comment-author"><?php echo get_comment_author_link(); ?></span>
			  <span><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf( '%1$s / %2$s ', get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(esc_html('Edit comment', 'sobre-lite')) ?></span>
			  <?php if ($comment->comment_approved == '0') : ?>
			  <em><?php esc_html_e('Your comment awaiting moderation', 'sobre-lite');?></em>
			  <?php endif; ?>		  
			  <?php comment_text(); ?>
				<?php 
				$link = get_comment_reply_link(array(
					'reply_text' => '<i class="fa fa-reply-all" aria-hidden="true"></i>' . esc_html__('Reply', 'sobre-lite'),
					'respond_id' => 'comment',
					'depth' => 5,
					'max_depth' => 10,
				));

				echo wp_kses_post($link);
				 ?>

			</div>
		</div>
		
<?php
}

?>