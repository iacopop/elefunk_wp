<?php

function woo_options(){
// VARIABLES
$themename = "Fresh News";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/fresh-news/';
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
$woo_options_select = array("one","two","three","four","five"); 
$woo_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

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
$woo_options = array();   

$woo_options[] = array( "name" => "General Settings",
                    "type" => "heading");

$woo_options[] = array( "name" => "Theme Stylesheet",
					"desc" => "Select your themes alternative color scheme.",
					"id" => $shortname."_alt_stylesheet",
					"std" => "default.css",
					"type" => "select",
					"options" => $alt_stylesheets);

$woo_options[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");    

$woo_options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 

$woo_options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");        

$woo_options[] = array( "name" => "RSS URL",
					"desc" => "Enter your preferred RSS URL. (Feedburner or other)",
					"id" => $shortname."_feedburner_url",
					"std" => "",
					"type" => "text");
                    
$options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea");
                    
$woo_options[] = array( "name" => "E-Mail URL",
					"desc" => "Enter your preferred e-mail subscription URL. (Feedburner or other)",
					"id" => $shortname."_feedburner_id",
					"std" => "",
					"type" => "text");

$woo_options[] = array(	"name" => "Display author info?",
					"desc" => "Display author info below single posts. Set this by editing your user in WP admin and adding text in 'Biographical Info'.",
					"id" => $shortname."_author",
					"std" => "false",
					"type" => "checkbox");	

$woo_options[] = array(	"name" => "Front Page Layout",
					"type" => "heading");

$woo_options[] = array(	"name" => "Featured Posts",
					"desc" => "Select the number of featured posts you'd like to display. <br />NOTE: Set total number of posts to show on home page in WordPress admin under Settings -> Reading -> Blog posts to show at most.",
					"id" => $shortname."_featured_posts",
					"std" => "Select a number:",
					"type" => "select",
					"options" => $other_entries);	

$woo_options[] = array(	"name" => "Show Content > Featured Posts",
					"desc" => "Show the post content instead of excerpt on featured posts.",
					"id" => $shortname."_content_feat",
					"std" => "false",
					"type" => "checkbox");	

$woo_options[] = array(	"name" => "Show Content > Normal Posts",
					"desc" => "Show the post content instead of excerpt on normal posts.",
					"id" => $shortname."_content",
					"std" => "false",
					"type" => "checkbox");	

$woo_options[] = array(	"name" => "One Column Normal Posts",
					"desc" => "Show normal posts in one column instead of default two columns",
					"id" => $shortname."_home_one_col",
					"std" => "false",
					"type" => "checkbox");	

$woo_options[] = array(	"name" => "Sidebar Components",
						"type" => "heading");

$woo_options[] = array(	"name" => "Disable Sidebar Tabs",
					"desc" => "Disable the tabs in the sidebar if you don't wish to use them.",
					"id" => $shortname."_tabs",
					"std" => "false",
					"type" => "checkbox");	
						
$woo_options[] = array(	"name" => "Video Category",
					"desc" => "Select the category to use with your Video Player Widget (video category will be excluded from home page).",
					"id" => $shortname."_video_category",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $woo_categories);
					
$woo_options[] = array( "name" => "Asides Category",
					"desc" => "Select the category that you would like to have displayed as asides (excluded from other homepage areas).",
					"id" => $shortname."_asides_category",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $woo_categories);

$woo_options[] = array(	"name" => "Image Resizer",
					"type" => "heading");

$woo_options[] = array( "name" => "Enable Dynamic Image Resizer",
					"desc" => "This will enable the thumb.php script. It dynamically resizes images on your site.",
					"id" => $shortname."_resize",
					"std" => "true",
					"type" => "checkbox");    
	
$woo_options[] = array( "name" => "Automatic Image Thumbs",
					"desc" => "If no image is specified in the 'image' custom field then the first uploaded post image is used.",
					"id" => $shortname."_auto_img",
					"std" => "false",
					"type" => "checkbox"); 
                    
$woo_options[] = array( "name" => "Featured Image (homepage)",
					"desc" => "Enter an integer value i.e. 250 for the desired sizes which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(
											'id' => $shortname. '_feat_image_width',
											'type' => 'text',
											'std' => 540,
											'meta' => 'Width'
											),
									array(
											'id' => $shortname. '_feat_image_height',
											'type' => 'text',
											'std' => 195,
											'meta' => 'Height'
											)
								  )
					   );      
                        
