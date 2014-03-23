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
					"desc" => "Paste the full URL of your custom logo image, should you wish to replace our default logo e.g. 'http://www.yoursite.com/logo-trans.png'.",
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
					
$options[] = array(	"name" => "Layout Settings",
					"type" => "heading");
					
$options[] = array(	"name" => "Categories Top Menu",
					"desc" => "Show categories in the menu instead of pages.",
					"id" => $shortname."_cat_nav",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => "Exclude pages/categories top nav",
                    "desc" => "Enter a comma-separated list of the <a href='http://support.wordpress.com/pages/8/'>ID's</a> that you'd like to exclude from the top navigation. (e.g. 1,2,3,4)",
                    "id" => $shortname."_nav_exclude",
                    "std" => "",
                    "type" => "text");  
					
$options[] = array(	"name" => "Use Dynamic Image Resizer",
					"desc" => "This will enable thumb.php dynamic image resizer. ",
					"id" => $shortname."_resize",
					"std" => "false",
					"type" => "checkbox");
										
$options[] = array(	"name" => "Custom Home Page Options",
						"type" => "heading");
						
$options[] = array(	"name" => "Home Page Content - Page ID",
						"desc" => "Enter the ID of the page that you'd like to display on the home page.",
						"id" => $shortname."_more1_ID",
						"std" => "",
						"type" => "text");
	
$options[] = array(	"name" => "About Title",
					"desc" => "Include a short title for your about module on the home page.",
					"id" => $shortname."_about_header",
					"std" => "",
					"type" => "text");
					
$options[] = array(	"name" => "About Text",
					"desc" => "Include a short paragraph of text describing your product/service/company.",
					"id" => $shortname."_about_text",
					"std" => "",
					"type" => "textarea");	
					
$options[] = array(	"name" => "Button 1 text",
					"desc" => "Please enter the text you want to appear on the first button. Leave empty to remove.",
					"id" => $shortname."_about_button_1",
					"std" => "",
					"type" => "text");
					
$options[] = array(	"name" => "Button 1 URL",
					"desc" => "Please enter the URL of the page you want linked to button 1",
					"id" => $shortname."_button_link_1",
					"std" => "",
					"type" => "text");
					
$options[] = array(	"name" => "Button 2 text",
					"desc" => "Please enter the text you want to appear on the second button. Leave empty to remove.",
					"id" => $shortname."_about_button_2",
					"std" => "",
					"type" => "text");	
					
$options[] = array(	"name" => "Button 2 URL",
					"desc" => "Please enter the URL of the page you want linked to button 2",
					"id" => $shortname."_button_link_2",
					"std" => "",
					"type" => "text");	
										
$options[] = array(	"name" => "Carousel Options",
					"type" => "heading");	

