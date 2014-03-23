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
<div class="post-fancy clearfix">
	<div class="left-content">
		<h2 id="comments" class="inline"><?php comments_number('0 Comments', '1 Comment', '% Comments' );?></h2> <h4 class="inline light uppercase">We'd love to hear yours!</h4>

		<?php if ( have_comments() ) : ?>
                
            <ol class="commentlist">
            <?php wp_list_comments('avatar_size=80&callback=custom_comment&type=comment'); ?>
            </ol>    
        
            <div class="navigation">
                <div class="alignleft"><?php previous_comments_link() ?></div>
                <div class="alignright"><?php next_comments_link() ?></div>
                <div class="fix"></div>
            </div>
            <br />
            <?php if ( $comments_by_type['pings'] ) : ?>
            <h2 id="pings">Trackbacks/Pingbacks</h2>
            <ol class="commentlist">
            <?php wp_list_comments('type=pings'); ?>
            </ol>
            <?php endif; ?>
        
         
        <?php else : // this is displayed if there are no comments so far ?>
        
            <?php if ('open' == $post->comment_status) : ?>
                <!-- If comments are open, but there are no comments. -->
        
             <?php else : // comments are closed ?>
                <!-- If comments are closed. -->
                <p class="nocomments">Comments are closed.</p>
        
            <?php endif; ?>
        
        <?php endif; ?>

	</div>
</div>
<br /><br />

</div> <!-- end #comments_wrap -->

<div class="post-fancy">
	<div class="left-content">

		<?php if ('open' == $post->comment_status) : ?>
        
        <div id="respond">
        
		<h2 class="inline"><?php comment_form_title( 'Leave a Reply ', 'Leave a Reply to %s ' ); ?></h2><br /><h4 class="inline light uppercase">Here's your chance to speak.</h4>
        <div class="cancel-comment-reply">
            <p><small><?php cancel_comment_reply_link(); ?></small></p>
        </div>
        
        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
        <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
        <?php else : ?>
        
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="clearfix">
			<ol class="commentform">
				<li class="clearfix">
					<div class="commentform-key">
						<?php if ( $user_ID ) : ?>
							<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(); ?>" title="Log out of this account">Logout &raquo;</a></p>
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
        <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>
		</form>
                
        <?php endif; // If logged in ?>
        
        <div class="fix"></div>
        </div> <!-- end #respond -->
        
        <?php endif; // if you delete this the sky will fall on your head ?>

	</div>
</div>
