<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>
    
	<?php get_sidebar(); ?>
	
	<div id="content">
		
		<h2 class="module-title">Writing</h2>
		
		<div class="module blog">
			
			<h3 class="entry-title">Archives</h3>
				
			<div class="entry">
				
				<h2 class="title">The Last 30 Posts</h2>
			
				<ul>
					<?php query_posts('showposts=30'); ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php $wp_query->is_home = false; ?>
					<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php the_time('j F Y') ?> <span class="comments"> - Comments (<?php echo $post->comment_count ?>)</span></li>
					<?php endwhile; endif; ?>	
				</ul>				
			
				<h2 class="title">Categories</h2>
			
				<ul>
					<?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
				</ul>	
					
				<h2 class="title">Monthly Archives</h2>
			
				<ul>
					<?php wp_get_archives('type=monthly&show_post_count=1') ?>	
				</ul>		
				
			</div><!-- /.entry -->
				
		</div><!-- end module -->
			
	</div><!-- end content -->
					
<?php get_footer(); ?>











