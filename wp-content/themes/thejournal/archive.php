<?php get_header(); ?>
    <!-- Content Starts -->
    <div id="content" class="wrap">
		<div class="col-left">
			<div id="main">
            
            <?php
            $show_excerpt = get_settings('woo_excerpt_enable'); 
             if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); $count++; ?>
                                                                        
                <!-- Post Starts -->
                <div class="post wrap">

                    <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <p class="post-details">Posted on <?php the_time('d. M, Y'); ?> by  <?php the_author_posts_link(); ?> in <?php the_category(', ') ?></p>
                    
                    <?php
                    $w = get_settings('woo_archive_page_image_width'); 
                    $h = get_settings('woo_archive_page_image_height'); 
                    
                    woo_get_image('image',$w,$h); 
                     
                    if($show_excerpt == 'true'){
                      the_excerpt();
                    }   else    {
                         the_content();
                    }
                     ?>

                </div>
                <!-- Post Ends -->
                
                <div class="hr"></div>
                                                    
                <?php if (get_option('woo_ad_content') == 'true' && !$ad_shown) { ?>            
                    <?php include (TEMPLATEPATH . "/ads/content_ad.php"); $ad_shown = true; ?>
                <?php }	?>

			<?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>  
        
                <div class="more_entries">
                    <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
                    <div class="alignleft"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
                    <div class="alignright"><?php next_posts_link(' Older Entries &raquo;') ?></div>
                    <br class="fix" />
                    <?php } ?> 
                </div>		
                
            </div><!-- main ends -->
        </div><!-- .col-left ends -->

        <?php get_sidebar(); ?>

    </div><!-- Content Ends -->
		
<?php get_footer(); ?>