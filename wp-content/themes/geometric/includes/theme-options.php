<?php



function woo_options(){
// VARIABLES
$themename = "Geometric";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/geometric/';
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
$layouts = array("1col.php","2col.php","3col.php");

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

$options[] = array(	"name" => "Sidebar on the left or right?",
					"desc" => "Check this box, if you'd like to display the sidebar on the right. If unchecked, the sidebar will default to the left.",
					"id" => $shortname."_right_sidebar",
					"std" => "true",
					"type" => "checkbox");						

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
						
$options[] = array(	"name" => "Navigation Settings",
					"type" => "heading");	

$options[] = array( "name" => "Header - Category Navigation",
					"desc" => "Swap the Page navigation for a Category navigation. ",
					"id" => $shortname."_cat_menu",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Header - Exclude Pages or Categories from Navigation",
					"desc" => "Enter a comma-separated list of <a href='http://support.wordpress.com/pages/8/'>ID's</a> that you'd like to exclude from the top navigation. (e.g. 12,23,27,44)",
					"id" => $shortname."_nav_exclude",
					"std" => "",
					"type" => "text"); 					
					
$options[] = array(	"name" => "Display page navigation in footer.",
					"desc" => "Display page navigation in footer above the credit line.",
					"id" => $shortname."_nav_footer",
					"std" => "true",
					"type" => "checkbox");	

$options[] = array(	"name" => "Homepage / Blog Settings",
					"type" => "heading");

$options[] = array(	"name" => "Header Text",
					"desc" => "Enter the text that is displayed as the title before the first post. Defaults to 'Latest from my blog...' if you don't specify anything.",
					"id" => $shortname."_home_title",
					"std" => "Latest from my blog...",
					"type" => "text");							

$options[] = array(	"name" => "Posts per page",
					"desc" => "Select the number of posts you'd like to display per page.",
					"id" => $shortname."_home_posts",
					"std" => "Select a number:",
					"type" => "select",
					"options" => $other_entries);						

$options[] = array(	"name" => "Portfolio Settings",
					"type" => "heading");

$options[] = array(	"name" => "Portfolio Category",
					"desc" => "Select the category to use with your Portfolio Widget.",
					"id" => $shortname."_portfolio_category",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $woo_categories);					

$options[] = array(	"name" => "Portfolio Layout",
					"desc" => "Choose between a 1, 2 & 3 column layout.",
			    	"id" => $shortname."_layout",
			    	"std" => "1col.php",
			    	"type" => "select",
			    	"options" => $layouts);	    					

$options[] = array(	"name" => "Portfolio Items",
					"desc" => "Select the number of portfolio items you'd like to display in the portfolio widget",
					"id" => $shortname."_portfolio_posts",
					"std" => "Select a number:",
					"type" => "select",
					"options" => $other_entries);

$options[] = array(	"name" => "Use Image Resizer?",
					"desc" => "If checked, the thumbnails for all portfolio items will be generated by the dynamic image resizer.",
					"id" => $shortname."_portfolio_resizer",
					"std" => "false",
					"type" => "checkbox");										

$options[] = array(	"name" => "About / Social Widget",
					"type" => "heading");									

$options[] = array(	"name" => "About You Text",
				"desc" => "Enter a little blurb about yourself. HTML allowed.",
				"id" => $shortname."_about",
				"std" => "",
				"type" => "textarea");						

$options[] = array(	"name" => "Gravatar",
				"desc" => "Enter the URL to your gravatar here..",
				"id" => $shortname."_gravatar",
				"std" => "",
				"type" => "text");										

$options[] = array(	"name" => "Twitter username",
				"desc" => "Enter your Twitter username to enable the Twitter Updates widget.",
				"id" => $shortname."_twitter_user",
				"std" => "",
				"type" => "text");				

$options[] = array(	"name" => "Flickr Username",
					"desc" => "Enter your Flickr Username here.",
			    	"id" => $shortname."_flickr",
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

$options[] = array(	"name" => "Layout Options",
					"type" => "heading");	

$options[] = array(	"name" => "Homepage Posts",
					"desc" => "If checked, this section will display the full post content. If unchecked it will display the excerpt only.",
					"id" => $shortname."_content_home",
					"std" => "false",
					"type" => "checkbox");											

$options[] = array(	"name" => "Archive Posts",
					"desc" => "If checked, this section will display the full post content. If unchecked it will display the excerpt only.",
					"id" => $shortname."_content_archive",
					"std" => "false",
					"type" => "checkbox");											

$options[] = array(	"name" => "Banner Ads Inner Content - Widget (125x125)",
					"type" => "heading");

$options[] = array(	"name" => "Rotate banners?",
					"desc" => "Check this to randomly rotate the banner ads.",
					"id" => $shortname."_ads_rotate",
					"std" => "true",
					"type" => "checkbox");	

$options[] = array(	"name" => "Add this widget into content after the 2nd post on all pages?",
					"desc" => "Check this to randomly rotate the banner ads.",
					"id" => $shortname."_ads_inner_content",
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

$options[] = array(	"name" => "Banner Ad #4 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_4",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-4.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #4 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_4",
					"std" => "http://www.woothemes.com",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad #5 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_5",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-4.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #5 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_5",
					"std" => "http://www.woothemes.com",
					"type" => "text");
                    
update_option('woo_template',$options);      
update_option('woo_themename',$themename);   
update_option('woo_shortname',$shortname);
update_option('woo_manual',$manualurl);

                                     
// Woo Metabox Options
                    

$woo_metaboxes = array(

        "image" => array (
            "name"        => "image",
            "default"     => "",
            "label"     => "Image",
            "type"         => "upload",
            "desc"      => "Enter the URL for the General Preview Image (max 680px in width)"
        ),
        "thumb" => array (
            "name"        => "thumb",
            "default"     => "",
            "label"     => "Thumbnail",
            "type"         => "upload",
            "desc"      => "Enter the URL for the Thumbnail (200x140px or 320x200px)."
        ),
        "preview" => array (
            "name"        => "preview",
            "default"     => "",
            "label"     => "Preview",
            "type"         => "upload",
            "desc"      => "Enter the URL for the Larger preview image (Slimbox)."
        ),
        "url" => array (
            "name"        => "url",
            "default"     => "",
            "label"     => "Url",
            "type"         => "text",
            "desc"      => "Enter the URL for the DEMO link."
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