$woo_options[] = array( "name" => "Thumbnails",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(
											'id' => $shortname. '_thumb_image_width',
											'type' => 'text',
											'std' => 75,
											'meta' => 'Width'
											),
									array(
											'id' => $shortname. '_thumb_image_height',
											'type' => 'text',
											'std' => 75,
											'meta' => 'Height'
											)
								  )
						);

$woo_options[] = array(	"name" => "Disable Single Post",
					"desc" => "Check this if you don't want to display the thumbnail on the single posts.",
					"id" => $shortname."_image_single",
					"std" => "false",
					"type" => "checkbox");																

$woo_options[] = array( "name" => "Single Post page Image",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(
											'id' => $shortname. '_single_image_width',
											'type' => 'text',
											'std' => 100,
											'meta' => 'Width'
											),
									array(
											'id' => $shortname. '_single_image_height',
											'type' => 'text',
											'std' => 100,
											'meta' => 'Height'
											)
								  )
						);

$woo_options[] = array(	"name" => "Banner Ad Sidebar - Widget (300x250)",
					"type" => "heading");

$woo_options[] = array(	"name" => "Adsense code",
					"desc" => "Enter your adsense code here.",
					"id" => $shortname."_ad_300_adsense",
					"std" => "",
					"type" => "textarea");

$woo_options[] = array(	"name" => "Banner Ad Content - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_300_image",
					"std" => "http://www.woothemes.com/ads/woothemes-300x250-2.gif",
					"type" => "text");

$woo_options[] = array(	"name" => "Banner Ad Content - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_300_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");						

$woo_options[] = array(	"name" => "Banner Ads Sidebar - Widget (125x125)",
					"type" => "heading");

$woo_options[] = array(	"name" => "Rotate banners?",
					"desc" => "Check this to randomly rotate the banner ads.",
					"id" => $shortname."_ads_rotate",
					"std" => "true",
					"type" => "checkbox");	

$woo_options[] = array(	"name" => "Banner Ad #1 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_1",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-1.gif",
					"type" => "text");
						
$woo_options[] = array(	"name" => "Banner Ad #1 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_1",
					"std" => "http://www.woothemes.com",
					"type" => "text");						

$woo_options[] = array(	"name" => "Banner Ad #2 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_2",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-2.gif",
					"type" => "text");
						
$woo_options[] = array(	"name" => "Banner Ad #2 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_2",
					"std" => "http://www.woothemes.com",
					"type" => "text");

$woo_options[] = array(	"name" => "Banner Ad #3 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_3",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-3.gif",
					"type" => "text");
						
$woo_options[] = array(	"name" => "Banner Ad #3 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_3",
					"std" => "http://www.woothemes.com",
					"type" => "text");

$woo_options[] = array(	"name" => "Banner Ad #4 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_4",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-4.gif",
					"type" => "text");
						
$woo_options[] = array(	"name" => "Banner Ad #4 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_4",
					"std" => "http://www.woothemes.com",
					"type" => "text");

$woo_options[] = array(	"name" => "Banner Ad #5 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_5",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-4.gif",
					"type" => "text");
						
$woo_options[] = array(	"name" => "Banner Ad #5 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_5",
					"std" => "http://www.woothemes.com",
					"type" => "text");

$woo_options[] = array(	"name" => "Banner Ad #6 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_6",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-4.gif",
					"type" => "text");
						
$woo_options[] = array(	"name" => "Banner Ad #6 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_6",
					"std" => "http://www.woothemes.com",
					"type" => "text");

update_option('woo_template',$woo_options);      
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
        )
    );
    
update_option('woo_custom_template',$woo_metaboxes);      

/*
function woo_update_options(){
        $woo_options = get_option('woo_template',$woo_options);  
        foreach ($woo_options as $option){
            update_option($option['id'],$option['std']);
        }   
}

function woo_add_options(){
        $woo_options = get_option('woo_template',$woo_options);  
        foreach ($woo_options as $option){
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