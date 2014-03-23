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
					"desc" => "Paste the full URL of your custom logo image, should you wish to replace our default logo e.g. 'http://www.yoursite.com/logo-trans.png'. <br />NOTE: You need to name the logo 'logoname-trans.png' to make it transparent in IE6 .",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "text");	
					
$options[] = array(	"name" => "Sidebar on the left or right?",
					"desc" => "Check this box, if you'd like to display the sidebar on the right. If unchecked, the sidebar will default to the left.",
					"id" => $shortname."_right_sidebar",
					"std" => "true",
					"type" => "checkbox");				 							    

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

$options[] = array(	"name" => "Navigation Settings",
					"type" => "heading");	
					
$options[] = array(	"name" => "Display page navigation in footer.",
					"desc" => "Display page navigation in footer above the credit line.",
					"id" => $shortname."_nav_footer",
					"std" => "true",
					"type" => "checkbox");
					
$options[] = array(	"name" => "Archive page URL",
					"desc" => "Please enter the URL to a page dedicated to the archives",
					"id" => $shortname."_archives",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Layout Options",
					"type" => "heading");	

$options[] = array(	"name" => "Featured Posts",
					"desc" => "Select the number of featured posts you'd like to display. <br />NOTE: Set total number of posts to show on home page in WordPress admin under Settings -> Reading -> Blog posts to show at most.",
					"id" => $shortname."_featured_posts",
					"std" => "Select a number:",
					"type" => "select",
					"options" => $other_entries);					
					
$options[] = array(	"name" => "Box Colors",
					"desc" => "Enter your box colors in hex value here seperated by commas (e.g. #000000, #00CC00, #CCFF00).<br/>You can find hex values with <a href=\"http://www.colorpicker.com/\">this tool</a> ",
					"id" => $shortname."_box_colors",
					"std" => "",
					"type" => "text");						

$options[] = array(	"name" => "Personal Information",
						"type" => "heading");
						
$options[] = array(	"name" => "About You",
					"desc" => "Include a little bio for yourself here, that will be displayed on the blog view.",
					"id" => $shortname."_bio",
					"std" => "",
					"type" => "textarea");						
					
$options[] = array(	"name" => "About the blog page URL",
					"desc" => "Please enter the URL to a page where you want more info about you eg. http://www.yoursite.com/about/",
					"id" => $shortname."_about",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Twitter Username",
					"desc" => "Enter your Twitter username to show your latest tweet instead of the top 468x60 ad.",
					"id" => $shortname."_twitter",
					"std" => "",
					"type" => "text");	
					
$options[] = array(	"name" => "Featured Page Modules on Home Page",
						"type" => "heading");
						
$options[] = array(	"name" => "Home Page Box #1 - Page ID",
						"desc" => "Enter the ID of the page that you'd like to display in this info box.",
						"id" => $shortname."_more1_ID",
						"std" => "",
						"type" => "text");

$options[] = array(	"name" => "Home Page Box #1 - Link Text",
						"desc" => "Enter the text for the action link.",
						"id" => $shortname."_more1_link",
						"std" => "Click here for more info",
						"type" => "text");

$options[] = array(	"name" => "Home Page Box #1 - Link URL",
						"desc" => "Enter the destination URL for the action link.",
						"id" => $shortname."_more1_url",
						"std" => "",
						"type" => "text");												

$options[] = array(	"name" => "Home Page Box #2 - Page ID",
						"desc" => "Enter the ID of the page that you'd like to display in this info box.",
						"id" => $shortname."_more2_ID",
						"std" => "",
						"type" => "text");

$options[] = array(	"name" => "Home Page Box #2 - Link Text",
						"desc" => "Enter the text for the action link.",
						"id" => $shortname."_more2_link",
						"std" => "Click here for more info",
						"type" => "text");

$options[] = array(	"name" => "Home Page Box #2 - Link URL",
						"desc" => "Enter the destination URL for the action link.",
						"id" => $shortname."_more2_url",
						"std" => "",
						"type" => "text");		

$options[] = array(	"name" => "Image Resizer",
					"type" => "heading");

$options[] = array(	"name" => "Disable Image Resizer",
					"desc" => "Check this if you don't want to use the image resizer for your posts.",
					"id" => $shortname."_resize",
					"std" => "false",
					"type" => "checkbox");																

$options[] = array(	"name" => "Featured Image Width",
					"desc" => "<strong>Default: 278px</strong>. Enter an integer value i.e. 288 for the desired width which will be used when dynamically creating the images.",
					"id" => $shortname."_image_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Featured Image Height",
					"desc" => "<strong>Default: 150px</strong>. Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images.",
					"id" => $shortname."_image_height",
					"std" => "",
					"type" => "text");
					
$options[] = array(	"name" => "Disable Single Post",
					"desc" => "Check this if you don't want to display the thumbnail on the single posts.",
					"id" => $shortname."_image_single",
					"std" => "false",
					"type" => "checkbox");																

$options[] = array(	"name" => "Single Width",
					"desc" => "<strong>Default: 610px</strong>. Enter an integer value i.e. 600 for the desired height which will be used when dynamically creating the images. ",
					"id" => $shortname."_single_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Single Height",
					"desc" => "<strong>Default: 200px</strong>. Enter an integer value i.e. 200 for the desired height which will be used when dynamically creating the images. ",
					"id" => $shortname."_single_height",
					"std" => "",
					"type" => "text");																				    								

$options[] = array(	"name" => "Banner Ads Sidebar - Widget (200X125)",
					"type" => "heading");

$options[] = array(	"name" => "Rotate banners?",
					"desc" => "Check this to randomly rotate the banner ads.",
					"id" => $shortname."_ads_rotate",
					"std" => "true",
					"type" => "checkbox");	

$options[] = array(	"name" => "Banner Ad #1 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_1",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-1.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #1 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_1",
					"std" => "http://www.woothemes.com",
					"type" => "text");						

$options[] = array(	"name" => "Banner Ad #2 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_2",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-2.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #2 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_2",
					"std" => "http://www.woothemes.com",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad #3 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_3",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-3.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #3 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_3",
					"std" => "http://www.woothemes.com",
					"type" => "text");

?>