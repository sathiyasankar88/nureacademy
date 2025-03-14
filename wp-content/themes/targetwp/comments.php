<div class="qodef-comment-holder clearfix" id="comments" data-qodef-anchor="comments">
    <div class="qodef-comment-number">
        <div class="qodef-comment-number-inner">
            <h5><?php comments_number( esc_html__( 'No Comments', 'targetwp' ), '1' . esc_html__( ' Comment ', 'targetwp' ), '% ' . esc_html__( ' Comments ', 'targetwp' ) ); ?></h5>
        </div>
    </div>
    <div class="qodef-comments">
		<?php if ( post_password_required() ) : ?>
        <p class="qodef-no-password"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'targetwp' ); ?></p>
    </div>
</div>
<?php
return;
endif;
?>
<?php if ( have_comments() ) : ?>

    <ul class="qodef-comment-list">
		<?php wp_list_comments( array( 'callback' => 'target_qodef_comment' ) ); ?>
    </ul>


	<?php // End Comments ?>

<?php else : // this is displayed if there are no comments so far

	if ( ! comments_open() ) :
		?>
        <!-- If comments are open, but there are no comments. -->


        <!-- If comments are closed. -->
        <p><?php esc_html_e( 'Sorry, the comment form is closed at this time.', 'targetwp' ); ?></p>

	<?php endif; ?>
<?php endif; ?>
</div></div>
<?php
$target_qodef_commenter = wp_get_current_commenter();
$target_qodef_req       = get_option( 'require_name_email' );
$target_qodef_aria_req  = ( $target_qodef_req ? " aria-required='true'" : '' );
$qodef_consent          = empty( $qodef_commenter['comment_author_email'] ) ? '' : ' checked="checked"';

$target_qodef_args = array(
	'id_form'              => 'commentform',
	'id_submit'            => 'submit_comment',
	'title_reply'          => esc_html__( 'Post a Comment', 'targetwp' ),
	'title_reply_to'       => esc_html__( 'Post a Reply to %s', 'targetwp' ),
	'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'targetwp' ),
	'label_submit'         => esc_html__( 'Submit', 'targetwp' ),
	'comment_field'        => '<textarea id="comment" placeholder="' . esc_attr__( 'Write your comment here...', 'targetwp' ) . '" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
	'title_reply_before'   => '<h5 id="reply-title" class="comment-reply-title">',
	'title_reply_after'    => '</h5>',
	'fields'               => apply_filters( 'comment_form_default_fields', array(
		'author'  => '<div class="qodef-comment-column"><label class="qodef-comment-label" for="author">' . esc_html__( 'Name', 'targetwp' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $target_qodef_commenter['comment_author'] ) . '"' . $target_qodef_aria_req . ' /></div>',
		'url'     => '<div class="qodef-comment-column"><label class="qodef-comment-label" for="email">' . esc_html__( 'E-mail Address', 'targetwp' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr( $target_qodef_commenter['comment_author_email'] ) . '"' . $target_qodef_aria_req . ' /></div>',
		'email'   => '<div class="qodef-comment-column"><label class="qodef-comment-label" for="url">' . esc_html__( 'Website', 'targetwp' ) . '</label><input id="url" name="url" type="text" value="' . esc_attr( $target_qodef_commenter['comment_author_url'] ) . '" /></div>',
		'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" ' . $qodef_consent . ' />' .
		             '<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'targetwp' ) . '</label></p>',
	) )
);
?>
<?php if ( get_comment_pages_count() > 1 ) {
	?>
    <div class="qodef-comment-pager">
        <p><?php paginate_comments_links(); ?></p>
    </div>
<?php } ?>
<div class="qodef-comment-form">
	<?php comment_form( $target_qodef_args ); ?>
</div>
								
							


