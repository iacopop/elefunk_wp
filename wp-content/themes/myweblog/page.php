<?php
/**
 * @package WordPress
 * @subpackage myWebBlog_Theme
 */

get_header(); ?>
					
					<div id="content">
					
						<div id="page-meta" class="clearfix">
							
						</div><!-- End page-meta -->
						
						<div id="page-content">
						
							<?php if (have_posts()) : ?>
						
								<h2 class="pagetitle"><?php the_title(); ?></h2>
								
							<?php endif; ?>
						
							<ul id="posts" class="clearfix">

								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
										
										<li <?php post_class( 'single' ); ?>>
																													
											<div class="post-content">
											
												<?php the_content(); ?>
												
												<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
												
											</div><!-- End post-content -->
										
										</li><!-- End post -->

								<?php endwhile; endif; ?>

							</ul><!-- End posts -->
						
						</div><!-- End page-content -->
							
						<?php include( TEMPLATEPATH . '/ad-footer.php' ); ?>    
					
					</div>
					
					<?php include( TEMPLATEPATH . '/copyright.php' ); ?>
						
				</div><!-- End col-64 (Left Column) -->

				<div class="col-278 right">
				
					<?php get_sidebar(); ?>
										
				</div><!-- End col-278 (Right Column) -->

<?php get_footer(); ?>