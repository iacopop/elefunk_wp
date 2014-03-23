<?php get_header(); ?>

<?php if ( !get_option('woo_right_sidebar') ) { get_sidebar(); } ?>

<div id="content" class="grid_12 <?php if ( !get_option('woo_right_sidebar') ) { echo 'omega'; } else { echo 'alpha'; } ?>">
		
	<div id="blog_large">
		
		<div class="title">
			<h3>Subscribe to the RSS Feed</h3>
			<span class="rss"><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>"><img src="<?php bloginfo('template_directory'); ?>/images/ico-rss.gif" alt="Subscribe to the RSS Feed" /></a></span>
			<div class="fix"></div>
		</div><!-- /title -->
		
			<div class="post">
				
				<h2>404! Page Not Found!</h2>
				
				<div class="entry">
					Sorry! No page has been found.
				</div><!-- /entry -->
			
			</div><!-- /post -->
		
		
		<div class="fix"></div>
	
	</div><!-- /blog_large -->
	
</div><!-- /content -->	

<?php if ( get_option('woo_right_sidebar') ) { get_sidebar(); } ?>

<?php get_footer(); ?>