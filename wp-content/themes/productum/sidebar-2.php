	<div id="sidebar2" class="grid_4">
             
            <?php if (get_option('woo_show_mostcommented') == 'true'){ include(TEMPLATEPATH . '/includes/popular.php'); } ?>
            
            <!-- Add you sidebar manual code here to show above the widgets -->

            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(2) )  ?>		           

			<!-- Add you sidebar manual code here to show below the widgets -->
			
	</div><!-- / #sidebar2 -->
			