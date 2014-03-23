<?php get_header(); ?>

		<div class="col1">

		<?php if (have_posts()) : ?>
		
        		<?php if (is_category()) { ?>
        	
            	<h1><em>Archive |</em> <?php echo single_cat_title(); ?></h1>        

				<div id="archivebox">				
						
						<div class="archivefeed"><?php $cat_obj = $wp_query->get_queried_object(); $cat_id = $cat_obj->cat_ID; echo '<a href="'; get_category_rss_link(true, $cat, ''); echo '">RSS feed for this section</a>'; ?></div>
				
				</div>
            	
				<?php } elseif (is_day()) { ?>
				<h1>Archive | <?php the_time('F jS, Y'); ?></h1>

				<?php } elseif (is_month()) { ?>
				<h1>Archive | <?php the_time('F, Y'); ?></h1>

				<?php } elseif (is_year()) { ?>
				<h1>Archive | <?php the_time('Y'); ?></h1>
				
				<?php } ?>
		
	
			<?php while (have_posts()) : the_post(); ?>		

			<div class="post" id="post-<?php the_ID(); ?>">
			
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
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>		
	
	<?php endif; ?>							

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>