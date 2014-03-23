<?php



function woo_options(){
// VARIABLES
$themename = "Mortar";
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
$options_select = array("two","three","four"); 
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
$layouts = array("1_column.php","2_columns.php","3_columns.php","4_columns.php");

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
					
$options[] = array( "name" => "Enable Twitter",
                    "desc" => "Check this box to enable Twitter functionality in the header. You could alternatively have an advertising banner by enabling it below in the 'Ads - Top Ad (468x60px)' panel. Make sure you don't have both enabled.",
                    "id" => $shortname."_twitter_enable",
                    "std" => "true",
                    "type" => "checkbox");      
        
$options[] = array( "name" => "Twitter Username",
                    "desc" => "Supply a user for the Twitter functionality in this theme. (eg. twitter.com/<b>woothemes</b>)",
                    "id" => $shortname."_twitter_username",
                    "std" => "woothemes",
                    "type" => "text"); 
					
$options[] = array( "name" => "About",
					"type" => "heading");
					
$options[] = array( "name" => "Enable About",
                    "desc" => "Check this box to enable the About module appearing on the home page above the blog posts.",
                    "id" => $shortname."_about_enable",
                    "std" => "false",
                    "type" => "checkbox");  
					
$options[] = array( "name" => "About Title",
                    "desc" => "Include a short title for your about module on the home page.",
                    "id" => $shortname."_about_header",
                    "std" => "",
                    "type" => "text");
                    
$options[] = array( "name" => "About Text",
                    "desc" => "Include a short paragraph of text describing your product/service/company.",
                    "id" => $shortname."_about_text",
                    "std" => "",
                    "type" => "textarea");    
                    
$options[] = array( "name" => "Read More Button Text",
                    "desc" => "Please enter the text you want to appear on the first button. Leave empty to remove.",
                    "id" => $shortname."_about_button",
                    "std" => "",
                    "type" => "text");
                    
$options[] = array( "name" => "Read More Button URL",
                    "desc" => "Please enter the URL of the page you want linked to button 1",
                    "id" => $shortname."_button_link",
                    "std" => "",
                    "type" => "text");
                    
$options[] = array( "name" => "About Photo",
                    "desc" => "Please enter the url of the photo you would like to appear in the about module. Leave empty to remove.",
                    "id" => $shortname."_about_photo",
                    "std" => "",
                    "type" => "text");  
					
$options[] = array( "name" => "Navigation",
					"type" => "heading");    

$options[] = array( "name" => "Category Navigation",
					"desc" => "Swap the Page navigation for a Category navigation. ",
					"id" => $shortname."_cat_menu",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Exclude Pages or Categories from Navigation",
					"desc" => "Enter a comma-separated list of <a href='http://support.wordpress.com/pages/8/'>ID's</a> that you'd like to exclude from the top navigation. (e.g. 12,23,27,44)",
					"id" => $shortname."_nav_exclude",
					"std" => "",
					"type" => "text"); 
                    
$options[] = array( "name" => "Page Navigation Extension",
                    "type" => "heading");     
                    
$options[] = array( "name" => "Enable Specific Dropdown Category",
                    "desc" => "Choose to have a certain category as dropdown in your nav. See below.",
                    "id" => $shortname."_enable_blog_category",
                    "std" => "false",
                    "type" => "checkbox");    
                    
$options[] = array( "name" => "Specific Dropdown Category",
                    "desc" => "Select the specific category you would like to have as a dropdown next to Home button in the Nav. <b>eg. Blog</b>",
                    "id" => $shortname."_blog_category",
                    "std" => "",
                    "type" => "select",
                    "options" => $woo_categories);  
                    
$options[] = array( "name" => "Enable All Category Dropdown",
                    "desc" => "Add a nav button that lists all the categories in your site.. ",
                    "id" => $shortname."_enable_all_category",
                    "std" => "false",
                    "type" => "checkbox");    
                    
$options[] = array( "name" => "All Category Dropdown Title",
                    "desc" => "Use a custom title for the button in the Nav",
                    "id" => $shortname."_all_category_title",
                    "std" => "Categories",
                    "type" => "text"); 
                    
                    
					
$options[] = array(	"name" => "Page Layout",
					"type" => "heading");
                    
$options[] = array(	"name" => "Home Page Layout",
						"desc" => "Choose the layout of to be used for the other entries on your homepage.",
			    		"id" => $shortname."_home_layout",
			    		"std" => "3_columns.php",
			    		"type" => "select",
			    		"options" => $layouts);	
			    		
$options[] = array(	"name" => "Archive Page Layout",
						"desc" => "Choose the layout of to be used for the other entries on your homepage.",
			    		"id" => $shortname."_archive_layout",
			    		"std" => "3_columns.php",
			    		"type" => "select",
			    		"options" => $layouts);	                     
 
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
                    
$options[] = array( "name" => "Enable Portrait Compatibility",
                    "desc" => "<b>This is an experimental feature.</b> You must have the GD Library enabled on your server for this to work.",
                    "id" => $shortname."_port_images",
                    "std" => "false",
                    "type" => "checkbox");          
                    

$options[] = array( "name" => "Image Height - 1 Column",
                    "desc" => "Specify height for images using 1 Column layout ",
                    "id" => $shortname."_1col_height",
                    "std" => "",
                    "type" => array( 
                                    array(  'id' => $shortname. '_1col_height',
                                            'type' => 'text',
                                            'std' => 200,
                                            'meta' => 'Height')
                                  ));
$options[] = array( "name" => "Image Height - 2 Columns",
                    "desc" => "Specify height for images using 2 Column layout ",
                    "id" => $shortname."_2col_height",
                    "std" => "",
                    "type" => array( 
                                    array(  'id' => $shortname. '_2col_height',
                                            'type' => 'text',
                                            'std' => 200,
                                            'meta' => 'Height')
                                  ));
$options[] = array( "name" => "Image Height - 3 Columns",
                    "desc" => "Specify height for images using 3 Column layout ",
                    "id" => $shortname."_3col_height",
                    "std" => "",
                    "type" => array( 
                                    array(  'id' => $shortname. '_3col_height',
                                            'type' => 'text',
                                            'std' => 150,
                                            'meta' => 'Height')
                                  ));
$options[] = array( "name" => "Image Height - 4 Columns",
					"desc" => "Specify height for images using 4 Column layout ",
					"id" => $shortname."_4col_height",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_4col_height',
											'type' => 'text',
											'std' => 100,
											'meta' => 'Height')
								  ));
                                  
                                  

                                  
                    
