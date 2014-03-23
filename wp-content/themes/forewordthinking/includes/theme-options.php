<?php

function woo_options(){

// VARIABLES
$themename = "Foreword";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/forword-thinking/';
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

$options[] = array(	"name" => "Feedburner RSS ID",
					"desc" => "Enter your Feedburner ID here.",
					"id" => $shortname."_feedburner_id",
					"std" => "",
					"type" => "text");							
                    
$options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea");
					
$options[] = array(	"name" => "Sidebar on the left or right?",
					"desc" => "Check this box, if you'd like to display the sidebar on the right. If unchecked, the sidebar will default to the left.",
					"id" => $shortname."_right_sidebar",
					"std" => "true",
					"type" => "checkbox");				 							    	

$options[] = array(	"name" => "Navigation Settings",
					"type" => "heading");	
					
$options[] = array(	"name" => "Display page navigation in footer.",
					"desc" => "Display page navigation in footer above the credit line.",
					"id" => $shortname."_nav_footer",
					"std" => "true",
					"type" => "checkbox");
					
$options[] = array(	"name" => "Archive page URL",
					"desc" => "Please enter the URL to a page dedicated to the archives",
					"id" => $shortname."_archives",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Layout Options",
					"type" => "heading");	

$options[] = array(	"name" => "Featured Posts",
					"desc" => "Select the number of featured posts you'd like to display. <br />NOTE: Set total number of posts to show on home page in WordPress admin under Settings -> Reading -> Blog posts to show at most.",
					"id" => $shortname."_featured_posts",
					"std" => "Select a number:",
					"type" => "select",
					"options" => $other_entries);					
					
$options[] = array(	"name" => "Box Colors",
					"desc" => "Enter your box colors in hex value here seperated by commas (e.g. #000000, #00CC00, #CCFF00).<br/>You can find hex values with <a href=\"http://www.colorpicker.com/\">this tool</a> ",
					"id" => $shortname."_box_colors",
					"std" => "",
					"type" => "text");						

$options[] = array(	"name" => "Personal Information",
						"type" => "heading");
						
$options[] = array(	"name" => "About You",
					"desc" => "Include a little bio for yourself here, that will be displayed on the blog view.",
					"id" => $shortname."_bio",
					"std" => "",
					"type" => "textarea");						
					
$options[] = array(	"name" => "About the blog page URL",
					"desc" => "Please enter the URL to a page where you want more info about you eg. http://www.yoursite.com/about/",
					"id" => $shortname."_about",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Twitter Username",
					"desc" => "Enter your Twitter username to show your latest tweet instead of the top 468x60 ad.",
					"id" => $shortname."_twitter",
					"std" => "",
					"type" => "text");	
					
$options[] = array(	"name" => "Featured Page Modules on Home Page",
						"type" => "heading");
						
$options[] = array(	"name" => "Home Page Box #1 - Page ID",
						"desc" => "Enter the ID of the page that you'd like to display in this info box.",
						"id" => $shortname."_more1_ID",
						"std" => "",
						"type" => "text");

$options[] = array(	"name" => "Home Page Box #1 - Link Text",
						"desc" => "Enter the text for the action link.",
						"id" => $shortname."_more1_link",
						"std" => "Click here for more info",
						"type" => "text");

$options[] = array(	"name" => "Home Page Box #1 - Link URL",
						"desc" => "Enter the destination URL for the action link.",
						"id" => $shortname."_more1_url",
						"std" => "",
						"type" => "text");												

$options[] = array(	"name" => "Home Page Box #2 - Page ID",
						"desc" => "Enter the ID of the page that you'd like to display in this info box.",
						"id" => $shortname."_more2_ID",
						"std" => "",
						"type" => "text");

$options[] = array(	"name" => "Home Page Box #2 - Link Text",
						"desc" => "Enter the text for the action link.",
						"id" => $shortname."_more2_link",
						"std" => "Click here for more info",
						"type" => "text");

$options[] = array(	"name" => "Home Page Box #2 - Link URL",
						"desc" => "Enter the destination URL for the action link.",
						"id" => $shortname."_more2_url",
						"std" => "",
						"type" => "text");

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

$options[] = array( "name" => "Post Thumbnails",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_thumb_width',
											'type' => 'text',
											'std' => 100,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_thumb_height',
											'type' => 'text',
											'std' => 100,
											'meta' => 'Height')
								  ));		

$options[] = array( "name" => "Featured Images",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_image_width',
											'type' => 'text',
											'std' => 278,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_image_height',
											'type' => 'text',
											'std' => 150,
											'meta' => 'Height')
								  ));										  						
					
$options[] = array(	"name" => "Disable Single Post",
					"desc" => "Check this if you don't want to display the thumbnail on the single posts.",
					"id" => $shortname."_image_single",
					"std" => "false",
					"type" => "checkbox");		

$options[] = array( "name" => "Single Posts",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_single_width',
											'type' => 'text',
											'std' => 610,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_single_height',
											'type' => 'text',
											'std' => 200,
											'meta' => 'Height')
								  ));																					
																			    								

$options[] = array(	"name" => "Banner Ads Sidebar - Widget (200X125)",
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

update_option('woo_template',$options);      
update_option('woo_themename',$themename);   
update_option('woo_shortname',$shortname);
update_option('woo_manual',$manualurl);

                                     
// Woo Metabox Options
                    
$woo_metaboxes = array(

		"image" => array (
			"name"		=> "image",
			"default" 	=> "",
			"label" 	=> "Image",
			"type" 		=> "upload",
			"desc"      => "Enter the URL for image to be used by the Dynamic Image resizer."
		)
		
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