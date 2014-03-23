<?php
if (!is_admin()) add_action( 'wp_print_scripts', 'woothemes_add_javascript' );
function woothemes_add_javascript( ) {
	wp_enqueue_script('jquery');
   wp_enqueue_script( 'easing', get_bloginfo('template_directory').'/includes/js/easing.js', array( 'jquery' ) );      
   
   if ( get_option( 'woo_automate_slider' ) == 'false' ) {
   	wp_enqueue_script( 'slider', get_bloginfo('template_directory').'/includes/js/slider.js', array( 'jquery' ) );
   	} else {
   	wp_enqueue_script( 'slider-auto', get_bloginfo('template_directory').'/includes/js/slider-auto.js', array( 'jquery' ) );
   	}
   
}
?>