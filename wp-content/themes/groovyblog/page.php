<?php get_header(); ?>
       
    <!-- Content Starts -->
    <div id="content" class="wrap">
		<div class="col-left">
			<div id="main" class="single">
            
            <?php if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); $count++; ?>
                                                                        
                <!-- Post Starts -->
                <div class="box3-top"></div>
                <div class="post wrap">

                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    
                    <?php

                    if (get_option('woo_auto_img') == 'false'){
                        update_option('woo_auto_img','true'); // Enable auto img function first.
                        $reset = 1;
                    }

                    $page_id = get_page_id(get_option('woo_gallery_slug'));

                   if(get_the_id() == $page_id){
                        
                        woo_get_image('image',125,125,'page-thumb',90,get_the_id(),'src',80,0,'','',false);
                        
                    }
                     if($reset == 1){   // Reset back to normal
                    update_option('woo_auto_img','false');
                    }
                    the_content(); ?>
                                        
                </div>
                <div class="box3-bot"></div>                
                <!-- Post Ends -->
                                                    
			<?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>  
        
            </div><!-- main ends -->
        </div><!-- .col-left ends -->

        <?php get_sidebar(); ?>

    </div><!-- Content Ends -->
		
<?php get_footer(); ?>