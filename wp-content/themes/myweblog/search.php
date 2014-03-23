<?php
/**
 * @package WordPress
 * @subpackage myWebBlog_Theme
 */

get_header(); ?>
				
					<div id="content">
					
						<div id="page-meta" class="clearfix">
						
                             <div class="clearfix">
                             <div class="pagination">
                                    <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
                                    <div class="wp-pagenavi">
                                        <div class="alignleft"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
                                        <div class="alignright"><?php next_posts_link(' Older Entries &raquo;') ?></div>
                                        <br class="clearfix" />
                                    </div>
                                    <?php } ?> 
                            </div>
                            </div>
							
						</div><!-- End page-meta -->
						
						<div id="page-content">
						
							<h2 class="pagetitle-sep">Search Results</h2>
							
							<ul id="posts" class="clearfix">
							
								<?php if (have_posts()) : ?>

									<?php while (have_posts()) : the_post(); $category = get_the_category(); ?>
							
										<?php 
											if( get_post_meta( $post->ID, "quickpress", true ) == "No" || get_post_meta( $post->ID, "quickpress",true ) == "") {
												$class = "quickpress";
											} else {
												$class = "";
											}
						
										?> 
							
										<li <?php post_class( $class ); ?>>
										
											<div class="post-meta clearfix" style="border-top:4px solid #<?php echo get_settings( 'woo_cat_color_' . $category[0]->cat_ID ); ?>">
										
												<h3 class="left"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
												
												<div class="categories" style="background:#<?php echo get_settings( 'woo_cat_color_' . $category[0]->cat_ID ); ?>;">
													<a href="<?php echo get_category_link( $category[0]->cat_ID ); ?>"><?php echo $category[0]->cat_name; ?></a>
												</div>
												
											</div><!-- End post-meta -->
											
											<div class="post-content clearfix">
											
												<?php the_excerpt(); ?>
												
											</div><!-- End post-content -->
										
										</li><!-- End post -->
								
									<?php endwhile; ?>
									
								<?php else : ?>
								
									<li class="single">
									
										<div class="post-content">
											
											<h1>Sorry, No posts were found.</h1>
											
											<p>Try searching with a different keyword below:</p>
											
											<p><?php get_search_form(); ?></p>
													
										</div><!-- End post-content -->
									
									</li>
								
								<?php endif; ?>
							
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