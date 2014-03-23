<?php get_header(); ?>

	<div id="middle-out">
	<div id="middle" class="wrap">
		
		<div id="content" class="col-left">
		
		<div id="single">
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				<!-- POST STARTS -->
				<div class="post">
					<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<p class="post-details">by <?php the_author_posts_link(); ?> on <?php the_time('d/m/y'); ?> at <?php the_time('g:i a'); ?></p>

					<?php if ( get_option('woo_image_disable') == "false" ) { woo_get_image('image',get_option('woo_thumb_width'),get_option('woo_thumb_height'),'alignleft'); } ?>
    
					<?php the_content(); ?>
				</div>
				<!-- POST ENDS -->
				<!-- COMMENTS STARTS -->
				<div id="comments">
					<?php comments_template(); ?>
					<?php endwhile; else: ?>

					<p>Sorry, no posts matched your criteria.</p>

					<?php endif; ?>
				</div>
			
		</div>
		</div>
		
		<?php get_sidebar(); ?>
		
	</div>
	</div>
	<?php get_footer(); ?>