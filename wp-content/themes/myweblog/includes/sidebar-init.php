<?php

// Register widgetized areas


function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;

    register_sidebar(array(
    'name' => 'Sidebar',
    'id' => 'sidebar-1',
    'before_widget' => '<li id="%1$s" class="block widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h4>',
    'after_title' => '</h4>'));
    
}

add_action( 'init', 'the_widgets_init' );


    
?>