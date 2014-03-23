<?php

// Register widgetized areas

function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;
        
    register_sidebar(array('name' => 'Homepage Content','id' => 'sidebar-home','before_widget' => '<div id="%1$s" class="module widget %2$s">','after_widget' => '</div><!-- end module -->','before_title' => '<h2 class="module-title">','after_title' => '</h2>'));
    register_sidebar(array('name' => 'Sidebar','id' => 'sidebar-1','before_widget' => '<div id="%1$s" class="module widget %2$s">','after_widget' => '</div><!-- end module -->','before_title' => '<h2 class="module-title">','after_title' => '</h2>')); 
    
}

add_action( 'init', 'the_widgets_init' );


    
?>