<?php

$number = 5;
$img_url = array();
$dest_url = array();

$numbers = range(1,$number); 
$counter = 0;

if ( get_option('woo_ads_rotate') == 'true' ) {
	shuffle($numbers);
}
?>

<div id="advert_125x125">
<?php
	foreach ($numbers as $number) {	
		$counter++;
		$img_url[$counter] = get_option('woo_ad_image_'.$number);
		$dest_url[$counter] = get_option('woo_ad_url_'.$number);
	
?>
        <a href="<?php echo "$dest_url[$counter]"; ?>"><img src="<?php echo "$img_url[$counter]"; ?>" alt="Ad" /></a>
<?php } ?>
		
</div><!--/ads -->

<div class="fix"></div>
