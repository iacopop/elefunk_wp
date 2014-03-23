<?php get_header(); ?>

		<div id="centercol" class="grid_10">

		<?php if (have_posts()) : ?>
	
    		<div class="box">
		     	
                <h2><?php the_title(); ?></h2>        
        
                <?php while (have_posts()) : the_post(); ?>		
    
                    <div class="post" id="post-<?php the_ID(); ?>">
            
                        <div class="entry">
                            <?php the_content('<span class="continue">Continue Reading</span>'); ?> 
                        </div>
                    
                    	<div class="fix"></div>
                    </div><!--/post-->
    
                <?php endwhile; ?>
            
            </div>
	
		<?php endif; ?>							

		</div><!--/grid_10-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>