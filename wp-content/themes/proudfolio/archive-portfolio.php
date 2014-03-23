<?php if ( have_posts() ): ?>
	
<?php while(have_posts()) : the_post(); ?>
					
					<div class="portfolioItem">
						<h2><?php the_title(); ?></h2>
						
                        <?php $resize = get_option('woo_resize'); if ($resize) { // Check if we should use the image resizer ?>

						<span class="image"><a href="<?php the_permalink(); ?>" title="View Project Details for <?php the_title(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=200&amp;w=600&amp;zc=1&amp;q=90" alt="Preview - <?php the_title(); ?>" /></a></span>
                        
                        <?php } else { ?>
                        
						<span class="image"><a href="<?php the_permalink(); ?>" title="View Project Details for <?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, "image", $single = true); ?>" alt="Preview - <?php the_title(); ?>" /></a></span>
                        
                        <?php } ?>
						
                        <p><?php the_title(); ?> / <?php if ( get_post_meta($post->ID, "url", $single = true) <> "" ) { ?><a href="<?php echo get_post_meta($post->ID, "url", $single = true); ?>" title="Visit The Website">Visit Website</a> /<?php } ?> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">View Project Details</a></p>
					</div><!-- END .portfolioItem -->
	
<?php endwhile; ?>

					<div id="navigation">
	
						<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
	
					</div><!-- /END #navigation-->	

<?php endif; ?>		