<?php get_header(); ?>

<?php if ( get_option('woo_right_sidebar') == 'false' ) { get_sidebar(); } ?>

<div id="content" class="grid_12 <?php if ( get_option('woo_right_sidebar') == 'false' ) { echo 'omega'; } else { echo 'alpha'; } ?>">
		
	<div id="blog_large">
		
		<div class="title">
			<h3>Subscribe to the RSS Feed</h3>
			<span class="rss"><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>"><img src="<?php bloginfo('template_directory'); ?>/images/ico-rss.gif" alt="Subscribe to the RSS Feed" /></a></span>
			<div class="fix"></div>
		</div><!-- /title -->
		
		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		
			<div class="post">
				
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				
				<div class="entry">
					<?php the_content(); ?>
				</div><!-- /entry -->
			
			</div><!-- /post -->
		
		<?php endwhile; endif; ?>
		
		<div class="fix"></div>
	
	</div><!-- /blog_large -->
	
</div><!-- /content -->	

<?php if ( get_option('woo_right_sidebar') == 'true' ) { get_sidebar(); } ?>

<?php get_footer(); ?>