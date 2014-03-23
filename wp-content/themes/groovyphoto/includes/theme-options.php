<?php



function woo_options(){
// VARIABLES
$themename = "GroovyPhoto";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/groovy-photo/';
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

$options[] = array(    "name" => "Basic Setup",
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
                                    
$options[] = array(    "name" => "Enable Twitter",
                                    "desc" => "Check this box to enable Twitter functionality",
                                    "id" => $shortname."_twitter_enable",
                                    "std" => "true",
                                    "type" => "checkbox");      
                                    
$options[] = array(    "name" => "Twitter Username",
                                    "desc" => "Supply a user for the Twitter functionality in this theme. (eg. twitter.com/<b>woothemes</b>)",
                                    "id" => $shortname."_twitter_username",
                                    "std" => "woothemes",
                                    "type" => "text");     
    
$options[] = array(    "name" => "Navigation Setup",
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
                                    
$options[] = array(        "name" => "Homepage - About",
                                       "type" => "heading");  
                                       
$options[] = array(    "name" => "Enable",
                                    "desc" => "Check this box to enable the about section.",
                                    "id" => $shortname."_about_enable",
                                    "std" => "false",
                                    "type" => "checkbox");    
                                       
                                         
$options[] = array(    "name" => "Text",
                                    "desc" => "Add some content to the About Section on the homepage.",
                                    "id" => $shortname."_about_text",
                                    "std" => "",
                                    "type" => "textarea");     
                                                                             
$options[] = array(    "name" => "Link",
                                    "desc" => "Link destination to more content on about section. Leave blank to disable.",
                                    "id" => $shortname."_about_more",
                                    "std" => "",
                                    "type" => "text");  
                                       
$options[] = array(    "name" => "Image",
                                    "desc" => "Link destination to more content on about section.",
                                    "id" => $shortname."_about_image",
                                    "std" => "",
                                    "type" => "upload");
                                    
$options[] = array(    "name" => "Image Dimensions",
                                        "desc" => "Enter an integer value i.e. 80 for the desired size which will be used when dynamically resizing the image.",
                                        "id" => $shortname."_image_dimensions",
                                        "std" => "",
                                        "type" => array( 
                                                            array(
                                                                    'id' => $shortname. '_about_image_width',
                                                                    'type' => 'text',
                                                                    'std' => 80,
                                                                    'meta' => 'Width'
                                                                    ),
                                                            array(
                                                                    'id' => $shortname. '_about_image_height',
                                                                    'type' => 'text',
                                                                    'std' => 80,
                                                                    'meta' => 'Height'
                                                                    )

                                                          )
                                            
                                            ); 
                                                         
                                            
$options[] = array(        "name" => "Post Excerpt or Content",
                                       "type" => "heading"); 
                                       
$options[] = array(    "name" => "Display Content for Index",
                                        "desc" => "This will enable post to display the_content instead of the_excerpt",
                                        "id" => $shortname. "_show_content_index",
                                        "std" => "false",
                                        "type" => "checkbox");        

$options[] = array(    "name" => "Display Content for Archive Pages",
                                        "desc" => "This will enable post to display the_content instead of the_excerpt",
                                        "id" => $shortname. "_show_content_archive",
                                        "std" => "false",
                                        "type" => "checkbox");                                           
                                         
 
$options[] = array(        "name" => "Dynamic Images",
                                       "type" => "heading"); 
                                       
$options[] = array(    "name" => "Home Images",
                                        "desc" => "Enter an integer value i.e. 80 for the desired size which will be used when dynamically resizing the image.",
                                        "id" => $shortname."_index_image_dimensions",
                                        "std" => "",
                                        "type" => array( 
                                                            array(
                                                                    'id' => $shortname. '_index_image_w',
                                                                    'type' => 'text',
                                                                    'std' => 480,
                                                                    'meta' => 'Width'
                                                                    ),
                                                            array(
                                                                    'id' => $shortname. '_index_image_h',
                                                                    'type' => 'text',
                                                                    'std' => null,
                                                                    'meta' => 'Height'
                                                                    ),

                                                          )
                                            
                                            ); 
                                            
$options[] = array(    "name" => "Archive Images",
                                        "desc" => "Enter an integer value i.e. 80 for the desired size which will be used when dynamically resizing the image.",
                                        "id" => $shortname."_archive_image_dimensions",
                                        "std" => "",
                                        "type" => array( 
                                                            array(
                                                                    'id' => $shortname. '_archive_image_w',
                                                                    'type' => 'text',
                                                                    'std' => 200,
                                                                    'meta' => 'Width'
                                                                    ),
                                                            array(
                                                                    'id' => $shortname. '_archive_image_h',
                                                                    'type' => 'text',
                                                                    'std' => null,
                                                                    'meta' => 'Height'
                                                                    )

                                                          )
                                            
                                            ); 
                                             
$options[] = array(    "name" => "Single Images",
                                        "desc" => "Leave image dimention on default 650 width. Adjust with care.",
                                        "id" => $shortname."_single_img",
                                        "std" => "",
                                        "type" => array( 
                                                            array(
                                                                    'id' => $shortname. '_single_img_w',
                                                                    'type' => 'text',
                                                                    'std' => 650,
                                                                    'meta' => 'Width'
                                                                    ),
                                                            array(
                                                                    'id' => $shortname. '_single_img_h',
                                                                    'type' => 'text',
                                                                    'std' => null,
                                                                    'meta' => 'Height'
                                                                    )

                                                          )
                                            
                                            ); 
                                            
$options[] = array(    "name" => "Display uploads on single",
                                        "desc" => "Uncheck to remove the dynamic images from the Single post page.",
                                        "id" => $shortname."_single_img_d",
                                        "std" => "true",
                                        "type" => "checkbox");
                                        
                                                                                     
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
$options[] = array(    "name" => "Ads - Top Ad (468x60px)",
                                    "type" => "heading");

$options[] = array(    "name" => "Enable Ad",
                                    "desc" => "Enable this ad space.",
                                    "id" => $shortname."_ad_top",
                                    "std" => "false",
                                    "type" => "checkbox");    

$options[] = array(    "name" => "Adsense code",
                                    "desc" => "Enter your adsense code (or other ad network code) here.",
                                    "id" => $shortname."_ad_top_adsense",
                                    "std" => "",
                                    "type" => "textarea");

$options[] = array(    "name" => "Image Location",
                                    "desc" => "Enter the URL to the banner ad image location.",
                                    "id" => $shortname."_ad_top_image",
                                    "std" => "http://www.woothemes.com/ads/woothemes-468x60-2.gif",
                                    "type" => "upload");

$options[] = array(    "name" => "Destination URL",
                                    "desc" => "Enter the URL where this banner ad points to.",
                                    "id" => $shortname."_ad_top_url",
                                    "std" => "http://www.woothemes.com",
                                    "type" => "text");       

$options[] = array(    "name" => "Ads - Content Banner (468x60px)",
                                    "type" => "heading");

$options[] = array(    "name" => "Enable Ad",
                                    "desc" => "Enable the ad space",
                                    "id" => $shortname."_ad_content",
                                    "std" => "false",
                                    "type" => "checkbox");    

$options[] = array(    "name" => "Adsense code",
                                    "desc" => "Enter your adsense code (or other ad network code) here.",
                                    "id" => $shortname."_ad_content_adsense",
                                    "std" => "",
                                    "type" => "textarea");

$options[] = array(    "name" => "Image Location",
                                    "desc" => "Enter the URL for this banner ad.",
                                    "id" => $shortname."_ad_content_image",
                                    "std" => "http://www.woothemes.com/ads/woothemes-468x60-2.gif",
                                    "type" => "upload");

$options[] = array(    "name" => "Ads - Widget",
                                    "type" => "heading");

$options[] = array(    "name" => "Adsense code",
                                    "desc" => "Enter your adsense code (or other ad network code) here.",
                                    "id" => $shortname."_ad_sb_adsense",
                                    "std" => "",
                                    "type" => "textarea");

$options[] = array(    "name" => "Image Location",
                                    "desc" => "Enter the URL to the banner ad image location. Please note that there is no preset dimintions for this ad, so when using an image please arruse that it is not too big for it's designated spot.",
                                    "id" => $shortname."_ad_sb_image",
                                    "std" => "http://www.woothemes.com/ads/woothemes-200x125.gif",
                                    "type" => "upload");

$options[] = array(    "name" => "Destination URL",
                                    "desc" => "Enter the URL where this banner ad points to.",
                                    "id" => $shortname."_ad_sb_url",
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
            "label" => "Image",
            "type" => "upload",
            "desc" => "Upload file here..."
        ),

    );
    
update_option('woo_custom_template',$woo_metaboxes);      


}

add_action('init','woo_options');  

?>