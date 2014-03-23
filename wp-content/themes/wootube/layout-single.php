		<!-- Content Starts -->
		<div id="content" class="wrap">
			<div id="main" class="col-left">

			<?php query_posts("&showposts=1"); ?>
            <?php if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); $postcount++;?>

				<div id="main-content">
																			
                    <?php echo woo_get_embed('embed','640','360'); ?>

					<!-- Post Starts -->
					<div class="post wrap">

						<?php echo get_avatar( get_the_author_id(), '37' ); ?>

                        <div class="fl">
                            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                            <p class="post-details">Posted on <?php the_time('d. M, Y'); ?> by  <?php the_author_posts_link(); ?> in <?php the_category(', ') ?></p>
                        </div>
                        
                        <?php if(function_exists('the_ratings')) { echo '<div class="fr ratings">'; the_ratings(); echo '</div>'; } ?>
                        
                        <div class="fix"></div>
                        
                        <?php the_content(); ?>
                        <?php the_tags('<p class="tags">', ', ', '</p>'); ?>
 
                        <!-- Content Ad Starts -->
                        <?php if (get_option('woo_ad_content_disable') == "false" && !$is_paged && !$ad_shown) { include (TEMPLATEPATH . "/ads/content_ad.php"); $ad_shown = true; } ?>
                        <!-- Content Ad Ends -->

					</div>
					<!-- Post Ends -->
														
				</div>
				<!-- main-content ends -->

				<!-- show embed code -->
				<?php include(TEMPLATEPATH . "/includes/embed.php"); ?>
	
                <div id="comments">
                    <?php $withcomments = 1; comments_template(); ?>
                </div>

			<?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>

			</div>
			<!-- main ends -->
            			
			<div class="col-right">
				<?php get_sidebar(); ?>
			</div>
		</div>
		<!-- Content Ends -->
