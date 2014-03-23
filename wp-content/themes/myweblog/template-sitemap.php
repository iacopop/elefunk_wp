<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>

                    <div id="content">
                    
                        <div id="page-meta" class="clearfix">
                            
                        </div><!-- End page-meta -->
                        
                        <div id="page-content">
                                                
                            <h2 class="pagetitle">Site Archives</h2>
                        
                            <ul id="posts" class="clearfix">

                                <li class="single">
                                                                                                                    
                                    <div class="post-content">
                                    <div class="page post wrap">
                                        <h3>Pages</h3>
                            
                                        <ul>
                                            <?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' ); ?>		
                                        </ul>				

					                </div>
                                    
					                <div class="page post wrap">
                                
                                        <h3>Categories</h3>
                            
                                        <ul>
                                            <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
                                        </ul>	
					                </div>                    

					                <div class="hr"></div>
					                <?php
                                
                                        $cats = get_categories();
                                        foreach ($cats as $cat) {
                                
                                        query_posts('cat='.$cat->cat_ID);
                            
                                    ?>
                                    
                                    <div class="page post wrap">
                                    <h3><?php echo $cat->cat_name; ?></h3>
                        
                                    <ul>	
                                            <?php while (have_posts()) : the_post(); ?>
                                            <li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - Comments (<?php echo $post->comment_count ?>)</li>
                                            <?php endwhile;  ?>
                                    </ul>
                                </div>
					                <?php } ?>					
                                </div><!-- End post-content -->
                                        
                                </li><!-- End post -->

                            </ul><!-- End posts -->
                        
                        </div><!-- End page-content -->
                            
                        <?php include( TEMPLATEPATH . '/ad-footer.php' ); ?>    
                    
                    </div>
                    
                    <?php include( TEMPLATEPATH . '/copyright.php' ); ?>
                        
                </div><!-- End col-64 (Left Column) -->

                <div class="col-278 right">
                
                    <?php get_sidebar(); ?>
                                        
                </div><!-- End col-278 (Right Column) -->

<?php get_footer(); ?>