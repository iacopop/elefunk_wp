<?php get_header(); ?>

		<div id="centercol">

		<?php if (have_posts()) : ?>
		
        		<?php if (is_category()) { ?>
        	
            	<h3>Archive | <?php echo single_cat_title(); ?></h3>        
           	
				<?php } elseif (is_day()) { ?>
				<h3>Archive | <?php the_time('F jS, Y'); ?></h3>

				<?php } elseif (is_month()) { ?>
				<h3>Archive | <?php the_time('F, Y'); ?></h3>

				<?php } elseif (is_year()) { ?>
				<h3>Archive | <?php the_time('Y'); ?></h3>
				
				<?php } ?>
		
	
			<?php while (have_posts()) : the_post(); ?>		

			<div class="post" id="post-<?php the_ID(); ?>">
			
                <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                
                <div class="date-comments">
                    <p class="fl"><?php the_time('l, F j, Y'); ?></p>
                    <p class="fr"><span class="comments"></span><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></p>
                </div>        
            
                <?php if ( get_post_meta($post->ID, 'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
                    
                    <img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=75&amp;w=75&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" class="fl" style="margin-top:5px;" />				
                    
                <?php } ?> 
            
                <?php include(TEMPLATEPATH . '/includes/version.php'); ?>
                <p><?php if ( is_category($vidcat) ) {  the_content();  } else { echo strip_tags(get_the_excerpt(), '<a><strong>'); } ?></p>
                
                <div class="continue-tags">
                    <p class="fl"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>">Continue reading...</a></p>
                    <p><?php the_tags('<span class="fr tags">', ', ', '</span>'); ?></p>
                </div>    				
				
			</div><!--/post-->

		<?php endwhile; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>		
	
	<?php endif; ?>							

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>