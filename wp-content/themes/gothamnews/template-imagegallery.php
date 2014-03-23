<?php
/*
Template Name: Image Gallery
*/
?>
<?php get_header(); ?>

	<div id="middle-out">
	<div id="middle" class="wrap">
		
		<div id="content" class="col-left">
		
		<div id="single" class="page">

				<div class="post">
					<h2 class="title"><?php the_title(); ?></h2>

					<?php query_posts('showposts=30'); ?>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>				
                        <?php $wp_query->is_home = false; ?>

                        <?php if ( get_post_meta($post->ID,'image', true) ) { ?>
                            <a title="Click here to read the story" href="<?php the_permalink() ?>"><img alt="<?php the_title_attribute(); ?>" src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&h=100&w=100&zc=1&q=90" style="margin:5px;"/></a>
                        <?php } ?>
                    
                    <?php endwhile; endif; ?>	
			
				</div>
		</div>
		</div>
		
		<?php get_sidebar(); ?>
		
	</div>
	</div>
	<?php get_footer(); ?>