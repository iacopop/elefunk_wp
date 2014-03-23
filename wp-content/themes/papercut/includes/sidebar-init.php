<?php

// Register widgetized areas

function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;

		register_sidebar(array('before_widget' => '<li class="widget">','after_widget' => '</li>','before_title' => '<h2>','after_title' => '</h2>'));	
    
}

add_action( 'init', 'the_widgets_init' );


    
?>