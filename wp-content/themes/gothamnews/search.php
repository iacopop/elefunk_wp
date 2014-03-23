<?php get_header(); ?>

	<div id="middle-out">
	<div id="middle" class="wrap">
		
		<div id="content" class="col-left">
			
			<div id="main" class="wrap archives">
			
				<div id="latest" class="col-left" style="width:auto;">
				
				<?php if (have_posts()) : ?>
				<h2 class="arh">Search results</h2>
				<?php while (have_posts()) : the_post(); ?>
								
					<div class="post wrap">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<?php woo_get_image('image',get_option('woo_thumb_width'),get_option('woo_thumb_height'),'alignleft'); ?>
					<?php the_excerpt(); ?><a href="<?php the_permalink() ?>" class="read-more">full story</a>
					</div>	
					
					
					<?php endwhile; ?>
			
				<div class="more_entries">
				<h2><?php next_posts_link('&laquo; Older Entries') ?> &nbsp; <?php previous_posts_link ('Recent Entries &raquo;') ?></h2>
				</div>
			
				<?php else : ?>
					<h2 class="search">No matches.</h2>
					<p>Please try again, or use the navigation menus to find what you search for.</p>
				<?php endif; ?>	

					
				</div>
							
			</div>
			
		</div>
		
		<?php get_sidebar(); ?>
		
	</div>
	</div>
	<?php get_footer(); ?>