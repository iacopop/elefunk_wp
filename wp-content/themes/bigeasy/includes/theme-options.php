<?php



function woo_options(){
// VARIABLES
$themename = "Big Easy";
$manualurl = 'http://www.woothemes.com/';
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

$options[] = array(    "name" => "General Settings",
                                    "type" => "heading");
                        
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
                                    
$options[] = array(    "name" => "Archive Content",
                                    "desc" => "Use the_content instead of the_excerpt on Archive pages.",
                                    "id" => $shortname."_archive_content",
                                    "std" => "false",
                                    "type" => "checkbox");      
                                    
$options[] = array(    "name" => "Search Result Content",
                                    "desc" => "Use the_content instead of the_excerpt on Search Result pages.",
                                    "id" => $shortname."_search_content",
                                    "std" => "false",
                                    "type" => "checkbox");                                                                                                 
    
$options[] = array(    "name" => "Layout Options",
                                    "type" => "heading");    

$options[] = array(    "name" => "Category Navigation",
                                    "desc" => "Swap the Page navigation for a Category navigation. ",
                                    "id" => $shortname."_cat_menu",
                                    "std" => "false",
                                    "type" => "checkbox");    

$options[] = array( "name" => "Exclude Pages or Categories from Navigation",
                                    "desc" => "Enter a comma-separated list of <a href='http://support.wordpress.com/pages/8/'>ID's</a> that you'd like to exclude from the top navigation. (e.g. 12,23,27,44)",
                                    "id" => $shortname."_nav_exclude",
                                    "std" => "",
                                    "type" => "text"); 
                                    
$options[] = array(        "name" => "Portfolio Setup",
                                       "type" => "heading");                   
                           
$options[] = array(    "name" => "Portfolio Category",
                                    "desc" => "Select the category that represents your portfolio work.",
                                    "id" => $shortname."_portfolio_cat",
                                    "std" => "",
                                    "type" => "select",
                                    "options" => $woo_categories);
                                    
$options[] = array(    "name" => "Portfolio Nav Link",
                                    "desc" => "Add your Portfolio category to your main navigation.",
                                    "id" => $shortname."_port_in_nav",
                                    "std" => "false",
                                    "type" => "checkbox");
                                    
$options[] = array(    "name" => "Portfolio Preview Title",
                                    "desc" => "Add a custom title to your thumbnail viewers on portfolio posts .",
                                    "id" => $shortname."_port_prev_title",
                                    "std" => "Thumbnails",
                                    "type" => "text");
                                    
$options[] = array(    "name" => "Portfolio Preview Instructions",
                                    "desc" => "Add custom instructions to the thumbnail viewer on postfolio posts.",
                                    "id" => $shortname."_port_prev_ins",
                                    "std" => "Click on images below to load a larger preview.",
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



                                                                                                
//Advertising


$options[] = array(    "name" => "Ads - Sidebar Widget (390px wide)",
                                    "type" => "heading");
                                    
$options[] = array(    "name" => "Adsense code",
                                    "desc" => "Enter your adsense code (or other ad network code) here.",
                                    "id" => $shortname."_ad_300_adsense",
                                    "std" => "",
                                    "type" => "textarea");

$options[] = array(    "name" => "Image Location",
                                    "desc" => "Enter the URL for this banner ad.",
                                    "id" => $shortname."_ad_300_image",
                                    "std" => "http://woothemes.com/ads/woothemes-300x250-2.gif",
                                    "type" => "upload");

$options[] = array(    "name" => "Destination URL",
                                    "desc" => "Enter the URL where this banner ad points to.",
                                    "id" => $shortname."_ad_300_url",
                                    "std" => "http://www.woothemes.com",
                                    "type" => "text");    
                                    
$options[] = array(    "name" => "Ads - Sidebar Widget (125x125px)",
                                    "type" => "heading");
                                    
$options[] = array(    "name" => "A - Adsense code",
                                    "desc" => "Enter your adsense code (or other ad network code) here.",
                                    "id" => $shortname."_ad_125_adsense_a",
                                    "std" => "",
                                    "type" => "textarea");

$options[] = array(    "name" => "A - Image Location",
                                    "desc" => "Enter the URL for this banner ad.",
                                    "id" => $shortname."_ad_125_image_a",
                                    "std" => "http://woothemes.com/ads/woothemes-125x125-1.gif",
                                    "type" => "upload");

$options[] = array(    "name" => "A - Destination URL",
                                    "desc" => "Enter the URL where this banner ad points to.",
                                    "id" => $shortname."_ad_125_url_a",
                                    "std" => "http://www.woothemes.com",
                                    "type" => "text");    
                                    
$options[] = array(    "name" => "B - Adsense code",
                                    "desc" => "Enter your adsense code (or other ad network code) here.",
                                    "id" => $shortname."_ad_125_adsense_b",
                                    "std" => "",
                                    "type" => "textarea");

$options[] = array(    "name" => "B - Image Location",
                                    "desc" => "Enter the URL for this banner ad.",
                                    "id" => $shortname."_ad_125_image_b",
                                    "std" => "http://woothemes.com/ads/woothemes-125x125-2.gif",
                                    "type" => "upload");

$options[] = array(    "name" => "B - Destination URL",
                                    "desc" => "Enter the URL where this banner ad points to.",
                                    "id" => $shortname."_ad_125_url_b",
                                    "std" => "http://www.woothemes.com",
                                    "type" => "text");   

$options[] = array(    "name" => "C - Adsense code",
                                    "desc" => "Enter your adsense code (or other ad network code) here.",
                                    "id" => $shortname."_ad_125_adsense_c",
                                    "std" => "",
                                    "type" => "textarea");

$options[] = array(    "name" => "C - Image Location",
                                    "desc" => "Enter the URL for this banner ad.",
                                    "id" => $shortname."_ad_125_image_c",
                                    "std" => "http://woothemes.com/ads/woothemes-125x125-3.gif",
                                    "type" => "upload");

$options[] = array(    "name" => "C - Destination URL",
                                    "desc" => "Enter the URL where this banner ad points to.",
                                    "id" => $shortname."_ad_125_url_c",
                                    "std" => "http://www.woothemes.com",
                                    "type" => "text");    
                                                
$options[] = array(    "name" => "D - Adsense code",
                                    "desc" => "Enter your adsense code (or other ad network code) here.",
                                    "id" => $shortname."_ad_125_adsense_d",
                                    "std" => "",
                                    "type" => "textarea");

$options[] = array(    "name" => "D - Image Location",
                                    "desc" => "Enter the URL for this banner ad.",
                                    "id" => $shortname."_ad_125_image_d",
                                    "std" => "http://woothemes.com/ads/woothemes-125x125-4.gif",
                                    "type" => "upload");

$options[] = array(    "name" => "D - Destination URL",
                                    "desc" => "Enter the URL where this banner ad points to.",
                                    "id" => $shortname."_ad_125_url_d",
                                    "std" => "http://www.woothemes.com",
                                    "type" => "text");                                                    

update_option('woo_template',$options);      
update_option('woo_themename',$themename);   
update_option('woo_shortname',$shortname);
update_option('woo_manual',$manualurl);

                                     
// Woo Metabox Options
                    

$woo_metaboxes = array(

        "image" => array (
            "name" => "image",
            "label" => "Portfolio Image",
            "type" => "upload",
            "desc" => "This image represents the portfolio item (i.e. homepage screenshot)"
        )
        
    );
    
update_option('woo_custom_template',$woo_metaboxes);      

}

add_action('init','woo_options');  

?>