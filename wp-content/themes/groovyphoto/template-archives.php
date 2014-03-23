<?php
/*
Template Name: Archives Page
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

                    <h3>The Last 30 Posts</h3>       
                    <ul>
                        <?php query_posts('showposts=30'); ?>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <?php $wp_query->is_home = false; ?>
                            <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php the_time('j F Y') ?> - <?php echo $post->comment_count ?> comments</li>
                        
                        <?php endwhile; endif; ?>	
                    </ul>				
            
                    <h3>Categories</h3>
        
                    <ul>
                        <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
                    </ul>	
                    <h3>Monthly Archives</h3>
        
                    <ul>
                        <?php wp_get_archives('type=monthly&show_post_count=1') ?>	
                    </ul>				
                </div>                    
                
                <div class="box3-bot"></div>
            </div><!-- main ends -->
        </div><!-- .col-left ends -->

        <?php get_sidebar(); ?>

    </div><!-- Content Ends -->
		
<?php get_footer(); ?>
