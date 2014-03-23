<?php 

// =============================== Widget Functions ======================================

// Input Option: Listing Link Categories
function DisplayCats($name,$select)
{
	$linkcats = array();
	$linkcats = get_categories('type=post');
	
	echo '<p><label for="' . $name .  '_category">Link Category:
					<select name="' . $name .  '_category" class="widefat" style="width: 94% !important;">';
	
	foreach ( $linkcats as $singlecat ) {
		
		if ( $select == $singlecat->cat_name ) { echo '<option value="' . $singlecat->cat_name . '" selected="selected">' . $singlecat->cat_name . '</option>'; }
			else { echo '<option value="' . $singlecat->cat_name . '">' . $singlecat->cat_name . '</option>'; }
		
	}
	
	echo '</select></label></p>';

}

// =============================== News from the blog widget ======================================
function newsWidget()
{
	$settings = get_option("widget_newswidget");

	$number = $settings['number'];
	$category = $settings['category'];	

?>

			<div id="news" class="box">
			
				<h2>News from the blog<a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" title="Subscribe to our RSS feed"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/rss.jpg" alt="RSS" /></a></h2>
				
				<ul>

					<?php
					 	global $post;
					 	$posts = get_posts('numberposts=' . $number . '&category=' . $category);
						 foreach($posts as $post) : the_post();
					?>

					<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><span class="meta">Posted by <?php the_author_posts_link(); ?> on <?php the_time('d F Y'); ?></span></li>
					
					<?php endforeach; ?>

				</ul>
			
			</div><!-- /news -->

<?php
}

function newsWidgetAdmin() {

	$settings = get_option("widget_newswidget");

	// check if anything's been sent
	if (isset($_POST['update_news'])) {
		$settings['number'] = strip_tags(stripslashes($_POST['news_number']));
		$settings['category'] = strip_tags(stripslashes($_POST['news_category']));		

		update_option("widget_newswidget",$settings);
	}

	DisplayCats('news',$settings['category']);
			
	echo '<p>
			<label for="news_number">Number of posts:
			<input id="news_number" name="news_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_news" name="update_news" value="1" />';

}

register_sidebar_widget('Woo - News from the blog', 'newsWidget');
register_widget_control('Woo - News from the blog', 'newsWidgetAdmin', 400, 200);

// =============================== Search widget ======================================
function searchWidget()
{

?>

			<div id="search">
			
				<h2>Search</h2>
				
				<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/" class="search-form">
					<input type="text" value="Enter search keyword" name="s" id="s" class="field" onfocus="if (this.value == 'Enter search keyword') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter search keyword';}" />
					<input class="submitsearch button" type="submit" name="submit" value="submit" />
				</form>				
				
			</div><!-- /search -->	

<?php
}
register_sidebar_widget('Woo - Search', 'searchWidget');

