<?php

// THIS IS THE DIFFERENT FIELDS

$options[] = array(	"name" => "General Settings",
						"type" => "heading");

$options[] = array(	"name" => "Theme Stylesheet",
						"desc" => "Please select your colour scheme here.",
					    "id" => $shortname."_alt_stylesheet",
					    "std" => "Select a Style:",
					    "type" => "select",
					    "options" => $alt_stylesheets);

$options[] = array(	"name" => "Use Gravatars?",
						"desc" => "Check this box if you wish to use <a href='http://www.gravatar.com'>Gravatars</a> for Author & Commenter profiles.",
						"id" => $shortname."_gravatar",
						"std" => "false",
						"type" => "checkbox");

$options[] = array(	"name" => "Exclude Pages from Top Navigation",
					"desc" => "Enter a comma-separated list of the <a href='http://support.wordpress.com/pages/8/'>Page ID's</a> that you'd like to exclude from the top page navigation. (e.g. 1,2,3,4)",
					"id" => $shortname."_pages_ex",
					"std" => "",
					"type" => "text");							
						
$options[] = array(	"name" => "Custom Logo",
						"desc" => "Paste the full URL of your custom logo image, should you wish to replace the title.",
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

$options[] = array(	"name" => "Front Page Layout",
						"type" => "heading");			

$options[] = array(	"name" => "Featured Pages",
						"desc" => "Enter a comma-separated list of the page ID's that you'd like to display in the featured slider.",
						"id" => $shortname."_featpages",
						"std" => "",
						"type" => "text");

$options[] = array(	"name" => "Featured Steps Format",
						"desc" => "Select the format you'd like to use for the featured steps.",
					    "id" => $shortname."_steps",
					    "std" => "Select Format:",
					    "type" => "select",
					    "options" => $steps);													
						
$options[] = array(	"name" => "Front Page Layout",
						"desc" => "Choose the layout of to be used for the other entries on your homepage.",
			    		"id" => $shortname."_layout",
			    		"std" => "Select a Layout:",
			    		"type" => "select",
			    		"options" => $layouts);		    		

$options[] = array(	"name" => "Extended Footer",
						"type" => "heading");
						
$options[] = array(	"name" => "About Section",
						"desc" => "Enter the ID of the page in this section.",
						"id" => $shortname."_about",
						"std" => "",
						"type" => "text");

$options[] = array(	"name" => "Contact Section",
						"desc" => "Enter the ID of the page in this section.",
						"id" => $shortname."_contact",
						"std" => "",
						"type" => "text");						

$options[] = array(	"name" => "Blog Settings",
						"type" => "heading");																												

$options[] = array(	"name" => "Add Blog Link to Main Navigation?",
						"desc" => "If checked, this option will add a blog link to your main navigation next to the Home link.",
						"id" => $shortname."_blog",
						"std" => "false",
						"type" => "checkbox");																									
$options[] = array( 	"name" => "Blog Permalink",
					   	"desc" => "Please enter the permalink to your blog parent category (i.e. <home url ignored>/category/blog/).",
						"id" => $shortname."_blogcat",
						"std" => "",
						"type" => "text");

$options[] = array(	"name" => "Show sidebar tabber on blog pages?",
						"desc" => "Check this box if you wish to show the sidebar tabber on the blog pages.",
						"id" => $shortname."_tabber",
						"std" => "false",
						"type" => "checkbox");															

$options[] = array(	"name" => "Banner Ad Management (336x280 MPU)",
						"type" => "heading");

$options[] = array(	"name" => "Display 336x280 MPU",
						"desc" => "Check this box if you wish to display the 336x280 MPU in the sidebar.",
						"id" => $shortname."_show_mpu",
						"std" => "false",
						"type" => "checkbox");

$options[] = array(	"name" => "336x280 Block Ad - Image Location",
						"desc" => "Enter the URL for this block ad.",
						"id" => $shortname."_block_image",
						"std" => $template_path . "/images/ad336.jpg",
						"type" => "text");
						
$options[] = array(	"name" => "336x280 Block Ad - Destination",
						"desc" => "Enter the URL where this block ad points to.",
			    		"id" => $shortname."_block_url",
						"std" => "http://www.woothemes.com",
			    		"type" => "text");
						
$options[] = array(	"name" => "Banner Ad Management (468x60 Banner)",
						"type" => "heading");

$options[] = array(	"name" => "Display 468x60 Banner",
						"desc" => "Check this box if you wish to enable the 468x60 ad below first post in blog.",
						"id" => $shortname."_show_ad",
						"std" => "false",
						"type" => "checkbox");

$options[] = array(	"name" => "468x60 Ad - Image Location",
						"desc" => "Enter the URL for this block ad.",
						"id" => $shortname."_ad_below_image",
						"std" => $template_path . "/images/ad468.jpg",
						"type" => "text");
						
$options[] = array(	"name" => "468x60 Ad - Destination",
						"desc" => "Enter the URL where this block ad points to.",
			    		"id" => $shortname."_ad_below_url",
						"std" => "http://www.woothemes.com",
			    		"type" => "text");

?>