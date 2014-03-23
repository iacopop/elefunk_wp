<?php get_header(); ?>

		<!-- Content Starts -->
		<div id="content" class="wrap">
			<div id="main" class="col-left">

				<div id="main-content">

					<?php if (have_posts()) : ?>
                    <h2 class="arh">Search results</h2>
                    <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Latest Starts -->
                        <div class="archives post wrap">
                        
                            <div class="block">
                                <div class="comment-cloud fr">
                                    <a href="<?php comments_link(); ?>"><?php comments_number('0','1','%'); ?></a>
                                </div>
                                <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                <p class="post-details">Posted on <?php the_time('d. M, Y'); ?> by  <?php the_author_posts_link(); ?>.</p>
                                <?php the_excerpt('[...]'); ?>
                                <h4 class="continue"><a href="<?php the_permalink() ?>">View</a></h4>
                            </div>
                        
                        </div>
                        <!-- Latest Ends -->
                        
                    <?php endwhile; ?>
                    <div class="more_entries">
                        <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
                        <div class="alignleft"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
                        <div class="alignright"><?php next_posts_link(' Older Entries &raquo;') ?></div>
                        <br class="fix" />
                        <?php } ?> 
                    </div>		
                    
                    <?php else : ?>
                    
                    <h2 class="arh">Search results</h2>
                    <p>No matches. Please try again, or use the navigation menus to find what you are looking for.</p>
                    
                    <?php endif; ?>
																																	
				</div>
				<!-- main-content ends -->

			</div>
			<!-- main ends -->
            			
			<div class="col-right">
				<?php get_sidebar(); ?>
			</div>
		</div>
		<!-- Content Ends -->
        
<?php get_footer(); ?>
