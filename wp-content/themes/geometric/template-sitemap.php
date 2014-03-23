<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>

<?php if ( !get_option('woo_right_sidebar') ) { get_sidebar(); } ?>

<div id="content" class="grid_12 <?php if ( !get_option('woo_right_sidebar') ) { echo 'omega'; } else { echo 'alpha'; } ?>">
		
	<div id="blog_large" class="sitemap">
		
		<div class="grid_6 alpha">
		
			<div class="title" style="width: 330px;">
				<h3>Pages</h3>
			</div><!-- /title -->
				
			<div class="post">				
				<div class="entry">				
					<ul><?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' ); ?></ul>				
				</div><!-- /entry -->			
			</div><!-- /post -->
		
		</div><!-- /grid_6 -->

		<div class="grid_6 omega">
		
			<div class="title" style="width: 330px;">
				<h3>Categories</h3>
			</div><!-- /title -->
				
			<div class="post">				
				<div class="entry">				
					<ul><?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?></ul>				
				</div><!-- /entry -->			
			</div><!-- /post -->
		
		</div><!-- /grid_6 -->
		
		<div class="fix"></div>	

			<div class="title">
				<h3>Content</h3>
			</div><!-- /title -->
			
			<div class="post">				
				<div class="entry">				
					<?php
                
                        $cats = get_categories();
                        foreach ($cats as $cat) {
                
                        query_posts('cat='.$cat->cat_ID);
            
                    ?>
                    
                        <h3 style="margin-top:10px !important; padding:0px;"><?php echo $cat->cat_name; ?></h3>
            
                        <ul>	
                                <?php while (have_posts()) : the_post(); ?>
                                <li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - Comments (<?php echo $post->comment_count ?>)</li>
                                <?php endwhile;  ?>
                        </ul>
                
					<?php } ?>						
				</div><!-- /entry -->			
			</div><!-- /post -->			
		
		<div class="fix"></div>
	
	</div><!-- /blog_large -->
	
</div><!-- /content -->	

<?php if ( get_option('woo_right_sidebar') ) { get_sidebar(); } ?>

<?php get_footer(); ?>