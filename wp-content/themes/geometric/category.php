<?php get_header(); ?>

<?php if ( !get_option('woo_right_sidebar') ) { get_sidebar(); } ?>

<div id="content" class="grid_12 <?php if ( !get_option('woo_right_sidebar') ) { echo 'omega'; } else { echo 'alpha'; } ?>">

		<div class="title">
			<h3><?php echo single_cat_title(); ?> Archive</h3>
			<span class="rss"><a href="<?php $cat_obj = $wp_query->get_queried_object(); $cat_id = $cat_obj->cat_ID; get_category_rss_link(true, $cat_id); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/ico-rss.gif" alt="Subscribe to the RSS Feed for my Portfolio" /></a></span>
			<div class="fix"></div>
		</div><!-- /title -->
		
		<?php $counter = 0; ?>
		<?php if (have_posts()) :  while (have_posts()) : the_post(); $counter++; ?>
		
			<?php if ( is_category($GLOBALS[portfolio_cat]) ) { $layout = get_option('woo_layout'); include( TEMPLATEPATH . '/portfolio-layouts/' . $layout ); } else { ?>
			
			<div class="post">
				
				<div class="category"><?php the_category(', '); ?></div><!-- /category -->
				
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="meta">Posted on <?php the_time('d F Y'); ?> <span class="comments"><a href="<?php comments_link(); ?>" title="View comments for this post"><?php comments_number('(0)','(1)','(%)'); ?></a></span></div><!-- /meta -->
				
				<div class="entry">
					<?php if ( get_option('woo_content_archive') ) { the_content('[...]'); } else { the_excerpt(); ?>
					<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">Continue Reading...</a></p>
					<?php } ?>
				</div><!-- /entry -->
			
			</div><!-- /post -->			
		
			<?php } ?>
		
		<?php endwhile; endif; ?>
		
		<div class="fix"></div>

		<div id="post_navigation">
				
			<div id="prev"><?php previous_posts_link('Newer'); ?></div>
			<div id="next"><?php next_posts_link('Older'); ?></div>			
			<div class="fix"></div>
					
		</div><!-- /post_navigation -->		

</div><!-- /content -->	

<?php if ( get_option('woo_right_sidebar') ) { get_sidebar(); } ?>

<?php get_footer(); ?>