<?php get_header(); ?>
      
	<div id="columns">
		
        <div id="centercol">
			
            <div class="wrap latest">
				<h2>LATEST BLOG ENTRY</h2>
				<div><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" class="rss">SUBSCRIBE</a></div>
			</div>
            
		<?php
			$the_query = new WP_Query('cat=-'. $GLOBALS['ex_pf'] .'&orderby=post_date&order=desc');		
			while ($the_query->have_posts()) : $the_query->the_post(); $count++;	
		?>

			<?php if($count <= get_option('woo_home_normal')) : ?>

			<div class="box post">
				<div class="comment"><?php comments_popup_link(0, '1', '%', '', ''); ?></div>
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<div class="date"><?php the_time('F j, Y'); ?></div>
				<div class="hl"></div>

                <div class="entry">

                <?php if ( get_post_meta($post->ID,'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->

                    <?php $resize = get_option('woo_posts_resize'); if ($resize) { // Check if we should use the image resizer ?>
        
                    <div class="pic"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=<?php if ( get_option('woo_posts_image_height') <> "" ) { echo get_option('woo_posts_image_height'); } else { ?>150<?php } ?>&amp;w=<?php if ( get_option('woo_posts_image_width') <> "" ) { echo get_option('woo_posts_image_width'); } else { ?>440<?php } ?>&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" /></a></div>
                                                                                                                                              
                    <?php } ?>            

				<?php } ?>
                
				<?php if ( get_option('woo_home_excerpt') ) { the_content('Read more...'); } else { the_excerpt(); } ?>
                
                </div><!-- /entry -->
                
			</div>
			<!--/box-->
            
			<?php else: ?>
            
			<?php if($count == (get_option('woo_home_normal')+1) ) : // Display 'PREVIOUS ENTRIES' header ?>
            
            <div class="wrap prev-entries">
				<h2>PREVIOUS ENTRIES</h2>
			</div>
			
			<?php endif; ?>
                        
            <div class="headline">
                <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                <div class="comment"><?php comments_popup_link(0, '1', '%', '', ''); ?></div>
                <div class="date"><?php the_time('F j, Y'); ?></div>
            </div>
            
			<?php endif; ?>
            
            <?php endwhile; ?>
	            
			<div class="ar"><a href="?page_id=<?php echo $GLOBALS['archives_id']; ?>">READ MORE IN THE ARCHIVES</a></div>
            
		</div>
		<!--/centercol -->

<?php get_sidebar(); ?>

		<div class="fix"></div>
	</div>
	<!--/columns -->

<?php get_footer(); ?>