<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

		<!-- content -->        
		<div id="content" class="grid_9 alpha omega content">
			
			<?php while (have_posts()) : the_post(); ?>	
			
			<!-- post -->
			<div class="post single">
				
				<h1><?php the_title(); ?></h1>
				<p>Helping you find some information around the site:</p>
				
				<h2>Archives by Month:</h2>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
						
				<h2>Archives by Subject:</h2>
				<ul>
					 <?php wp_list_categories('title_li='); ?>
				</ul>
				
			</div>
			<!-- /post -->
			
			<?php endwhile; ?>
			
		</div>
		<!-- /content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>