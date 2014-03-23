		<!-- Content Starts -->
		<div id="content" class="wrap">

		<div class="col-left home">
        
		<?php if (is_paged()) $is_paged = true; ?>
		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("paged=$paged"); ?>
		<?php if (have_posts()) : $count = 0; $boxcount = 0;?>
        <?php while (have_posts()) : the_post(); $count++; ?>

            <?php if ($count == 1 && get_option('woo_home_featured') == "true" && !$is_paged) : ?>

			<div id="main">

				<div id="main-content">
																			
                    <?php echo woo_get_embed('embed','640','360'); ?>

					<!-- Post Starts -->
					<div class="post wrap">

						<?php echo get_avatar( get_the_author_id(), '37' ); ?>

                        <div class="fl">
                            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                            <p class="post-details">Posted on <?php the_time('d. M, Y'); ?> by  <?php the_author_posts_link(); ?> in <?php the_category(', ') ?></p>
                        </div>
                        
                        <div class="comment-cloud fr">
                            <a href="<?php comments_link(); ?>"><?php comments_number('0','1','%'); ?></a>
                        </div>                   
                        <?php if(function_exists('the_ratings')) { echo '<div class="fr ratings">'; the_ratings(); echo '</div>'; } ?>
                        
                        <div class="fix"></div>
                        
                        <?php if (get_option('woo_home_content') == "true") the_content(); ?>
 
					</div>
					<!-- Post Ends -->
														
					<?php if (get_option('woo_ad_content_disable') == "false") { ?>            
                        <?php include (TEMPLATEPATH . "/ads/content_ad.php"); $ad_shown = true; ?>
                    <?php }	?>

				</div>
				<!-- main-content ends -->

			</div>
			<!-- main ends -->
            
            <?php continue; endif; ?>
            
            <div class="video-box <?php $boxcount++; if ($boxcount == 3) { echo 'last'; } ?> ">
            
                <div class="inside">

                    <?php woo_get_image('image','190','142'); ?>     
                    <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>

                </div>                    

                <div class="box-bot">    
                    <?php if(function_exists('the_ratings')) { echo '<div class="fl ratings">'; the_ratings(); echo '</div>'; } ?>
                    <div class="comment-cloud fr">
                        <a href="<?php comments_link(); ?>"><?php comments_number('0','1','%'); ?></a>
                    </div>                   
                </div>
                                                
            </div>
            
            <?php if ($boxcount == 3) { $boxcount = 0; echo '<div class="fix"></div>'; } ?>


        <?php endwhile; else: ?>
            <p>Sorry, no posts matched your criteria.</p>
        <?php endif; ?>  
        
        <div class="fix"></div>
        <div class="more_entries">
            <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
            <div class="alignleft"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
            <div class="alignright"><?php next_posts_link(' Older Entries &raquo;') ?></div>
            <br class="fix" />
            <?php } ?> 
        </div>		
              
        </div>
        <!-- .col-left ends -->

        <div class="col-right">
            <?php get_sidebar(); ?>
        </div>
    </div>
    <!-- Content Ends -->