//Advertising
$options[] = array(    "name" => "Ads - Top Ad (468x60px)",
                                    "type" => "heading");

$options[] = array(    "name" => "Enable Ad",
                                    "desc" => "Enable this ad space, but make sure you disable Twitter in 'General Settings' first",
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
        "caption" => array (
            "name" => "caption",
            "std" => "Default Caption",
            "label" => "Caption",
            "type" => "text",
            "desc" => "Should have text..."
        ),
        "post_select" => array (
            "name" => "post_select",
            "std" => "one",
            "label" => "Select (one)",
            "type" => "select",
            "desc" => "Schelect",
            "options" => $options_select    
        ),
        "post_checkbox_true" => array (
            "name" => "post_checkbox_true",
            "std" => "true",
            "label" => "Checkbox (true)",
            "type" => "checkbox",
            "desc" => "Select something"
        ),
        "post_checkbox_false" => array (
            "name" => "post_checkbox_false",
            "std" => "false",
            "label" => "Checkbox (false)",
            "type" => "checkbox",
            "desc" => "Select something"
        ),
        "post_radio" => array (
            "name" => "post_radio",
            "std" => "two",
            "label" => "Radio (two)",
            "type" => "radio",
            "desc" => "Select something",
            "options" => $options_select    
        ),
        "embed" => array (
            "name"  => "embed",
            "std"  => "This is the default text",
            "label" => "Text Area",
            "type" => "textarea",
            "desc" => "Text Area"
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