<div class="box">

	<?php
		$showposts = get_option('woo_other_entries'); // Number of entries to be shown
		include(TEMPLATEPATH . '/includes/version.php');
		
		$the_query = new WP_Query('cat=-'. $ex_feat . ',-' . $ex_vid . '&showposts=' . $showposts . '&orderby=post_date&order=desc&offset=1');
		
		$counter = 0; $counter2 = 0;
				
		while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
	?>
	
		<?php $counter++; $counter2++; ?>
				
		<div class="post <?php if ($counter == 1) { echo 'fl'; } else { echo 'fr'; $counter = 0; } ?>"><!--/start post-->
		
			<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <p class="posted_on"><?php the_time('d F Y'); ?> <?php edit_post_link(__('Edit'), ' &#183; ', ''); ?></p>
			<p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>
		
        <div class="postmeta">
        	<span class="posted_in"><?php the_category(', ') ?></span>
        	<span class="comments"><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?></span>
		</div>
        
        </div><!--/post-->
		
		<?php if ( !($counter2 == $showposts) && ($counter == 0) ) { echo '<div class="hl-full"></div>'; ?> <div style="clear:both;"></div> <?php } ?>
	
	<?php endwhile; ?>
		
	<p class="more"><a href="<?php echo bloginfo('wpurl').'/?page_id='.$GLOBALS['archives_id']; ?>">See more articles in the archive</a></p>
	
</div><!--/box-->