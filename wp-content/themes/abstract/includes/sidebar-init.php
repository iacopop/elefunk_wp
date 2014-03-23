<?php

// Register widgetized areas

function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;

    register_sidebars(1,array('name' => 'Sidebar','before_widget' => '<div class="block">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>'));
    register_sidebars(2,array('name' => 'Footer %d','before_widget' => '<div class="footer_widget block">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>'));    
    
}

add_action( 'init', 'the_widgets_init' );


    
?>