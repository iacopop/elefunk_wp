<?php get_header(); ?>
       
	<?php get_sidebar(); ?>
	
	<div id="content">
			
		<div class="module">
        <h2 class="module-title">Search Results</h2>
        </div>
		
		<?php if (have_posts()) : $count = 0; ?>
		<?php while (have_posts()) : the_post(); $count++; ?>
		
		<div class="module blog">
		
			<h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
			<p class="entry-meta">Posted <?php the_time('d. M, Y'); ?> in <?php the_category(', ') ?></p>
		
			<div class="entry">
			
				                <?php if(get_option('woo_search_content') == 'true') { the_content('');} else { the_excerpt();} ?>
				
				<p class="readmore">
					<a href="<?php the_permalink() ?>">Read more...</a>
				</p>
				
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
			
		<p class="link-ancillary">
			<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
				<?php previous_posts_link('&laquo; Newer Entries ') ?>
				<?php next_posts_link(' Older Entries &raquo;') ?>
			<?php } ?>
		</p>
		
	</div><!-- end content --> 
		
<?php get_footer(); ?>