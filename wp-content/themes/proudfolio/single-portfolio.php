<?php if ( have_posts() ): ?>
	
	<?php while(have_posts()) : the_post(); ?>
					
					<div class="portfolioItem">

						<h2><?php the_title(); ?></h2>

                        <?php $resize = get_option('woo_resize'); if ($resize) { // Check if we should use the image resizer ?>
                        
						<span class="image"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=200&amp;w=600&amp;zc=1&amp;q=90" alt="Preview - <?php the_title(); ?>" /></span>
                        
                        <?php } else { ?>
                        
						<img src="<?php echo get_post_meta($post->ID, "image", $single = true); ?>" alt="Preview - <?php the_title(); ?>" />
                        
                        <?php } ?>                       
                        
						<ul>
							<?php if ( get_post_meta($post->ID, "url", $single = true)  <> "" ) { ?>
							<li>
								<a href="<?php echo get_post_meta($post->ID, "url", $single = true); ?>" title="Visit The Website">Visit Website &#187;</a>
							</li>
							<?php } ?>
							<?php if ( get_post_meta($post->ID, "preview", $single = true) <> "" ) { ?>
							<li>
								<a href="<?php echo get_post_meta($post->ID, "preview", $single = true); ?>" title="Preview - <?php the_title(); ?>" rel="lightbox">View Larger Image &#187;</a>
							</li>
							<?php } ?>
						</ul>
						<p><?php the_content(); ?></p>
						<p><?php the_tags('<strong>Tags: </strong>', ', ' , ''); ?></p>
	
					</div><!-- END .portfolioItem -->
	
	<?php endwhile; ?>

<?php endif; ?>		