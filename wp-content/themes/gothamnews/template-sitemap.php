<?php
/*
Template Name: Sitemap
*/
?>
<?php get_header(); ?>

	<div id="middle-out">
		<div id="middle" class="wrap">
		
			<div id="content" class="col-left">
		
				<div id="single" class="page">

					<div class="post">
            
                        <h2>Pages</h2>
            
                        <ul>
                            <?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' ); ?>		
                        </ul>				

					</div>
                    
					<div class="post">
                
                        <h2>Categories</h2>
            
                        <ul>
                            <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
                        </ul>	
					</div>                    

					<div class="post">
					<?php
                
                        $cats = get_categories();
                        foreach ($cats as $cat) {
                
                        query_posts('cat='.$cat->cat_ID);
            
                    ?>
                    
                        <h2 style="margin-top:10px !important; padding:0px;"><?php echo $cat->cat_name; ?></h2>
            
                        <ul>	
                                <?php while (have_posts()) : the_post(); ?>
                                <li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - Comments (<?php echo $post->comment_count ?>)</li>
                                <?php endwhile;  ?>
                        </ul>
                
					<?php } ?>					
					</div>                    
			
				</div>
			</div>
			
		<?php get_sidebar(); ?>
		
		</div>
	</div>
	<?php get_footer(); ?>