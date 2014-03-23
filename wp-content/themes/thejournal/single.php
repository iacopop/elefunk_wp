<?php get_header(); ?>
       
    <!-- Content Starts -->
    <div id="content" class="wrap">
		<div class="col-left">
			<div id="main">
            
            <?php if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); $count++; ?>
                                                                        
                <!-- Post Starts -->
                <div class="post wrap">

                    <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <p class="post-details">Posted on <?php the_time('d. M, Y'); ?> by  <?php the_author_posts_link(); ?> in <?php the_category(', ') ?></p>
                    <?php 
                    $w = get_settings('woo_single_post_image_width'); 
                    $h = get_settings('woo_single_post_image_height'); 
                    woo_get_image('image',$w,$h); 
                     the_content();
                     ?>
                     <div class="fix"></div>  
                     <?php 
					 the_tags('<p class="tags">Tags: ', ', ', '</p>'); 
                     ?>
                    
                    <div id="comments">
                        <?php comments_template(); ?>
                    </div>

                </div>
                <!-- Post Ends -->
                                                    
			<?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>  
        
            </div><!-- main ends -->
        </div><!-- .col-left ends -->

        <?php get_sidebar(); ?>

    </div><!-- Content Ends -->
		
<?php get_footer(); ?>