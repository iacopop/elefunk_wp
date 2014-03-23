<?php get_header(); ?>
       
    <!-- Content Starts -->
    <div id="content" class="wrap">
		<div class="col-left">
			<div id="main" class="single">
            
            <?php
            $img_w = get_option('woo_single_img_w');
            $img_h = get_option('woo_single_img_h');
            $img_d = get_option('woo_single_img_d');  
            
             if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); $count++; ?>
                                                                        
                <!-- Post Starts -->
                <div class="box3-top"></div>
                <div class="post wrap">
                
                    
                    <?php 
                    if($img_d == "true"){
                        echo '<div class="single-post-image">';
                        woo_get_image('image',$img_w,$img_h,'single-thumbnail',90,get_the_id(),'src',1);
                        echo '</div><div class="clear"></div>';
                    }
                    ?>

                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <p class="post-details">Posted on <?php the_time('F d, Y'); ?> by  <?php the_author_posts_link(); ?> in <?php the_category(', ') ?> | <?php comments_number(); ?></p>
                    
                    <?php the_content(); ?>
					<?php the_tags('<p class="tags">Tags: ', ', ', '</p>'); ?>
                    <div class="clearfix"><?php
                     if($img_d == "true"){
                        ?>
                        <div class="clear"></div><br />
                        <h3>More Photos... </h3>
                        <div class="single-post-image">
                        <?php
                        woo_get_image('image',$img_w,$img_h,'single-thumbnail',90,get_the_id(),'src',15,1);
                        
                        echo '</div><div class="clear"></div>';
                    }
                    ?></div>

					<?php if (get_option('woo_ad_content')) include (TEMPLATEPATH . "/ads/content_ad.php"); ?>            
                    
                    <div id="comments">
                        <?php comments_template(); ?>
                    </div>

                </div>
                <div class="box3-bot"></div>                
                <!-- Post Ends -->
                                                    
			<?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>
            
            <?php woo_page(); ?>  
        
            </div><!-- main ends -->
        </div><!-- .col-left ends -->

        <?php get_sidebar(); ?>

    </div><!-- Content Ends -->
		
<?php get_footer(); ?>