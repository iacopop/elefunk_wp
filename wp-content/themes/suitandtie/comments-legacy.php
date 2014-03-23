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

<div id="comments_wrap">

	<h2>some <strong>comments</strong></h2>
	<span class="count">There are currently <?php comments_number('0', '1', '%' );?> of them</span>

<ol>

<?php foreach ($comments as $comment) : ?>

	<li class="comment <?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
      
		<?php if(get_comment_type() == "comment"){ ?>
		
			<div class="gravatar"><?php the_commenter_avatar() ?></div>
			
		<?php } ?>
		
		<div class="user-meta">
		
			<span class="name"><?php comment_author_link() ?></span>
			<span class="date"><?php if(get_comment_type() == "comment"){ echo get_comment_date("j F Y") ?> at <?php echo get_comment_time(); ?></span>
			<span class="permalink"><a href="<?php echo get_comment_link(); ?>" title="Direct link to this comment">permalink</a><?php }?></span>
			<span class="edit-link"><?php edit_comment_link('Edit', ' <span class="edit-link">(', ')</span>'); ?></span>
			
		</div><!-- /user-meta -->
		
		<div class="comment-entry">
		
			<?php comment_text() ?>
			
			<?php if ($comment->comment_approved == '0') echo "<p class='unapproved'>Your comment is awaiting moderation.</p>\n"; ?>

		</div><!-- /.comment-entry -->

		<div class="clear"></div>
		
	</li>

	<?php /* Changes every other comment to a different class */
		if ('comment' == $oddcomment) $oddcomment = 'alt';
		else $oddcomment = 'comment';
	?>

	<?php endforeach; /* end for each comment */ ?>
	
	</ol>


 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<!--<p class="nocomments">Comments are closed.</p>-->

	<?php endif; ?>
<?php endif; ?>

</div><!-- commentswrap -->

<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h2>reply</h2>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<h3>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</h3>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" onsubmit="if (url.value == 'Website (optional)') {url.value = '';}">


<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<div id="inputs">
	
	<p>
		<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
		<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label>
	</p>

	<p>
		<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
		<label for="email"><small>Mail <?php if ($req) echo "(required)"; ?></small></label>
	</p>

	<p>
		<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
		<label for="url"><small>Website</small></label>
	</p>
	
	<p>
		<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	</p>
	
</div><!-- /#inputs -->

<?php endif; ?>

<div id="textarea">

	<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

	<p><textarea name="comment" id="comment" style="width:97%;" rows="10" tabindex="4"></textarea></p>
	
	<?php if ( $user_ID ) : ?>
	
		<p>
			<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
			<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		</p>
		
	<?php endif; ?>
	
	<?php do_action('comment_form', $post->ID); ?>
	
</div><!-- /#textarea -->

</form>

<?php endif; // If registration required and not logged in ?>
</div><!-- /#respond -->

<?php endif; // if you delete this the sky will fall on your head ?>

