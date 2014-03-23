<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>

	<!-- Content Wrap Starts -->
	<div id="content-wrap" class="wrap">
	
		<!-- Content Starts -->
		<div id="content" class="col-left">
		
			<!-- About Starts -->
			<?php
			query_posts('pagename=' . get_option('woo_home_top')); //retrieves the about page
			while (have_posts()) : the_post(); ?>
			
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			
			<?php endwhile; ?>
			<!-- About Ends -->
			
			<!-- From the blog Starts -->
			<h2>From the blog</h2>
			<div class="from-the-blog">
			<div class="wrap">
				
				<?php
				query_posts('showposts=' . get_option('woo_home_posts') );
				while (have_posts()) : the_post(); $count++; ?>
				<div class="block">
					<?php woo_get_image('image',get_option('woo_home_width'),get_option('woo_home_height'),'thumb alignleft'); ?>
                    
					<div class="top">
						<h5><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
						<p><?php the_time('M. j, Y'); ?> <a href="<?php comments_link(); ?>"><span><?php comments_number('No Comments','1 Comment','% Comments'); ?></span></a></p>
					</div>
					 <?php the_excerpt(); ?> 
					<a href="<?php the_permalink() ?>" class="more"><span>More &raquo;</span></a>
				</div>
                <?php if ($count == 2) { $count=0; ?><div class="fix"></div><?php } ?>
				<?php endwhile; ?>
			

			</div>
			</div>
			<!-- From the blog Ends -->
		</div>
		<!-- Content Ends -->
	
		<?php get_sidebar(); ?>
		
	</div>
	<!-- Content Wrap Ends -->
	
</div>
</div>
<!-- Wrap Ends -->

<?php get_footer(); ?>