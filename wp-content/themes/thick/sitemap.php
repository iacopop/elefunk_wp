<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>

		<!-- content -->        
		<div id="content" class="grid_9 alpha omega content">
			
			<!-- post -->
			<div class="post single">
				
				<h1><?php the_title(); ?></h1>
				<p>Navigating your way around my site:</p>
				
						<h2>Pages</h2>
	
						<ul>
							<?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' ); ?>		
						</ul>		

						<h2>Categories</h2>
	
						<ul>
							<?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
						</ul>	

			<?php
		
				$cats = get_categories();
				foreach ($cats as $cat) {
		
				query_posts('showposts=5&cat='.$cat->cat_ID);
	
			?>
			
				<h2 style="margin-top:10px !important; padding:0px;"><?php echo $cat->cat_name; ?></h2>
	
				<ul>	
						<?php while (have_posts()) : the_post(); ?>
						<li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - Comments (<?php echo $post->comment_count ?>)</li>
						<?php endwhile;  ?>
				</ul>
		
		<?php } ?>							
				
			</div>
			<!-- /post -->
			
		</div>
		<!-- /content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>