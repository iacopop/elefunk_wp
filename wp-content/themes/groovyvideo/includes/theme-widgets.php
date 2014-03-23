<?php



// =============================== Flickr widget ======================================

function flickrWidget()

{

	$settings = get_option("widget_flickrwidget");



	$id = $settings['id'];

	$number = $settings['number'];



?>



<div id="flickr" class="block">

	<h3 class="widget_title">Photos on <span>flick<span>r</span></span></h3>

	<div class="wrap">

		<div class="fix"></div>

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



register_sidebar_widget('Woo - Flickr', 'flickrWidget');

register_widget_control('Woo - Flickr', 'flickrWidgetAdmin', 400, 200);





// =============================== Feedburner Subscribe widget ======================================

function subscribeWidget()

{

	$settings = get_option("widget_subscribewidget");

	$id = $settings['id'];
	$title = $settings['title'];
	$text = $settings['text'];	
	$google = $settings['google'];	
?>

	<div class="subscribe">	

		<h3><?php echo $title; ?></h3>

		<p><?php echo $text; ?></p>

		<form action="<?php if ($google) { ?>http://feedburner.google.com/fb/a/mailverify<?php } else { ?>http://www.feedburner.com/fb/a/emailverify<?php } ?>" method="post" target="popupwindow" onsubmit="window.open('<?php if ($google) { ?>http://feedburner.google.com/fb/a/mailverify?uri=<?php } else { ?>http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php } ?><?php echo $id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">

			<div>

				<input type="text" name="email" class="field" />

				<input type="hidden" value="<?php echo $id; ?>" name="uri"/>

				<input type="hidden" value="<?php bloginfo('name'); ?>" name="title"/>

				<input type="hidden" name="loc" value="en_US"/>

                <button class="replace" type="submit" name="submit"></button>

			</div>

		</form>

		<div class="rss"><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>">Subscribe Videos</a></div>
        <div class="rss"><a href="<?php bloginfo('comments_rss2_url'); ?>">Subscribe Comments</a></div>

	</div>



<?php

}



function subscribeWidgetAdmin() {
	$settings = get_option("widget_subscribewidget");
	// check if anything's been sent
	if (isset($_POST['update_subscribe'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['subscribe_id']));
		$settings['title'] = strip_tags(stripslashes($_POST['subscribe_title']));
		$settings['text'] = strip_tags(stripslashes($_POST['subscribe_text']));		
		$settings['google'] = $_POST['subscribe_google'];		
		update_option("widget_subscribewidget",$settings);

	}
	echo '<p>
			<label for="subscribe_title">Title:
			<input id="subscribe_title" name="subscribe_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';

	echo '<p>
			<label for="subscribe_text">Text Below Title:
			<input id="subscribe_text" name="subscribe_text" type="text" class="widefat" value="'.$settings['text'].'" /></label></p>';

	echo '<p>
			<label for="subscribe_id">Your Feedburner ID:
			<input id="subscribe_id" name="subscribe_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>';			

	if ( $settings['google'] ) {
	
		echo '<p>
				<label for="subscribe_google">Use Feedburner Google URL?:
				<input id="subscribe_google" name="subscribe_google" type="checkbox" checked /></label></p>';			

	} else {

		echo '<p>
				<label for="subscribe_google">Use Feedburner Google URL?:
				<input id="subscribe_google" name="subscribe_google" type="checkbox" /></label></p>';			
	
	}


echo '<input type="hidden" id="update_subscribe" name="update_subscribe" value="1" />';

}

register_sidebar_widget('Woo - Subscribe', 'subscribeWidget');
register_widget_control('Woo - Subscribe', 'subscribeWidgetAdmin', 400, 200);

?>