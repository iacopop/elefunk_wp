<?php get_header(); ?>
					<div id="content" class="clearfix">
					
						<div id="left-col">
							
							<div id="post-<?php the_ID(); ?>" class="post">
								<div class="post-meta">
									<h4 class="post-category">404 - Post Not Found</h4>
									<span>Something has gone wrong.</span>															
								</div><!-- End post-meta -->
										
								<div class="post-content clearfix">
									<p>This page was not found. You can try searching for the page below, or browsing the archives.</p>
											
									<p><?php include (TEMPLATEPATH . '/searchform.php'); ?></p>

									<h4>Archives by Month:</h4>
										<ul>
											<?php wp_get_archives('type=monthly'); ?>
										</ul>
											
									<h4>Archives by Subject:</h4>
										<ul>
											 <?php wp_list_categories(); ?>
										</ul>
																						
										</div><!-- End post-content -->
										
							</div><!-- End post -->
																	
						</div><!-- End left-col -->
						
						<?php get_sidebar(); ?><!-- End right-col -->
						
					</div><!-- End content -->
<?php get_footer(); ?>