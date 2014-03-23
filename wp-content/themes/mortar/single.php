<?php get_header(); ?>
 
 	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        


		
		<div id="main" class="grid_9 alpha">
		
		    <div class="entry">
		    	
		    	<?php woo_get_image('image','478',null); ?>
		    	
		    	<h2 class="single"><?php the_title(); ?></h2>
				
				<?php the_content(); ?>
				
				<div class="navigation">
	        	
		            <div class="previous fl">
		            <p><?php previous_post_link('%link') ?></p>
		            </div>
		            
		            <div class="next fr">
		            <p><?php next_post_link('%link') ?></p>
		            </div>
		            
		            <div class="fix"></div>
		            
				</div>
		        
		    </div><!-- / #entry -->
	        
			<?php comments_template(); ?>
	            
	   </div><!-- / #main -->
        
		<div class="grid_3">
        
	        <div class="post_meta"> 
	        
	        	<p style="margin-bottom:10px; padding:0 20px;"><strong>Post Details</strong></p>   
		        
		        <p><span class="date"><?php the_time('F jS, Y') ?></span></p>
		        <p><span class="details"><?php the_category(', ') ?></span></p>
		        <p><span class="comments"><a href="#respond">Comment</a></span></p>
		        <p><span class="edit"><?php edit_post_link(__('Edit Post'), ' ', ''); ?></span></p>
	        
	        	<div class="tags">
	        		<p><strong>Post Tags</strong></p>
		       		<?php the_tags('', ', ', '<br />'); ?> 
		       	</div>
		       			        
	        </div>
	        
	         <!-- Add you sidebar manual code here to show above the widgets -->

            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(2) )  ?>		           

			<!-- Add you sidebar manual code here to show below the widgets -->

        </div><!-- / #grid_3 -->
        
	<?php endwhile; endif; ?>
            
    <?php get_sidebar(); ?> 
    
    </div><!-- / #grid_16 -->
                
<?php get_footer(); ?>