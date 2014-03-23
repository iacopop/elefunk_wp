<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p>This post is password protected. Enter the password to view comments.<p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'comment';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
<div class="wrap">
	<h2><?php comments_number('No Comments', 'One Comment', '% Comments' );?> <a href="#cwrap"><span>Leave a comment</span></a></h2>
</div>

<?php foreach ($comments as $comment) : ?>

				<!-- Comm. Starts -->
				<div class="comment" id="comment-<?php comment_ID() ?>">
					<div class="top"><p class="author"><?php comment_author_link() ?> <span>said:</span></p><p class="time"><?php comment_date('M. j, Y'); ?></p></div>
					<div class="wrap">
						<div class="col-left">
							<?php if (function_exists('gravatar')) { ?>
							<img src="<?php gravatar('X', '70', get_bloginfo('template_url')."/images/Avatar.jpg"); ?>" alt="<?php //_e('Gravatar'); ?>" />
							<?php } ?>
						</div>
						<div class="col-right">
						<?php comment_text() ?>
						<?php if ($comment->comment_approved == '0') : ?>
						<p class="note"><cite>You comment is awaiting moderation !</cite></p>
						<?php endif; ?>
						</div>
					</div>
				</div>
				<!-- Comm. Ends -->

	<?php /* Changes every other comment to a different class */
		if ('comment' == $oddcomment) $oddcomment = 'alt';
		else $oddcomment = 'comment';
	?>

	<?php endforeach; /* end for each comment */ ?>


 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<!--<p class="nocomments">Comments are closed.</p>-->

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<div id="cwrap">

<h2 class="lc">Leave a comment</h2>


<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<h2>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</h2>
<?php else : ?>


<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="wrap">
<div>

<?php if ( $user_ID ) : ?>
<p class="lc_logged">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout</a></p>
<label for="comment" class="ta">Comment:<br />
<textarea name="comment" id="comment" rows="5" cols="10" name="comment" tabindex="4"></textarea>
</label>
<input type="image" name="submit" tabindex="5" src="<?php bloginfo('template_directory'); ?>/<?php woo_style_path(); ?>/img_submit.gif" />
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


<?php endif; ?>
<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

<?php do_action('comment_form', $post->ID); ?>
</div>
</form>
</div>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

