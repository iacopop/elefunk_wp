<?php
/**
 * @package WordPress
 * @subpackage myWebBlog_Theme
 */

get_header();
?>

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
						
							<h2 class="pagetitle-sep">
								<?php $post = $posts[0];  ?>
								<?php if (is_category()) { ?>
									Posts in the &quot;<?php single_cat_title(); ?>&quot; Category
								<?php } elseif( is_tag() ) { ?>
									Posts Tagged &quot;<?php single_tag_title(); ?>&quot;
								<?php } elseif (is_day()) { ?>
									Posts made in <?php the_time('F jS, Y'); ?>
								<?php } elseif (is_month()) { ?>
									Posts made in <?php the_time('F, Y'); ?>
								<?php } elseif (is_year()) { ?>
									Posts made in <?php the_time('Y'); ?>
								<?php } elseif (is_author()) { ?>
									Posts by Authors
								<?php  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
									Blogs
								<?php } ?>
							</h2>
						
							<ul id="posts" class="clearfix">
							
							<?php
                                $count = 1;
                                $quicky = get_settings('woo_post_size');
                                
                                if (have_posts()) : ?>

                                    <?php while (have_posts()) : the_post(); $category = get_the_category(); ?>
                                        
                                        <?php 
                                            
                                            $image = '';
                                            $image = get_post_meta( $post->ID, "image", true);
                                            $class = '';
                                            if( $quicky == 'false') {
                                                $class = "";
                                                $full = true;                                              
                                            } 
                                            else
                                            {
                                             $class = "quickpress";
                                                if($count%2==1){ $class = $class . " post-left";}
                                                else {$class = $class . " post-right";}
                                                $full = false;   
                                            }
                                            
                                            $cat_id = $category[0]->cat_ID;
                                        ?> 
                            
                                        <li <?php post_class( $class ); ?>>
                        
                                            <div class="post-meta clearfix" style="border-top:4px solid #<?php echo get_settings( 'woo_cat_color_' . $cat_id ); ?>">
                                        
                                                <h3 class="left"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                                                
                                                <div class="categories" style="background:#<?php echo get_settings( 'woo_cat_color_' . $cat_id ); ?>;">
                                                    <a href="<?php echo get_category_link( $cat_id ); ?>"  title="<?php echo get_cat_name($cat_id);?>"><?php echo  get_cat_name($cat_id); ?></a>
                                                </div>
                                                
                                            </div><!-- End post-meta -->
                                            
                                            <div class="post-content clearfix">
                                            
                                                <?php if(( $image || get_option('woo_auto_img') == 'true') && $full == true) : ?>

                                                    <div class="wp-caption-thumb alignleft"><?php echo woo_get_image('image','303','130'); ?></div>
                                                    
                                                <?php elseif (($image || get_option('woo_auto_img') == 'true') && $full == false) :?>
                                                
                                                    <div class="wp-caption-thumb alignleft"><?php echo woo_get_image('image','120','100'); ?></div>

                                                <?php endif; ?>
                                            
                                                <?php the_excerpt(); ?>
                                                
                                                  <a class="read-more" href="<?php the_permalink() ?>">Read More...</a>
                                            </div><!-- End post-content -->
                                        
                                        </li><!-- End post -->
                                    <?php if($count%2 == 0){ echo '<li class="blank"></li>';}?>    
                                    <?php $count++; endwhile; ?>
                                    
                                  
                                
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