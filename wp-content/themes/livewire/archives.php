<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>

		<div class="col1">
		
			<div id="archivebox">
				
					<h3><?php the_title(); ?></h3>        
			
			</div><!--/archivebox-->
            
            <p>Browse through our archives, either by category or month.</p>
			
			<div class="arclist fl">
			
				<h3>Categories</h3>
	
				<ul>
					<?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
				</ul>				
			
			</div><!--/arclist-->
			
			<div class="arclist fr">
			
				<h3>Monthly Archives</h3>
	
				<ul>
					<?php wp_get_archives('type=monthly&show_post_count=1') ?>	
				</ul>				
			
			</div><!--/arclist-->
			
			<div class="fix"></div>

			<div class="arclist fl" style="width:100%">
			
				<h3>The Last 30 Posts</h3>
	
				<ul>
						<?php query_posts('showposts=30'); ?>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
							<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - Posted on <?php the_time('j F Y') ?> - Comments (<?php echo $post->comment_count ?>)</li>
						
						<?php endwhile; endif; ?>	
				</ul>				
			
			</div><!--/arclist-->													

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>