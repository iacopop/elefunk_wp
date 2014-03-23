<?php

function woothemes_conditional_styles(){

$stylesheet = get_option('woo_alt_stylesheet');
          if($stylesheet != ''){
               echo "\n".'<!--[if lte IE 6]>'."\n".'<link href="'. get_bloginfo('template_directory') .'/styles/'. str_replace('.css','',$stylesheet) .'/ie6.css" rel="stylesheet" type="text/css" />'."\n".'<![endif]-->'."\n";         
               echo "\n".'<!--[if lte IE 7]>'."\n".'<link href="'. get_bloginfo('template_directory') .'/styles/'. str_replace('.css','',$stylesheet) .'/ie7.css" rel="stylesheet" type="text/css" />'."\n".'<![endif]-->'."\n";         
          }
}

?>