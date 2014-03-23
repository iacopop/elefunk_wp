<?php

// Register widgetized areas

function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;

    register_sidebars(1,array('name' => 'Left Sidebar','before_widget' => '<ul><li  class="widget">','after_widget' => '</ul></li></ul>','before_title' => '<h2>','after_title' => '</h2><ul>'));
    register_sidebars(1,array('name' => 'Your Favourites','before_widget' => '','after_widget' => '','before_title' => '','after_title' => ''));
    register_sidebars(1,array('name' => 'Right Sidebar','before_widget' => '<li class="widget">','after_widget' => '</li>','before_title' => '<h2>','after_title' => '</h2>'));    
    register_sidebars(1,array('name' => 'Middle Column (Homepage)','before_widget' => '','after_widget' => '</ul>','before_title' => '<h2 class="heading">','after_title' => '</h2><ul class="widget">'));        
    
}

add_action( 'init', 'the_widgets_init' );


    
?>