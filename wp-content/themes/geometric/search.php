<?php get_header(); ?>

<?php if ( get_option('woo_right_sidebar') == 'false' ) { get_sidebar(); } ?>

<div id="content" class="grid_12 <?php if ( get_option('woo_right_sidebar') == 'false' ) { echo 'omega'; } else { echo 'alpha'; } ?>">

		<div class="title">
			<h3>Search Results for "<?php the_search_query() ?>"</h3>
		</div><!-- /title -->

		<?php if (have_posts()) :  while (have_posts()) : the_post();?>
		
		<?php if ( is_portfolio() ) { ?>
				
			<div class="post">
			
				<div class="portfolio_item <?php if ( get_option('woo_layout') == '3col.php' ) { echo 'grid_4'; } else { echo 'grid_6'; } ?> alpha">
				
					<div class="portfolio_thumb">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php if ( get_option('woo_layout') == '3col.php' ) {  woo_get_image('thumb',get_option('woo_portfolio_resizer'),'200','140','thumbnail'); } else { woo_get_image('thumb',get_option('woo_portfolio_resizer'),'320','200','thumbnail'); } ?></a>
					</div><!-- /portfolio_thumb -->
			
				</div><!-- /portfolio_item -->
				
				<div class="portfolio_details <?php if ( get_option('woo_layout') == '3col.php' ) { echo 'grid_8'; } else { echo 'grid_6'; } ?> omega">
			
					<h2><?php the_title(); ?> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">(View)</a></h2>
					<div class="meta">Posted on <?php the_time('d F Y'); ?> <span class="comments"><a href="<?php comments_link(); ?>" title="View comments for this post"><?php comments_number('(0)','(1)','(%)'); ?></a></span></div><!-- /meta -->

				<div class="entry">
					<?php the_excerpt(); ?>
				</div><!-- /entry -->					
			
				</div><!-- /portfolio_item -->
				
				<div class="fix"></div>								
			
			</div><!--post-->
		
		<?php } else { ?>
			
			<div class="post">
				
				<div class="category"><?php the_category(', '); ?></div><!-- /category -->
				
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="meta">Posted on <?php the_time('d F Y'); ?> <span class="comments"><a href="<?php comments_link(); ?>" title="View comments for this post"><?php comments_number('(0)','(1)','(%)'); ?></a></span></div><!-- /meta -->
				
				<div class="entry">
					<?php if ( get_option('woo_content_archive') == 'true' ) { the_content('[...]'); } else { the_excerpt(); ?>
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

<?php if ( get_option('woo_right_sidebar') == 'true' ) { get_sidebar(); } ?>

<?php get_footer(); ?>