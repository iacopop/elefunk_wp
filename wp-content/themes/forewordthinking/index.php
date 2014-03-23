<?php get_header(); ?>

                <div class="row_dot_border"></div> 
                
                <div class="nav">
                    <p class="fl"><span class="white_on_black">Latest from the blog</span>  &rarr; <a href="<?php echo get_option('woo_archives'); ?>" title="View the archives">View the Archives</a></p>
                    <p class="fr"><span class="subscribe_icon"><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>">Subscribe to my RSS Feed.</a></span></p>
                </div>  
                
                <div class="blog">
                
                <?php if (have_posts()) : ?>
                 <?php query_posts("showposts=".get_option('woo_featured_posts')); // show one latest post only ?>
                  <?php 
                  
                  $counter = 0; $counter2 = 0;
                  while (have_posts()) : the_post(); 
                  
                  ?>
                  
                  <?php $counter++; $counter2++; ?>
                  
                    <div class="<?php if ($counter == 1) { echo 'col1'; } else { echo 'col2'; $counter = 0; } ?>">
                  
                        <div class="featured_post post_bg<?php echo rand(1,6); ?>" <?php woo_box_color(); ?>>
                        
                        <?php woo_get_image('image',get_option('woo_image_width'),get_option('woo_image_height'),'featured'); ?>
                        
                        <div class="featured_content">
                            <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                            <p><span class="date_bg"><?php the_time('d M y'); ?></span> 
                            <span class="category">
                            <?php // To show only 1 Category
                                $category = get_the_category(); ?>
                                <a href="<?php echo get_category_link( $category[0]->cat_ID ); ?>"><?php echo $category[0]->cat_name; ?></a>
                            </span> 
                            <span class="comments"><a href="<?php comments_link(); ?>" title="View comments for this post"><?php comments_number('(0)','(1)','(%)'); ?></a></span></p>
                            
                        </div>
                        <div class="fix"></div>
                        
                        </div><!--/featured-post-->
                            
                    </div><!--/columns-->
                  
                  <?php endwhile; ?>
                  
                  <div class="fix"></div>
                  
                  <?php query_posts("offset=".get_option('woo_featured_posts')); // show 4 latests posts excluding the latest ?>
                  <?php while (have_posts()) : the_post(); ?>
                  
                  <?php $counter++; $counter2++; ?>
                                
                    <div class="<?php if ($counter == 1) { echo 'col1'; } else { echo 'col2'; $counter = 0; } ?>">
                            
                        <div class="date">
                            <div class="post_bg<?php echo rand(1,6); ?>" <?php woo_box_color(); ?>><p><?php the_time('d'); ?><span><?php the_time('M'); ?></span></p></div>
                        </div>
                        
                        <div class="post">
                            <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                            <p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>
                            <p>
                                <span class="category">
                                    <?php // To show only 1 Category
                                    $category = get_the_category(); ?>
                                    <a href="<?php echo get_category_link( $category[0]->cat_ID ); ?>"><?php echo $category[0]->cat_name; ?></a>
                                </span>
                                <span class="comments"><a href="<?php comments_link(); ?>" title="View comments for this post"><?php comments_number('(0)','(1)','(%)'); ?></a></span>
                            </p>
                        </div>
                            
                    </div><!--/columns-->
                  
                 <?php endwhile; ?>
                 
                <?php else: ?>	
                    <!-- Error message when no post published -->
                <?php endif; ?>
                    
                </div><!--/blog-->
                    
                <?php include(TEMPLATEPATH . '/includes/homepages.php'); ?>
                
            </div><!-- Content -->

<?php get_sidebar(); ?>
 
    	    
<?php get_footer(); ?>
