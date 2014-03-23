<?php

// =============================== Subscribe widget ======================================
function subscribeWidget()
{
?>

<div class="subscribe">
    <h2><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>">Subscribe to our RSS</a></h2>
    <p>Receive updates as soon as they are posted.</p>
</div>

<?php
}
register_sidebar_widget('Subscribe', 'subscribeWidget');


// =============================== Flickr widget ======================================
function flickrWidget()
{
	$settings = get_option("widget_flickrwidget");

	$id = $settings['id'];
	$number = $settings['number'];

?>
<div class="flickr">
    <h2>Photos on <span>flick<span>r</span></span></h2>
    <div class="inside">
		<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>        
	<div class="fix"></div>
    </div>
</div>

<?php
}

function flickrWidgetAdmin() {

	$settings = get_option("widget_flickrwidget");

	// check if anything's been sent
	if (isset($_POST['update_flickr'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['flickr_id']));
		$settings['number'] = strip_tags(stripslashes($_POST['flickr_number']));

		update_option("widget_flickrwidget",$settings);
	}

	echo '<p>
			<label for="flickr_id">Flickr ID (<a href="http://www.idgettr.com">idGettr</a>):
			<input id="flickr_id" name="flickr_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>';
	echo '<p>
			<label for="flickr_number">Number of photos:
			<input id="flickr_number" name="flickr_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_flickr" name="update_flickr" value="1" />';

}

register_sidebar_widget('Flickr', 'flickrWidget');
register_widget_control('Flickr', 'flickrWidgetAdmin', 400, 200);


// =============================== Ad 125x125 widget ======================================
function adsWidget()
{
$settings = get_option("widget_adswidget");
$number = $settings['number'];

$img_url = array();
$dest_url = array();


	$numbers = range(1,$number); 
	$counter = 0;

if (get_option('woo_ads_rotate')) {
	shuffle($numbers);
}
?>
<div class="block"> 
	<div class="inside ads">
<?php
	foreach ($numbers as $number) {	
		$counter++;
		$img_url[$counter] = get_option('woo_ad_image_'.$number);
		$dest_url[$counter] = get_option('woo_ad_url_'.$number);
	
?>
        <a href="<?php echo "$dest_url[$counter]"; ?>"><img src="<?php echo "$img_url[$counter]"; ?>" alt="Ad" /></a>
<?php } ?>
	</div>
</div>
<!--/ads -->
<?php

}
register_sidebar_widget('Ads 125x125', 'adsWidget');

function adsWidgetAdmin() {

	$settings = get_option("widget_adswidget");

	// check if anything's been sent
	if (isset($_POST['update_ads'])) {
		$settings['number'] = strip_tags(stripslashes($_POST['ads_number']));

		update_option("widget_adswidget",$settings);
	}

	echo '<p>
			<label for="ads_number">Number of ads (1-6):
			<input id="ads_number" name="ads_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_ads" name="update_ads" value="1" />';

}
register_widget_control('Ads 125x125', 'adsWidgetAdmin', 200, 200);


// =============================== Ad 300x250 widget ======================================
function ad300Widget()
{

?>
<div class="advert">
	<?php if (get_option('woo_ad_300_adsense') <> "") { echo stripslashes(get_option('woo_ad_300_adsense')); ?>
    
    <?php } else { ?>
    
    <a href="<?php echo get_option('woo_ad_300_url'); ?>"><img src="<?php echo get_option('woo_ad_300_image'); ?>" width="300" height="250" alt="advert" /></a>
        
    <?php } ?>	
        
</div>
<?php
}
register_sidebar_widget('Ad 300x250', 'ad300Widget');


// ===============================  Category / Archives widget ======================================
function catarchWidget()
{
?>
<!-- CAT ARH STARTS -->
<div id="cat-arh" class="block">
	<div class="container wrap"> 
	<div class="col-left">
		<h2>Categories</h2>
		<div class="inside">
			<ul>
				<?php wp_list_categories('orderby=name&show_count=0&hide_empty=1&hierarchical=0&exclude=,2&title_li='); ?>
			</ul>
		</div>
	</div>
	<div class="col-right">
		<h2>Archives</h2>
		<div class="inside">
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
		</div>
		</div>
	</div>
</div>
<!-- CAT ARH ENDS -->
<?php
}
register_sidebar_widget('Cat/Archives', 'catarchWidget');

?>