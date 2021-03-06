<?php get_header(); ?>

	<?php if ( get_option('woo_twitter') ) { ?>
			
			<div class="twitter clearfix">
				<h6>Latest tweet from Twitter</h6>
				<ul id="twitter_update_list"><li></li></ul>
			</div><!-- End twitter -->
	
	<?php } ?>
					
			<div id="content" class="clearfix">
				
				<div id="left-col">
							
					<?php if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>
							
							<div id="post-<?php the_ID(); ?>" class="post">
								<div class="post-meta">
										
									<?php // To show only 1 Category
										$category = get_the_category();
									?>
										
									<h4 class="post-category">
										<a href="<?php echo get_category_link( $category[0]->cat_ID ); ?>"><?php echo $category[0]->cat_name; ?></a>
									</h4>
										
									<span>Posted by <?php the_author_posts_link(); ?> - <?php the_time('F jS, Y') ?> <?php comments_popup_link( 'Comments 0', 'Comments 1', 'Comments %'); ?></span>
										
								</div><!-- End post-meta (post-<?php the_ID(); ?>) -->
										
								<div class="post-content clearfix">
									<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									
									<?php the_content(''); ?>
											
									<a href="<?php the_permalink() ?>#more-post-<?php the_ID(); ?>" class="continue-reading">Continue Reading...</a>
											
								</div><!-- End post-content (post-<?php the_ID(); ?>) -->
										
							</div><!-- End post-<?php the_ID(); ?> -->
									
						<?php endwhile; ?>
								
							<div class="single-meta clearfix">
								<div class="left"><h4 class="single-info font-georgia color-white size"><?php next_posts_link('&laquo; Older Entries') ?></h4></div>
								<div class="right"><h4 class="single-info font-georgia color-white"><?php previous_posts_link('Newer Entries &raquo;') ?></h4></div>
							</div>
								
					<?php endif; ?>
							
				</div><!-- End left-col -->
						
				<?php get_sidebar(); ?><!-- End right-col -->
					
			</div><!-- End content -->
			
<?php get_footer(); ?>