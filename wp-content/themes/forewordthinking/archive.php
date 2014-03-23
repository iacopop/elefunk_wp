<?php get_header(); ?>

<div class="row_dot_border"></div>

<div class="nav">
    <?php if (is_category()) { ?>
        	
            	<p class="fl"><span class="white_on_black"><em>Archive |</em> <?php echo single_cat_title(); ?>    </span></p>        
            	
            	<p class="fr"><span class="subscribe_icon"><?php $cat_obj = $wp_query->get_queried_object(); $cat_id = $cat_obj->cat_ID; echo '<a href="'; get_category_rss_link(true, $cat, ''); echo '">RSS feed for this section</a>'; ?></span></p>
            	
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
            
            <div class="date">
                 <div class="post_bg<?php echo rand(1,6); ?>" <?php woo_box_color(); ?>><p><?php the_time('d'); ?><span><?php the_time('M'); ?></span></p></div>
            </div>	
                        
            <div style="float:left;"><h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<p>by <?php the_author(); ?> <span class="comments"><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?></span></p>
            </div>	
                
                <div class="fix"></div>

				<div class="post" id="post-<?php the_ID(); ?>">		
		
					<div class="entry">
						<?php the_excerpt('<span class="continue">Read the full story</span>'); ?> 
					</div>
                    
                    <p class="singletags"><?php if (function_exists('the_tags')) { ?><?php the_tags('Tags: ', ', ', ''); ?><?php } ?></p>
				
				</div><!--/post-->

		<?php endwhile; ?>
		
		<div class="navigation">
					<div class="previous">
					<p><?php previous_post_link('&laquo; %link') ?></p>
                    </div>
					<div class="next">
					<p><?php next_post_link('%link &raquo;') ?></p>
                    </div>
				</div>		
	
	<?php endif; ?>	

</div><!-- Content -->


<?php get_sidebar(); ?>
 
    	    
<?php get_footer(); ?>
