		<div id="sidebar">

           <div class="wrap st">
				<h2>MY LATEST WORK</h2>
			</div>
			<div class="box">
	            <div class="pics">

			<?php 
            query_posts('offset=1&showposts=8&cat=' . $GLOBALS['ex_pf'] ); $counter = 0; 
            ?>
            
            <?php if ( have_posts() ) : while(have_posts()) : the_post(); $counter++; ?>
                               
                <?php if ( get_post_meta($post->ID,'thumb', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->

                    <?php $resize = get_option('woo_thumb_resize'); if ($resize) { // Check if we should use the image resizer ?>
        
                    <a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "thumb", $single = true); ?>&amp;h=<?php if ( get_option('woo_thumb_height') <> "" ) { echo get_option('woo_thumb_height'); } else { ?>75<?php } ?>&amp;w=<?php if ( get_option('woo_thumb_width') <> "" ) { echo get_option('woo_thumb_width'); } else { ?>75<?php } ?>&amp;zc=1&amp;q=100" alt="<?php the_title(); ?>" /></a>       
                                        
					<?php } else { ?>
                    
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, "thumb", $single = true); ?>" alt="<?php the_title(); ?>" /></a>
                                    
                    <?php } ?>            

				<?php } ?>

			<?php endwhile; endif; ?>

                </div>
			</div>
			<!--/box-->
            
			<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(1) )  ?>		           

			<div class="two-col">
 
 				<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(2) )  ?>		
                       
            </div>

			<div class="two-col">
            
				<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(3) )  ?>		
                        
            </div>
            

		</div>
		<!--/sidebar -->
