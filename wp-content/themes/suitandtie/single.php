<?php get_header(); ?>
      
<?php if (have_posts()) : $count = 0; ?>
<?php while (have_posts()) : the_post(); $count++; ?>
	  
    <div id="blog-heading">
		
			<div class="title">
				
				<span>A blog post</span>
				
				<h2><?php the_title(); ?></h2>
			
			</div><!-- /.title -->
			
			<div class="meta">
				
				<p>
					<span class="date">Posted on the <em><?php the_time('d F, Y'); ?></em> at <em><?php the_time('g:i a'); ?></em></span>
					<span class="cat">Written by <em><?php the_author_posts_link(); ?></em> in <em><?php the_category(', ') ?></em></span>
				</p>
				
			</div><!-- /.meta -->
			
			<div class="clear"></div>
			
			<div id="breadcrumbs">
			
				<?php yoast_breadcrumb('<p>','</p>'); ?>
			
			</div><!-- /#slider-nav -->
		
		</div><!-- /#featured-slider -->
		
		<div id="content-border">
		<div id="content">
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

			<?php get_sidebar(); ?>
	
<?php get_footer(); ?>