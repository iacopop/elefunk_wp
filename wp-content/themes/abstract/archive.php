<?php get_header(); ?>

	<!-- Content Wrap Starts -->
	<div id="content-wrap" class="wrap">
	
		<!-- Content Starts -->
		<div id="content" class="col-left">
		
			<?php if (have_posts()) : ?>
			<?php $post = $posts[0]; ?>

			<?php if (is_category()) { ?><h2 class="arh">Archive for '<?php echo single_cat_title(); ?>'</h2>
			<?php } elseif (is_day()) { ?><h2 class="arh">Archive for <?php the_time('F jS, Y'); ?></h2>
			<?php } elseif (is_month()) { ?><h2 class="arh">Archive for <?php the_time('F, Y'); ?></h2>
			<?php } elseif (is_year()) { ?><h2 class="arh">Archive for the year <?php the_time('Y'); ?></h2>
			<?php } elseif (is_author()) { ?><h2 class="arh">Archive by Author</h2>
			<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?><h2 class="arh">Archives</h2>
			<?php } elseif (is_tag()) { ?><h2 class="arh">Tag Archives: <?php echo single_tag_title('', true); ?></h2>	

			<?php } ?>
	
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
					<?php woo_get_image('image',get_option('woo_thumb_width'),get_option('woo_thumb_height'),'thumb alignleft'); ?>
					<?php if ( get_option('woo_content_archives') == 'true' ) { the_content('[...]'); } else { the_excerpt(); ?><?php } ?>
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