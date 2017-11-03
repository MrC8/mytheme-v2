<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wiatheme
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

<div id="comments" class="comments-area">

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wiatheme' ); ?></p>
	<?php endif; ?>


	<?php 
    // début formulaire de réponse
    $comment_args = array( 
	
  'id_form'           => 'commentform',
  'class_form'      => 'comment-form',
  'id_submit'         => 'submit',
  'class_submit'      => 'submit btn btn-default',
  'name_submit'       => 'submit',
  'title_reply'       => __( 'Réagissez à cet article' ),
  'title_reply_to'    => __( 'Leave a Reply to %s' ),
  'cancel_reply_link' => __( 'Annuler' ),
  'label_submit'      => __( 'Commenter' ),
  'format'            => 'xhtml',

  'comment_field' =>  '<p class="comment-form-comment col-sm-6 form-group"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Votre commentaire *" class="form-control">' .
    '</textarea></p>',

  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'Connecté en tant que <a href="%1$s">%2$s</a>. <a href="%3$s" title="Deconnexion">Deconnexion ?</a>' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

  'comment_notes_before' => '',

  'comment_notes_after' => '',
	
    'fields' => apply_filters( 
		'comment_form_default_fields', array(
		  'author' =>
			'<div class="col-sm-6"><p class="comment-form-author form-group">' .
			'<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			'" size="30"' . $aria_req . ' placeholder="Nom*" /></p>',
		
		  'email' =>
			'<p class="comment-form-email form-group">' .
			'<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			'" size="30"' . $aria_req . ' placeholder="E-mail*" /></p>',
		
		  'url' =>
			'<p class="comment-form-url form-group">' .
			'<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			'" size="30" placeholder="Site internet" /></p></div>',
			)
    ));
    comment_form($comment_args); 
    // fin formulaire de réponse
    ?>


	<?php if ( have_comments() ) : ?>
    <div class="zecomments">
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( '1 commentaire sur cet article', '%1$s commentaires sur cet article', get_comments_number(), 'comments title', 'wiatheme' ) ),
					number_format_i18n( get_comments_number() )
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wiatheme' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'wiatheme' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'wiatheme' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->
        
        
		<?php 
			$comment_count = get_comment_count($post->ID); 
			$comment_count_reste = ($comment_count['approved'] - 3);
		?>
        <?php if ($comment_count['approved'] > 3) : ?><p class="center"><a id="showmore" rel="nofollow">Tout afficher (<?php echo $comment_count_reste; ?> de plus)</a></p><?php endif; ?>       
        

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wiatheme' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'wiatheme' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'wiatheme' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>
	</div>
	<?php endif; // Check for have_comments(). ?>


</div><!-- #comments -->
