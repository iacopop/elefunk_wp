<?php
/*
Template Name: Sitemap
*/
?>

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
				
				<h3>Pages</h3>
        
                    <ul>
                        <?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' ); ?>		
                    </ul>				
            
				<h3>Categories</h3>
			
				<ul>
					<?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
				</ul>	
                
				<h2>Blog posts per category</h2>
				
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
				
			</div><!-- /.entry -->
				
		</div><!-- end module -->
			
	</div><!-- end content -->
					
<?php get_footer(); ?>
