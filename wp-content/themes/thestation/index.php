<?php get_header(); ?>

	<div id="content">

		<?php 
			
			if ( get_option('woo_homepage') <> "" ) { include( TEMPLATEPATH . '/includes/' . get_option('woo_homepage') ); 
			} else { include( TEMPLATEPATH . '/includes/layout-default.php');  }
		
		?>
			
	</div><!-- /content -->

<?php get_footer(); ?>