$options[] = array(	"name" => "Display Carousel?",
					"desc" => "Check this box if you wish to display the carousel on your homepage.",
					"id" => $shortname."_show_carousel",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array(	"name" => "Carousel Title",
					"desc" => "Include a title for your carousel.",
					"id" => $shortname."_carousel_header",
					"std" => "",
					"type" => "text");	
					
$options[] = array(	"name" => "Carousel Category",
					"desc" => "Select the category to use with your home page carousel. The carousel uses the custom field image from your posts.",
					"id" => $shortname."_scroller_category",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $woo_categories);
				
$options[] = array(	"name" => "Carousel Posts",
					"desc" => "Select the number of posts to display in your home page carousel.",
					"id" => $shortname."_scroller_posts",
					"std" => "Select a number:",
					"type" => "select",
					"options" => $other_entries);
					
$options[] = array(	"name" => "Home Page Featured Images",
					"type" => "heading");
					
$options[] = array(	"name" => "Thumbnail 1",
					"desc" => "Paste the full URL of the 1st thumbnail in the featured tabber. <br />NOTE: Image must be 98 by 78 pixels in size.",
					"id" => $shortname."_thumbnail_1",
					"std" => "",
					"type" => "text");
					
$options[] = array(	"name" => "Featured 1",
					"desc" => "Paste the full URL of the 1st featured image in the featured tabber. <br />NOTE:  Recommendations: Image size of 458 by 346 pixels. If you are using an image with a transparent background use a png image.",
					"id" => $shortname."_featured_1",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Featured 1 Link-Out",
					"desc" => "...",
					"id" => $shortname."_featured_1_linkout",
					"std" => "#",
					"type" => "text");	
					
$options[] = array(	"name" => "Thumbnail 2",
					"desc" => "Paste the full URL of the 1st thumbnail in the featured tabber. <br />NOTE: Image must be 98 by 78 pixels in size.",
					"id" => $shortname."_thumbnail_2",
					"std" => "",
					"type" => "text");
					
$options[] = array(	"name" => "Featured 2",
					"desc" => "Paste the full URL of the 1st featured image in the featured tabber. <br />NOTE:  Recommendations: Image size of 458 by 346 pixels. If you are using an image with a transparent background use a png image.",
					"id" => $shortname."_featured_2",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Featured 2 Link-Out",
					"desc" => "...",
					"id" => $shortname."_featured_2_linkout",
					"std" => "#",
					"type" => "text");
					
$options[] = array(	"name" => "Thumbnail 3",
					"desc" => "Paste the full URL of the 1st thumbnail in the featured tabber. <br />NOTE: Image must be 98 by 78 pixels in size.",
					"id" => $shortname."_thumbnail_3",
					"std" => "",
					"type" => "text");
					
$options[] = array(	"name" => "Featured 3",
					"desc" => "Paste the full URL of the 1st featured image in the featured tabber. <br />NOTE:  Recommendations: Image size of 458 by 346 pixels. If you are using an image with a transparent background use a png image.",
					"id" => $shortname."_featured_3",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Featured 3 Link-Out",
					"desc" => "...",
					"id" => $shortname."_featured_3_linkout",
					"std" => "#",
					"type" => "text");	
					
$options[] = array(	"name" => "Thumbnail 4",
					"desc" => "Paste the full URL of the 1st thumbnail in the featured tabber. <br />NOTE: Image must be 98 by 78 pixels in size.",
					"id" => $shortname."_thumbnail_4",
					"std" => "",
					"type" => "text");
					
$options[] = array(	"name" => "Featured 4",
					"desc" => "Paste the full URL of the 1st featured image in the featured tabber. <br />NOTE:  Recommendations: Image size of 458 by 346 pixels. If you are using an image with a transparent background use a png image.",
					"id" => $shortname."_featured_4",
					"std" => "",
					"type" => "text");	

$options[] = array(	"name" => "Featured 4 Link-Out",
					"desc" => "...",
					"id" => $shortname."_featured_4_linkout",
					"std" => "#",
					"type" => "text");	
					
$options[] = array(	"name" => "Blog Setup",
					"type" => "heading");		

$options[] = array(	"name" => "Add Blog Link to Main Navigation?",
					"desc" => "If checked, this option will add a blog link to your main navigation next to the Home link.",
					"id" => $shortname."_addblog",
					"std" => "false",
					"type" => "checkbox");																														
						
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
					
	$options[] = array(	"name" => "Blog posts on the home page",
					"desc" => "Select the number of blog posts you'd like to display on the home page. <br />NOTE: Set total number of posts to show on home page in WordPress admin under Settings -> Reading -> Blog posts to show at most.",
					"id" => $shortname."_featured_posts",
					"std" => "Select a number:",
					"type" => "select",
					"options" => $other_entries);		
					
	$options[] = array(	"name" => "Display Most Commented in Sidebar?",
					"desc" => "Check this box if you wish to display the most commented widget in your far right sidebar.",
					"id" => $shortname."_show_mostcommented",
					"std" => "false",
					"type" => "checkbox");	
	
	$options[] = array(	"name" => "Number of Posts",
					"desc" => "Select the number of most commented posts you'd like to display in the sidebar tabs.",
					"id" => $shortname."_popular_posts",
					"std" => "Select a number:",
					"type" => "select",
					"options" => $other_entries);		

?>
