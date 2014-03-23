<?php 
	
	$showfeatured = get_option('woo_featured_entries'); // Number of other entries to be shown
	include(TEMPLATEPATH . '/includes/version.php');
	
	$the_query = new WP_Query('cat=' . $ex_feat . '&showposts=' . $showfeatured . '&orderby=post_date&order=desc');
			
	while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
?>

<div class="post">
	
	<div class="featured">
	

		<?php if ( get_post_meta($post->ID, 'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
			
			<?php $disable_resize = get_option('woo_resize'); if ($disable_resize) { // Check if we should use the image resizer ?>
        
        <div class="pic" style="background: url(<?php echo get_post_meta($post->ID, "image", $single = true); ?>)">
            <h3>Featured article</h3>
        </div>		

			<?php } else { ?>
        
		<div class="pic" style="background: url(<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=<?php if ( get_option('woo_image_height') <> "" ) { echo get_option('woo_image_height'); } else { ?>225<?php } ?>&amp;w=<?php if ( get_option('woo_image_width') <> "" ) { echo get_option('woo_image_width'); } else { ?>475<?php } ?>&amp;zc=1&amp;q=90) no-repeat top left;">
			<h3>Featured article</h3>
		</div>		
                    
			<?php } ?>            
			
		<?php } else { ?> <!-- DISPLAY THE DEFAULT IMAGE, IF CUSTOM FIELD HAS NOT BEEN COMPLETED -->
			
		<div class="pic" style="background: url(<?php bloginfo('template_directory'); ?>/images/default.jpg) no-repeat top left;">
			<h3>Featured article</h3>
		</div>
			
		<?php } ?>                 
	
		<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<p class="posted">Posted on <?php the_time('d F Y'); ?></p>
		
		<p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?> <a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" class="more">Continue Reading...</a></p>
	
	</div><!--/featured-->
	
	<h3><span><?php the_category(', ') ?></span> <em><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?></em></h3>

</div><!--/post-->

<?php endwhile; ?>