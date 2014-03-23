<?php get_header(); ?>

		<div id="centercol" class="grid_10">

		<?php if (have_posts()) : ?>
        	
        <h3><em>Search Results |</em> <?php printf(__('\'%s\''), $s) ?></h3>        
	
			<?php while (have_posts()) : the_post(); ?>		

			<div class="post box" id="post-<?php the_ID(); ?>">
			
                <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                
                <div class="date-comments">
                    <p class="fl"><?php the_time('l, F j, Y'); ?></p>
                    <p class="fr"><span class="comments"></span><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></p>
                </div>        
            
				<?php woo_get_image('image',get_option('woo_thumb_image_width'),get_option('woo_thumb_image_height'),'post-thumbnail'); ?>
            
                <p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>
                
                
                <span class="continue"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>">Continue reading...</a></span>    				

			<div class="fix"></div> 	
			</div><!--/post-->

		<?php endwhile; ?>
		
        <div class="more_entries wrap">
            <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
            <div class="fl"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
            <div class="fr"><?php next_posts_link(' Older Entries &raquo;') ?></div>
            <br class="fix" />
            <?php } ?>
        </div>
		
		<?php else : ?>

		<div class="box">
        	
            	<h3><em>Search Results |</em> None Found!</h3>
            	<div>Sorry! Your search yielded no results. Please search again.</div>				
		
		</div><!--/box-->				
	
	<?php endif; ?>							

		</div><!--/grid_10-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>	
