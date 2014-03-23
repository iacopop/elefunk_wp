<?php
/*
Template Name: Site Map Page
*/
?>

<?php get_header(); ?>

<div class="row_dot_border"></div>
    
<div class="post" style="background-image:none;">
 
 	<h2 class="post_title"><?php the_title(); ?></h2>	
    
    <div class="entry">		
            
                        
                        <h3>Pages</h3>
            
                        <ul>
                            <?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' ); ?>		
                        </ul>				

                
                        <h3>Categories</h3>
            
                        <ul>
                            <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
                        </ul>	               

						<?php
                
                        $cats = get_categories();
                        foreach ($cats as $cat) {
                
                        query_posts('cat='.$cat->cat_ID);
            
                   		?>
                    
                        <h3><?php echo $cat->cat_name; ?></h3>
            
                        <ul>	
                                <?php while (have_posts()) : the_post(); ?>
                                <li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - Comments (<?php echo $post->comment_count ?>)</li>
                                <?php endwhile;  ?>
                        </ul>
                
					<?php } ?>
                    
</div><!-- entry -->

</div><!-- post -->	

</div><!-- Content -->


<?php get_sidebar(); ?>
 
    	    
<?php get_footer(); ?>
