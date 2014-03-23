<?php
if (!is_admin()) add_action( 'wp_print_scripts', 'woothemes_add_javascript' );
function woothemes_add_javascript( ) {    
	wp_enqueue_script( 'jquery');
	if (is_home()) {
	//wp_enqueue_script( 'imgswitch', get_bloginfo('template_directory').'/includes/js/setup.imgswitch.js', array( 'jquery' ) );
	if( get_option('woo_show_carousel')){
		wp_enqueue_script( 'carousel', get_bloginfo('template_directory').'/includes/js/stepcarousel.js', array( 'jquery' ) );
		wp_enqueue_script( 'carousel-setup', get_bloginfo('template_directory').'/includes/js/setup.carousel.js', array( 'jquery' ) );
	}
	wp_enqueue_script( 'menu', get_bloginfo('template_directory').'/includes/js/menu.js', array( 'jquery' ) );
	}
}
?>