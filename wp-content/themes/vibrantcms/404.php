<?php get_header(); ?>

<div id="steps" class="fullspan">
	
	<div class="container_16">
	
		<div class="grid_16">
			<ul><?php wp_list_categories('hierarchical=0&title_li='); ?></ul>
		</div>
		
	</div><!-- /container_16 -->

</div><!-- /steps -->

<div id="content" class="fullspan">

	<div class="container_16 clearfix">
			
		<div id="leftcontent" class="grid_10">

                    <h3><em>404 |</em> Page Not Found!</h3>
                    <div>Sorry, but the page you were looking for is not here.</div>						
                    
                    <div style="clear:both;"></div>		

		</div><!-- /leftcontent -->
        
        <?php get_sidebar(); ?>        
        
	</div><!-- /container_16 -->

</div><!-- /content -->

<?php get_footer(); ?>
