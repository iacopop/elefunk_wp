<?php get_header(); ?>
       
		<?php 
        if (get_option('woo_home') == "true") 
			include (TEMPLATEPATH . '/layout-home.php'); 
		else			 
			include (TEMPLATEPATH . '/layout-single.php'); 			
		?>
		
<?php get_footer(); ?>