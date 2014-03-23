<?php

	global $style_path;

	$style = $_REQUEST[style];
	
	if ($style != '') {

		$style_path = $style;

	} else {
		
		$stylesheet = get_option('woo_alt_stylesheet');
		$style_path = str_replace(".css","",$stylesheet);
	
	}
?>

