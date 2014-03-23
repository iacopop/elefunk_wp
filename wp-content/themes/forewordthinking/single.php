<?php get_header(); ?>

<div class="row_dot_border"></div>
    
 <?php if (have_posts()) : ?>
 
			<?php while (have_posts()) : the_post(); ?>
            
            <?php if (!get_option('woo_image_single') == 'true' ) woo_get_image('image',get_option('woo_single_width'),get_option('woo_single_height'),'single_thumb'); ?>
            
			<div class="nav">
            	<p class="header_meta fl"><span class="post_bg<?php echo rand(1,6); ?>" <?php woo_box_color(); ?>><?php the_time('d M y'); ?></span> Posted in <?php the_category(', ') ?></p> 
                <p class="fr">by <?php the_author(); ?> <?php edit_post_link(__('Edit this post'), ' - ', ''); ?></p>
            </div>
            
            <div class="post">
          
                <h2 class="post_title"><?php the_title(); ?></h2>
            	<div class="entry">
					<?php the_content(); ?>
                    
                    <p class="postmetadata alt">
					<small>
						You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

						<?php } edit_post_link('Edit this entry','','.'); ?>

					</small>
				</p>
                </div>
                
                <div class="navigation">
					<div class="previous">
					<p><?php previous_post_link('&laquo; %link') ?></p>
                    </div>
					<div class="next">
					<p><?php next_post_link('%link &raquo;') ?></p>
                    </div>
				</div>
                
			</div>
            
            <div id="comments">
				
					<?php comments_template(); ?>
					
			</div>
	
	<?php endwhile; else: ?>

			<p>Sorry, no posts matched your criteria.</p>

			<?php endif; ?>

</div><!-- Content -->


<?php get_sidebar(); ?>
 
    	    
<?php get_footer(); ?>
