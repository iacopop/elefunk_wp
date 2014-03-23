<?php get_header(); ?>
    
 <div class="row_dot_border"></div>
 
 <?php if (have_posts()) : ?>
 
			<?php while (have_posts()) : the_post(); ?>
            
            <div class="post" style="background-image:none;">
          
                <h2 class="post_title"><?php the_title(); ?></h2>
            	<div class="entry">
					<?php the_content(); ?>
                </div>
                
			</div>
	
	<?php endwhile; else: ?>

			<p>Sorry, no posts matched your criteria.</p>

			<?php endif; ?>

</div><!-- Content -->


<?php get_sidebar(); ?>
 
    	    
<?php get_footer(); ?>
