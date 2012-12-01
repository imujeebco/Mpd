<?php

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) {
	?> <p>This post is password protected. Enter the password to view comments.</p> <?php
	return;
}
	
function theme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<?php global $i; $i=0; ?>
	<li>
		<div class="comment  <?php if($i%2==1):?>odd<?php endif; ?>" id="comment-<?php comment_ID(); ?>">
			<div class="avatar"><?php echo get_avatar( $comment, 72 ); ?></div>
			<div class="meta">
				<p>By <?php comment_author_link(); ?> on <?php comment_date('F j, Y'); ?></p>
			</div>
			<?php if ($comment->comment_approved == '0') : ?>
				<p>Your comment is awaiting moderation.</p>
			<?php else: ?>
				<?php comment_text(); ?>
			<?php endif; ?>
			<?php
				comment_reply_link(array_merge( $args, array(
					'reply_text' => 'Reply',
					'before' => '<div class="reply">',
					'after' => '</div>',
					'depth' => $depth,
					'max_depth' => $args['max_depth']
				))); ?>
		</div>
	<?php }
	
	function theme_comment_end() { ?>
		</li>
	<?php }
?>

<?php if ( have_comments() ) : ?>

<div class="comments" id="comments">
	<div class="heading">
		<h2><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h2>
	</div>	

	<ol class="commentlist">
		<?php wp_list_comments(array(
			'callback' => 'theme_comment',
			'end-callback' => 'theme_comment_end'
			)); ?>
	</ol>
</div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p>Comments are closed.</p>

	<?php endif; ?>
	
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div class="respond" id="respond">
	<div class="heading">
		<h2>Leave a Comment</h2>
	</div>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<fieldset>
	
			<div class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></div>
		
			<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
			<?php else : ?>
			
			<?php if ( is_user_logged_in() ) : ?>

			<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
			
			<dl class="form-list">					
			<?php else : ?>
			
			<dl class="form-list">	
				<dt><label for="author">Name</label></dt>
				<dd><span class="text"><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" /></span></dd>
				<dt><label for="email">Email</label></dt>
				<dd><span class="text"><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" /></span></dd>
				<dt><label for="url">URL</label></dt>
				<dd><span class="text"><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" /></span></dd>
			<?php endif; ?>
				<dt><label for="comment">Comment</label></dt>
				<dd><div class="textarea"><textarea name="comment" id="comment" cols="30" rows="10"></textarea></div></dd>
				<dt>&nbsp;</dt>
				<dd><input name="submit" type="submit" id="submit" class="btn-submit" value="Comment" /></dd>
			</dl>
			
			<?php
				comment_id_fields();
				do_action('comment_form', $post->ID);
			?>
			
			<?php endif; ?>

		</fieldset>
	</form>
</div>

<?php endif; ?>
