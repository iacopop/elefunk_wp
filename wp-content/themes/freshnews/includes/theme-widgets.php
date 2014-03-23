<?php

// =============================== Asides widget ======================================
function asidesWidget()
{
	$number = 5;
	$title = "Asides";
	$settings = get_option("widget_asideswidget");
	if ($settings['number']) $number = $settings['number'];
	if ($settings['title']) $title = $settings['title'];

?>
<div class="box2">
           
    <div class="spacer">

        <h3><span class="fl"><?php echo $title; ?></span> <a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/ico-misc.gif" alt="" class="fr" /></a></h3>
        
        <ul class="list2">
    
			<?php 
           
            $the_query = new WP_Query('category_name=' . get_option('woo_asides_category') . '&showposts=' . $number . '&orderby=post_date&order=desc');
            while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
        	?>
            
            <li>
				<?php the_content(); ?>
                <div class="fix"></div>
            </li>
        
        <?php endwhile; ?>
        
        </ul>
   
    </div><!--/spacer -->
        
</div><!--/box2 -->
<?php
}
register_sidebar_widget('Woo - Asides', 'asidesWidget');

function asidesWidgetAdmin() {

	$settings = get_option("widget_asideswidget");

	// check if anything's been sent
	if (isset($_POST['update_asides'])) {
		$settings['number'] = strip_tags(stripslashes($_POST['asides_number']));
		$settings['title'] = strip_tags(stripslashes($_POST['asides_title']));
		update_option("widget_asideswidget",$settings);
	}

	echo '<p>
			<label for="asides_number">Number of asidess (default = 5):
			<input id="asides_number" name="asides_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<p>
			<label for="asides_title">Title
			<input id="asides_title" name="asides_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<label>NOTE: Setup the asides category in the theme Options Panel';
	echo '<input type="hidden" id="update_asides" name="update_asides" value="1" /></label>';


}
register_widget_control('Woo - Asides', 'asidesWidgetAdmin', 200, 200);

// =============================== Flickr widget ======================================
function flickrWidget()
{
	$settings = get_option("widget_flickrwidget");

	$id = $settings['id'];
	$number = $settings['number'];

?>
<div class="box2">
    <div class="top"></div>
    <div class="spacer flickr">           
        <h3>Latest <span style="color:#0063DC">Flick</span><span style="color:#FF0084">r</span> photos</h3>
        <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>        
    </div><!--/spacer -->
    <div class="fix"></div>
    <div class="bot"></div>
</div>
<!--/box2 -->
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


// =============================== Ad 300x250 widget ======================================
function ad300Widget()
{
?>
<div class="box2">

    <div id="mpu_banner">

		<?php if (get_option('woo_ad_300_adsense') <> "") { echo stripslashes(get_option('woo_ad_300_adsense')); ?>
        
        <?php } else { ?>
        
        <a href="<?php echo get_option('woo_ad_300_url'); ?>"><img src="<?php echo get_option('woo_ad_300_image'); ?>" width="300" height="250" alt="advert" /></a>
            
        <?php } ?>	
                  
    </div>
    
</div>
<?php 
}
register_sidebar_widget('Woo - Ad 300x250', 'ad300Widget');

// =============================== Ad 125x125 widget ======================================
function adsWidget()
{
$settings = get_option("widget_adswidget");
$number = $settings['number'];
if ($number == 0) $number = 1;
$img_url = array();
$dest_url = array();

$numbers = range(1,$number); 
$counter = 0;

if (get_option('woo_ads_rotate') == "true") {
	shuffle($numbers);
}
?>
<div class="box2">
    <div class="ads"> 
<?php
	foreach ($numbers as $number) {	
		$counter++;
		$img_url[$counter] = get_option('woo_ad_image_'.$number);
		$dest_url[$counter] = get_option('woo_ad_url_'.$number);
	
?>
        <a href="<?php echo "$dest_url[$counter]"; ?>"><img src="<?php echo "$img_url[$counter]"; ?>" alt="Ad" /></a>
<?php } ?>
	</div>
	<!--/ads -->
    <div class="fix"></div>
</div>

<?php

}
register_sidebar_widget('Woo - Ads 125x125', 'adsWidget');

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
register_widget_control('Woo - Ads 125x125', 'adsWidgetAdmin', 200, 200);

// =============================== Video Player widget ======================================
function videoWidget()
{
	$number = 5;
	$title = "Latest Videos";
	$settings = get_option("widget_videowidget");
	if ($settings['number']) $number = $settings['number'];
	if ($settings['title']) $title = $settings['title'];
?>

<div class="box2">

    <h3><?php echo $title; ?></h3>
    
    <div class="video">
    
		<?php query_posts('showposts='.$number.'&category_name='.get_option('woo_video_category')); ?>
    
        <?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>	
        
            <div id="video-<?php the_ID(); ?>" class="latest">
				<?php echo woo_get_embed('embed','300','250'); ?> 
            </div>
            
		<?php endwhile; ?>
        <?php endif; ?>
    
    </div> <!-- / .video-->
    
	<?php query_posts('showposts='.$number.'&category_name='.get_option('woo_video_category')); ?>
    
    <?php if (have_posts()) : ?>
    
        <div class="vidtabs">
        
            <ul class="list2 idTabs">
            
                <?php while (have_posts()) : the_post(); ?>	
            
                    <li><a href="#video-<?php the_ID(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                
                <?php endwhile; ?>
            
            </ul>
            
        </div>
    
    <?php endif; ?>
    
</div> <!-- / .box2 -->


<?php 
}
register_sidebar_widget('Woo - Video Player', 'videoWidget');

function videoWidgetAdmin() {

	$settings = get_option("widget_videowidget");

	// check if anything's been sent
	if (isset($_POST['update_video'])) {
		$settings['number'] = strip_tags(stripslashes($_POST['video_number']));
		$settings['title'] = strip_tags(stripslashes($_POST['video_title']));
		update_option("widget_videowidget",$settings);
	}

	echo '<p>
			<label for="video_number">Number of videos (default = 5):
			<input id="video_number" name="video_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<p>
			<label for="video_title">Title
			<input id="video_title" name="video_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<label>NOTE: Setup the video category in the theme Options Panel';
	echo '<input type="hidden" id="update_video" name="update_video" value="1" /></label>';


}
register_widget_control('Woo - Video Player', 'videoWidgetAdmin', 200, 200);

// =============================== Twitter widget ======================================
function twitterWidget()
{
	$number = 5;
	$title = "Twitter";
	$settings = get_option("widget_twitterwidget");
	if ($settings['number']) $number = $settings['number'];
	if ($settings['title']) $title = $settings['title'];

?>
<div class="block widget widget_twitter"><h3 class="hl"><?php echo $title; ?></h3>
<ul id="twitter_update_list"><li></li></ul>		
</div><?php
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

?>