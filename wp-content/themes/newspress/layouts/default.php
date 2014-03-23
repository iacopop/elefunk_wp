	<?php
		include(TEMPLATEPATH . '/includes/version.php');
		
		$the_query = new WP_Query('cat=-'. $ex_feat . ',-' . $ex_vid . '&showposts=' . $showposts . '&orderby=post_date&order=desc');
				
		while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
	?>
				
		<div class="post">
		
			<?php if ( get_post_meta($post->ID, 'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
				
			    <?php $disable_resize = get_option('woo_resize'); if ($disable_resize) { // Check if we should use the image resizer ?>
                
					<?php if ( get_post_meta($post->ID, 'thumb', true) ) { ?> 
                <img src="<?php echo get_post_meta($post->ID, "thumb", $single = true); ?>" alt="<?php the_title(); ?>" class="th" />
                    <?php } ?>
				
				<?php } else { ?>
                
				<img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=<?php if ( get_option('woo_thumb_height') <> "" ) { echo get_option('woo_thumb_height'); } else { ?>75<?php } ?>&amp;w=<?php if ( get_option('woo_thumb_width') <> "" ) { echo get_option('woo_thumb_width'); } else { ?>75<?php } ?>&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" class="th" />			
                            
                <?php } ?>          

			<?php } else { ?> <!-- DISPLAY THE DEFAULT IMAGE, IF CUSTOM FIELD HAS NOT BEEN COMPLETED -->
				
				<img src="<?php bloginfo('template_directory'); ?>/images/no-img-thumb.jpg" alt="<?php the_title(); ?>" class="th" />
				
			<?php } ?> 		
          
			<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?> <a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" class="more">[...more]</a></p>
			<h3><span><?php the_category(', ') ?></span> <em><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?></em></h3>
			
		</div><!--/post-->
	
	<?php endwhile; ?>
	
	<div class="fix" style="height:0px"></div>
		
	<p><a href="<?php echo bloginfo('wpurl').'/?page_id='.$GLOBALS['archives_id']; ?>" class="more2">Find more articles in the Archives...</a></p>