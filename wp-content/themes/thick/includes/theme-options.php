<?php

function woo_options(){

// VARIABLES
$themename = "THiCK";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/thick/';
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
$alt_colours = array("default.css","blue.css","green.css","orange.css","pink.css");
$layouts = array("header.php","header-alt.php");

// CATEGORY NAVIGATION

function category_nav($options) {

	$options[] = array(	"name" =>  "Category Navigation",
		"type" => "heading");	

	$cats = get_categories('hide_empty=0');

	foreach ($cats as $cat) {

			$options[] = array(	"name" =>  $cat->cat_name,
						"desc" => "Check this box if you wish to display this category link in the sidebar widget (left).",
						"id" => "woo_cat_nav_".$cat->cat_ID,
						"std" => "",
						"type" => "checkbox");					
	
	}

	return $options;
	
}

// THIS IS THE DIFFERENT FIELDS
$options = array();   

$options[] = array( "name" => "General Settings",
                    "type" => "heading");
                        
		$options[] = array(	"name" => "Theme Stylesheet",
						"desc" => "Please select your stylesheet here.",
					    "id" => $shortname."_alt_stylesheet",
					    "std" => "",
					    "type" => "select",
					    "options" => $alt_stylesheets);

		$options[] = array(	"name" => "Theme Colour Sheet",
						"desc" => "Please select your colour scheme here.",
					    "id" => $shortname."_alt_colours",
					    "std" => "",
					    "type" => "select",
					    "options" => $alt_colours);		    

		$options[] = array(	"name" => "Header Layout",
						"desc" => "Choose one of the two layouts for the header of your template.",
			    		"id" => $shortname."_layout",
			    		"std" => "header.php",
			    		"type" => "select",
			    		"options" => $layouts);	    

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
                    
		$options[] = array(	"name" => "Feedburner ID",
						"desc" => "Enter your Feedburner ID here.",
			    		"id" => $shortname."_feedburner_id",
			    		"std" => "",
			    		"type" => "text");			

		$options[] = array(	"name" => "Archives Page URL",
					"desc" => "Please enter your archive page URL.",
					"id" => $shortname."_archives",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea");					

		$options[] = array(	"name" => "About You",
						"type" => "heading");

		$options[] = array(	"name" => "About you blurb",
					"desc" => "Type out your bio blurb here, which will be displayed in the header of the template.",
					"id" => $shortname."_about",
					"std" => "",
					"type" => "textarea");

		$options[] = array(	"name" => "Read more about you link",
					"desc" => "Enter the full link to your bio / about page here i.e. http://yourwebsite.com/about/.",
					"id" => $shortname."_aboutlink",
					"std" => "",
					"type" => "text");						

	$options = category_nav($options); 	

		$options[] = array(	"name" => "Social Profiles",
						"type" => "heading");									

		$options[] = array(	"name" => "Twitter username",
					"desc" => "Enter your Twitter username to enable the Twitter update status in the header.",
					"id" => $shortname."_twitter",
					"std" => "",
					"type" => "text");				

		$options[] = array(	"name" => "Flickr Username",
						"desc" => "Enter your Flickr Username here.",
			    		"id" => $shortname."_flickr",
			    		"std" => "",
			    		"type" => "text");				

		$options[] = array(	"name" => "Flickr ID",
						"desc" => "Use <a href='http://idgettr.com/'>idGettr to find it.</a>",
			    		"id" => $shortname."_flickr_id",
			    		"std" => "",
			    		"type" => "text");			

		$options[] = array(	"name" => "Delicious Username",
						"desc" => "Enter your Delicious Username here.",
			    		"id" => $shortname."_delicious",
			    		"std" => "",
			    		"type" => "text");					    			

		$options[] = array(	"name" => "Digg Profile URL",
						"desc" => "Enter your Digg Profile URL here.",
			    		"id" => $shortname."_digg",
			    		"std" => "",
			    		"type" => "text");					 

		$options[] = array(	"name" => "Facebook Profile URL",
						"desc" => "Enter your Facebook Profile URL here.",
			    		"id" => $shortname."_facebook",
			    		"std" => "",
			    		"type" => "text");					 		

		$options[] = array(	"name" => "LinkedIn Profile URL",
						"desc" => "Enter your LinkedIn URL here.",
			    		"id" => $shortname."_linkedin",
			    		"std" => "",
			    		"type" => "text");		

		$options[] = array(	"name" => "Last.fm Profile URL",
						"desc" => "Enter your Last.fm URL here.",
			    		"id" => $shortname."_lastfm",
			    		"std" => "",
			    		"type" => "text");			

		$options[] = array(	"name" => "Youtube Profile URL",
						"desc" => "Enter your Youtube URL here.",
			    		"id" => $shortname."_youtube",
			    		"std" => "",
			    		"type" => "text");		

		$options[] = array(	"name" => "StumbleUpon Profile URL",
						"desc" => "Enter your StumbleUpon URL here.",
			    		"id" => $shortname."_stumble",
			    		"std" => "",
			    		"type" => "text");					    						    				    					    			    		   						    							    												

		$options[] = array(	"name" => "Homepage",
						"type" => "heading");

		$options[] = array(	"name" => "Homepage Entries",
						"desc" => "Select the number of secondary entries you'd like to display on the homepage.",
			    		"id" => $shortname."_other_entries",
			    		"std" => "Select a Number:",
			    		"type" => "select",
			    		"options" => $other_entries);			    		

		$options[] = array(	"name" => "Enable Image Resizer?",
					"desc" => "Check this box if you wish to use the thumb.php image resizer on your latest. <br />Instructions for adding images to pages are found in the <a href='http://www.woothemes.com/support/theme-documentation/over-easy/'>Theme Documentation.</a> Please read <a href='http://www.woothemes.com/2008/10/troubleshooting-image-resizer-thumbphp/'>Troubleshooting Image Resizer</a> if your images do not resize properly.",
					"id" => $shortname."_resize",
					"std" => "false",
					"type" => "checkbox");				    		

		$options[] = array(	"name" => "Asides",
						"type" => "heading");

		$options[] = array( 	"name" => "Asides Category",
					   	"desc" => "Select the category that you would like to have displayed as asides (and thus excluded from other homepage areas).",
						"id" => $shortname."_asides_category",
						"std" => "Select a category:",
						"type" => "select",
						"options" => $woo_categories);

		$options[] = array(	"name" => "Number of Asides",
						"desc" => "Select the number of asides to display.",
			    		"id" => $shortname."_asides_entries",
			    		"std" => "Select a Number:",
			    		"type" => "select",
			    		"options" => $other_entries);												

		$options[] = array(	"name" => "Banner Ad Management (120x240 Sidebar Unit)",
						"type" => "heading");

		$options[] = array(	"name" => "120x240 Sidebar Ad - Image Location",
						"desc" => "Enter the URL for this block ad.",
						"id" => $shortname."_side_image",
						"std" => $template_path . "/styles/clean-light/images/ad-120x240.jpg",
						"type" => "text");
						
		$options[] = array(	"name" => "120x240 Sidebar - Destination",
						"desc" => "Enter the URL where this block ad points to.",
			    		"id" => $shortname."_side_url",
						"std" => "http://www.woothemes.com",
			    		"type" => "text");

		$options[] = array(	"name" => "Banner Ad Management (125x125)",
						"type" => "heading");

		$options[] = array(	"name" => "Disable these ad units?",
					"desc" => "Check this box if you wish to disable the units on the homepage.",
					"id" => $shortname."_ads",
					"std" => "false",
					"type" => "checkbox");				 						

		$options[] = array(	"name" => "Banner Ad #1 - Image Location",
						"desc" => "Enter the URL for this banner ad.",
						"id" => $shortname."_ad_image_1",
						"std" => $template_path . "/images/ad-125x125.gif",
						"type" => "text");
						
		$options[] = array(	"name" => "Banner Ad #1 - Destination",
						"desc" => "Enter the URL where this banner ad points to.",
			    		"id" => $shortname."_ad_url_1",
						"std" => "http://example.com/ads/ad1_destination.html",
			    		"type" => "text");					

		$options[] = array(	"name" => "Banner Ad #2 - Image Location",
						"desc" => "Enter the URL for this banner ad.",
						"id" => $shortname."_ad_image_2",
						"std" => $template_path . "/images/ad-125x125.gif",
						"type" => "text");
						
		$options[] = array(	"name" => "Banner Ad #2 - Destination",
						"desc" => "Enter the URL where this banner ad points to.",
			    		"id" => $shortname."_ad_url_2",
						"std" => "http://example.com/ads/ad1_destination.html",
			    		"type" => "text");

		$options[] = array(	"name" => "Banner Ad #3 - Image Location",
						"desc" => "Enter the URL for this banner ad.",
						"id" => $shortname."_ad_image_3",
						"std" => $template_path . "/images/ad-125x125.gif",
						"type" => "text");
						
		$options[] = array(	"name" => "Banner Ad #3 - Destination",
						"desc" => "Enter the URL where this banner ad points to.",
			    		"id" => $shortname."_ad_url_3",
						"std" => "http://example.com/ads/ad1_destination.html",
			    		"type" => "text");

		$options[] = array(	"name" => "Banner Ad #4 - Image Location",
						"desc" => "Enter the URL for this banner ad.",
						"id" => $shortname."_ad_image_4",
						"std" => $template_path . "/images/ad-125x125.gif",
						"type" => "text");
						
		$options[] = array(	"name" => "Banner Ad #4 - Destination",
						"desc" => "Enter the URL where this banner ad points to.",
			    		"id" => $shortname."_ad_url_4",
						"std" => "http://example.com/ads/ad1_destination.html",
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