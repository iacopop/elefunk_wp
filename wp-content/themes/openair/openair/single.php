<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); $preview = get_post_meta($post->ID, 'preview', true); ?>
		<div id="featured">
			<div class="container">
				<div class="featured-small clearfix">
					<h2 class="featured"><?php the_title(); ?></h2>
				</div>
			</div>
		</div>

		<div id="content">

            <div class="container clearfix">
                <div id="left-col">
                    <ul class="post-list clearfix">
                        <li class="post-last clearfix">
                            <div class="meta">
                                <h3><?php the_category(', ') ?></h3>
                                    <p>Posted on <?php the_time('F jS, Y') ?></p>
                                    <p>Written by <?php the_author(); ?></p>
                        
                                <h4 class="related-posts">Related Posts</h4>
                                    <ul class="related_posts">
                                            <?php rp_related_posts(''); ?>
                                        </ul>
                                    
                                <h4 class="tags">Tags</h4>
                                    <?php the_tags( '', ', ', ''); ?>
                            </div>
                            <div class="post-content">
                                <?php if ( get_option('woo_image_disable') == 'false' ) { ?> 
        
                                <?php woo_get_image('image',get_option('woo_image_width'),get_option('woo_image_height'),'thumb alignleft'); ?>
        
                                <?php } ?>
                                
                                <?php the_content('Continue Reading...'); ?>
                                
                                <div class="box small arial">
                                    This entry was posted
                                    on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
                                    and is filed under <?php the_category(', ') ?>.
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
            
                                    <?php } edit_post_link('Edit this entry.','',''); ?>
                                </div>
                            </div>
                        </li>
                            <?php comments_template(); ?>
                    </ul>
                </div>
                <div id="right-col">
                    <?php get_sidebar(); ?>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
                <p>Sorry, no posts matched your criteria.</p>
        <?php endif; ?>
        </div> <!-- / content -->
<?php get_footer(); ?>
