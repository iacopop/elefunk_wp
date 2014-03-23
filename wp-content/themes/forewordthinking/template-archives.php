<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>

<div class="row_dot_border"></div> 

<div class="nav">
        	
            	<p><span class="white_on_black"><em>The Archives</em></span></p>        
 
 </div> 
    
<div class="col1">
			
				<h2>Categories</h2>
	
				<ul>
					<?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
				</ul>				
			
			</div><!--/arclist-->
			
			<div class="col2">
			
				<h2>Monthly Archives</h2>
	
				<ul>
					<?php wp_get_archives('type=monthly&show_post_count=1') ?>	
				</ul>				
			
			</div><!--/arclist-->
			
			<div class="fix"></div>
			
			<?php if (function_exists('wp_tag_cloud')) { ?>
			
            <div id="archivebox">
        
                <h2>The Last 30 Posts</h2>

            </div><!--/archivebox-->
            
            <div class="arclist" style="width:auto;">
            <ul>
                <?php query_posts('showposts=30'); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php $wp_query->is_home = false; ?>
                    <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php the_time('j F Y') ?> - <?php echo $post->comment_count ?> comments</li>
                
                <?php endwhile; endif; ?>	
            </ul>	
            </div>	
            
            <div id="archivebox">
                
                    <h2>Popular Tags</h2>					        
            
            </div><!--/archivebox-->
            
            <ul class="list1">
                <?php wp_tag_cloud('smallest=10&largest=18'); ?>
            </ul>	
			
			<?php } ?>	

</div><!-- Content -->


<?php get_sidebar(); ?>
 
    	    
<?php get_footer(); ?>
