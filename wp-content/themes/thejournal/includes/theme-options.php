<?php
function woo_options(){
// VARIABLES
$themename = "The Journal";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/the-journal/';
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


$woo_all_tags = get_tags();
$woo_all_the_tags[] = '';
foreach($woo_all_tags as $woo_the_tag){
    $woo_all_the_tags[] = $woo_the_tag->slug;
}     

// THIS IS THE DIFFERENT FIELDS
$options[] = array(	"name" => "General Settings",
					"type" => "heading");
						
$options[] = array(    "name" => "Theme Stylesheet",
                                        "desc" => "Select an alternative color scheme.",
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
                    
$options[] = array( "name" => "Content Management",
                                    "type" => "heading");    

$options[] = array( "name" => "Highlights Tag",
                                    "desc" => "The tag chosen here will display posts tagged with it in the highlights area of the header.",
                                    "id" => $shortname."_highlights_tag",
                                    "std" => "highlights",  
                                    "type" => "select",
                                    "options" => $woo_all_the_tags);

$options[] = array( "name" => "Highlights Amount",
                                    "desc" => "Limit the amount of post in the Highlights section.",
                                    "id" => $shortname."_highlights_tag_amount",
                                    "std" => 6,  
                                    "type" => "text");
                    
$options[] = array( "name" => "Featured Tag",
                                    "desc" => "The tag chosen here will display posts tagged with it on the home page on either side of the home page tabber.",
                                    "id" => $shortname."_featured_tag",
                                    "std" => "featured",
                                    "type" => "select",
                                    "options" => $woo_all_the_tags); 
                                    
$options[] = array( "name" => "Featured Sidebar Amount",
                                    "desc" => "Limit the amount of post in the Featured sidebar section.",
                                    "id" => $shortname."_featured_tag_amount",
                                    "std" => 3,  
                                    "type" => "text");             	

$options[] = array(	"name" => "Layout Options",
					                    "type" => "heading");
                    
$options[] = array(    "name" => "Highlights Section",
                                        "desc" => "Uncheck to disable this section in your theme.",
                                        "id" => $shortname."_highlights_show",
                                        "std" => "true",
                                        "type" => "checkbox");    
                    
$options[] = array(    "name" => "'Also in this Site' Slider Section",
                                    "desc" => "Uncheck to disable this section in your theme.",
                                    "id" => $shortname."_also_slider_enable",
                                    "std" => "true",
                                    "type" => "checkbox");                         

$options[] = array( "name" => "Homepage Slider Heading",
                                    "desc" => "Default is 'Also on this site', change this to your liking.",
                                    "id" => $shortname."_slider_heading",
                                    "std" => "Also in this site",
                                    "type" => "text");
                    
$options[] = array( "name" => "Link to Archives from Header Recent Posts",
                                    "desc" => "This is the location that the 'Archives' link points to in the recent articles section in the header. Enter an empty save to disable it.",
                                    "id" => $shortname."_recent_archives",
                                    "std" => "#",
                                    "type" => "text");  
                           
$options[] = array(    "name" => "Display Excerpts on Archive pages",
                                        "desc" => "Select this if you want trimmed versions of your posts displayed on archive pages.",
                                        "id" => $shortname."_excerpt_enable",
                                        "std" => "false",
                                        "type" => "checkbox");        
                    
$options[] = array(    "name" => "Category Navigation",
                                        "desc" => "Swap the Page navigation with a Category navigation",
                                        "id" => $shortname."_cat_menu",
                                        "std" => "false",
                                        "type" => "checkbox");    

$options[] = array( "name" => "Exclude Pages or Categories from Navigation",
                                        "desc" => "Enter a comma-separated list of <a href='http://support.wordpress.com/pages/8/'>ID's</a> that you'd like to exclude from the top navigation. (e.g. 12,23,27,44)",
                                        "id" => $shortname."_nav_exclude",
                                        "std" => "",
                                        "type" => "text"); 
                  
$options[] = array( "name" => "Contact Us page ID",
                                    "desc" => "Add you 'Contact' page ID to dynamically create a link in the top of the theme.",
                                    "id" => $shortname."_contact_page_id",
                                    "std" => "",
                                    "type" => "text");   

$options[] = array(    "name" => "Dynamic Images",
                                        "type" => "heading");    

$options[] = array(    "name" => "Enable Dynamic Image Resizer",
                                    "desc" => "This will enable the thumb.php script. It dynamically resizes images on your site.",
                                    "id" => $shortname."_resize",
                                    "std" => "true",
                                    "type" => "checkbox");    
                    
$options[] = array(    "name" => "Automatic Image Thumbs",
                                        "desc" => "If no image is specified in the 'image' custom field then the first uploaded post image is used.",
                                        "id" => $shortname."_auto_img",
                                        "std" => "false",
                                        "type" => "checkbox"); 
                    
$options[] = array(    "name" => "Featured Image (homepage)",
                                    "desc" => "Enter an integer value i.e. 250 for the desired sizes which will be used when dynamically creating the images.",
                                    "id" => $shortname."_image_dimentions",
                                    "std" => "",
                                    "type" => array( 
                                                        array(
                                                                'id' => $shortname. '_featured_image_dimentions_height',
                                                                'type' => 'text',
                                                                'std' => 371,
                                                                'meta' => 'Height'
                                                                )
                                                      )
                                        );      

$options[] = array(    "name" => "Featured side-column Images (homepage)",
                                        "desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
                                        "id" => $shortname."_image_dimentions",
                                        "std" => "",
                                        "type" => array( 
                                                            array(
                                                                    'id' => $shortname. '_featured_sidebar_image_dimentions_height',
                                                                    'type' => 'text',
                                                                    'std' => 78,
                                                                    'meta' => 'Height'
                                                                    )
                                                          )
                                            );  
                        
$options[] = array(    "name" => "Highlights Images (header)",
                                        "desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
                                        "id" => $shortname."_image_dimentions",
                                        "std" => "",
                                        "type" => array( 
                                                            array(
                                                                    'id' => $shortname. '_hightlights_image_dimentions_height',
                                                                    'type' => 'text',
                                                                    'std' => 75,
                                                                    'meta' => 'Height'
                                                                    )
                                                          )
                                            );  
                        
$options[] = array(    "name" => "Images (homepage)",
                                        "desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
                                        "id" => $shortname."_image_dimentions",
                                        "std" => "",
                                        "type" => array( 
                                                            array(
                                                                    'id' => $shortname. '_also_slider_image_dimentions_height',
                                                                    'type' => 'text',
                                                                    'std' => 144,
                                                                    'meta' => 'Height'
                                                                    )
                                                          )
                                            );                          

$options[] = array(    "name" => "Single Post page Image",
                                        "desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
                                        "id" => $shortname."_image_dimentions",
                                        "std" => "",
                                        "type" => array( 
                                                            array(
                                                                    'id' => $shortname. '_single_post_image_width',
                                                                    'type' => 'text',
                                                                    'std' => 280,
                                                                    'meta' => 'Width'
                                                                    ),
                                                            array(
                                                                    'id' => $shortname. '_single_post_image_height',
                                                                    'type' => 'text',
                                                                    'std' => 380,
                                                                    'meta' => 'Height'
                                                                    )
                                                          )
                                            );
                                        
                    
$options[] = array(    "name" => "Archive page Image",
                                        "desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
                                        "id" => $shortname."_image_dimentions",
                                        "std" => "",
                                        "type" => array( 
                                                            array(
                                                                    'id' => $shortname. '_archive_page_image_width',
                                                                    'type' => 'text',
                                                                    'std' => 200,
                                                                    'meta' => 'Width'
                                                                    ),
                                                            array(
                                                                    'id' => $shortname. '_archive_page_image_height',
                                                                    'type' => 'text',
                                                                    'std' => 220,
                                                                    'meta' => 'Height'
                                                                    )
                                                          )
                                            );
                        
					    								
//Advertising

// - Header Banner (468x60px)
$options[] = array(    "name" => "Ads - Header Banner (468x60px)",
                    "type" => "heading");

$options[] = array(    "name" => "Enable this Ad",
                    "desc" => "Enable this Ad space, but disable the Recent Post insert.",
                    "id" => $shortname."_ad_header",
                    "std" => "false",
                    "type" => "checkbox");    

$options[] = array(    "name" => "Adsense code",
                    "desc" => "Enter your adsense code (or other ad network code) here.",
                    "id" => $shortname."_ad_header_code",
                    "std" => "",
                    "type" => "textarea");

$options[] = array(    "name" => "Image Location",
                    "desc" => "Enter or upload the Ad Image from here.",
                    "id" => $shortname."_ad_header_image",
                    "std" => "http://woothemes.com/ads/woothemes-468x60-2.gif",
                    "type" => "upload");

$options[] = array(    "name" => "Image Destination",
                    "desc" => "Enter the destination URL for this banner advert.",
                    "id" => $shortname."_ad_header_url",
                    "std" => "http://www.woothemes.com",
                    "type" => "text");  
  
 // - Archive Content Ad               
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

$options[] = array(    "name" => "Destination URL",
                                    "desc" => "Enter the URL where this banner ad points to.",
                                    "id" => $shortname."_ad_content_url",
                                    "std" => "http://www.woothemes.com",
                                    "type" => "text");        

// - Leaderboard in the Footer
$options[] = array(	"name" => "Ads - Footer Leaderboard (728x90px)",
					"type" => "heading");

$options[] = array(	"name" => "Enable this Ad",
					"desc" => "Enable this Ad space",
					"id" => $shortname."_ad_leaderboard_f",
					"std" => "true",
					"type" => "checkbox");	

$options[] = array(	"name" => "Adsense code",
					"desc" => "Enter your adsense code (or other ad network code) here.",
					"id" => $shortname."_ad_leaderboard_f_code",
					"std" => "",
					"type" => "textarea");

$options[] = array(	"name" => "Image Location",
					"desc" => "Enter or upload the Ad Image from here.",
					"id" => $shortname."_ad_leaderboard_f_image",
					"std" => "http://www.woothemes.com/ads/woothemes-728x90-2.gif",
					"type" => "upload");

$options[] = array(	"name" => "Image Destination",
					"desc" => "Enter the destination URL for this banner advert.",
					"id" => $shortname."_ad_leaderboard_f_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");	
                    
                    
                    
    					

// Woo Metabox Options
                    
$woo_metaboxes = array(

        "image" => array (
            "name"        => "image",
            "std"     => "",
            "label"     => "Image",
            "type"         => "upload",
            "desc"      => "Upload file here..."
        ),
         "image_desc" => array (
            "name"        => "image_desc",
            "std"     => "",
            "label"     => "Image Caption",
            "type"         => "text",
            "desc"      => "Add a caption to your Featured image."
        )
    );
    

update_option('woo_template',$options);      
update_option('woo_themename',$themename);   
update_option('woo_shortname',$shortname);  
update_option('woo_manual',$manualurl);           

update_option('woo_custom_template',$woo_metaboxes);  
    
}

add_action('init','woo_options');
    
?>