<?php
/*
Template Name: Custom Homepage
*/
?>

<?php $wp_query->is_home = true; ?>

<?php get_header(); ?>

<?php if ( get_option('woo_right_sidebar') == 'false' ) { get_sidebar(); } ?>

<div id="content" class="grid_12 <?php if ( get_option('woo_right_sidebar') == 'false' ) { echo 'omega'; } else { echo 'alpha'; } ?>">
	
	<!-- Add you custom homepage manual code here to show above the widgets -->

	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(2) )  ?>		           

	<!-- Add you custom homepage manual code here to show below the widgets -->
	
</div><!-- /content -->	

<?php if ( get_option('woo_right_sidebar') == 'true' ) { get_sidebar(); } ?>

<?php get_footer(); ?>