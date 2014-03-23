<?php get_header(); ?>

	<!-- Content Wrap Starts -->
	<div id="content-wrap" class="wrap">
	
		<!-- Content Starts -->
		<div id="content" class="col-left">
		
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
		
			<!-- Post Starts -->
			<div class="post">
			
					<h2><?php the_title(); ?></h2>
				<div class="post-body">
					<?php the_content(); ?>
					<?php edit_post_link('Edit Page', '', ''); ?>
				</div>
			
			</div>
			<!-- Post Ends -->
			
			<?php endwhile; ?>
			
			<!-- Comments Starts -->	
			<div id="comments">
				
				<?php // comments_template(); ?>
					
			</div>
			<!-- Comments Ends -->
				
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