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
					<?php the_content(); ?>
				</div>
				<div class="post-bottom">
					<p>This entry was posted on <?php the_time('l, F jS, Y'); ?> at  <?php the_time('g:i a'); ?> and is filed under <?php the_category(', ') ?>. You can <a href="#cwrap">leave a comment</a> and follow any responses to this entry through the <?php comments_rss_link('RSS 2.0 feed'); ?>.</p>
				</div>
			
			</div>
			<!-- Post Ends -->
			
			<!-- Comments Starts -->
			<div id="comments">
			<?php comments_template(); ?>
			</div>
			<!-- Comments Ends -->
			
			<?php endwhile; else: ?>

			<p>Sorry, no posts matched your criteria.</p>

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