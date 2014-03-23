<?php

// Register widgetized areas

function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;

    register_sidebars(1,array('name' => 'Blog Sidebar','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3 class="hl">','after_title' => '</h3>'));
    register_sidebars(1,array('name' => 'Blog Sidebar - Small (Left)','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3 class="hl">','after_title' => '</h3>'));
    register_sidebars(1,array('name' => 'Blog Sidebar - Small (Right)','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3 class="hl">','after_title' => '</h3>'));        
    register_sidebars(3,array('name' => 'Homepage %d','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3 class="hl">','after_title' => '</h3>'));            

}

add_action( 'init', 'the_widgets_init' );


    
?>