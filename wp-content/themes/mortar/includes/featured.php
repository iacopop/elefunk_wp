<div id="top">
    <div class="grid_6 alpha">
        <div id="featured">
            <div id="mygallery" class="stepcarousel">
                <div class="belt">
                
                    <?php query_posts("cat=-".get_option('woo_blog_cat')."&showposts=".get_option('woo_scroller_posts')); ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>		        					
                
                    <div class="panel">
                    
                        <div style="float:left;width:460px;">
                                            
                            <div class="grid_4 alpha">
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php woo_get_image('image','140','140'); ?></a>
                            </div><!-- / #grid_8 -->
                           
                            <div class=" grid_2 omega">
                                <div class="featured_text">
                                    <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                    <?php the_excerpt(); ?>
                                </div>
                            </div><!-- / #grid_4 -->
                        
                        </div>
                    
                        <br class="fix" />
            
                    </div><!-- / panel -->
                    
                    <?php endwhile; endif; ?>
                    
                </div><!-- / belt -->
            </div><!-- / mygallery -->
        </div><!-- / featured -->
        
        <div class="clearfix"></div>
        
        <div id="slider_nav">
    <div class="grid_4 alpha">
    	<a href="javascript:stepcarousel.stepBy('mygallery', -1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/arr-left.png" alt="Back" /> Previous</a>
    </div>
    <div class="grid_4 omega" style="text-align:right;">
    	<a href="javascript:stepcarousel.stepBy('mygallery', 1)">Next <img src="<?php bloginfo('stylesheet_directory'); ?>/images/arr-right.png" alt="Forward" /></a>
    </div>
</div>      
    </div><!-- / grid_12 -->
            
</div><!-- / #top --> 

<div class="clearfix" style="margin-bottom:20px;"></div>     
        
        
        