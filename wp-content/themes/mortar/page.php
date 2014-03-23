<?php get_header(); ?>


    
	 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	    
			<div id="main" class="grid_12 alpha">
			
		    <div class="entry">
		    
	    		<h2 class="single"><?php the_title(); ?></h2>
				
				<?php the_content(); ?>
		        
		    </div><!-- / #entry -->
	
		</div><!-- / #main -->
	
	<?php endwhile; endif; ?>
	
	<?php get_sidebar(); ?>
    
   </div><!-- / #grid_16 -->
	            
	<?php get_footer(); ?>