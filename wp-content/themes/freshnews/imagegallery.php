<?php
/*
Template Name: Image Gallery
*/
?>

<?php get_header(); ?>

		<div id="centercol" class="grid_10">

			<h3><?php the_title(); ?></h3>        
			
			<div class="imagegallery arclist box">
			
						<?php query_posts('showposts=16'); ?>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>				
							<?php $wp_query->is_home = false; ?>

							<?php woo_get_image('image','255','180','post-thumbnail'); ?>
						
						<?php endwhile; endif; ?>	
			
			</div><!--/imagegallery-->		                        						

		</div><!--/grid_10-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>