<?php get_header(); ?>

	<div id="middle-out">
	<div id="middle" class="wrap">
		
		<div id="content" class="col-left">
		
		<div id="single" class="page">
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				<!-- POST STARTS -->
				<div class="post">
					<h2 class="title"><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
				<!-- POST ENDS -->
				<?php endwhile; ?>
				<!-- COMMENTS STARTS -->
				<div id="comments">
					<?php //comments_template(); ?>

					<?php endif; ?>
				</div>
			
		</div>
		</div>
		
		<?php get_sidebar(); ?>
		
	</div>
	</div>
	<?php get_footer(); ?>