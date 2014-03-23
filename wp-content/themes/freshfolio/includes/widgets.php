<?php

// =============================== Twitter widget ======================================
function twitterWidget()
{
	$number = 5;
	$title = "Twitter";
	$settings = get_option("widget_twitterwidget");
	if ($settings['number']) $number = $settings['number'];
	if ($settings['title']) $title = $settings['title'];

?>
<div class="wrap twitter"><h2><?php echo $title; ?></h2></div>
<div id="twitter_div" class="box">
<ul id="twitter_update_list"><li></li></ul>
<span class="website"><a href="http://www.twitter.com/<?php echo $settings['username']; ?>" title="Follow me on Twitter">Follow me on Twitter</a></span></div>		
<?php
}
register_sidebar_widget('Woo - Twitter', 'twitterWidget');

function twitterWidgetAdmin() {

	$settings = get_option("widget_twitterwidget");

	// check if anything's been sent
	if (isset($_POST['update_twitter'])) {
		$settings['username'] = strip_tags(stripslashes($_POST['twitter_username']));
		$settings['number'] = strip_tags(stripslashes($_POST['twitter_number']));
		$settings['title'] = strip_tags(stripslashes($_POST['twitter_title']));
		update_option("widget_twitterwidget",$settings);
	}

	echo '<p>
			<label for="twitter_username">Twitter username:
			<input id="twitter_username" name="twitter_username" type="text" class="widefat" value="'.$settings['username'].'" /></label></p>';

	echo '<p>
			<label for="twitter_number">Number of tweets (default = 5):
			<input id="twitter_number" name="twitter_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<p>
			<label for="twitter_title">Title
			<input id="twitter_title" name="twitter_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<input type="hidden" id="update_twitter" name="update_twitter" value="1" /></label>';


}
register_widget_control('Woo - Twitter', 'twitterWidgetAdmin', 200, 200);

function FlickrBox()
{

?>

			<?php if ( get_option('woo_flickr_id') ) { ?>
            <div class="wrap st">
				<h2>MY LATEST <span style="color:#0063DC">FLICK</span><span style="color:#FF0084">R</span> PHOTOS</h2>
			</div>
			<div class="box">

	            <div class="flickr">
                    <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo get_option('woo_flickr_entries'); ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo get_option('woo_flickr_id'); ?>"></script>		
                </div>
                <div class="fix"></div>

			</div>
			<!--/box-->
            <?php } ?>
	
<?php 	
}
register_sidebar_widget('Flickr Photos', 'FlickrBox');

?>