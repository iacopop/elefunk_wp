<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>
		
	<?php if (have_posts()) : $count = 0; ?>
	<?php while (have_posts()) : the_post(); $count++; ?>
	  
    <div id="page-heading">
	
		<div class="title">

			<h2><?php the_title(); ?></h2>
		
		</div><!-- /.title -->
			
		<div class="description">
			
			<p><?php if ( get_post_meta($post->ID, "page_excerpt", $single = true) <> "" ) { echo get_post_meta($post->ID, "page_excerpt", $single = true); } else { echo 'You can add a little bit of text to this space, by adding it to the "Page Excerpt" field on the Page > Edit pane.'; } ?></p>
			
		</div><!-- /.description -->
			
		<div class="clear"></div>
		
		<div id="breadcrumbs">
		
			<?php yoast_breadcrumb('<p>','</p>'); ?>
		
		</div><!-- /#slider-nav -->
	
	</div><!-- /#page-heading -->
	
	<div id="content-border">
	<div id="content" class="fullwidth">
	<div id="content-tile">
	
		<div id="main" class="grid_10 alpha">
		
			<div class="post entry">
				
				<?php the_content(); ?>
				
			</div><!-- /.entry -->
			
			<div id="comments">
			
				<?php comments_template(); ?>
				
			</div><!-- /#comments -->
		
		</div><!-- /#main -->
			
<?php endwhile; else: ?>
	<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?> 

<?php get_footer(); ?>