// =============================== Feedburner Subscribe widget ======================================
function feedburnerWidget()
{
	$settings = get_option("widget_feedburnerwidget");

	$id = $settings['id'];
	$title = $settings['title'];

?>

			<div id="feedburner">
			
				<h2><?php echo $title; ?></h2>
			
				<form name="feedburnerform" id="feedburnerform" action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow" onsubmit="window.open('http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php echo $id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
					
					<input class="field" type="text" name="email" value="Enter your e-mail address" onfocus="if (this.value == 'Enter your e-mail address') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter your e-mail address';}" />
					<input type="hidden" value="http://feeds.feedburner.com/~e?ffid=<?php echo $id; ?>" name="url"/>
					<input type="hidden" value="<?php bloginfo('name'); ?>" name="title"/>
					<input type="hidden" name="loc" value="en_US"/>
					
					<input class="button" type="submit" name="submit" value="submit" />
					
				</form>
				
			</div><!-- /feedburner -->	

<?php
}

function feedburnerWidgetAdmin() {

	$settings = get_option("widget_feedburnerwidget");

	// check if anything's been sent
	if (isset($_POST['update_feedburner'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['feedburner_id']));
		$settings['title'] = strip_tags(stripslashes($_POST['feedburner_title']));

		update_option("widget_feedburnerwidget",$settings);
	}

	echo '<p>
			<label for="feedburner_title">Title:
			<input id="feedburner_title" name="feedburner_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
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

?>

			<div id="campaignmonitor">
			
				<h2><?php echo $title; ?></h2>
			
				<form name="campaignmonitorform" id="campaignmonitorform" action="<?php echo $action; ?>" method="post">
					
					<input type="text" name="cm-<?php echo $id; ?>" id="<?php echo $id; ?>" class="field" value="Enter your e-mail address" onfocus="if (this.value == 'Enter your e-mail address') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter your e-mail address';}" />
					
					<input class="button" type="submit" name="submit" value="submit" />
					
				</form>
				
			</div><!-- /campaignmonitor -->	

<?php
}

function campaignmonitorWidgetAdmin() {

	$settings = get_option("widget_campaignmonitorwidget");

	// check if anything's been sent
	if (isset($_POST['update_campaignmonitor'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['campaignmonitor_id']));
		$settings['action'] = strip_tags(stripslashes($_POST['campaignmonitor_action']));
		$settings['title'] = strip_tags(stripslashes($_POST['campaignmonitor_title']));

		update_option("widget_campaignmonitorwidget",$settings);
	}

	echo '<p>
			<label for="campaignmonitor_title">Title:
			<input id="campaignmonitor_title" name="campaignmonitor_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
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

// =============================== Flickr widget ======================================
function flickrWidget()
{
	$settings = get_option("widget_flickrwidget");

	$id = $settings['id'];
	$number = $settings['number'];

?>

			<div id="flickr">
				
				<h3>Our Photos</h3>
				
				<div class="pics">	
					<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>        
				</div><!-- /pics -->
			
			</div><!-- /flickr -->

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

// =============================== Twitter widget ======================================
function widget_Twidget_init() {

	if ( !function_exists('register_sidebar_widget') )
		return;

	function widget_Twidget($args) {

		// "$args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys." - These are set up by the theme
		extract($args);

		// These are our own options
		$options = get_option('widget_Twidget');
		$account = $options['account'];  // Your Twitter account name
		$title = $options['title'];  // Title in sidebar for widget
		$show = $options['show'];  // # of Updates to show

        // Output
		echo $before_widget ;

		// start
		echo '<div id="twitter">';
		echo '<h3>Twitter</h3>';              
		echo '<ul id="twitter_update_list"><li></li></ul>
		      <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>';
		echo '<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'.$account.'.json?callback=twitterCallback2&amp;count='.$show.'"></script>';
		echo '<span class="website"><a href="http://www.twitter.com/'.$account.'/" title="Follow us on Twitter">Follow us on Twitter</a></span></div>';


		// echo widget closing tag
		echo $after_widget;
	}

	// Settings form
	function widget_Twidget_control() {

		// Get options
		$options = get_option('widget_Twidget');
		// options exist? if not set defaults
		if ( !is_array($options) )
			$options = array('account'=>'woothemes', 'title'=>'Twitter Updates', 'show'=>'3');

        // form posted?
		if ( $_POST['Twitter-submit'] ) {

			// Remember to sanitize and format use input appropriately.
			$options['account'] = strip_tags(stripslashes($_POST['Twitter-account']));
			$options['title'] = strip_tags(stripslashes($_POST['Twitter-title']));
			$options['show'] = strip_tags(stripslashes($_POST['Twitter-show']));
			update_option('widget_Twidget', $options);
		}

		// Get options for form fields to show
		$account = htmlspecialchars($options['account'], ENT_QUOTES);
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$show = htmlspecialchars($options['show'], ENT_QUOTES);

		// The form fields
		echo '<p style="text-align:right;">
				<label for="Twitter-account">' . __('Account:') . '
				<input style="width: 200px;" id="Twitter-account" name="Twitter-account" type="text" value="'.$account.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="Twitter-title">' . __('Title:') . '
				<input style="width: 200px;" id="Twitter-title" name="Twitter-title" type="text" value="'.$title.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="Twitter-show">' . __('Show:') . '
				<input style="width: 200px;" id="Twitter-show" name="Twitter-show" type="text" value="'.$show.'" />
				</label></p>';
		echo '<input type="hidden" id="Twitter-submit" name="Twitter-submit" value="1" />';
	}


	// Register widget for use
	register_sidebar_widget(array('Woo - Twitter', 'widgets'), 'widget_Twidget');

	// Register settings for use, 300x200 pixel form
	register_widget_control(array('Woo - Twitter', 'widgets'), 'widget_Twidget_control', 300, 200);
}

// Run code and init
add_action('widgets_init', 'widget_Twidget_init');


?>