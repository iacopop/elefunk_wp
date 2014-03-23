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

$options[] = array(	"name" => "Centered layout",
					"desc" => "Check this to set the layout to centered instead of left align.",
					"id" => $shortname."_centered",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Use suckerfish dropdowns",
					"desc" => "Check this to use suckerfish dropdowns for your category navigation instead of the normal two level nav.",
					"id" => $shortname."_suckerfish",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Custom Logo",
					"desc" => "Paste the full URL of your custom logo image, should you wish to replace our default logo.",
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

$options[] = array(	"name" => "Home Layout",
					"type" => "heading");					

$options[] = array( "name" => "Featured Category",
					"desc" => "Select the category that you would like to have displayed in the featured section on your homepage.",
					"id" => $shortname."_featured_category",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $woo_categories);

$options[] = array(	"name" => "Popular Posts",
					"desc" => "Select the number of popular posts you'd like to display in the middle column. Popular posts are the most commented posts in your blog. Set to 0 to disable and make left column span both columns",
					"id" => $shortname."_popular_posts",
					"std" => "Select a number:",
					"type" => "select",
					"options" => $other_entries);					

$options[] = array(	"name" => "Display Content or The Excerpt (Homepage Only)",
					"type" => "heading");

$options[] = array(	"name" => "Featured Section",
					"desc" => "If checked, this section will display the full post content. If unchecked it will display the excerpt only.",
					"id" => $shortname."_content_feat",
					"std" => "true",
					"type" => "checkbox");	

$options[] = array(	"name" => "Normal posts",
					"desc" => "If checked, this section will display the full post content. If unchecked it will display the excerpt only.",
					"id" => $shortname."_content_left",
					"std" => "false",
					"type" => "checkbox");											

$options[] = array(	"name" => "Image Resizer",
					"type" => "heading");

$options[] = array(	"name" => "Featured Image Width",
					"desc" => "Enter an integer value i.e. 250 for the desired width which will be used when dynamically creating the images. If left blank, it will revert to 350px.",
					"id" => $shortname."_image_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Featured Image Height",
					"desc" => "Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images. If left blank, it will revert to 190px.",
					"id" => $shortname."_image_height",
					"std" => "",
					"type" => "text");																			    								

$options[] = array(	"name" => "Thumbnail Width",
					"desc" => "Enter an integer value i.e. 150 for the desired width which will be used when dynamically creating the images. If left blank, it will revert to 100px.",
					"id" => $shortname."_thumb_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Thumbnail Height",
					"desc" => "Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images. If left blank, it will revert to 100px.",
					"id" => $shortname."_thumb_height",
					"std" => "",
					"type" => "text");																			    								

$options[] = array(	"name" => "Disable Single Post",
					"desc" => "Check this if you don't want to display the thumbnail on the single posts.",
					"id" => $shortname."_image_disable",
					"std" => "false",
					"type" => "checkbox");																

$options[] = array(	"name" => "Single Width",
					"desc" => "Enter an integer value i.e. 150 for the desired width which will be used when dynamically creating the images. If left blank, it will revert to 200px.",
					"id" => $shortname."_single_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Single Height",
					"desc" => "Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images. If left blank, it will revert to 120px.",
					"id" => $shortname."_single_height",
					"std" => "",
					"type" => "text");																			    								

$options[] = array(	"name" => "Banner Ad Management (300x250)",
					"type" => "heading");

$options[] = array(	"name" => "Banner Ad - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_block_image",
					"std" => "http://www.woothemes.com/ads/woothemes-300x250-2.gif",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_block_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");						

$options[] = array(	"name" => "Banner Ad Management (125x125)",
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

$options[] = array(	"name" => "Banner Ad #5 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_5",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-4.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #5 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_5",
					"std" => "http://www.woothemes.com",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad #6 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_6",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-4.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #6 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_6",
					"std" => "http://www.woothemes.com",
					"type" => "text");
?>