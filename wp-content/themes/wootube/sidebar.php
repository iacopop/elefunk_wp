<!-- Sidebar Starts -->
<div id="sidebar">

	<!-- Widgetized Sidebar -->	
	<div class="widgetized">
	    <?php dynamic_sidebar(2); ?>		           
	</div>	

	<?php if (!get_option('woo_browser') || (get_option('woo_browser') && is_single())) : ?>
    <h2>Browse</h2>
    <div id="video-browser-holder" class="widget">
        <div id="video-browser-crop">
	        <ul id="video-browser">
            <?php $counter = 0; ?>
			<?php $pid = $post->ID; if ($pid && !is_page()) { ?>
            <?php $counter++; ?>
                <li class="video-link active <?php echo $counter; ?>">           
	    	        <a href="<?php the_permalink() ?>" title="View"><?php the_title() ?><br /><span><?php the_time('d. M, Y'); ?> - <?php comments_number('0 comments', '1 comment', '% comments', 'number'); ?></span></a>
                </li>
            <?php } ?>
	        <?php $save_query = $wp_query; query_posts('cat='.$cat.'&tag='.$tag.'&showposts=30'); ?>      
            <?php if (have_posts()) : while (have_posts()) : the_post(); $new_pid = $post->ID; if ( $new_pid == $pid ) continue; ?>
            <?php $counter++; ?>

                <li class="video-link <?php echo $counter; ?>">           
	    	        <a href="<?php the_permalink() ?>" title="View"><?php the_title() ?><br /><span><?php the_time('d. M, Y'); ?> - <?php comments_number('0 comments', '1 comment', '% comments', 'number'); ?></span></a>
                </li>
                
	        <?php endwhile; endif; $wp_query = $save_query; ?>           
            </ul>
        </div>
    </div>    
	<?php endif; ?>

	<!-- Widgetized Sidebar -->	
	<div class="widgetized">
	    <?php dynamic_sidebar(1); ?>		           
	</div>	
	
</div>
<!-- Sidebar Ends -->