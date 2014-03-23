<?php
	global $style_path;
	
	$stylesheet = get_option('woo_alt_stylesheet');
	
	if ( $stylesheet == 'default.css' ) { $style_path = 'default'; }
	elseif ( $stylesheet == 'floral.css' ) { $style_path = 'floral'; }
	elseif ( $stylesheet == 'newspaper.css' ) { $style_path = 'newspaper'; }	
	elseif ( $stylesheet == 'red-print.css' ) { $style_path = 'red-print'; }
	elseif ( $stylesheet == 'wood.css' ) { $style_path = 'wood'; }
	else { $style_path = 'default'; }
?>

