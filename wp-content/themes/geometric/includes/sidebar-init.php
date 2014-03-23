<?php

// Register widgetized areas

function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;

    register_sidebars(1,array('name' => 'Sidebar','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>'));
    register_sidebars(1,array('name' => 'Custom Homepage','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>'));	
    
}

add_action( 'init', 'the_widgets_init' );


    
?>