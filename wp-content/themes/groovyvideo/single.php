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

                    <?php echo woo_get_embed('embed','640','360'); ?> 

                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <p class="post-details">Posted on <?php the_time('d. M, Y'); ?> by  <?php the_author_posts_link(); ?> in <?php the_category(', ') ?></p>
                    
                    <?php the_content(); ?>
					<?php the_tags('<p class="tags">Tags: ', ', ', '</p>'); ?>

					<?php if ( get_option('woo_ad_content') == 'true' ) include (TEMPLATEPATH . "/ads/content_ad.php"); ?>            
                    
                    <div id="comments">
                        <?php comments_template(); ?>
                    </div>

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