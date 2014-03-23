<?php get_header(); ?>
<?php if (is_paged()) $is_paged = true; ?>

		<div id="centercol" class="grid_10">

			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=-".$GLOBALS[video_id].",-".$GLOBALS[asides_id]."&paged=$paged"); ?>
            <?php if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); $postcount++;?>
            
            <!-- Featured Starts -->
            <?php if ( $postcount <= get_option('woo_featured_posts') && !$is_paged ) { ?>
            
            <div class="box">
                        
                <div class="featuredpost">
            
				<?php woo_get_image('image',get_option('woo_feat_image_width'),get_option('woo_feat_image_height'),'feat-image'); ?>
                           
                <div class="date-comments">
                    <p class="fl"><?php the_time('j. F Y'); ?></p>
                    <p class="fr"><span class="comments"></span><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></p>
                </div>
        
                <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                
                <div class="entry">
                <?php if ( get_option('woo_content_feat') == "true" ) { the_content('[...]'); } else { the_excerpt(); ?><?php } ?>
				</div>                
                <span class="continue"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>">Continue reading...</a></span>
                
                <div class="fix"></div>
                
                </div><!--/featuredpost -->
                                
            </div><!--/box -->
            
            <?php continue; } ?>
            <!-- Featured Ends -->          

            <?php $counter++; $counter2++; ?>
        
            <?php if ( !$is_paged && get_option('woo_home_one_col') == "false" )  { ?><div class="grid_5 <?php if ($counter == 1) { echo 'alpha'; } else { echo 'omega'; $counter = 0; } ?>"><?php } ?>
            
                <div class="box">
                                
                    <div class="date-comments">
                        <p class="fl"><?php the_time('j. F Y'); ?></p>
                        <p class="fr"><span class="comments"></span><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></p>
                    </div>
                    
                    <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>            

                	<?php woo_get_image('image',get_option('woo_thumb_image_width'),get_option('woo_thumb_image_height'),'post-thumbnail'); ?>
                    
					<div class="entry">
					<?php if ( get_option('woo_content') == "true" ) { the_content('[...]'); } else { the_excerpt(); ?><?php } ?>
					</div>                                        
                    <span class="continue"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>">Continue reading...</a></span>
        
                    <div class="fix"></div>
                </div> <!-- end .box -->		
                 
            <?php if ( !$is_paged && get_option('woo_home_one_col') == "false" )  { ?></div> <!-- end .grid5 --><?php } ?>
            
            <?php if ( $counter == 0 )  { ?> <div class="fix"></div> <?php } ?>    
                    
            <?php endwhile; ?>
			<?php endif; ?>
            
            <div class="fix"></div>

            <div class="more_entries wrap navigation">
                <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
                <div class="fl"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
                <div class="fr"><?php next_posts_link(' Older Entries &raquo;') ?></div>
                <br class="fix" />
                <?php } ?>
            </div>
                   
		</div><!--/centercol-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>