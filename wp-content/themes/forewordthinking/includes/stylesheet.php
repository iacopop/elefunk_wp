<?php

	$style = $_REQUEST[style];
	if ($style != '') {
		$style_path = $style;
	} else {

		global $style_path;
		
		$stylesheet = get_option('woo_alt_stylesheet');
		
		if ( $stylesheet == 'space.css' ) { $style_path = 'space'; }
		elseif ( $stylesheet == 'paint_it_black.css' ) { $style_path = 'paint_it_black'; }
		elseif ( $stylesheet == 'wood.css' ) { $style_path = 'wood'; }
		elseif ( $stylesheet == 'paint_it_white.css' ) { $style_path = 'paint_it_white'; }
		else { $style_path = 'space'; }
	
	}
?>

