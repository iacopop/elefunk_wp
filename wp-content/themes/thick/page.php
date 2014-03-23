<?php get_header(); ?>

		<!-- content -->        
		<div id="content" class="grid_9 alpha omega content">
			
			<?php while (have_posts()) : the_post(); ?>	
			
			<!-- post -->
			<div class="post single">
				
				<h1><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
				
			</div>
			<!-- /post -->
			
			<?php endwhile; ?>
			
		</div>
		<!-- /content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>