        <!-- FIRST LOOP (start) Only show posts from category ("portfolio") -->
        
		<?php 
		$showfeatured = get_option('woo_featured_entries'); // Number of other entries to be shown
		$the_query = new WP_Query('cat=' . $GLOBALS['ex_pf'] . '&showposts=1&orderby=post_date&order=desc');
		$wp_query->in_the_loop = true; // Need this for tags to work
	
		while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
		?>    
        
        <div id="latest">
        
			<?php if ( get_post_meta($post->ID,'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
            
            <div class="pic">

                <?php $resize = get_option('woo_portfolio_resize'); if ($resize) { // Check if we should use the image resizer ?>

                <a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=<?php if ( get_option('woo_portfolio_image_height') <> "" ) { echo get_option('woo_portfolio_image_height'); } else { ?>180<?php } ?>&amp;w=<?php if ( get_option('woo_portfolio_image_width') <> "" ) { echo get_option('woo_portfolio_image_width'); } else { ?>515<?php } ?>&amp;zc=1&amp;q=100" alt="<?php the_title(); ?>" /></a>       

                 <?php } else { ?>
                
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, "image", $single = true); ?>" alt="<?php the_title(); ?>" /></a>
                                
                <?php } ?>            

            </div>   	
           
            <?php } ?>										
    
            <div class="demo">
                <p class="fl">LATEST PROJECT: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                
				<?php if ( get_post_meta($post->ID,'url', true) ) { ?>
                
                <p class="fr"><a href="<?php echo get_post_meta($post->ID, "url", $single = true); ?>" class="btn-demo">VIEW</a></p>
                
                <?php } else { ?>
                
                <p class="fr"><a href="<?php the_permalink() ?>" class="btn-demo">VIEW</a></p>
                
                <?php } ?>                
            </div>
            <!--/demo-->
        
        </div>
        <!--/latest-->
        
        <?php endwhile;  ?>					
                        
        <!-- FIRST LOOP (end) -->
