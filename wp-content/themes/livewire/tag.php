<?php get_header(); ?>

		<div class="col1">

		<?php if (have_posts()) : ?>
		
		<div id="archivebox">
        	
            	<h3><em>Tag Archive |</em> "<?php single_tag_title("", true); ?>"</h3>        
		
		</div><!--/archivebox-->	

			<?php while (have_posts()) : the_post(); ?>		

				<div class="post-alt blog" id="post-<?php the_ID(); ?>">
		
					<?php if (!get_option('woo_resize')) : ?>

					<?php if ( get_post_meta($post->ID, 'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
						
						<img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&h=57&w=100&zc=1&q=90" alt="" class="th" />			
						
					<?php } else { ?> <!-- DISPLAY THE DEFAULT IMAGE, IF CUSTOM FIELD HAS NOT BEEN COMPLETED -->
						
						<img src="<?php bloginfo('template_directory'); ?>/images/no-img-thumb.jpg" alt="" class="th" />
						
					<?php } ?> 		
                    
                    <?php endif; ?>

					
					<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    
					<h3 class="post_date">Posted on <?php the_time('d F Y'); ?></h3>
                    <?php if (function_exists('the_tags')) { ?><p class="singletags"><?php the_tags('Tags: ', ', ', ''); ?></p><?php } ?>
                    <hr style="clear:both;" />
		
					<div class="entry">
						<?php the_content('<span class="continue">Read the full story</span>'); ?> 
					</div>
		
					<div class="postmeta">
        				<span class="posted_in"><?php the_category(', ') ?></span>
        				<span class="comments"><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?></span>
					</div>
				
				</div><!--/post-->

		<?php endwhile; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>		
	
	<?php endif; ?>							

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>