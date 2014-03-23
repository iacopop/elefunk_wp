<?php get_header(); ?>

	<div id="columns">
		<div id="centercol">

            <div class="content">
                <?php if(have_posts()) : ?><?php while(have_posts()) : the_post() ?>
    
                <div id="post-<?php the_ID(); ?>" class="box post">

                    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                    <div class="date fl"><?php the_time('F j, Y'); ?></div>

                    <?php if ( in_category($GLOBALS['ex_pf']) ) { ?>

                    <div class="portfolio-meta fr">
                    
					<?php if ( get_post_meta($post->ID, "url", $single = true) <> "" ) { ?>
                        <span class="website"><a href="<?php echo get_post_meta($post->ID, "url", $single = true); ?>" title="Visit The Website">Website</a></span> 
					<?php } ?>
                        <span class="details"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Details</a></span>
					<?php if ( get_post_meta($post->ID, "preview", $single = true) <> "" ) { ?>
						<span class="larger"><a href="<?php echo get_post_meta($post->ID, "preview", $single = true); ?>" title="Preview - <?php the_title(); ?>" rel="lightbox">Large Image</a></span>
					<?php } ?>
                    </div>

                    <?php } ?>
                    
                                        
                    <div class="hl"></div>
    
                    <div class="entry">
                        
                    <?php if ( get_post_meta($post->ID,'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
    
                        <?php $resize = get_option('woo_posts_resize'); if ($resize) { // Check if we should use the image resizer ?>
            
                        <div class="pic">
                        	<a title="Permanent Link to <?php the_title(); ?>" href="<?php echo get_post_meta($post->ID, "image", $single = true); ?>" rel="lightbox" >
                            	<img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=<?php if ( get_option('woo_posts_image_height') <> "" ) { echo get_option('woo_posts_image_height'); } else { ?>150<?php } ?>&amp;w=<?php if ( get_option('woo_posts_image_width') <> "" ) { echo get_option('woo_posts_image_width'); } else { ?>440<?php } ?>&amp;zc=1&amp;q=100" alt="<?php the_title(); ?>" />
                            </a>
                        </div>
                                                                                                                                                  
                        <?php } ?>            
    
                    <?php } ?>
                        
    
                        <?php the_content(); ?>
                    
                    </div><!-- /entry -->
                                        
                    <?php the_tags(' <p><strong>Tags: </strong>', ', ' , '</p>'); ?>
                
                </div>
                <!--/box-->
    
                <div id="comments"><?php comments_template(); ?></div>
    
                <?php endwhile; else : ?>
    
                <div class="post box">
                    <div class="entry-head"><h2>404 - Not Found</h2></div>
                    <div class="entry-content"><p>The page you are looking for is not here.</p></div>
                </div>
    
                <?php endif; ?>
            </div>
    
		</div>
		<!--/centercol -->

<?php get_sidebar(); ?>
    
		<div class="fix"></div>
	</div>
	<!--/columns -->

<?php get_footer(); ?>