<?php get_header(); ?>

		<!-- content -->        
		<div id="content" class="grid_9 alpha omega content">
			
			<?php query_posts('showposts=1&cat=-' . $GLOBALS['ex_asides'] ); ?>
			
			<?php while (have_posts()) : the_post(); ?>	
			
			<!-- featured -->
			<div id="featured">				
				<div id="featured-image">
					 
					 <?php if (get_option('woo_resize') == 'true' ) { // Check if we should use the image resizer ?>
						<a title="Continue reading this entry..." href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=180&amp;w=490&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" /></a>
					<?php } else { ?>
						<a title="Continue reading this entry..." href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo get_post_meta($post->ID, "image", $single = true); ?>" alt="<?php the_title(); ?>" /></a>
					<?php } ?>
					
					<h2><a title="Continue reading this entry..." href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				</div>
				<div id="featured-description">
					<h3><?php the_time('j/m/y'); ?></h3>
					<?php the_excerpt(); ?>
				</div>				
			</div>
			<!-- /featured -->
			
			<?php endwhile; ?>
			
			<!-- ad-buttons -->
			<ul id="ad-buttons">
				<?php if ( get_option('woo_ads') == 'false' ) { include('includes/ads.php'); } ?>
			</ul>
			<!-- /ad-buttons -->
			
			<!-- recent -->
			<div id="recent" class="grid_5 alpha">
			
			<?php query_posts('offset=1&showposts=' . get_option('woo_other_entries') . '&cat=-' . $GLOBALS['ex_asides'] ); ?>
			
			<?php while (have_posts()) : the_post(); ?>	
				
				<div class="post">
					<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<div class="post-meta"><?php the_time('j/m/y'); ?> <span>|</span> <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></div>
					<?php the_excerpt(); ?>
				</div>
								
			<?php endwhile; ?>
								
				<p class="more"><a href="<?php echo get_option('woo_archives'); ?>">Browse the Archive</a></p>
				
			</div>
			<!-- /recent -->
			
			<!-- asides -->
			<div id="asides" class="grid_4 omega">
				
				<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(4) )  ?>		  
								
			</div>
			<!-- /asides -->
			
			<div class="clear">&nbsp;</div>
			
		</div>
		<!-- /content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>