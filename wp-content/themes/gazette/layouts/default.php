<div class="box">

	<?php 
    if (is_paged()) $is_paged = true;
    
     $featposts = get_option('woo_show_carousel'); // Number of featured entries to be shown
     $ex_feat = "-" . get_cat_id(get_option('woo_featured_category'));
     
     $showvideo = get_option('woo_show_video');
     $ex_vid = "-" . get_cat_id(get_option('woo_video_category'));
     
     if($featposts == "true"){ $exclude[] = $ex_feat;}
     if($showvideo == "true"){ $exclude[] = $ex_vid; }
     if(!empty($exclude)){
        $ex = implode(',',$exclude);
     }
          
     $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=$ex&paged=$paged");
     
	 if (have_posts()) : $counter = 0;
	 while (have_posts()) : the_post(); $counter++;?>


	<div class="post <?php if ($counter == 1) { echo 'fl'; } else { echo 'fr'; $counter = 0; } ?>">
            
		    <div class="box-post-content">
            <?php woo_get_image('image',get_option('woo_home_thumb_width'),get_option('woo_home_thumb_height')); ?> 
			<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <p><em><?php the_time('d F Y'); ?></em></p>

			<p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>
            </div>
			<p><span class="continue"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>">Read the full story</a></span></p>
            
		
        <p class="posted">Posted in <?php the_category(', ') ?><span class="comments"><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?></span></p>
		</div><!--/post-->
		
		<?php if ( $counter == 0 ) { echo '<div class="hl-full"></div>'; ?> <div style="clear:both;"></div> <?php } ?>
	
	<?php endwhile; ?>
    <?php endif; ?>
	
	<div class="fix" style="height:1px"></div>
		
    <div class="more_entries">
        <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
        <div class="alignleft"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
        <div class="alignright"><?php next_posts_link(' Older Entries &raquo;') ?></div>
        <br class="fix" />
        <?php } ?> 
    </div>		
    
    <div class="fix" style="height:15px"></div>
	
</div><!--/box-->