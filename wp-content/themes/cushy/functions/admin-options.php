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

	$options[] = array(	"name" => "Navigation Settings",
					"type" => "heading");

	$options[] = array(	"name" => "Exclude pages from top navigation",
					"desc" => "Enter a comma-separated list of the <a href='http://support.wordpress.com/pages/8/'>Page ID's</a> that you'd like to exclude from the main navigation. (e.g. 1,2,3,4).",
					"id" => $shortname."_pages_ex",
					"std" => "",
					"type" => "text");			

	$options[] = array(	"name" => "Use Breadcrumbs?",
					"desc" => "Check this box if you'd like to enable the use of breadcrumbs.",
					"id" => $shortname."_breadcrumbs",
					"std" => "false",
					"type" => "checkbox");															

	$options[] = array(	"name" => "Blog Setup",
					"type" => "heading");					
						
	$options[] = array(	"name" => "Blog Category",
					"desc" => "Posts in this category will be shown as \"Recent News\" on the homepage.",
					"id" => $shortname."_blog_cat",
					"std" => "",
					"type" => "select",
					"options" => $woo_categories );

	$options[] = array(	"name" => "Blog Permalink",
					"desc" => "Please enter the permalink to your blog parent category (i.e. <home url ignored>/category/blog/).",
					"id" => $shortname."_blog_permalink",
					"std" => "",
					"type" => "text");					

	$options[] = array(	"name" => "Custom Homepage Settings",
					"type" => "heading");					
					
	$options[] = array(	"name" => "Featured Page",
					"desc" => "The information in this page will be loaded into the homepage and displayed at the top.",
					"id" => $shortname."_features_page",
					"std" => "",
					"type" => "select",
					"options" => $woo_pages );	
	
	$options[] = array(	"name" => "Featured Pages Tabber",
					"desc" => "Enter a comma-separated list of the <a href='http://support.wordpress.com/pages/8/'>Page ID's</a> that you'd like to include in the featured tabber on the custom homepage. (e.g. 1,2,3,4).",
					"id" => $shortname."_featured_tabs",
					"std" => "",
					"type" => "text");
					
$options[] = array(	"name" => "Banner Ads Sidebar - Widget (125x125)",
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

$options[] = array(	"name" => "Banner Ad #4 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_4",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-4.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #4 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_4",
					"std" => "http://www.woothemes.com",
					"type" => "text");

?>