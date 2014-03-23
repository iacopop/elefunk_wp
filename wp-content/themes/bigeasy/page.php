<?php get_header(); ?>
    
	<?php get_sidebar(); ?>
	
	<div id="content" >
		
		<div class="module">
            <h2 class="module-title">Page</h2>
        </div>
		
		<?php if (have_posts()) : $count = 0; ?>
		<?php while (have_posts()) : the_post(); $count++; ?>
		
		<div class="module blog">
			
			<h3 class="entry-title"><?php the_title(); ?></h3>
				
			<div class="entry">
				
				<?php the_content(); ?>
					
			</div><!-- /.entry -->
				
		</div><!-- end module -->

		<?php endwhile; else: ?>
		
			<div class="module blog">
			
				<h3 class="entry-title">No entries found</h3>
					
				<div class="entry">
					
					<p>Sorry, no posts matched your criteria.</p>
				
				</div><!-- /.entry -->
				
			</div><!-- end module -->
			
		<?php endif; ?>
			
	</div><!-- end content -->
					
<?php get_footer(); ?>