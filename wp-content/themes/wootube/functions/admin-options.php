<?php

// THIS IS THE DIFFERENT FIELDS
$options[] = array(	"name" => "General Settings",
					"type" => "heading");
						
$options[] = array(	"name" => "Theme Stylesheet",
					"desc" => "Please select your colour scheme here.",
					"id" => $shortname."_alt_stylesheet",
					"std" => "",
					"type" => "select",
					"options" => $alt_stylesheets);

$options[] = array(	"name" => "Custom Logo",
					"desc" => "Paste the full URL of your custom logo image, should you wish to replace our default logo e.g. 'http://www.yoursite.com/logo.png'. ",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "text");					 							    

$options[] = array(	"name" => "Google Analytics",
					"desc" => "Please paste your Google Analytics (or other) tracking code here.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");		

$options[] = array(	"name" => "Feedburner RSS URL",
					"desc" => "Enter your Feedburner URL here.",
					"id" => $shortname."_feedburner_url",
					"std" => "",
					"type" => "text");	

$options[] = array(	"name" => "Feedburner RSS ID",
					"desc" => "Enter your Feedburner ID here.",
					"id" => $shortname."_feedburner_id",
					"std" => "",
					"type" => "text");		

$options[] = array(	"name" => "Layout Options",
					"type" => "heading");	

$options[] = array( "name" => "Sidebar Video Browser",
                    "desc" => "Number of posts to show in the slider on load.",
                    "id" => $shortname."_video_browser_init",
                    "std" => "5",
                    "type" => "text");    

$options[] = array(	"name" => "Show Embed Code",
					"desc" => "Show embed code below each post.",
					"id" => $shortname."_embed",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array( "name" => "Exclude pages/categories top nav",
                    "desc" => "Enter a comma-separated list of the <a href='http://support.wordpress.com/pages/8/'>ID's</a> that you'd like to exclude from the top navigation. (e.g. 1,2,3,4)",
                    "id" => $shortname."_nav_exclude",
                    "std" => "",
                    "type" => "text");    

$options[] = array(	"name" => "Top Category Menu",
					"desc" => "Show categories in the top menu instead of pages",
					"id" => $shortname."_cat_menu",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Twitter Username",
					"desc" => "Enter your Twitter username to show your latest tweet instead of the top 468x60 ad.",
					"id" => $shortname."_twitter",
					"std" => "",
					"type" => "text");		

$options[] = array(	"name" => "Homepage Options",
					"type" => "heading");	

$options[] = array(	"name" => "Activate Custom Homepage",
					"desc" => "This will activate the custom homepage which shows video posts in boxes instead of the latest video page.",
					"id" => $shortname."_home",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Show Latest post",
					"desc" => "This will show the latest video in full size. If not enabled the homepage will only show small boxes.",
					"id" => $shortname."_home_featured",
					"std" => "true",
					"type" => "checkbox");	

$options[] = array(	"name" => "Show Content in Latest Post",
					"desc" => "This will show the content below the latest post video.",
					"id" => $shortname."_home_content",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Use Dynamic Image Resizer",
					"desc" => "This will enable thumb.php dynamic image resizer for all the images you use in your boxes. ",
					"id" => $shortname."_resize",
					"std" => "false",
					"type" => "checkbox");	





$options[] = array(	"name" => "Banner Ad Top (468x60px)",
					"type" => "heading");

$options[] = array(	"name" => "Disable Ad",
					"desc" => "Disable the ad space",
					"id" => $shortname."_ad_top_disable",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Adsense code",
					"desc" => "Enter your adsense code here.",
					"id" => $shortname."_ad_top_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array(	"name" => "Banner Ad Top - Image Location",
					"desc" => "Enter the URL to the banner ad image location.",
					"id" => $shortname."_ad_top_image",
					"std" => "http://www.woothemes.com/ads/woothemes-468x60-2.gif",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad Top - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_top_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");						

$options[] = array(	"name" => "Banner Ad Content (468x60px)",
					"type" => "heading");

$options[] = array(	"name" => "Disable Ad",
					"desc" => "Disable the ad space",
					"id" => $shortname."_ad_content_disable",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Adsense code",
					"desc" => "Enter your adsense code here.",
					"id" => $shortname."_ad_content_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array(	"name" => "Banner Ad Content - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_content_image",
					"std" => "http://www.woothemes.com/ads/woothemes-468x60-2.gif",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad Content - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_content_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");						

$options[] = array(	"name" => "Banner Ad Sidebar - Widget (200x200px)",
					"type" => "heading");

$options[] = array(	"name" => "Adsense code",
					"desc" => "Enter your adsense code here.",
					"id" => $shortname."_ad_200_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array(	"name" => "Banner Ad Content - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_200_image",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad Content - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_200_url",
					"std" => "",
					"type" => "text");						

?>