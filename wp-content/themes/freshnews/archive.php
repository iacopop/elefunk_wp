<?php get_header(); ?>

		<div id="centercol" class="grid_10">

		<?php if (have_posts()) : ?>
		
        		<?php if (is_category()) { ?>
        	
            	<h3><span class="fl">Archive | <?php echo single_cat_title(); ?></span> <span class="fr catrss"><?php $cat_obj = $wp_query->get_queried_object(); $cat_id = $cat_obj->cat_ID; echo '<a href="'; get_category_rss_link(true, $cat, ''); echo '">RSS feed for this section</a>'; ?></span></h3>        
           	
				<?php } elseif (is_day()) { ?>
				<h3>Archive | <?php the_time('F jS, Y'); ?></h3>

				<?php } elseif (is_month()) { ?>
				<h3>Archive | <?php the_time('F, Y'); ?></h3>

				<?php } elseif (is_year()) { ?>
				<h3>Archive | <?php the_time('Y'); ?></h3>
				
				<?php } ?>
		
	
			<?php while (have_posts()) : the_post(); ?>		

			<div class="post box" id="post-<?php the_ID(); ?>">
			                
                <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

				<div class="date-comments">
                    <p class="fl"><?php the_time('j. F Y'); ?></p>
                    <p class="fr"><span class="comments"></span><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></p>
           		</div>            

				<?php woo_get_image('image',get_option('woo_thumb_image_width'),get_option('woo_thumb_image_height'),'post-thumbnail'); ?>
            
	            <?php if ( is_category($GLOBALS[video_id]) ) echo woo_get_embed('embed','540','400'); ?>
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
	
	<?php endif; ?>							

		</div><!--/grid_10-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>