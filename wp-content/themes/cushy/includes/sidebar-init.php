<?php

// Register widgetized areas

function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;

    register_sidebars(1,array('name' => 'Sidebar','before_widget' => '<li id="%1$s">','after_widget' => '</li>','before_title' => '<h4>','after_title' => '</h4>'));
    register_sidebars(1,array('name' => 'Footer','before_widget' => '<li id="%1$s">','after_widget' => '</li>','before_title' => '','after_title' => ''));
    
}

add_action( 'init', 'the_widgets_init' );


    
?>