<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
					<div id="content" class="clearfix">
					
						<div id="left-col">
							
							<?php if (have_posts()) : ?>

								<?php while (have_posts()) : the_post(); ?>
							
									<div id="post-<?php the_ID(); ?>" class="post">
										<div class="post-meta">
																				
											<span>Written by <?php the_author_posts_link(); ?> - <?php the_time('F jS, Y') ?></span>
											
										</div><!-- End post-meta -->
										
										<div class="post-content clearfix">
											<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
											
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
																		
								<?php endwhile; ?>
								
							<?php endif; ?>
							
						</div><!-- End left-col -->
						
						<?php get_sidebar(); ?><!-- End right-col -->
						
					</div><!-- End content -->
<?php get_footer(); ?>