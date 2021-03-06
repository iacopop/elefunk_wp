<?php

function woo_options(){

// VARIABLES
$themename = "Papercut";
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

// CATEGORY NAVIGATION

function category_nav($options) {

	$options[] = array(	"name" =>  "Category Navigation",
		"type" => "heading");	

	$cats = get_categories('hide_empty=0');

	foreach ($cats as $cat) {

			$options[] = array(	"name" =>  $cat->cat_name,
						"desc" => "Check this box if you wish to display this category link in the main navigation (top).",
						"id" => "woo_cat_nav_".$cat->cat_ID,
						"std" => "",
						"type" => "checkbox");					
	
	}

	return $options;
	
}

// CATEGORY LISTING (MIDDLE)

function category_middle($options) {		

	$cats = get_categories('hide_empty=0');

	foreach ($cats as $cat) {

			$options[] = array(	"name" =>  $cat->cat_name,
						"desc" => "Check this box if you wish to include this category in the middle panel category listings (homepage).",
						"id" => "woo_cat_mid_".$cat->cat_ID,
						"std" => "",
						"type" => "checkbox");					
	
	}

	return $options;
	
}

// THIS IS THE DIFFERENT FIELDS
$options = array();   

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
                    
$options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea");           

$options[] = array(	"name" => "Archives Page",
					"desc" => "Please select your archive page. TIP: Add your archive by creating a new page (Write > Page), and selecting the 'Archive' page template.",
					"id" => $shortname."_archives",
					"std" => "Select a page:",
					"type" => "select",
					"options" => $woo_pages);

$options = category_nav($options); 							

$options[] = array(	"name" => "Featured Section (Home)",
					"type" => "heading");					

$options[] = array( "name" => "Featured Category",
					"desc" => "Select the category that you would like to have displayed in the featured section on your homepage.",
					"id" => $shortname."_featured_category",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $woo_categories);

$options[] = array(	"name" => "Large Secondary Posts",
					"desc" => "Select the number of large posts you'd like to display below the featured section on the homepage.",
					"id" => $shortname."_home_secondary",
					"std" => "Select a number:",
					"type" => "select",
					"options" => $other_entries);					

$options[] = array(	"name" =>  "Category Listings (Middle)",
					"type" => "heading");

$options[] = array(	"name" => "Posts per category",
					"desc" => "Select the number of posts you'd like to display from each category listed below.",
					"id" => $shortname."_cat_list",
					"std" => "Select a Number:",
					"type" => "select",
					"options" => $other_entries);

$options = category_middle($options);

$options[] = array(	"name" => "Display Content or The Excerpt (Homepage Only)",
					"type" => "heading");

$options[] = array(	"name" => "Featured Section",
					"desc" => "If checked, this section will display the full post content. If unchecked it will display the excerpt only.",
					"id" => $shortname."_content_feat",
					"std" => "true",
					"type" => "checkbox");	

$options[] = array(	"name" => "Left Posts Panel",
					"desc" => "If checked, this section will display the full post content. If unchecked it will display the excerpt only.",
					"id" => $shortname."_content_left",
					"std" => "false",
					"type" => "checkbox");											

$options[] = array(	"name" => "Mid Posts Panel",
					"desc" => "If checked, this section will display the full post content. If unchecked it will display the excerpt only.",
					"id" => $shortname."_content_mid",
					"std" => "false",
					"type" => "checkbox");																

$options[] = array(	"name" => "Dynamic Images",
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

$options[] = array( "name" => "Featured Images",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_image_width',
											'type' => 'text',
											'std' => 200,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_image_height',
											'type' => 'text',
											'std' => 200,
											'meta' => 'Height')
								  ));			

$options[] = array( "name" => "Post Thumbnails",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_thumb_width',
											'type' => 'text',
											'std' => 75,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_thumb_height',
											'type' => 'text',
											'std' => 75,
											'meta' => 'Height')
								  ));																			    								

$options[] = array(	"name" => "Disable Single Post",
					"desc" => "Check this if you don't want to display the image on the single posts.",
					"id" => $shortname."_image_disable",
					"std" => "false",
					"type" => "checkbox");																

$options[] = array(	"name" => "Sidebar Components",
					"type" => "heading");
					
$options[] = array(	"name" => "Flickr ID",
					"desc" => "Use <a href='http://idgettr.com/'>idGettr to find it.</a>",
					"id" => $shortname."_flickr_id",
					"std" => "",
					"type" => "text");											

$options[] = array(	"name" => "Number photos",
					"desc" => "Select the number of photos to display in flickr sidebar box. (3 per row)",
					"id" => $shortname."_flickr_entries",
					"std" => "Select a Number:",
					"type" => "select",
					"options" => $other_entries);																						

$options[] = array(	"name" => "Banner Ad Management (468x60 Banner)",
					"type" => "heading");

$options[] = array(	"name" => "Disable 468x60 Banner",
					"desc" => "Check this box if you wish to ignore the 468x60 Banner.",
					"id" => $shortname."_not_mpu",
					"std" => "false",
					"type" => "checkbox");

$options[] = array(	"name" => "468x60 Banner Ad - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_block_image",
					"std" => $template_path . "/images/468x60-woothemes.gif",
					"type" => "text");
						
$options[] = array(	"name" => "468x60 Banner Ad - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_block_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad Management (125x125)",
					"type" => "heading");

$options[] = array(	"name" => "Banner Ad #1 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_1",
					"std" => $template_path . "/images/125x125.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #1 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_1",
					"std" => "http://example.com/ads/ad1_destination.html",
					"type" => "text");						

$options[] = array(	"name" => "Banner Ad #2 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_2",
					"std" => $template_path . "/images/125x125.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #2 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_2",
					"std" => "http://example.com/ads/ad1_destination.html",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad #3 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_3",
					"std" => $template_path . "/images/125x125.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #3 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_3",
					"std" => "http://example.com/ads/ad1_destination.html",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad #4 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_4",
					"std" => $template_path . "/images/125x125.gif",
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