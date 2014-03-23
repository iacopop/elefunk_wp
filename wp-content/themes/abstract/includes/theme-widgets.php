<?php

// =============================== Flickr widget ======================================
function flickrWidget()
{
	$settings = get_option("widget_flickrwidget");

	$id = $settings['id'];
	$number = $settings['number'];

?>

			<div class="block">
				<h2>Photos</h2>
				<p>View some of the photos that we're sharing on Flickr.</p>
				<div class="photos wrap">
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


// =============================== Ad 180x150 widget ======================================
function adsWidget()
{
$settings = get_option("widget_adswidget");
$number = $settings['number'];
if ($number == 0) $number = 2;
$img_url = array();
$dest_url = array();

$numbers = range(1,$number); 
$counter = 0;

if ( get_option('woo_ads_rotate') == 'true' ) {
	shuffle($numbers);
}
?>
<div id="advert_180x150" class="block">
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
<?php

}
register_sidebar_widget('Woo - Ads 180x150', 'adsWidget');

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
register_widget_control('Woo - Ads 180x150', 'adsWidgetAdmin', 200, 200);


// =============================== Tag Cloud widget ======================================
function tagcloudWidget()
{
?>

			<div id="tag_cloud" class="block">
				<h2>Tagcloud</h2>
				<?php wp_tag_cloud('smallest=13&largest=29&unit=px'); ?>
			</div>
			
<?php
}
register_sidebar_widget('Woo - Tag Cloud', 'tagcloudWidget');


// =============================== Contact Details widget ======================================
function contactWidget()
{
	$settings = get_option("widget_contactwidget");

	$phone = $settings['phone'];
	$mail = $settings['mail'];
	$physical = $settings['physical'];	
?>

	<!-- Contact Starts -->
	<div class="contact block">
		<h2>Contact</h2>
		
		<table>
			<tr>
			<td class="left">phone</td>
			<td><?php echo $phone; ?></td>
			</tr>
			<tr>
			<td class="left">mail</td>
			<td><?php echo $mail; ?></td>
			</tr>
			<tr>
			<td class="left">address</td>
			<td><?php echo $physical; ?></td>
			</tr>
		</table>

	</div>
	<!-- Contact Ends -->

<?php 
}
register_sidebar_widget('Woo - Contact Details', 'contactWidget');

function contactWidgetAdmin() {

	$settings = get_option("widget_contactwidget");

	// check if anything's been sent
	if (isset($_POST['update_contact'])) {
		$settings['phone'] = strip_tags(stripslashes($_POST['contact_phone']));
		$settings['mail'] = strip_tags(stripslashes($_POST['contact_mail']));
		$settings['physical'] = strip_tags(stripslashes($_POST['contact_physical']));		

		update_option("widget_contactwidget",$settings);
	}

	echo '<p>
			<label for="contact_phone">Phone Number:
			<input id="contact_phone" name="contact_phone" type="text" class="widefat" value="'.$settings['phone'].'" /></label></p>';
	echo '<p>
			<label for="contact_mail">E-mail Address:
			<input id="contact_mail" name="contact_mail" type="text" class="widefat" value="'.$settings['mail'].'" /></label></p>';
	echo '<p>
			<label for="contact_physical">Physical Address:
			<input id="contact_physical" name="contact_physical" type="text" class="widefat" value="'.$settings['physical'].'" /></label></p>';		
	echo '<input type="hidden" id="update_contact" name="update_contact" value="1" />';							


}
register_widget_control('Woo - Contact Details', 'contactWidgetAdmin', 200, 200);


// =============================== Stay Updated widget ======================================
function stayupdatedWidget()
{
?>

			<div class="subscribe block">
				<h2>Stay updated</h2>
				
				<ul>
					<li><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" title="Subscribe to the RSS for all articles">All Articles</a></li>

					<?php

							function get_inc_categories($label) {
	
								$include = ''; $counter = 0; $cats = get_categories('hide_empty=0');
	
								foreach ($cats as $cat) {
		
									$counter++;
		
									if ( get_option( $label.$cat->cat_ID )  == 'true' ) {
										if ( $counter <> 1 ) { $include .= ','; }
										$include .= $cat->cat_ID;
										}
	
									}
	
									return $include;

						}					
						
						$getcats = get_categories('hierarchical=0&hide_empty=0&include=' . get_inc_categories("woo_cat_nav_"));
						
						$count = 1;
						foreach($getcats as $thecat) {
							echo '<li'.($count == count($getcats) ? ' class="blank"' : '').'><a href="'.get_category_link($thecat->term_id).'/feed/" title="Subscribe to the RSS for '.$thecat->name.'">' . $thecat->name . '</a></li>';
						$count++;
						}
					?>
				
				</ul>

			</div>
			
<?php
}
register_sidebar_widget('Woo - Stay Updated', 'stayupdatedWidget');

// =============================== Feedburner Subscribe widget ======================================
function feedburnerWidget()
{
	$settings = get_option("widget_feedburnerwidget");

	$id = $settings['id'];
	$title = $settings['title'];
	$text = $settings['text'];	

?>

	<div class="subscribe">	
		<h2><?php echo $title; ?></h2>
		<p><?php echo $text; ?></p>
		<form action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow" onsubmit="window.open('http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php echo $text; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
			<div>
				<input type="text" name="email" class="field" />
				<input type="hidden" value="http://feeds.feedburner.com/~e?ffid=<?php echo $id; ?>" name="url"/>
				<input type="hidden" value="<?php bloginfo('name'); ?>" name="title"/>
				<input type="hidden" name="loc" value="en_US"/>
				<input type="image" src="<?php bloginfo('template_directory'); ?>/<?php woo_style_path(); ?>/img_submit.gif" class="submit" />
			</div>
		</form>
	</div>

<?php
}

function feedburnerWidgetAdmin() {

	$settings = get_option("widget_feedburnerwidget");

	// check if anything's been sent
	if (isset($_POST['update_feedburner'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['feedburner_id']));
		$settings['title'] = strip_tags(stripslashes($_POST['feedburner_title']));
		$settings['text'] = strip_tags(stripslashes($_POST['feedburner_text']));		

		update_option("widget_feedburnerwidget",$settings);
	}

	echo '<p>
			<label for="feedburner_title">Title:
			<input id="feedburner_title" name="feedburner_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<p>
			<label for="feedburner_text">Text Below Title:
			<input id="feedburner_text" name="feedburner_text" type="text" class="widefat" value="'.$settings['text'].'" /></label></p>';
	echo '<p>
			<label for="feedburner_id">Your Feedburner ID:
			<input id="feedburner_id" name="feedburner_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>';			
	echo '<input type="hidden" id="update_feedburner" name="update_feedburner" value="1" />';

}

register_sidebar_widget('Woo - Feedburner Subscription', 'feedburnerWidget');
register_widget_control('Woo - Feedburner Subscription', 'feedburnerWidgetAdmin', 400, 200);


// =============================== CampaignMonitor Subscribe widget ======================================
function campaignmonitorWidget()
{
	$settings = get_option("widget_campaignmonitorwidget");

	$action = $settings['action'];
	$id = $settings['id'];
	$title = $settings['title'];
	$text = $settings['text'];	

?>

	<div class="subscribe">	
		<h2><?php echo $title; ?></h2>
		<p><?php echo $text; ?></p>
		<form action="<?php echo $action; ?>" method="post">
			<div>
				<input type="text" name="cm-<?php echo $id; ?>" id="<?php echo $id; ?>" class="field" />

				<input type="image" src="<?php bloginfo('template_directory'); ?>/<?php woo_style_path(); ?>/img_submit.gif" class="submit" value="Subscribe" />
			</div>
		</form>
	</div>

<?php
}

function campaignmonitorWidgetAdmin() {

	$settings = get_option("widget_campaignmonitorwidget");

	// check if anything's been sent
	if (isset($_POST['update_campaignmonitor'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['campaignmonitor_id']));
		$settings['action'] = strip_tags(stripslashes($_POST['campaignmonitor_action']));
		$settings['title'] = strip_tags(stripslashes($_POST['campaignmonitor_title']));
		$settings['text'] = strip_tags(stripslashes($_POST['campaignmonitor_text']));		

		update_option("widget_campaignmonitorwidget",$settings);
	}

	echo '<p>
			<label for="campaignmonitor_title">Title:
			<input id="campaignmonitor_title" name="campaignmonitor_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<p>
			<label for="campaignmonitor_text">Text Below Title:
			<input id="campaignmonitor_text" name="campaignmonitor_text" type="text" class="widefat" value="'.$settings['text'].'" /></label></p>';
	echo '<p>
			<label for="campaignmonitor_action">Your Campaign Monitor Form Action:
			<input id="campaignmonitor_action" name="campaignmonitor_action" type="text" class="widefat" value="'.$settings['action'].'" /></label></p>';			
	echo '<p>
			<label for="campaignmonitor_id">Your Campaign Monitor ID:
			<input id="campaignmonitor_id" name="campaignmonitor_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>';						
	echo '<input type="hidden" id="update_campaignmonitor" name="update_campaignmonitor" value="1" />';

}

register_sidebar_widget('Woo - Campaign Monitor Subscription', 'campaignmonitorWidget');
register_widget_control('Woo - Campaign Monitor Subscription', 'campaignmonitorWidgetAdmin', 400, 200);


// =============================== Featured widget ======================================
function featuredWidget()
{
	$settings = get_option("widget_featured");

	$title = $settings['title'];
	$tag = $settings['tag'];
	$number = $settings['number'];

?>

<div class="featured block">
    <h2><?php echo $title; ?></h2>

	<?php query_posts('tag=' . $tag . '&showposts=' . $number); ?>
        
    <?php if (have_posts()) : ?>

    <ul>

	    <?php while (have_posts()) : the_post(); $preview = get_post_meta($post->ID, 'preview', true); ?>				

        <li>
        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
        <span>by <?php the_author(); ?> on <?php the_time('M. j, Y'); ?></span>
        </li>

        <?php endwhile; ?>

    </ul>

    <?php endif; ?>							

</div>

<?php
}

function featuredWidgetAdmin() {

	$settings = get_option("widget_featured");

	// check if anything's been sent
	if (isset($_POST['update_featured'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['featured_title']));
		$settings['tag'] = strip_tags(stripslashes($_POST['featured_tag']));
		$settings['number'] = strip_tags(stripslashes($_POST['featured_number']));

		update_option("widget_featured",$settings);
	}

	echo '<p>
			<label for="featured_title">Title:
			<input id="featured_title" name="featured_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';			
	echo '<p>
			<label for="featured_tag">Tag:
			<input id="featured_tag" name="featured_tag" type="text" class="widefat" value="'.$settings['tag'].'" /></label></p>';			
	echo '<p>
			<label for="featured_number">Number of posts:
			<input id="featured_number" name="featured_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';						
	echo '<input type="hidden" id="update_featured" name="update_featured" value="1" />';

}

register_sidebar_widget('Woo - Featured', 'featuredWidget');
register_widget_control('Woo - Featured', 'featuredWidgetAdmin', 400, 200);


?>