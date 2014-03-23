	<div id="sidebar" class="grid_4 <?php if ( get_option('woo_right_sidebar') == 'false' ) { echo 'alpha'; } else { echo 'omega'; } ?>">
		
			<!-- Add you sidebar manual code here to show above the widgets -->

            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(1) )  ?>		           

			<!-- Add you sidebar manual code here to show below the widgets -->

	</div><!-- /sidebar -->