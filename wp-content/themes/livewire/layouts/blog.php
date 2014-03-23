<div class="box">

	<?php 
	
	$showposts = get_option('woo_other_entries'); // Number of entries to be shown
	include(TEMPLATEPATH . '/includes/version.php');
	
	$the_query = new WP_Query('cat=-'. $ex_feat . ',-' . $ex_vid . '&showposts=' . $showposts . '&orderby=post_date&order=desc');
			
	while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
?>
	
		<?php $counter++; ?>

		<div class="post-alt blog">

			<?php if (!get_option('woo_resize')) : ?>
            
			<?php if ( get_post_meta($post->ID, 'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
				
				<img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=57&amp;w=100&amp;zc=1&amp;q=90" alt="" class="th" />			
				
			<?php } else { ?> <!-- DISPLAY THE DEFAULT IMAGE, IF CUSTOM FIELD HAS NOT BEEN COMPLETED -->
				
				<img src="<?php bloginfo('template_directory'); ?>/images/no-img-thumb.jpg" alt="" class="th" />
				
			<?php } ?> 		
            
            <?php endif; ?>
			
			<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<p class="posted_on">Posted on <?php the_time('d F Y'); ?> <?php edit_post_link(__('Edit'), ' &#183; ', ''); ?></p>

			<div class="entry">
				<?php the_excerpt(); ?>
			</div>

			<div class="postmeta">
        		<span class="posted_in"><?php the_category(', ') ?></span>
        		<span class="comments"><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?></span>
			</div>
		
		</div><!--/post-->		

	<?php endwhile; ?>	
	
	<div class="fix"></div>
	
	<p class="more"><a href="<?php echo bloginfo('wpurl').'/?page_id='.$GLOBALS['archives_id']; ?>">See more articles in the archive</a></p>

</div>