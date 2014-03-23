<?php get_header(); ?>

		<!-- content -->        
		<div id="content" class="grid_9 alpha omega content">
			
			<?php while (have_posts()) : the_post(); ?>	
			
			<!-- post -->
			<div class="post single">
				
				<h1><?php the_title(); ?></h1>
				<div class="post-date"><?php the_time('l, jS F Y'); ?></div>
				<div class="post-category"><?php the_category(' '); ?></div>
				
				<?php the_content(); ?>
				
				<!-- post-meta -->
					<?php the_tags('<div class="post-meta"><p><strong>Tags</strong>: ',', ','</p></div>'); ?>
				<!-- /post-meta -->
				
			</div>
			<!-- /post -->
			
			<div id="comments">
				<?php comments_template(); ?>
			</div>	
			
			<?php endwhile; ?>
			
		</div>
		<!-- /content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>