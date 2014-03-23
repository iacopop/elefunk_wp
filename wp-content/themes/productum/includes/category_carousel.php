   <div id="prevPosts">
					
					<h3><?php echo stripslashes(get_option('woo_carousel_header')); ?> <?php if (get_option('woo_carousel')) { ?> <?php } ?></h3>
					
					<ul id="galleryNav">
					
						<li id="left"><a href="javascript:stepcarousel.stepBy('gallery', -1)" class="replace">left</a></li>
						<li id="right"><a href="javascript:stepcarousel.stepBy('gallery', 1)" class="replace">right</a></li>
					
					</ul>
					
					<div id="gallery" class="stepcarousel">
					
                       <?php
                        $cat_id = get_cat_id(get_option('woo_scroller_category'));
                        query_posts("cat=".$cat_id."&showposts=".get_option('woo_scroller_posts')); 
                        ?>
                                                
                        <ul class="belt"> 

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>	
    
            <li class="panel">
				
				<?php woo_get_image('image','120','90'); ?>
                 
				<?php the_title(); ?>
            </li>
        
        <?php endwhile; ?>
    
    <?php endif; ?>
					
						</ul>
					
					</div>

				</div>