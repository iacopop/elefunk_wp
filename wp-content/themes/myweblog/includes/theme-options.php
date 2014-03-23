<?php

function woo_options(){
// VARIABLES
$themename = "myweblog";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/wootheme/';
$shortname = "woo";

$options = array();
global $options;

$GLOBALS['template_path'] = get_bloginfo('template_directory');

$woo_categories_obj = get_categories('hide_empty=0');
$woo_categories = array();

$woo_pages_obj = get_pages('sort_column=post_parent,menu_order');
$woo_pages = array();

foreach ($woo_categories_obj as $woo_cat) {
    $woo_categories[$woo_cat->cat_ID] = $woo_cat->cat_name;
}

foreach ($woo_pages_obj as $woo_page) {
    $woo_pages[$woo_page->ID] = $woo_page->post_name;
}

$categories_tmp = array_unshift($woo_categories, "Select a category:");
$woo_pages_tmp = array_unshift($woo_pages, "Select a page:");

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

$all_uploads_path = get_bloginfo('home') . '/wp-content/uploads/';
$all_uploads = get_option('woo_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");


// THIS IS THE DIFFERENT FIELDS

// CATEGORY NAVIGATION

function category_nav($options) {

    $options[] = array(    "name" =>  "Categories in Navigation",
        "type" => "heading");    

    $cats = get_categories('hide_empty=0');

    foreach ($cats as $cat) {

            $options[] = array(    "name" =>  $cat->cat_name,
                        "desc" => "Check this box to remove this category from the top navigation.",
                        "id" => "woo_cat_nav_".$cat->cat_ID,
                        "std" => "",
                        "type" => "checkbox");                    
    
    }

    return $options;
    
}

function category_colors($options) {

    $options[] = array(    "name" =>  "Category Colors",
        "type" => "heading");    

    $cats = get_categories('hide_empty=0');
    //$count = 1;
    
    foreach ($cats as $cat) {
            $count = $cat->cat_ID;
            
            $options[] = array(    "name" =>  $cat->cat_name,
                        "desc" => "<a href=\"JavaScript:_whichField='woo_cat_color_$count';CLCPshowPicker({_hex: document.getElementById('woo_cat_color_$count').value});\">Load Color Picker</a>",
                        "id" => "woo_cat_color_".$cat->cat_ID,
                        "std" => "",
                        "color" => 1,
                        "type" => "text");                    
    
        //$count++;
    
    }


    return $options;
    
}

//START OPTIONS

$options[] = array(  "name" => "General Settings",
                    "type" => "heading");
                    
$options[] = array( "name" => "Post Sizes",
                                    "desc" => "Force posts to be inserted into side-by-side blocks, excluding stickys.",
                                    "id" => $shortname."_post_size",
                                    "std" => "",
                                    "type" => "checkbox");

$options[] = array( "name" => "Post Thumbnail",
                                    "desc" => "Disable the thumbnail from displaying single post page.",
                                    "id" => $shortname."_single_thumb",
                                    "std" => "",
                                    "type" => "checkbox");
                        
$options[] = array(    "name" => "Theme Stylesheet",
                                    "desc" => "Select your themes alternative color scheme.",
                                    "id" => $shortname."_alt_stylesheet",
                                    "std" => "default.css",
                                    "type" => "select",
                                    "options" => $alt_stylesheets);
                    
$options[] = array(    "name" => "Custom Logo",
                                    "desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
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
                                            
$options[] = array(        "name" => "Dynamic Images",
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

$options = category_nav($options);     

$options = category_colors($options);     

															    								
//Advertising
$options[] = array(	"name" => "Footer Ad (468x60px)",
					"type" => "heading");

$options[] = array(	"name" => "Enable Ad",
					"desc" => "Enable the ad space",
					"id" => $shortname."_ad_footer",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Adsense code",
					"desc" => "Enter your adsense code (or other ad network code) here.",
					"id" => $shortname."_ad_footer_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array(	"name" => "Footer Ad - Image",
					"desc" => "Enter the URL to the banner ad image location.",
					"id" => $shortname."_ad_footer_image",
					"std" => "http://www.woothemes.com/ads/woothemes-468x60-2.gif",
					"type" => "upload");

$options[] = array(	"name" => "Footer Ad - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_footer_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");	
                 
//Advertising Sidebars
$options[] = array(    "name" => "Sidebar Ads (125x125px)",
                    "type" => "heading");

$options[] = array(    "name" => "Ad 1 - Image",
                    "desc" => "Enter the URL to the banner ad image location.",
                    "id" => $shortname."_sidebar_ad_img_1",
                    "std" => "http://www.woothemes.com/ads/woothemes-125x125-1.gif",
                    "type" => "upload");

$options[] = array(    "name" => "Ad 1 - Destination",
                    "desc" => "Enter the URL where this banner ad points to.",
                    "id" => $shortname."_sidebar_ad_href_1",
                    "std" => "http://www.woothemes.com",
                    "type" => "text");
                            										
$options[] = array(    "name" => "Ad 2 - Image",
                    "desc" => "Enter the URL to the banner ad image location.",
                    "id" => $shortname."_sidebar_ad_img_2",
                    "std" => "http://www.woothemes.com/ads/woothemes-125x125-2.gif",
                    "type" => "upload");

$options[] = array(    "name" => "Ad 2 - Destination",
                    "desc" => "Enter the URL where this banner ad points to.",
                    "id" => $shortname."_sidebar_ad_href_2",
                    "std" => "http://www.woothemes.com",
                    "type" => "text");        

$options[] = array(    "name" => "Ad 3 - Image",
                    "desc" => "Enter the URL to the banner ad image location.",
                    "id" => $shortname."_sidebar_ad_img_3",
                    "std" => "http://www.woothemes.com/ads/woothemes-125x125-3.gif",
                    "type" => "upload");

$options[] = array(    "name" => "Ad 3 - Destination",
                    "desc" => "Enter the URL where this banner ad points to.",
                    "id" => $shortname."_sidebar_ad_href_3",
                    "std" => "http://www.woothemes.com",
                    "type" => "text");        
                    
$options[] = array(    "name" => "Ad 4 - Image",
                    "desc" => "Enter the URL to the banner ad image location.",
                    "id" => $shortname."_sidebar_ad_img_4",
                    "std" => "http://www.woothemes.com/ads/woothemes-125x125-4.gif",
                    "type" => "upload");

$options[] = array(    "name" => "Ad 4 - Destination",
                    "desc" => "Enter the URL where this banner ad points to.",
                    "id" => $shortname."_sidebar_ad_href_4",
                    "std" => "http://www.woothemes.com",
                    "type" => "text");        
                    
// Start the custom field options
                    
$woo_metaboxes = array(

        "image" => array (
            "name"        => "image",
            "std"     => "",
            "label"     => "Image",
            "type"         => "upload",
            "desc"      => "Upload file here..."
        )
    );
    
update_option('woo_template',$options);      
update_option('woo_themename',$themename);   
update_option('woo_shortname',$shortname); 
update_option('woo_manual',$manualurl); 

update_option('woo_custom_template',$woo_metaboxes );  

}

add_action('init','woo_options');



?>