<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>
      
	<div id="columns" class="no-bg">
				
            <h2>MY PORTFOLIO</h2>
            
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=".$GLOBALS['ex_pf']."&paged=$paged"); if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); $count++; ?>

			<div class="box portfolio">

				<?php if ( get_post_meta($post->ID,'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
                
				<div class="pic fl">

					<?php $resize = get_option('woo_portfolio_resize'); if ($resize) { // Check if we should use the image resizer ?>

                    <a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=<?php if ( get_option('woo_portfolio_image_height') <> "" ) { echo get_option('woo_portfolio_image_height'); } else { ?>180<?php } ?>&amp;w=<?php if ( get_option('woo_portfolio_image_width') <> "" ) { echo get_option('woo_portfolio_image_width'); } else { ?>515<?php } ?>&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" /></a>       
 
                     <?php } else { ?>
                    
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, "image", $single = true); ?>" alt="<?php the_title(); ?>" /></a>
                                    
                    <?php } ?>            

                </div>   	
               
				<?php } ?>										
                                
				<div class="item-text">

                    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                    
                    <div class="portfolio-meta">
                    
					<?php if ( get_post_meta($post->ID, "url", $single = true) <> "" ) { ?>
                        <span class="website"><a href="<?php echo get_post_meta($post->ID, "url", $single = true); ?>" title="Visit The Website">Website</a></span> 
					<?php } ?>
                        <span class="details"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Details</a></span>
					<?php if ( get_post_meta($post->ID, "preview", $single = true) <> "" ) { ?>
						<span class="larger"><a href="<?php echo get_post_meta($post->ID, "preview", $single = true); ?>" title="Preview - <?php the_title(); ?>" rel="lightbox">Large Image</a></span>
					<?php } ?>
                    </div>
                    <div class="fix"></div>
                                        
                    <?php the_excerpt(); ?>
                    
                </div>               
                
				<div class="fix"></div>
			</div>
			<!--/box-->
                                   
            <?php endwhile; ?>

            <?php endif; ?>
            
            <div class="navigation">
                <div class="fl"><?php next_posts_link('&laquo; Previous Entries') ?></div>
                <div class="fr"><?php previous_posts_link('Next Entries &raquo;') ?></div>
            </div>		

		<div class="fix"></div>
	</div>
	<!--/columns -->

<?php get_footer(); ?>