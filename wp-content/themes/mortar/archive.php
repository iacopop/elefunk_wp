<?php get_header(); ?>
    
        <div class="entry" style="margin-bottom:10px">
	        <?php if (is_category()) { ?>
	        <div class="fl"><h2 class="arh"><span>Archive for:</span> <?php echo single_cat_title(); ?></h2></div>
	        <div class="archivefeed fr"><?php $cat_obj = $wp_query->get_queried_object(); $cat_id = $cat_obj->cat_ID; echo '<a class="rss" href="'; get_category_rss_link(true, $cat, ''); echo '">RSS feed for this category</a>'; ?></div>
	        <div class="fix"></div>
	        <?php } elseif (is_day()) { ?><h2 class="arh"><span>Archive for:</span> <?php the_time('F jS, Y'); ?></h2>
	        <?php } elseif (is_month()) { ?><h2 class="arh"><span>Archive for:</span> <?php the_time('F, Y'); ?></h2>
	        <?php } elseif (is_year()) { ?><h2 class="arh"><span>Archive for the year:</span> <?php the_time('Y'); ?></h2>
	        <?php } elseif (is_author()) { ?><h2 class="arh">Archive by Author</h2>
	        <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?><h2 class="arh">Archives</h2>
	        <?php } elseif (is_tag()) { ?><h2 class="arh">Tag Archives: <?php echo single_tag_title('', true); ?></h2>	
			<?php } ?>
		</div>
			
		</div><!-- / #grid_16 -->
			
	<?php
		$layout = get_option('woo_archive_layout');
		 include('layouts/'.$layout);
	 ?> 

	<div class="fix"></div>
	
	<div class="grid_16">
		<div class="more_entries">
		    
			<?php if (function_exists('woo_wp_pagenavi')) { woo_wp_pagenavi(); } else { ?>
	        <div class="fl"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
	        <div class="fr"><?php next_posts_link(' Older Entries &raquo;') ?></div>
	        <br class="fix" />
            
            <?php } ?>
	
	    </div>
	    
	    <div class="fix"></div>
	    
	</div>

<?php  get_footer(); ?>