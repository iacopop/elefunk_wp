<?php
/*
Template Name: Sitemap
*/
?>
<?php get_header(); ?>
       
    <!-- Content Starts -->
    <div id="content" class="wrap">
		<div class="col-left">
			<div id="main" class="single">
            
                <div class="box3-top"></div>
                <div class="post">

     	           <h2 class="arh"><?php the_title(); ?></h2>			
                    
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
                    
                    <h3 style="margin-top:10px !important; padding:0px;"><?php echo $cat->cat_name; ?></h3>
        
                    <ul>	
                            <?php while (have_posts()) : the_post(); ?>
                            <li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - Comments (<?php echo $post->comment_count ?>)</li>
                            <?php endwhile;  ?>
                    </ul>
                
                    <?php } ?>					
                                                                            
                </div>
                <div class="box3-bot"></div>
            </div><!-- main ends -->
        </div><!-- .col-left ends -->

        <?php get_sidebar(); ?>

    </div><!-- Content Ends -->
		
<?php get_footer(); ?>
