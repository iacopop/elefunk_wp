<?php get_header(); ?>

		<!-- content -->        
		<div id="content" class="grid_9 alpha omega content">

		<?php if(have_posts()) : ?>
			
			<!-- post -->
			<div class="post index">
				<h1>Browsing search results for <strong>"<?php the_search_query() ?>"</strong>.</h1>
			</div>
			<!-- /post -->					
		
			<?php while(have_posts()) : the_post() ?>		
						
			<!-- post -->
			<div class="post index">
				
				<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="post-meta"><?php the_time('j/m/y'); ?> <span>|</span> <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></div>

				<p><?php the_excerpt(); ?></p>
				
			</div>
			<!-- /post -->
			
			<?php endwhile; ?>
			
			<div class="wp-pagenavi">
				<span class="current">1</span><a href="#" title="2">2</a><a href="#" title="3">3</a><a href="#" title="4">4</a><a href="#" title="5">5</a><a href="#">&raquo;</a><a href="#" title="Last &raquo;">Last &raquo;</a>
			</div>					
		
		<?php endif; ?>
			
		</div>
		<!-- /content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>