<?php


$counter = 0;
$numbers = range(1,4); 

shuffle($numbers);

foreach ($numbers as $number) {
	
	$counter++;
	
	echo '<li><a href="' . get_option('woo_ad_url_'.$number)  .'"><img src="' . get_option('woo_ad_image_'.$number) . '" alt="" /></a></li>';
	
}

?> 