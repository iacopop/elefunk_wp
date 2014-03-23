<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
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
	$oddcomment = '';
?>

<div id="comments" class="post">

<?php if ($comments) : ?>

	<div class="single-meta clearfix">
		<h4 class="single-info comment-count"><?php comments_number( '0 Comments', '1 Comment', '% Comments' );?></h4>
		<dl id="social-sites" class="clearfix">
			<dd><a href="http://feeds.feedburner.com/wefunction" class="social-rss" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">Subscribe</abbr>'); ?></a></dd>
			<dd><a href="http://digg.com/submit?phase=2&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&bodytext=<?php the_excerpt() ?>" title="Digg this story" class="social-digg">Digg <?php the_title(); ?></a></dd>
			<dd><a href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php the_title(); ?>" class="social-delicious" title="Add to Del.icio.us">Delicious: <?php the_title(); ?></a></dd>
			<dd><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>" title="StumbleUpon: <?php the_title(); ?>" class="social-stumble">StumbleUpon: <?php the_title(); ?></a></dd>
		</dl>
	</div>

	<ol class="commentlist">

		<?php foreach ($comments as $comment) : ?>
	
			<li id="comment-<?php comment_ID() ?>" class="clearfix<?php echo $oddcomment; ?>">	
				
				<div class="comment-meta">
				
					<div class="comment-author">
					
						<p>
							<span class="color-white size-large"><?php comment_author_link() ?></span>
							<br />
							<span class="size-small">on <?php comment_date('F jS, Y') ?></span>
						</p>
				
					</div>
				
          		<?php  if ( get_option('woo_gravatar') == 'true' ) { 
            		// Determine which gravatar to use for the user
						$email =  $comment->comment_author_email;
						$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($email). "&default=".urlencode($GLOBALS['defaultgravatar'])."&size=32"; 
					?>							
					
					<span class="comment-gravatar"><img src="<?php echo $grav_url; ?>" width="32" height="32" alt="" /></span>
					
					<?php } ?>									
					
				</div>
				
				<div class="comment-text">
					<?php comment_text() ?>
				</div>
	
			</li>
	
			<?php $oddcomment = ( empty( $oddcomment ) ) ? ' comment-alt' : '';	?>
	
		<?php endforeach;  ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
	
<?php endif; ?>

</div><!-- End post (Comment List) -->


<div id="comments" class="post">
	<div class="single-meta">

		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<h4 id="respond" class="single-info">You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</h4>
			
			</div>
			</div>
		<?php else : ?>
			<h4 id="respond" class="single-info">Share your comment</h4>
	</div>
	
	<ul class="commentlist">
		<li>
			<?php if ('open' == $post->comment_status) : ?>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="clearfix">
			
					<?php if ( $user_ID ) : ?>
						<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
			
					<?php else : ?>
					
						<div class="comment-author">
				
							<p><label for="author">Name <?php if ($req) echo "(required)"; ?></label></p>
							
							<p><label for="email">Mail <?php if ($req) echo "(required)"; ?></label></p>
								
							<p><label for="url">Website</label></p>
							
						</div>
		
					<?php endif; ?>
					
					<?php if ( !$user_ID ) : ?>
						<div class="comment-text">
					<?php endif; ?>
		
						<?php if ( !$user_ID ) : ?>
						
							<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="35" tabindex="1" class="input" /></p>
							
							<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="35" tabindex="2" class="input" /></p>
							
							<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="35" tabindex="3" class="input" /></p>
							
						<?php endif; ?>
		
							<textarea name="comment" id="comment" cols="<?php if ( $user_ID ) : ?>90%<?php else : ?>52% <?php endif; ?>" rows="10" tabindex="4" class="input"></textarea>
				
							<p><input name="submit" type="image" src="<?php bloginfo('template_directory'); ?>/styles/<?php global $style_path; echo $style_path; ?>/submit.jpg" id="submit" tabindex="5" value="Submit Comment" /></p>
							<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
			
							<?php do_action('comment_form', $post->ID); ?>
					
					<?php if ( !$user_ID ) : ?>
						</div>
					<?php endif; ?>
			
				</form>
				
			<?php else : ?>
			
				<p>Sorry, comments are closed for this entry.</p>
									
			<?php endif; ?>
		</li>
	</ul>
	
<?php endif; ?>

</div><!-- End post (Respond) -->