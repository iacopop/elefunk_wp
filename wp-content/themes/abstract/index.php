<?php get_header(); ?>

	<!-- Content Wrap Starts -->
	<div id="content-wrap" class="wrap">
	
		<!-- Content Starts -->
		<div id="content" class="col-left">
		
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
		
			<!-- Post Starts -->
			<div class="post">
			
				<div class="top">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<p class="post-details">
					<span class="left"><?php the_time('M. j, Y'); ?> <a href="<?php comments_link(); ?>"><span class="post-comments"><?php comments_number('No Comments','1 Comment','% Comments'); ?></span></a></span>
					<span class="post-categories">Posted under: <?php the_category(', ') ?></span>
					</p>
				</div>
				<div class="post-body">
					<?php if ( get_option('woo_content') == 'true' ) { the_content('[...]'); } else { the_excerpt(); ?><?php } ?>
				</div>
			
			</div>
			<!-- Post Ends -->
			
			<?php endwhile; ?>
			
			<!-- More Entries Starts -->
			<div class="more-entries">
					<h2><?php next_posts_link('&laquo; Older Entries') ?> &nbsp; <?php previous_posts_link ('Recent Entries &raquo;') ?></h2>
			</div>
			<!-- More Entries Ends -->
			
			<?php endif; ?>

		</div>
		<!-- Content Ends -->
	
		<?php get_sidebar(); ?>
		
	</div>
	<!-- Content Wrap Ends -->
	
</div>
</div>
<!-- Wrap Ends -->

<?php get_footer(); ?>