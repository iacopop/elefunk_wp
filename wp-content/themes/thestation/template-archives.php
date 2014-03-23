<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>

	<?php if ( get_option( 'woo_breadcrumbs' ) == 'true') { yoast_breadcrumb('<div id="breadcrumb"><p>','</p></div>'); } ?>
	
	<div id="content">
		
		<div id="main_content">
		
			<div id="archive_posts" class="post">
			
				<h2 class="title">The Last 30 Posts</h2>
				
					<ul>
						<?php query_posts('showposts=30'); ?>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php $wp_query->is_home = false; ?>
						<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> &gt; <?php the_time('j F Y') ?> <span class="comments">( <?php echo $post->comment_count ?> comments )</span></li>
						<?php endwhile; endif; ?>	
					</ul>				
			
			</div>
						
			<div id="archive_categories"class="post">
					
				<h2 class="title">Categories</h2>
				
					<ul>
						<?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
					</ul>	
			
			</div>                    

			<div id="archive_monthly" class="post">
				
				<h2 class="title">Monthly Archives</h2>
				
					<ul>
						<?php wp_get_archives('type=monthly&show_post_count=1') ?>	
					</ul>				
			
			</div>
		
		</div><!-- /main_content -->
		
		<?php get_sidebar(); ?>
		
		<div class="clear"></div>
		
	</div><!-- /content -->

<?php get_footer(); ?>