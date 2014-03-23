<?php
/*
Template Name: Sitemap
*/
?>
<?php get_header(); ?>
	  
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
	<div id="content">
	<div id="content-tile">
	
		<div id="main" class="grid_10 alpha">
		
			<div class="post entry sitemap">

                    <h3>Pages</h3>
        
                    <ul>
                        <?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' ); ?>		
                    </ul>				
            
                    <h3>Categories</h3>
        
                    <ul>
                        <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
                    </ul>	
					
					<h3>Post by category</h3>
					
					<?php
						$cats = get_categories();
						foreach ($cats as $cat) {
						query_posts('cat='.$cat->cat_ID);
					?>
                
					<h4><?php echo $cat->cat_name; ?></h4>
    
					<ul>	
                        <?php while (have_posts()) : the_post(); ?>
                        <li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - Comments (<?php echo $post->comment_count ?>)</li>
                        <?php endwhile;  ?>
					</ul>
            
					<?php } ?>
				
			</div><!-- /.entry -->
		
		</div><!-- /#main -->
			
			<?php $wp_query->is_page = true; ?>
			<?php get_sidebar(); ?>
		
<?php get_footer(); ?>