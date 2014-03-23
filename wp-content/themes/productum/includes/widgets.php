<?php

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
		echo '<h3 id="twitter">Twitter</h3>';              
		echo '<span class="website"><a href="http://www.twitter.com/'.$account.'/" title="Follow us on Twitter">Follow us on Twitter</a></span><ul id="twitter_update_list"><li></li></ul>
		      <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>';
		echo '<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'.$account.'.json?callback=twitterCallback2&amp;count='.$show.'"></script>';


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
	register_sidebar_widget(array('Woo Twitter', 'widgets'), 'widget_Twidget');

	// Register settings for use, 300x200 pixel form
	register_widget_control(array('Woo Twitter', 'widgets'), 'widget_Twidget_control', 300, 200);
}

// Run code and init
add_action('widgets_init', 'widget_Twidget_init');

// =============================== Flickr widget ======================================
function flickrWidget()
{
	$settings = get_option("widget_flickrwidget");

	$id = $settings['id'];
	$number = $settings['number'];

?>

<div class="widget flickr">
	<h3 id="photos">Flickr photos</h3>
		<div class="clearfix"></div>
		<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>        
		<div class="clearfix"></div>
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

// =============================== Recent Posts Widget ======================================

function SideRecent()
{

?>

	<div class="widget"><h3 id="news">Recent News</h3>
		<ul class="news">
			 <?php $featured = get_option('woo_blog_cat'); $feature = new WP_Query('category_name='.$featured.'&showposts=8'); while ($feature->have_posts()) : $feature->the_post(); $do_not_duplicate = $post->ID; $preview = get_post_meta($post->ID, 'preview', true); ?>
				<li>
                    <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                    <?php the_excerpt(); ?>
                </li>
			<?php endwhile; ?>
		</ul>
	</div>
	
<?php 	

}

// =============================== Feedburner Subscribe widget ======================================


function feedburnerWidget()
{
    $settings = get_option("widget_feedburnerwidget");

    $id = $settings['id'];
    $title = $settings['title'];
    $text = $settings['text'];    
    $google = $settings['google'];    

?> 

    <div class="widget subscribe">    
    
        <h3 id="subscribe"><?php echo $title; ?></h3>
        
        <form id="newsletter" class="search" action="<?php if ($google) { ?>http://feedburner.google.com/fb/a/mailverify<?php } else { ?>http://www.feedburner.com/fb/a/emailverify<?php } ?>" method="post" target="popupwindow" onsubmit="window.open('<?php if ($google) { ?>http://feedburner.google.com/fb/a/mailverify?uri=<?php } else { ?>http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php } ?><?php echo $id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
        
            <p class="fields">
                    <input class="field text" type="text" name="email" value="SIGN ME UP" onfocus="if (this.value == 'SIGN ME UP') {this.value = '';}" onblur="if (this.value == '') {this.value = 'SIGN ME UP';}" />
                    <input type="hidden" value="<?php echo $id; ?>" name="uri"/>
                    <input type="hidden" value="<?php bloginfo('name'); ?>" name="title"/>
                    <input type="hidden" name="loc" value="en_US"/>
                <button class="replace" type="submit">Sign</button>
            </p>
            
             
             
        </form> 
        <p><?php echo $text; ?></p>    
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
        $settings['google'] = strip_tags(stripslashes($_POST['subscribe_google']));        

        update_option("widget_feedburnerwidget",$settings);
    }
    
    
    $title =  $settings['title'];
    if(empty($title)){$title = 'Signup';}

    echo '<p>
            <label for="feedburner_title">Title:
            <input id="feedburner_title" name="feedburner_title" type="text" class="widefat" value="'. $title .'" /></label></p>'; 
            
    echo '<p>
            <label for="feedburner_id">Feedburner ID:
            <input id="feedburner_id" name="feedburner_id" type="text" class="widefat" value="'. $settings['id'] .'" /></label></p>'; 
            
    echo '<p>
            <label for="feedburner_text">Text Below Feedburner Input Box:
            <input id="feedburner_text" name="feedburner_text" type="text" class="widefat" value="'.$settings['text'].'" /></label></p>';

    if ( $settings['google'] ) {
    
        echo '<p>
                <label for="subscribe_google">Use Feedburner Google URL?:
                <input id="subscribe_google" name="subscribe_google" type="checkbox" checked="checked" /></label></p>';            

    } else {
    
        echo '<p>
                <label for="subscribe_google">Use Feedburner Google URL?:
                <input id="subscribe_google" name="subscribe_google" type="checkbox" /></label></p>';            
    
    }

    echo '<input type="hidden" id="update_feedburner" name="update_feedburner" value="1" />';


}



// =============================== Search widget ======================================

function searchWidget()
{
include(TEMPLATEPATH . '/searchform.php');
}

register_sidebar_widget('Woo - Search', 'SearchWidget');
register_sidebar_widget('Woo - Feedburner Subscription', 'feedburnerWidget');
register_widget_control('Woo - Feedburner Subscription', 'feedburnerWidgetAdmin', 400, 200);
register_sidebar_widget('Woo Sidebar Recent Content', 'SideRecent');
register_sidebar_widget('Woo Flickr Photos', 'FlickrBox');
register_sidebar_widget('Woo Email Subscription', 'email_subscription');

?>