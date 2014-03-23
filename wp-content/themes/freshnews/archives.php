<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>

		<div id="centercol" class="grid_10">
					
			<h3><?php the_title(); ?></h3>                              

			<div class="arclist box">
			
				<h2>The Last 30 Posts</h2>
	
				<ul>
					<?php query_posts('showposts=30'); ?>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php $wp_query->is_home = false; ?>
                        <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php the_time('j F Y') ?> - <?php echo $post->comment_count ?> comments</li>
                    
                    <?php endwhile; endif; ?>	
				</ul>				
			
			</div><!--/box-->													
			
			<div class="grid_5 alpha">
			
            	<div class="arclist box">
                
                    <h2>Categories</h2>
        
                    <ul>
                        <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
                    </ul>	
                    			
                </div>
			
			</div><!--/grid_5 alpha-->
			
			<div class="grid_5 omega">
			
            	<div class="arclist box">

                    <h2>Monthly Archives</h2>
        
                    <ul>
                        <?php wp_get_archives('type=monthly&show_post_count=1') ?>	
                    </ul>				
				
                </div>
			
			</div><!--/grid_5 omega-->
			
			<div class="fix"></div>

		</div><!--/centercol grid_10-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>