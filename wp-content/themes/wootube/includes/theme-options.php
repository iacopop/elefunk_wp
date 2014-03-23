<?php

function woo_options(){
// VARIABLES
$themename = "WooTube";
$manualurl = 'http://www.woothemes.com/theme-documentation/wootube/';
$shortname = "woo";

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
$options = array();   

$options[] = array( "name" => "General Settings",
                    "type" => "heading");
                        
$options[] = array( "name" => "Theme Stylesheet",
					"desc" => "Select your themes alternative color scheme.",
					"id" => $shortname."_alt_stylesheet",
					"std" => "default.css",
					"type" => "select",
					"options" => $alt_stylesheets);

$options[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");    
                                                                                     
$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 
                                               
$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");        

$options[] = array( "name" => "RSS URL",
					"desc" => "Enter your preferred RSS URL. (Feedburner or other)",
					"id" => $shortname."_feedburner_url",
					"std" => "",
					"type" => "text");
                    
$options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea");                 

$options[] = array( "name" => "E-Mail URL",
					"desc" => "Enter your preferred e-mail subscription URL. (Feedburner or other)",
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

 
$options[] = array( "name" => "Dynamic Images",
				    "type" => "heading");    

$options[] = array( "name" => "Enable Dynamic Image Resizer",
					"desc" => "This will enable the thumb.php script. It dynamicaly resizes images on your site.",
					"id" => $shortname."_resize",
					"std" => "true",
					"type" => "checkbox");    
                    
$options[] = array( "name" => "Automatic Image Thumbs",
					"desc" => "If no image is specified in the 'image' custom field then the first uploaded post image is used.",
					"id" => $shortname."_auto_img",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Image Dimensions",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_get_image_width',
											'type' => 'text',
											'std' => 190,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_get_image_height',
											'type' => 'text',
											'std' => 142,
											'meta' => 'Height')
								  ));
                                                                                                
//Advertising
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

update_option('woo_template',$options);      
update_option('woo_themename',$themename);   
update_option('woo_shortname',$shortname);
update_option('woo_manual',$manualurl);

                                     
// Woo Metabox Options
                    

$woo_metaboxes = array(

        "image" => array (
            "name" => "image",
            "label" => "Image",
            "type" => "upload",
            "desc" => "Upload file here..."
        ),
        "embed" => array (
            "name"  => "embed",
            "std"  => "",
            "label" => "Embed Code",
            "type" => "textarea",
            "desc" => "Enter the video embed code for your video"
        ),
		"width" => array (
			"name"		=> "width",
			"std" 	=> "",
			"label" 	=> "Width",
			"type" 		=> "text",
			"desc"      => "<b>Default: 640px</b>. Leave empty or enter another width for your video (e.g. 500)",
		),
		"height" => array (
			"name"		=> "height",
			"std" 	=> "",
			"label" 	=> "Height", 
			"type" 		=> "text",
			"desc"      => "<b>Default: 360px</b>. Leave empty or enter another width for your video (e.g. 500)",
		),
	);
    
update_option('woo_custom_template',$woo_metaboxes);      

/*
function woo_update_options(){
        $options = get_option('woo_template',$options);  
        foreach ($options as $option){
            update_option($option['id'],$option['std']);
        }   
}

function woo_add_options(){
        $options = get_option('woo_template',$options);  
        foreach ($options as $option){
            update_option($option['id'],$option['std']);
        }   
}


//add_action('switch_theme', 'woo_update_options'); 
if(get_option('template') == 'wooframework'){       
    woo_add_options();
} // end function 
*/


}

add_action('init','woo_options');  

?>