<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package zo
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
	<?php // You can start editing here -- including this comment! ?>
	<?php if ( have_comments() ) : ?>
        <div class="st-comments-wrap clearfix">
            <h3 class="comments-title">
                <span><?php esc_html_e('Comments ', 'zo-mercury');?><?php echo '('.wp_count_comments($post->ID)->approved.')';?></span>
            </h3>
            <ol class="comment-list">
				<?php wp_list_comments( 'type=comment&callback=zo_mercury_comment' ); ?>
			</ol>
			<?php
				$post_trackbacks = get_comments(array('type' => 'trackback','post_id' => $post->ID));
				$post_pingbacks = get_comments(array('type' => 'pingback','post_id' => $post->ID));
			?>
			<?php if($post_trackbacks || $post_pingbacks) : ?>
				<h4 class="comments-title"><?php esc_html_e('Pingbacks And Trackbacks', 'zo-mercury');?></h4>
				<ol>
					<?php 
						foreach ($comments as $comment) : 
							$comment_type = get_comment_type(); 
							if($comment_type != 'comment') { 
					?>
								<li><?php comment_author_link() ?></li>
					<?php 
							} 
						endforeach; 
					?>
				</ol>
			<?php endif; ?>
			<?php zo_mercury_comment_nav(); ?>
        </div>
	<?php endif; // have_comments() ?>

	<?php
		$commenter = wp_get_current_commenter();
		$allowed_html = array(
			"span" => array(),
		);
		$req = get_option( 'require_name__mail' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$args = array(
			'id_form'           => 'commentform',
			'id_submit'         => 'submit',
			'title_reply'       => wp_kses(__( '<span>Leave a comment</span>','zo-mercury'), $allowed_html),
			'title_reply_to'    => __( 'Post to Reply %s','zo-mercury'),
			'cancel_reply_link' => __( 'Cancel Reply','zo-mercury'),
			'label_submit'      => __( 'Post comment','zo-mercury'),
			'class_submit'  => 'btn btn-primary',
			'comment_notes_before' => '',
			'fields' => apply_filters( 'comment_form_default_fields', array(

					'author' =>
						'<p class="comment-form-author">'.
						'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
						'" size="30"' . esc_attr($aria_req) . ' placeholder="'.__('Your Name','zo-mercury').'"/></p>',

					'email' =>
						'<p class="comment-form-email">'.
						'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
						'" size="30"' . esc_attr($aria_req) . ' placeholder="'.__('Your Email','zo-mercury').'"/></p>',
				)
			),
			'comment_field' =>  '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.__('Say something...','zo-mercury').'" aria-required="true"></textarea></p>'
		);
		comment_form($args);
	?>
</div><!-- #comments -->