<?php get_header(); ?>

<div class="nav">
    <?php if (is_category()) { ?>
        	
            	<p class="fl"><span class="white_on_black"><em>Archive |</em> <?php echo single_cat_title(); ?>    </span></p>        
            	
            	<p class="fr"><?php $cat_obj = $wp_query->get_queried_object(); $cat_id = $cat_obj->cat_ID; echo '<a href="'; get_category_rss_link(true, $cat, ''); echo '">RSS feed for this section</a>'; ?></p>
            	
				<?php } elseif (is_day()) { ?>
				<p>Archive | <?php the_time('F jS, Y'); ?>    </span></p>

				<?php } elseif (is_month()) { ?>
				<p>Archive | <?php the_time('F, Y'); ?>    </span></p>

				<?php } elseif (is_year()) { ?>
				<p>Archive | <?php the_time('Y'); ?>    </span></p>
				
				<?php } ?>
 
 </div> 
    
 <?php if (have_posts()) : ?>
 
			<?php while (have_posts()) : the_post(); ?>
            
			<div class="nav">
            	<p class="header_meta fl"><span class="post_bg<?php echo rand(1,6); ?>" <?php woo_box_color(); ?>><?php the_time('d M y'); ?></span> Posted in <?php the_category(', ') ?></p> 
                <p class="fr"><?php edit_post_link(__('Edit this post'), ' ', ''); ?></p>
            </div>
            
            <div class="post">
          
                <h2 class="post_title"><?php the_title(); ?></h2>
            
				<?php the_content(); ?>
			</div>
	
	<?php endwhile; else: ?>

			<p>Sorry, no posts matched your criteria.</p>

			<?php endif; ?>

</div><!-- Content -->


<?php get_sidebar(); ?>
 
    	    
<?php get_footer(); ?>
