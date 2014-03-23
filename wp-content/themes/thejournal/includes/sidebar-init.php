<?php

// Register widgetized areas

function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;

    register_sidebar(array('name' => 'Home Page Footer 1 - Text','id' => 'home-1','before_widget' => '<div id="%1$s" class="block %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    
    register_sidebar(array('name' => 'Home Page Footer 2','id' => 'home-2','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
   
    register_sidebar(array('name' => 'Home Page Footer 3','id' => 'home-3','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	
	register_sidebar(array('name' => 'Home Page Footer 4','id' => 'home-4','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	
	register_sidebar(array('name' => 'Sidebar 1','id' => 'sidebar-1','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	
	register_sidebar(array('name' => 'Sidebar 2','id' => 'sidebar-2','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    

}

add_action( 'init', 'the_widgets_init' );   


    
?>