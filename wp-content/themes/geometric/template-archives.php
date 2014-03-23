<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>

<?php if ( !get_option('woo_right_sidebar') ) { get_sidebar(); } ?>

<div id="content" class="grid_12 <?php if ( !get_option('woo_right_sidebar') ) { echo 'omega'; } else { echo 'alpha'; } ?>">
		
	<div id="blog_large" class="sitemap">

			<div class="title">
				<h3>The Last 30 Posts</h3>
			</div><!-- /title -->
			
			<div class="post">				
				<div class="entry">				
            
                        <ul>	
                            <?php query_posts('showposts=30'); ?>
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                <?php $wp_query->is_home = false; ?>
                                <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php the_time('j F Y') ?> - <?php echo $post->comment_count ?> comments</li>
                            
                            <?php endwhile; endif; ?>	
                        </ul>
			
				</div><!-- /entry -->			
			</div><!-- /post -->			
		
		<div class="fix"></div>
	
		
		<div class="grid_6 alpha">
		
			<div class="title" style="width: 330px;">
				<h3>Browse by Month</h3>
			</div><!-- /title -->
				
			<div class="post">				
				<div class="entry">				
					<ul><?php wp_get_archives('type=monthly&show_post_count=1') ?>	</ul>				
				</div><!-- /entry -->			
			</div><!-- /post -->
		
		</div><!-- /grid_6 -->

		<div class="grid_6 omega">
		
			<div class="title" style="width: 330px;">
				<h3>Browse by Category</h3>
			</div><!-- /title -->
				
			<div class="post">				
				<div class="entry">				
					<ul><?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?></ul>				
				</div><!-- /entry -->			
			</div><!-- /post -->
		
		</div><!-- /grid_6 -->
		
		<div class="fix"></div>	
	
	</div><!-- /blog_large -->
	
</div><!-- /content -->	

<?php if ( get_option('woo_right_sidebar') ) { get_sidebar(); } ?>

<?php get_footer(); ?>