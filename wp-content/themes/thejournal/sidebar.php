<!-- Sidebar Starts -->
<div id="sidebar" class="col-right">

    <?php if(is_single()){ ?>      
    <div class="widget block">

    	<h3>Related Articles</h3>
        <?php
              echo woo_get_related($post);
        ?>
    </div>
    <?php } ?>

	<!-- Widgetized Sidebar -->	
    <div class="subcol fl">
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-1') )  ?>	
    </div>
    
    <!-- Widgetized Sidebar -->	
    <div class="subcol fr">
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-2') )  ?>		
    </div>	           
	
</div>
<!-- Sidebar Ends -->