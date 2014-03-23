<?php
	$version = get_bloginfo('version');
	
	if ($version > "2.3") { 
	
		$portfolio = get_option('woo_pf_cat'); // Name of the portfolio cat
		$GLOBALS['ex_pf'] = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name='$portfolio'");
		
		$about = get_option('woo_about'); // Name of the about page
		$GLOBALS['about_id'] = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$about'");

		$archives = get_option('woo_archives'); // Name of the archives page
		$GLOBALS['archives_id'] = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$archives'");
		
		
	} else {
	
		$portfolio = get_option('woo_pf_cat'); // ID of the Featured Category
		$GLOBALS['ex_pf'] = $wpdb->get_var("SELECT cat_ID FROM $wpdb->categories WHERE cat_name='$portfolio'");
	
		$about = get_option('woo_about'); // Name of the about page
		$GLOBALS['about_id'] = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$about'");

		$archive = get_option('woo_archive'); // Name of the about page
		$GLOBALS['archive_id'] = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$archive'");
	}
	
?>