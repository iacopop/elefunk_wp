<?php
if (!is_admin()) add_action( 'wp_print_scripts', 'woothemes_add_javascript' );
function woothemes_add_javascript( ) {
	wp_enqueue_script('jquery');    
    wp_enqueue_script( 'scripts', get_bloginfo('template_directory').'/includes/js/scripts.js', array( 'jquery' ) );
	wp_enqueue_script( 'cufon', get_bloginfo('template_directory').'/includes/js/cufon-yui.js', array( 'jquery' ) );
	wp_enqueue_script( 'cufon-font', get_bloginfo('template_directory').'/includes/js/walkway.font.js', array( 'jquery' ) );
}
?>