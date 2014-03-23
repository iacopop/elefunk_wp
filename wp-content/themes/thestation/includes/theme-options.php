<?php
function woo_options(){
// VARIABLES
$themename = "The Station";
$shortname = "woo";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/the-station/';

$sidebars = array("Select a sidebar:","Homepage","Inner Pages","Blog Pages");
$homepages = array("layout-default.php","layout-magazine.php");

$GLOBALS['template_path'] = get_bloginfo('template_directory');

//Access the WordPress Categories via an Array
$woo_categories = array();  
$woo_categories_obj = get_categories('hide_empty=0');
foreach ($woo_categories_obj as $woo_cat) {
    $woo_categories[$woo_cat->cat_ID] = $woo_cat->cat_name;}
$categories_tmp = array_unshift($woo_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$woo_pages = array();
$woo_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($woo_pages_obj as $woo_page) {
    $woo_pages[$woo_page->ID] = $woo_page->post_name; }
$woo_pages_tmp = array_unshift($woo_pages, "Select a page:");       


//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

//Stylesheets Reader
$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$all_uploads_path = get_bloginfo('home') . '/wp-content/uploads/';
$all_uploads = get_option('woo_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");

// THIS IS THE DIFFERENT FIELDS
$options[] = array(	"name" => "General Settings",
					"type" => "heading");
						
$options[] = array(   "name" => "Theme Stylesheet",
                                    "desc" => "Select your themes alternative color scheme.",
                                    "id" => $shortname."_alt_stylesheet",
                                    "std" => "default.css",
                                    "type" => "select",
                                    "options" => $alt_stylesheets);

$options[] = array(	"name" => "Custom Logo",
					                "desc" => "Paste the full URL of your custom logo image, should you wish to replace our default logo e.g. 'http://www.yoursite.com/logo-trans.png'. <br />NOTE: You need to name the logo 'logoname-trans.png' to make it transparent in IE6 .",
					                "id" => $shortname."_logo",
					                "std" => "",
					                "type" => "upload");					 							    
                                                                                     
 $options[] = array(    "name" => "Custom Favicon",
                                        "desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
                                        "id" => $shortname."_custom_favicon",
                                        "std" => "",
                                        "type" => "upload"); 
                                        
$options[] = array(    "name" => "Tracking Code",
                                    "desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
                                    "id" => $shortname."_google_analytics",
                                    "std" => "",
                                    "type" => "textarea");        

$options[] = array(    "name" => "RSS URL",
                                    "desc" => "Enter your preferred RSS URL. (Feedburner or other)",
                                    "id" => $shortname."_feedburner_url",
                                    "std" => "",
                                    "type" => "text");
                                    
$options[] = array( "name" => "Custom CSS",
                                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                                    "id" => $shortname."_custom_css",
                                    "std" => "",
                                    "type" => "textarea");

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

$options[] = array( "name" => "Exclude Pages or Categories from Top Navigation",
                                    "desc" => "Enter a comma-separated list of <a href='http://support.wordpress.com/pages/8/'>ID's</a> that you'd like to exclude from the top navigation. (e.g. 12,23,27,44)",
					                "id" => $shortname."_exclude_pages_main",
					                "std" => "",
					                "type" => "text");																	

$options[] = array(	"name" => "Exclude Pages from Footer Navigation",
                                    "desc" => "Enter a comma-separated list of <a href='http://support.wordpress.com/pages/8/'>ID's</a> that you'd like to exclude from the top navigation. (e.g. 12,23,27,44)", 
					                "id" => $shortname."_exclude_pages_footer",
					                "std" => "",
					                "type" => "text");			

$options[] = array(	"name" => "Exclude Pages from Secondary Navigation (inner pages)",
                                    "desc" => "Enter a comma-separated list of <a href='http://support.wordpress.com/pages/8/'>ID's</a> that you'd like to exclude from the top navigation. (e.g. 12,23,27,44)", 
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

$options[] = array(   "name" => "Dynamic Images",
                                    "type" => "heading");    

$options[] = array(    "name" => "Enable Dynamic Image Resizer",
                                        "desc" => "This will enable the thumb.php script. It dynamicaly resizes images on your site.",
                                        "id" => $shortname."_resize",
                                        "std" => "true",
                                        "type" => "checkbox");    
                    
$options[] = array(    "name" => "Automatic Image Thumbs",
                                    "desc" => "If no image is specified in the 'image' custom field then the first uploaded post image is used.",
                                    "id" => $shortname."_auto_img",
                                    "std" => "false",
                                    "type" => "checkbox");    	

$options[] = array(    "name" => "Featured Article Images",
                                        "desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
                                        "id" => $shortname."_feat_articles",
                                        "std" => "",
                                        "type" => array( 
                                                            array(
                                                                    'id' => $shortname. '_feat_width',
                                                                    'type' => 'text',
                                                                    'std' => 280,
                                                                    'meta' => 'Width'
                                                                    ),
                                                            array(
                                                                    'id' => $shortname. '_feat_height',
                                                                    'type' => 'text',
                                                                    'std' => 210,
                                                                    'meta' => 'Height'
                                                                    )
                                                          )
                                            );													

$options[] = array(    "name" => "General Post Thumbnails",
                                        "desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
                                        "id" => $shortname."_thumb_articles",
                                        "std" => "",
                                        "type" => array( 
                                                            array(
                                                                    'id' => $shortname. '_thumb_width',
                                                                    'type' => 'text',
                                                                    'std' => 100,
                                                                    'meta' => 'Width'
                                                                    ),
                                                            array(
                                                                    'id' => $shortname. '_thumb_height',
                                                                    'type' => 'text',
                                                                    'std' => 76,
                                                                    'meta' => 'Height'
                                                                    )
                                                          )
                                            );                                              
                                                  
$options[] = array(    "name" => "Magazine Small Thumbnails",
                                        "desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
                                        "id" => $shortname."_smallthumb_articles",
                                        "std" => "",
                                        "type" => array( 
                                                            array(
                                                                    'id' => $shortname. '_smallthumb_width',
                                                                    'type' => 'text',
                                                                    'std' => 56,
                                                                    'meta' => 'Width'
                                                                    ),
                                                            array(
                                                                    'id' => $shortname. '_smallthumb_height',
                                                                    'type' => 'text',
                                                                    'std' => 42,
                                                                    'meta' => 'Height'
                                                                    )
                                                          )
                                            );                                              
                                                                                                               																	                        

$options[] = array(	"name" => "Homepage Settings",
					"type" => "heading");

$options[] = array(	"name" => "Homepage Layout",
					"desc" => "Select the layout you'd like to use. Your choices include the default (business) layout, or the alternative news / magazine layout.",
					"id" => $shortname."_homepage",
					"std" => "",
					"type" => "select",
					"options" => $homepages);		

$options[] = array(	"name" => "Default Homepage Settings",
					"type" => "heading");

$options[] = array(	"name" => "Use a slider, instead of the tabber (default)?",
					"desc" => "Use a slider, instead of the tabber (default).",
					"id" => $shortname."_slider",
					"std" => "false",
					"type" => "checkbox");							

$options[] = array(	"name" => "Pages for Tabber",
					"desc" => "Enter a comma-separated list of the <a href='http://support.wordpress.com/pages/8/'>Page ID's</a> that you'd like to include in the featured tabber (e.g. 1,2,3,4).",
					"id" => $shortname."_tabber_pages",
					"std" => "",
					"type" => "text");			

$options[] = array(	"name" => "Include 'Pages for Tabber' in top navigation?",
					"desc" => "Check this box if you'd like to include the above-listed pages in the top navigation.",
					"id" => $shortname."_inc_tabber_pages",
					"std" => "false",
					"type" => "checkbox");							

$options[] = array(	"name" => "Introduction Page",
					"desc" => "Enter the <a href='http://support.wordpress.com/pages/8/'>Page ID</a> show as the introduction page just below the featured tabber on the homepage.",
					"id" => $shortname."_intro_page",
					"std" => "",
					"type" => "text");	

$options[] = array(	"name" => "Include 'Introduction Page' in top navigation?",
					"desc" => "Check this box if you'd like to include the above-listed pages in the top navigation.",
					"id" => $shortname."_inc_intro_page",
					"std" => "false",
					"type" => "checkbox");									

$options[] = array(	"name" => "Small Introduction Page - Left",
					"desc" => "Enter the <a href='http://support.wordpress.com/pages/8/'>Page ID</a> show as the smaller introduction page just below the main introduction (left) on the homepage.",
					"id" => $shortname."_intro_page_left",
					"std" => "",
					"type" => "text");		

$options[] = array(	"name" => "Include 'Small Introduction Page - Left' in top navigation?",
					"desc" => "Check this box if you'd like to include the above-listed pages in the top navigation.",
					"id" => $shortname."_inc_intro_page_left",
					"std" => "false",
					"type" => "checkbox");															

$options[] = array(	"name" => "Small Introduction Page - Right",
					"desc" => "Enter the <a href='http://support.wordpress.com/pages/8/'>Page ID</a> show as the smaller introduction page just below the main introduction (right) on the homepage.",
					"id" => $shortname."_intro_page_right",
					"std" => "",
					"type" => "text");				

$options[] = array(	"name" => "Include 'Small Introduction Page -Right' in top navigation?",
					"desc" => "Check this box if you'd like to include the above-listed pages in the top navigation.",
					"id" => $shortname."_inc_intro_page_right",
					"std" => "false",
					"type" => "checkbox");			

$options[] = array(	"name" => "Magazine Homepage Settings",
					"type" => "heading");															

$options[] = array(	"name" => "Featured Articles",
					"desc" => "Select the amount of articles you'd like to display in the featured slider. Featured articles are the latest and / or sticky posts.",
					"id" => $shortname."_mag_featured",
					"std" => "",
					"type" => "select",
					"options" => $other_entries);	

$options[] = array(	"name" => "Secondary Articles",
					"desc" => "Select the amount of articles you'd like to display just below the featured slider (in the side-by-side format). We recommend using an even amount of artilces (i.e. 2, 4, 6).",
					"id" => $shortname."_mag_secondary",
					"std" => "",
					"type" => "select",
					"options" => $other_entries);													

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

// Woo Metabox Options
                    
$woo_metaboxes = array(
		"image" => array (
			"name"		=> "image",
			"default" 	=> "",
			"label" 	=> "Image",
			"type" 		=> "upload",
			"desc"      => "Enter the URL for image to be used by the Dynamic Image resizer."
		),
		"embed" => array (
			"name"		=> "embed",
			"std" 	    => "",
			"label" 	=> "Video Embed Code",
			"type" 		=> "textarea",
			"desc"      => "Paste the embed code for your video here. Video will be resized automatically. Note: You need to tag this post with 'video' in order to work with the Woo - Video Player widget.",
			"input"     => "textarea"
		),		
		"page_desc" => array (
			"name"		=> "page_desc",
			"std" 	    => "",
			"label" 	=> "Page Description",
			"type" 		=> "text",
			"desc"      => "Description for this page (used in the featured tabber)."
		),		
		"button_text" => array (
			"name"		=> "button_text",
			"label" 	=> "Button Text (Optional)",
			"std" 	    => "",
			"type" 		=> "text",
			"desc"      => "Special button text (used in the featured tabber)."
		),				
		"button_link" => array (
			"name"		=> "button_link",
			"std" 	    => "",
			"label" 	=> "Button Link / URL (Optional)",
			"type" 		=> "text",
			"desc"      => "Special button URL (used in the featured tabber)."
		),					
	);

update_option('woo_template',$options);      
update_option('woo_themename',$themename);   
update_option('woo_shortname',$shortname);  
update_option('woo_manual',$manualurl);  
update_option('woo_custom_template',$woo_metaboxes);  
}

add_action('init','woo_options')   
?>