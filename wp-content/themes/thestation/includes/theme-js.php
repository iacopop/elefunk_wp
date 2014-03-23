<?php
if (!is_admin()) add_action( 'wp_print_scripts', 'woothemes_add_javascript' );
function woothemes_add_javascript( ) {
	wp_enqueue_script('jquery');    
	wp_enqueue_script( 'menu', get_bloginfo('template_directory').'/includes/js/menu.js', array( 'jquery' ) );
    
    if ( is_home() ){

	    if ( get_option( 'woo_homepage' ) == 'layout-default.php' AND get_option( 'woo_slider' ) == 'false' ) {
		    wp_enqueue_script( 'general', get_bloginfo('template_directory').'/includes/js/general.js', array( 'jquery' ) );
		    wp_enqueue_script( 'tabs', get_bloginfo('template_directory').'/includes/js/tabs.js', array( 'jquery' ) );	
	    }

	    if ( get_option( 'woo_homepage' ) == 'layout-magazine.php' OR get_option( 'woo_slider' ) == 'true' ) {
		    wp_enqueue_script( 'scrollTo', get_bloginfo('template_directory').'/includes/js/jquery.scrollTo-1.4.1.js', array( 'jquery' ) );
		    wp_enqueue_script( 'localscroll', get_bloginfo('template_directory').'/includes/js/jquery.localscroll.js', array( 'jquery' ) );
            wp_enqueue_script( 'serialScroll', get_bloginfo('template_directory').'/includes/js/jquery.serialScroll-1.2.1.js', array( 'jquery' ) );            
		    wp_enqueue_script( 'slider', get_bloginfo('template_directory').'/includes/js/slider.js', array( 'jquery' ) );			
	    }	
    
    }
	
}
?>