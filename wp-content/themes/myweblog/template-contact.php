<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

                    <div id="content">
                    
                        <div id="page-meta" class="clearfix">
                            
                        </div><!-- End page-meta -->
                        
                        <div id="page-content">
                                                
                            <h2 class="pagetitle"><?php the_title() ?></h2>
                            <ul id="posts" class="clearfix">
                            <li class="single">
                            <div class="post-content">
                            <div id="commentsform">
                            <?php include (TEMPLATEPATH . '/contact.php'); ?>
                            </div>
                            </div>
                            </li>
                            </ul>
                        
                        </div><!-- End page-content -->
                            
                        <?php include( TEMPLATEPATH . '/ad-footer.php' ); ?>    
                    
                    </div>
                    
                    <?php include( TEMPLATEPATH . '/copyright.php' ); ?>
                        
                </div><!-- End col-64 (Left Column) -->

                <div class="col-278 right">
                
                    <?php get_sidebar(); ?>
                                        
                </div><!-- End col-278 (Right Column) -->

<?php get_footer(); ?>