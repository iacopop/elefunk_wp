<?php
/*
Template Name: Image gallery
*/
?>

<?php get_header(); ?>

		<div class="col1">

			<h1><?php the_title(); ?></h1>        
			
			<div class="imagegallery">
			
						<?php query_posts('showposts=16'); ?>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>				
							

						<?php $disable_resize = get_option('woo_resize'); if ($disable_resize) { // Check if we should use the image resizer ?>
                        
								<p>Image resizer disabled</p>

                       <?php } else { ?> <!-- DISPLAY THE DEFAULT IMAGE, IF CUSTOM FIELD HAS NOT BEEN COMPLETED -->                

							<?php if ( get_post_meta($post->ID, 'image', true) ) { ?>
								<a title="Click here to read the story" href="<?php the_permalink() ?>"><img alt="<?php the_title_attribute(); ?>" src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&h=170&w=235&zc=1&q=90" /></a>
							<?php } ?>
                            
						<?php } ?> 		
                            
						
						<?php endwhile; endif; ?>	
			
			</div><!--/imagegallery-->						

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>