<?php get_header(); ?>

		<div class="col1">
				
			<div id="archivebox">
				
					<h3><em>404 |</em> Page Not Found!</h3>
					<div class="archivefeed">Sorry, but the page you were looking for is not here.</div>				
			
			</div><!--/archivebox-->	 
            
             <p>Sorry. Your search yielded no results. Perhaps you'll find what you are looking for in our archive.</p>   
        
        	<div class="arclist fl">     
			
				<h3>Categories</h3>
	
				<ul>
					<?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
				</ul>				
			
			</div><!--/arclist-->
			
			<div class="arclist fr">
			
				<h3>Monthly Archives</h3>
	
				<ul>
					<?php wp_get_archives('type=monthly&show_post_count=1') ?>	
				</ul>				
			
			</div><!--/arclist-->
			
			<div class="fix"></div>
			
			<?php if (function_exists('wp_tag_cloud')) { ?>
					
				<h3 class="popular">Popular Tags</h3>					        
                
                <ul class="list1">
					<?php wp_tag_cloud('smallest=10&largest=18'); ?>
				</ul>	
			
			<?php } ?>															
			
		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>	
