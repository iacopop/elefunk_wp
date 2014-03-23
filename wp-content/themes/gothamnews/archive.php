<?php get_header(); ?>

	<div id="middle-out">
	<div id="middle" class="wrap">
		
		<div id="content" class="col-left">
			
			<div id="main" class="wrap archives">
			
				<div id="latest" class="col-left" style="width:auto;">
				
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
								
					<div class="post wrap">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

					<?php woo_get_image('image',get_option('woo_thumb_width'),get_option('woo_thumb_height'),'alignleft'); ?>

					<?php the_excerpt(); ?><a href="<?php the_permalink() ?>" class="read-more">Full Story</a>
					</div>	
					
				<?php endwhile; ?>
			
				<div class="more_entries">
				<h2><?php next_posts_link('&laquo; Older Entries') ?> &nbsp; <?php previous_posts_link ('Recent Entries &raquo;') ?></h2>
				</div>
			
				<?php endif; ?>			

					
				</div>
							
			</div>
			
		</div>
		
		<?php get_sidebar(); ?>
		
	</div>
	</div>
	<?php get_footer(); ?>