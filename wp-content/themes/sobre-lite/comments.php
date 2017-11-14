<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sobre Lite
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
     <!-- Comments / Leave a comment -->
        <section id="comments" class="section-wrap bg-light comments-area">
          <div class="container nopadding">
            <div class="row nomargin">         
              <div class="col-md-8 col-md-offset-2">

				<?php if ( have_comments() ) : ?>
					<div class="entry-comments">
					  <h3 class="heading relative text-center mb-30">
						<?php
						$comments_number = get_comments_number();
						if ( '1' === $comments_number ) {
							/* translators: %s: post title */
							printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'sobre-lite' ), get_the_title() );
						} else {
							printf(
							/* translators: 1: number of comments, 2: post title */
								_nx(
									'%1$s Reply to &ldquo;%2$s&rdquo;',
									'%1$s Replies to &ldquo;%2$s&rdquo;',
									$comments_number,
									'comments title',
									'sobre-lite'
								),
								number_format_i18n( $comments_number ),
								get_the_title()
							);
						}
						?>
					  </h3>
					
					  <ul class="comment-list">
						<?php
							wp_list_comments('callback=sobre_lite_comment');
						?>
					  </ul>         
					</div> <!--  end comments -->
                <?php endif; ?>

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
					<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'sobre-lite' ); ?></h2>
					<div class="nav-links">

						<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'sobre-lite' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'sobre-lite' ) ); ?></div>

					</div><!-- .nav-links -->
				</nav><!-- #comment-nav-below -->
				<?php
				endif; // Check for comment navigation.?>
				<?php
				// If comments are closed and there are comments, let's leave a little note, shall we?
				if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

					<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sobre-lite' ); ?></p>
				<?php endif;?>

				<?php
					$fields =  array(
						
						  'author' => '<label for="name">'.esc_html__('Name','sobre-lite').'<span class="required"> *</span></label><input id="author" name="author" type="text" required value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"/>',

						  'email'  => '<label for="email">'.esc_html__('Email','sobre-lite').'<span class="required"> *</span></label><input id="email" name="email" type="email" required value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"/>',
					
						  'url'    => '<label for="url">' . esc_html__( 'Website','sobre-lite' ) . '</label><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />',

					);

					$args = array(
					  'id_form'           => 'commentform',
					  'class_form'      => 'comment-form',
					  'id_submit'         => 'submit',
					  'class_submit'      => 'btn btn-lg btn-dark',
					  'name_submit'       => 'submit',
					  'title_reply'       => null,
					  'title_reply_to'    => esc_html__( 'Leave a Reply to %s', 'sobre-lite'),
					  'cancel_reply_link' => esc_html__( 'Cancel Reply', 'sobre-lite'),
					  'label_submit'      => esc_html__( 'Post Comment', 'sobre-lite'),
					  'format'            => 'xhtml',

					  
					  
					 'fields' => apply_filters( 'comment_form_default_fields', $fields ),
					  
					  'comment_field' => '<label for="comment">'.esc_html__('Comment', 'sobre-lite') . '</label><textarea id="comment"  name="comment" rows="7" required></textarea>',
					   
					
					  'must_log_in' => '<p class="must-log-in">' .
						sprintf(
						  esc_html__( 'You must be <a href="%s">logged in</a> to post a comment.', 'sobre-lite'),
						  wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
						) . '</p>',

					  'logged_in_as' => '<p class="logged-in-as">' .
						sprintf(
						wp_kses(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'sobre-lite'), array( 'a' => array( 'href' => array() ) ) ),
						  admin_url( 'profile.php' ),
						  $user_identity,
						  wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
						) . '</p>',

					  'comment_notes_before' => null,

					  'comment_notes_after' => null,

					  
					);

				?>
                <!-- Leave a Comment -->
                <div class="comment-form mt-60">
                  <h3 class="heading relative text-center mb-30"><?php esc_html_e( 'Leave a Comment', 'sobre-lite' ); ?></h3>
				  <?php comment_form($args); ?>
                </div>

              </div>
            </div>
          </div>
        </section>


