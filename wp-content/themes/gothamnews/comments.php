<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<div id="comments_wrap">

<?php if ( have_comments() ) : ?>

	<h3><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol class="commentlist">
	<?php wp_list_comments('avatar_size=48&callback=custom_comment'); ?>
	</ol>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
		<div class="fix"></div>
	</div>
 
<?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>

<?php endif; ?>

</div> <!-- end #comments_wrap -->

<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>
<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>
<br />

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<div>

<?php if ( $user_ID ) : ?>
<p class="lc_logged">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout</a></p>
<?php else : ?>

<label for="author" class="wrap"><input type="text" id="author" name="author" value="<?php echo $comment_author; ?>" size="27" tabindex="1" /> <span>Name <?php if ($req) echo "(required)"; ?></span></label>
<label for="email" class="wrap"><input type="text" id="email" name="email" value="<?php echo $comment_author_email; ?>" size="27" tabindex="2" /> <span>Email <?php if ($req) echo "(required)"; ?> - will not be published</span></label>
<label for="url" class="wrap"><input type="text" id="url" name="url" value="<?php echo $comment_author_url; ?>" size="27" tabindex="3" /> <span>Website (optional)</span></label>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

<textarea name="comment" rows="10" cols="50" tabindex="4"></textarea> 

<input name="submit" type="image" id="submit" tabindex="5" src="<?php bloginfo('template_directory'); ?>/images/img_leave_comment.gif" />

<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

</div>
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>
</form>

<?php endif; // If logged in ?>

<div class="fix"></div>
<br />
</div> <!-- end #respond -->

<?php endif; // if you delete this the sky will fall on your head ?>
