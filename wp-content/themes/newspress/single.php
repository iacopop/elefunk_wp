<?php get_header(); ?>

		<div class="col1">

		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>

				<h1><em>Categorized |</em> <?php the_category(', ') ?></h1>								

				<div class="post" id="post-<?php the_ID(); ?>">
				
					<h2 class="singleh2"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p class="posted">Posted on <?php the_time('d F Y'); ?> by <?php the_author(); ?></p>
		
					<div class="entry">
						<?php the_content('<span class="continue">Continue Reading</span>'); ?>
						<?php if (function_exists('the_tags')) { ?><p><?php the_tags('Tags | ', ', ', ''); ?></p><?php } ?> 
					</div>
				
				</div><!--/post-->			
				
				<div id="comment">
					<?php comments_template(); ?>
				</div>

		<?php endwhile; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>		
	
	<?php endif; ?>							

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>