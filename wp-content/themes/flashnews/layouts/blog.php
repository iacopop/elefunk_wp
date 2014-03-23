	<?php
		include(TEMPLATEPATH . '/includes/version.php');
		
		$the_query = new WP_Query('cat=-'. $ex_feat . ',-' . $ex_vid . ',-' . $ex_aside . '&showposts=' . $showposts . '&orderby=post_date&order=desc');		
		$wp_query->in_the_loop = true; // Need this for tags to work
		while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;		
	?>
					
        <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        
        <div class="date-comments">
            <p class="fl"><?php the_time('D, M j, Y'); ?></p>    
            <p><span class="fr comments"><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></span></p>
        </div>        
    
        <?php if ( get_post_meta($post->ID, 'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
            
            <img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=75&amp;w=75&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" class="fl" style="margin-top:5px;" />	
            
        <?php } ?> 
    
        <div class="entry">
        		<?php the_content(); ?>
        </div>
        
        <div class="continue-tags">
            <p class="fl"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>">Continue reading...</a></p>
            <p><?php the_tags('<span class="fr tags">', ', ', '</span>'); ?></p>
        </div>    				
	
	<?php endwhile; ?>
	
    <div class="headlines">

	<?php
		include(TEMPLATEPATH . '/includes/version.php');
		
		$the_query = new WP_Query('cat=-'. $ex_feat . ',-' . $ex_vid . ',-' . $ex_aside . '&showposts=' . $show_headlines . '&offset=' . $showposts . '&orderby=post_date&order=desc');			
		$wp_query->in_the_loop = true; // Need this for tags to work
		while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;		
	?>    

        <dl>
            <dt><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> &nbsp; <em><?php the_time('D, M j, Y'); ?></em></dt>
            <dd><a href="#"><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></a></dd>
        </dl>
    
    <?php endwhile; ?>
    
    </div><!--/headlines-->
    
    <?php $archives_page = get_option('woo_archives_page') . '/'; ?>
    
    <div class="ar"><a href="<?php echo "$archives_page"; ?>" class="more">Find more articles in the archives</a></div>
