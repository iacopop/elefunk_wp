<?php get_header(); ?>

		<?php include( TEMPLATEPATH . '/includes/featured-slider.php'); ?>		
		
		<div id="content-border">
		<div id="content">
		<div id="content-tile">

			<?php if ( get_option( 'woo_intro_page' ) <> "" ) { ?>
		
			<div id="main" class="grid_10 alpha">
				
				<?php query_posts('page_id=' . get_option( 'woo_intro_page' ) ); while (have_posts()) : the_post(); ?>
					
					<h2><?php the_title(); ?></h2>
					
					<div class="entry">
						<?php the_content(); ?>
					</div><!-- /entry -->	
				
				<?php endwhile; ?>
				
			</div><!-- /#main -->	
			
			<?php } ?>		
			
			<?php $wp_query->is_home = true; ?>
			<?php get_sidebar(); ?>
	
<?php get_footer(); ?>