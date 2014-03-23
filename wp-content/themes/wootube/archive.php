<?php get_header(); ?>

	<?php 
    if (!get_option('woo_home') == "true"):
        include (TEMPLATEPATH . '/archive-single.php'); 
    else:			 
    ?>

		<!-- Content Starts -->
		<div id="content" class="wrap">

		<div class="col-left home">
        
		<?php if (have_posts()) : $count = 0; $boxcount = 0;?>
        <?php while (have_posts()) : the_post(); $count++; ?>
            
            <div class="video-box <?php $boxcount++; if ($boxcount == 3) { echo 'last'; } ?> ">
            
                <div class="inside">

                    <?php woo_get_image('image','190','142'); ?>     
                    <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>

                </div>                    

                <div class="box-bot">    
                    <?php if(function_exists('the_ratings')) { echo '<div class="fl ratings">'; the_ratings(); echo '</div>'; } ?>
                    <div class="comment-cloud fr">
                        <a href="<?php comments_link(); ?>"><?php comments_number('0','1','%'); ?></a>
                    </div>                   
                </div>
                                                
            </div>
            
            <?php if ($boxcount == 3) { $boxcount = 0; echo '<div class="fix"></div>'; } ?>


        <?php endwhile; else: ?>
            <p>Sorry, no posts matched your criteria.</p>
        <?php endif; ?>  

        <div class="fix"></div>
        <div class="more_entries">
            <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
            <div class="alignleft"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
            <div class="alignright"><?php next_posts_link(' Older Entries &raquo;') ?></div>
            <br class="fix" />
            <?php } ?> 
        </div>	
        
        </div>
        <!-- .col-left ends -->	

        <div class="col-right">
            <?php get_sidebar(); ?>
        </div>
    </div>
    <!-- Content Ends -->
      
<?php endif; get_footer(); ?>
