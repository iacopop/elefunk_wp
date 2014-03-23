<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = '-alt';
?>
<div class="post-fancy clearfix">
	<div class="left-content">
		<h2 id="comments" class="inline"><?php comments_number('0 Comments', '1 Comment', '% Comments' );?></h2> <h4 class="inline light uppercase">We'd love to hear yours!</h4>
		<?php if ($comments) : ?>
		<ol class="commentlist" style="padding:1px 194px 0 0 !important;">
			<?php foreach ($comments as $comment) : ?>

                <li id="comment-<?php comment_ID() ?>" class="clearfix">
                    <div class="comment-author">
						<?php echo get_avatar( $comment, 80 ); ?><br /><br />
						<p><a href="<?php comment_author_url(); ?>">Visit My Website</a></p>
						<p><?php comment_date('F j, Y') ?></p>
						<p><a href="#comment-<?php comment_ID() ?>" title="">Permalink</a></p>
                    </div>
                    <div class="comment-text<?php echo $oddcomment; ?>" style="width:100%;overflow:auto;">
                        <?php if ($comment->comment_approved == '0') : ?>
                            <p><em class="bold georgia">Your comment is awaiting moderation.</em></p>
                        <?php endif; ?>
                        <p class="large verdana bold pink block"><?php comment_author(); ?> <span class="light">said:</span></p><br />
                        <?php comment_text() ?>
                
                   </div>
				</li>
				<?php $oddcomment = ( empty( $oddcomment ) ) ? '-alt' : '';	?>
			<?php endforeach; /* end for each comment */ ?>
		</ol>
		 <?php else : // this is displayed if there are no comments so far ?>

			<?php if ('open' == $post->comment_status) : ?>

			 <?php else : // comments are closed ?>
				<!-- If comments are closed. -->
				<p class="nocomments">Comments are closed.</p>
		
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
	<br /><br />
<div class="post-fancy">
	<div class="left-content">
		<?php if ('open' == $post->comment_status) : ?>
		
		<h2 id="respond" class="inline">Leave a Comment</h2> <h4 class="inline light uppercase">Here's your chance to speak.</h4>
		
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
		
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="clearfix">
			<ol class="commentform">
				<li class="clearfix">
					<div class="commentform-key">
						<?php if ( $user_ID ) : ?>
							<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
						<?php else : ?>
							<?php if ( !$user_ID ) : ?>
							<p>Name <?php if ($req) echo "(required)"; ?></p>
							<p>Mail <?php if ($req) echo "(required)"; ?></p>
							<p>Website</p>
							<?php endif; ?>
							<p>Message</p>					
						<?php endif; ?>
					</div>
					<div class="comment-box">
						<?php if ( !$user_ID ) : ?>
						<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="32" tabindex="1" class="text" /></p>
						<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="32" tabindex="2" class="text" /></p>
						<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="32" tabindex="3" class="text" /></p>
						<?php endif; ?>
						<p><textarea name="comment" id="comment" cols="40" rows="10" tabindex="4" class="text"></textarea></p>
						<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit" class="submit" />
							<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
						</p>
					</div>
				</li>
			</ol>
		<?php do_action('comment_form', $post->ID); ?>
		</form>

		<?php endif; // If registration required and not logged in ?>
		<?php endif; // if you delete this the sky will fall on your head ?>
	</div>
</div>
