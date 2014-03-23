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
	 while (have_posts()) : the_post(); $counter++;
     ?>

		<div class="post-alt blog">

			<?php if ( !get_option('woo_resize') ) { if ( get_post_meta($post->ID, 'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
						
						<a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=57&amp;w=100&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" class="th" /></a>			
				
			<?php } else { ?> <!-- DISPLAY THE DEFAULT IMAGE, IF CUSTOM FIELD HAS NOT BEEN COMPLETED -->
				
				<a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php bloginfo('template_directory'); ?>/images/no-img-thumb.jpg" alt="" class="th" /></a>
				
			<?php } } ?> 		
			
			<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<p class="post_date">Posted on <?php the_time('d F Y'); ?>. <span class="singletags"><?php if (function_exists('the_tags')) { ?><?php the_tags('Tags: ', ', ', ''); ?><?php } ?></span></p>
            

			<div class="entry">
				<?php the_content('<span class="continue">Continue Reading</span>'); ?> 
			</div>

			 <p class="posted">Posted in <?php the_category(', ') ?><span class="comments"><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?></span></p>
		
		</div><!--/post-->		

	<?php endwhile; ?>	
    <?php endif; ?>	
	
	<div class="fix"></div>
	
    <div class="more_entries">
        <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
        <div class="alignleft"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
        <div class="alignright"><?php next_posts_link(' Older Entries &raquo;') ?></div>
        <br class="fix" />
        <?php } ?> 
    </div>		
    
    <div class="fix" style="height:15px"></div>

</div>