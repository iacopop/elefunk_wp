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

<?php if ( have_comments() ) : ?>

	<div class="wrap">
		<h2><?php comments_number('No Comments', 'One Comment', '% Comments' );?> <a href="#cwrap"><span>Leave a comment</span></a></h2>
	</div>
    
	<ol class="commentlist">
	<?php wp_list_comments('avatar_size=70&callback=custom_comment'); ?>
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

<?php if ('open' == $post->comment_status) : ?>

<div id="respond"> 
<div id="cwrap">

<h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="wrap">
<div>

<?php if ( $user_ID ) : ?>

<p class="lc_logged">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout</a></p>
<label for="comment" class="ta">Comment:<br />
<textarea name="comment" id="comment" rows="5" cols="10" name="comment" tabindex="4"></textarea>
</label>
<input type="image" name="submit" tabindex="5" src="<?php bloginfo('template_directory'); ?>/<?php woo_style_path(); ?>/img_submit.gif" />

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php else : ?>

<label for="author">Name: <span><?php if ($req) echo "(required)"; ?></span><br />
	<input type="text" name="author" id="author" tabindex="1" value="<?php echo $comment_author; ?>" />
</label>
<label for="email">Email: <span>(will not be published) <?php if ($req) echo "(required)"; ?></span><br />
<input type="text" name="email" id="email" tabindex="2" value="<?php echo $comment_author_email; ?>" />
</label>
<label for="url">Website:<br />
	<input name="url" type="text" id="url" tabindex="3" value="<?php echo $comment_author_url; ?>" />
</label>
<label for="comment" class="ta">Comment:<br />
	<textarea name="comment" id="comment" rows="5" cols="10" tabindex="4"></textarea>
</label>
<input type="image" name="submit" src="<?php bloginfo('template_directory'); ?>/<?php woo_style_path(); ?>/img_submit.gif" tabindex="5" />

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>


<?php endif; // If logged in ?>

<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>

</div>
</form>
</div> <!-- #cwrap -->
</div> <!-- #respond -->

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>