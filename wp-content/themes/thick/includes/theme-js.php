<?php
if (!is_admin()) add_action( 'wp_print_scripts', 'woothemes_add_javascript' );
function woothemes_add_javascript( ) {
	wp_enqueue_script('jquery');    
	wp_enqueue_script( 'accordian', get_bloginfo('template_directory').'/includes/js/jquery.accordian.js', array( 'jquery' ) );
	wp_enqueue_script( 'easing', get_bloginfo('template_directory').'/includes/js/jquery.easing.js', array( 'jquery' ) );
	wp_enqueue_script( 'actions', get_bloginfo('template_directory').'/includes/js/jquery.actions.js', array( 'jquery' ) );		
}
?>