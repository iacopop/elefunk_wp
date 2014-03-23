<?php
/**
 * @package WordPress
 * @subpackage myWebBlog_Theme
 */

get_header();
?>				
					
					<div id="content">
					
						<div id="page-meta" class="clearfix">
	
							<div class="left"><?php previous_post_link('&laquo; %link') ?></div>
							<div class="right"><?php next_post_link('%link &raquo;') ?></div>
								
						</div><!-- End page-meta -->
						
						<div id="page-content">
						
							<ul id="posts" class="clearfix">
							
								<?php if (have_posts()) : ?>

									<?php while (have_posts()) : the_post(); $category = get_the_category(); ?>
							
										<li <?php post_class(); ?>>
                                        
                                        <?php $cat_id = $category[0]->cat_ID; ?>
										
											<div class="post-meta clearfix" style="border-top:4px solid #<?php echo get_settings( 'woo_cat_color_' . $cat_id ); ?>">
										
												<h3 class="left larger"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
												
												<div class="categories" style="background:#<?php echo get_settings( 'woo_cat_color_' . $cat_id ); ?>;">
													<a href="<?php echo get_category_link( $category[0]->cat_ID ); ?>"  title="<?php echo get_cat_name($cat_id);?>"><?php echo get_cat_name($cat_id); ?></a>
												</div>
												
											</div><!-- End post-meta -->
											<div class="page-meta-meta">
                                            <?php the_time(' jS F Y', '', '', false); ?> - 

                                <span class="author vcard">By <a class="url fn n" href="<?php echo get_author_link(false, $authordata->ID, $authordata->user_nicename); ?>" title="<?php echo $authordata->display_name; ?>"><?php echo get_the_author(); ?></a></span>

                                            
                                            </div>
											<div class="post-content clearfix">
											
												<?php if( ((get_post_meta( $post->ID, "image", true ) || get_option('woo_auto_img') == 'true')) && get_option('woo_single_thumb') == 'true' ): ?>
											
													<div class="wp-caption-thumb alignleft"><?php echo woo_get_image('image','303','130'); ?></div>
													
												<?php endif; ?>
											
												<?php the_content(); ?>
												
											</div><!-- End post-content -->
										
										</li><!-- End post -->
										
										<li class="single">
											<div class="post-content">
												<?php comments_template(); ?>
											</div>
										</li>
								
									<?php endwhile; ?>
								
								<?php endif; ?>
							
							</ul><!-- End posts -->
							
							<br />
						
						</div><!-- End page-content -->
							
						<?php include( TEMPLATEPATH . '/ad-footer.php' ); ?>    
					
					</div>
					
					<?php include( TEMPLATEPATH . '/copyright.php' ); ?>
						
				</div><!-- End col-64 (Left Column) -->

				<div class="col-278 right">
				
					<?php get_sidebar(); ?>
										
				</div><!-- End col-278 (Right Column) -->

<?php get_footer(); ?>
