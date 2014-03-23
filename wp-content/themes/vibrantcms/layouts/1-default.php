<?php include(TEMPLATEPATH . '/includes/featured.php'); ?>

<div id="content" class="fullspan">

	<div class="container_16 clearfix">
		<div class="grid_5">
			
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(4) ) : else : ?>		
            
            <?php endif; ?>   
			
		</div>
		
		<div class="grid_5">
			
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(5) ) : else : ?>		  
            
            <?php endif; ?>   
			
		</div>
			
		<div class="grid_6">
      
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(6) ) : else : ?>		  
            
            <?php endif; ?>
      
      </div>
	</div><!-- /container_16 -->

</div><!-- /content -->
