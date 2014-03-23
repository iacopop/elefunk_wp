<?php get_header(); ?>

<?php if ( !get_option('woo_right_sidebar') ) { get_sidebar(); } ?>

<div id="content" class="grid_12 <?php if ( !get_option('woo_right_sidebar') ) { echo 'omega'; } else { echo 'alpha'; } ?>">
		
	<div id="blog_large">
		
		<div class="title">
			<?php $title = get_option('woo_home_title'); ?>
			<h3><?php echo $title; ?></h3>
			<span class="rss"><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>"><img src="<?php bloginfo('template_directory'); ?>/images/ico-rss.gif" alt="Subscribe to the RSS Feed" /></a></span>
			<div class="fix"></div>
		</div><!-- /title -->
		
		<?php $show = get_option('woo_home_posts'); ?>

		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=-".$GLOBALS[portfolio_cat]."&showposts=".$show."&paged=$paged"); ?>
		
		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		
			<div class="post">
				
				<div class="category"><?php the_category(', '); ?></div><!-- /category -->
				
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="meta">Posted on <?php the_time('d F Y'); ?> <span class="comments"><a href="<?php comments_link(); ?>" title="View comments for this post"><?php comments_number('(0)','(1)','(%)'); ?></a></span></div><!-- /meta -->
				
				<div class="entry">
					<?php if ( get_option('woo_content_home') == 'true' ) { the_content('[...]'); } else { the_excerpt(); ?>
					<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">Continue Reading...</a></p>
					<?php } ?>
				</div><!-- /entry -->
			
			</div><!-- /post -->
		
		<?php endwhile; endif; ?>
		
		<div class="fix"></div>

		<div id="post_navigation">
				
			<div id="prev"><?php previous_posts_link('Newer'); ?></div>
			<div id="next"><?php next_posts_link('Older'); ?></div>				
			<div class="fix"></div>
					
		</div><!-- /post_navigation -->
	
	</div><!-- /blog_large -->
	
</div><!-- /content -->	

<?php if ( get_option('woo_right_sidebar') ) { get_sidebar(); } ?>

<?php get_footer(); ?>