<?php
                    
	$showfeatured = get_option('woo_show_featured');
   if ( $showfeatured ) { 
                
?>

<div class="box">

    <div class="top"></div>
    
    <div class="spacer"> 
    
    	<div id="arrows">
			<a id="prev2" href="#"><img src="<?php bloginfo('template_directory'); ?>/images/left-bar.gif" alt="" class="fl" /></a>
    		<a id="next2" href="#"><img src="<?php bloginfo('template_directory'); ?>/images/right-bar.gif" alt="" class="fr" /></a>
    	</div><!--/arrows -->
    	
    	<div class="featuredpost">

			<?php 
	
				$showfeatured = get_option('woo_featured_entries'); // Number of other entries to be shown
				include(TEMPLATEPATH . '/includes/version.php');
	
				$the_query = new WP_Query('cat=' . $ex_feat . '&showposts=' . $showfeatured . '&orderby=post_date&order=desc');
				$wp_query->in_the_loop = true; // Need this for tags to work
			
				while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
			?>
		
            <div class="featureditem">
    
                <div class="col4">
                    <img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=210&amp;w=310&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" />
                </div>
            
                <div class="col5">
                
                    <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    <div class="date-comments">
                        <p class="fl"><?php the_time('l, F j, Y'); ?></p>
                        <p class="fr"><span class="comments"></span><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></p>
                    </div>
                    
                    <p class="content"><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>
                    
                    <div class="continue-tags">
                        <p class="fl"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>">Continue reading...</a></p>
                        <p><?php the_tags('<span class="fr tags">', ', ', '</span>'); ?></p>
                         
                    </div>    	
                    
                </div><!--/col5 -->		
    
            </div>

			<?php endwhile; ?>

		</div><!--/featuredpost -->
        
        <div class="fix"></div>
        
    </div><!--/spacer -->
    
    <div class="bot"></div>
    
</div><!--/box -->

<?php
                    
	}
                
?>