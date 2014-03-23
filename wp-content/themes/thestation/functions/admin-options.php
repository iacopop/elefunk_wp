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

$options[] = array(	"name" => "Copyright & Disclaimer Notice",
					"desc" => "Type your copyright & disclaimer notice here. This will be shown in the footer on the right-hand side. (Basic HTML tags allowed.)",
					"id" => $shortname."_disclaimer",
					"std" => "",
					"type" => "textarea");					

$options[] = array(	"name" => "Twitter Username",
					"desc" => "Enter your Twitter username to use with the Woo - Twitter widget.",
					"id" => $shortname."_twitter",
					"std" => "",
					"type" => "text");								

$options[] = array(	"name" => "Navigation Settings",
					"type" => "heading");	

$options[] = array(	"name" => "Exclude pages from top navigation",
					"desc" => "Enter a comma-separated list of the <a href='http://support.wordpress.com/pages/8/'>Page ID's</a> that you'd like to exclude from the main / top navigation (e.g. 1,2,3,4).",
					"id" => $shortname."_exclude_pages_main",
					"std" => "",
					"type" => "text");								

$options[] = array(	"name" => "Exclude pages from footer navigation",
					"desc" => "Enter a comma-separated list of the <a href='http://support.wordpress.com/pages/8/'>Page ID's</a> that you'd like to exclude from the footer page navigation (e.g. 1,2,3,4).",
					"id" => $shortname."_exclude_pages_footer",
					"std" => "",
					"type" => "text");			

$options[] = array(	"name" => "Exclude pages from secondary navigation (inner pages)",
					"desc" => "Enter a comma-separated list of the <a href='http://support.wordpress.com/pages/8/'>Page ID's</a> that you'd like to exclude from the secondary navigation on inner pages (e.g. 1,2,3,4).",
					"id" => $shortname."_exclude_pages_subnav",
					"std" => "",
					"type" => "text");													

$options[] = array(	"name" => "Use Breadcrumbs?",
					"desc" => "Check this box if you'd like to enable the use of breadcrumbs.",
					"id" => $shortname."_breadcrumbs",
					"std" => "false",
					"type" => "checkbox");				
					
$options[] = array(	"name" => "Use Secondary Navigation?",
					"desc" => "Check this box if you'd like to enable the use of the secondary navigation column for inner pages.",
					"id" => $shortname."_subnav",
					"std" => "false",
					"type" => "checkbox");													

$options[] = array(	"name" => "Homepage Settings",
					"type" => "heading");

$options[] = array(	"name" => "Pages for Tabber",
					"desc" => "Enter a comma-separated list of the <a href='http://support.wordpress.com/pages/8/'>Page ID's</a> that you'd like to include in the featured tabber (e.g. 1,2,3,4).",
					"id" => $shortname."_tabber_pages",
					"std" => "",
					"type" => "text");			

$options[] = array(	"name" => "Introduction Page",
					"desc" => "Enter the <a href='http://support.wordpress.com/pages/8/'>Page ID</a> show as the introduction page just below the featured tabber on the homepage.",
					"id" => $shortname."_intro_page",
					"std" => "",
					"type" => "text");	

$options[] = array(	"name" => "Small Introduction Page - Left",
					"desc" => "Enter the <a href='http://support.wordpress.com/pages/8/'>Page ID</a> show as the smaller introduction page just below the main introduction (left) on the homepage.",
					"id" => $shortname."_intro_page_left",
					"std" => "",
					"type" => "text");					

$options[] = array(	"name" => "Small Introduction Page - Right",
					"desc" => "Enter the <a href='http://support.wordpress.com/pages/8/'>Page ID</a> show as the smaller introduction page just below the main introduction (right) on the homepage.",
					"id" => $shortname."_intro_page_right",
					"std" => "",
					"type" => "text");				

$options[] = array(	"name" => "Sidebar Options",
					"type" => "heading");	

$options[] = array(	"name" => "Homepage Sidebar",
					"desc" => "Select the widgetized sidebar which you'd like to display in the homepage sidebar.",
					"id" => $shortname."_home_sidebar",
					"std" => "",
					"type" => "select",
					"options" => $sidebars);		

$options[] = array(	"name" => "Inner Pages Sidebar",
					"desc" => "Select the widgetized sidebar which you'd like to display in the inner pages' sidebar (page.php).",
					"id" => $shortname."_page_sidebar",
					"std" => "",
					"type" => "select",
					"options" => $sidebars);		

$options[] = array(	"name" => "Blog Pages Sidebar",
					"desc" => "Select the widgetized sidebar which you'd like to display in the blog pages' sidebar (single.php & archive.php).",
					"id" => $shortname."_blog_sidebar",
					"std" => "",
					"type" => "select",
					"options" => $sidebars);	

$options[] = array(	"name" => "Blog Settings",
					"type" => "heading");		

$options[] = array(	"name" => "Add Blog Link to Main Navigation?",
					"desc" => "If checked, this option will add a blog link to your main navigation next to the Home link.",
					"id" => $shortname."_blog_navigation",
					"std" => "false",
					"type" => "checkbox");						

$options[] = array(	"name" => "Add Blog Link to Footer Navigation?",
					"desc" => "If checked, this option will add a blog link to your footer navigation next to the Home link.",
					"id" => $shortname."_blog_navigation_footer",
					"std" => "false",
					"type" => "checkbox");																														

$options[] = array( "name" => "Blog Permalink",
					"desc" => "Please enter the permalink to your blog parent category (i.e. /category/blog/). If you are not using <a href='http://codex.wordpress.org/Using_Permalinks'>Pretty Permalinks</a> then you can use (/?cat=X) where X is your blog category ID.",
					"id" => $shortname."_blog_permalink",
					"std" => "",
					"type" => "text");			

$options[] = array(	"name" => "Add blog categories as a drop-down to top navigation link?",
					"desc" => "If checked, this option will add a drop-down menu - with all your blog categories - to the blog link in the top navigation.",
					"id" => $shortname."_blog_subnavigation",
					"std" => "false",
					"type" => "checkbox");								

$options[] = array( "name" => "Blog Category ID",
					"desc" => "Please enter the ID of your main blog category. Only the sub-categories of this category will be displayed in the category drop-down.",
					"id" => $shortname."_blog_cat_id",
					"std" => "",
					"type" => "text");							

$options[] = array(	"name" => "Show full post?",
					"desc" => "Check this to display the full post eg. use the_content() instead of the_excerpt().",
					"id" => $shortname."_the_content",
					"std" => "true",
					"type" => "checkbox");																																										

?>