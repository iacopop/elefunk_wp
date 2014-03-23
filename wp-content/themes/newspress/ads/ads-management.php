<?php
$ad_page = get_option('woo_ad_page') . '/';

$counter = 0;

if (get_option('woo_show_ads_bottom') && get_option('woo_show_ads_top')) 
	$numbers = range(1,6); 
elseif (!get_option('woo_show_ads_bottom'))
	$numbers = range(1,3); 
elseif (get_option('woo_show_ads_bottom') && !get_option('woo_show_ads_top')) {
	$numbers = range(4,6); 
	$counter = 3;
}
	


$img_url = array();
$dest_url = array();

shuffle($numbers);

foreach ($numbers as $number) {
	
	$counter++;
	
	$img_url[$counter] = get_option('woo_ad_image_'.$number);
	$dest_url[$counter] = get_option('woo_ad_url_'.$number);
	
}

?> 