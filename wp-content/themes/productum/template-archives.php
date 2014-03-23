<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>
			
			<div id="main" class="grid_8">
            
            <div class="grid_4 alpha">
                        
                <h2>Categories</h2>
            
                        <ul>
                        
                            <li id="categories">
                            	<?php wp_dropdown_categories('show_option_none=Select category'); ?>

<script type="text/javascript"><!--
    var dropdown = document.getElementById("cat");
    function onCatChange() {
		if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
			location.href = "<?php echo get_option('home');
?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
		}
    }
    dropdown.onchange = onCatChange;
--></script>

							</li>
	
                        </ul>
                        
               </div>	
                    
               <div class="grid_4 omega">    
                    
               <h2>Monthly Archives</h2>
            
                        <select name=\"archive-dropdown\" onChange='document.location.href=this.options[this.selectedIndex].value;'> 
  <option value=\"\"><?php echo attribute_escape(__('Select Month')); ?></option> 
  <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?> </select>
                        
               </div>
               
               <div class="clearfix" style="border-bottom:1px solid #e4e4e4; margin-bottom:15px;"></div>
			
				<h2 style="padding-bottom:20px;border-bottom:1px solid #e4e4e4; margin-bottom:20px;">The Last 30 Posts</h2>
            
                        <ul class="news">
                            <?php query_posts('showposts=30'); ?>
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                <?php $wp_query->is_home = false; ?>
                                <li>
                                <h4 style="margin-bottom:10px;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                                <p class="post_meta"><span><?php the_category(', ') ?> - <?php the_time('j F Y') ?></span> - <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
                                <?php the_excerpt() ?>
                                </li>
                            
                            <?php endwhile; endif; ?>	
                        </ul>	
			
			</div><!-- / #main -->

<?php get_sidebar(); ?>
<?php get_sidebar("2"); ?>
<?php get_footer(); ?>