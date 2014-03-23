<?php function woothemes_admin_head() { ?>
<style>

h2 { margin-bottom: 20px; }
.title { margin: 0px !important; background: #D4E9FA; padding: 10px; font-family: Georgia, serif; font-weight: normal !important; letter-spacing: 1px; font-size: 18px; }
.container { background: #EAF3FA; padding: 10px; }
.maintable { font-family:"Lucida Grande","Lucida Sans Unicode",Arial,Verdana,sans-serif; background: #EAF3FA; margin-bottom: 20px; padding: 10px 0px; }
.mainrow { padding-bottom: 10px !important; border-bottom: 1px solid #D4E9FA !important; float: left; margin: 0px 10px 10px 10px !important; }
.titledesc { font-size: 14px; font-weight:bold; width: 220px !important; margin-right: 20px !important; }
.forminp { width: 700px !important; valign: middle !important; }
.forminp input, .forminp select, .forminp textarea { margin-bottom: 9px !important; background: #fff; border: 1px solid #D4E9FA; width: 500px; padding: 4px; font-family:"Lucida Grande","Lucida Sans Unicode",Arial,Verdana,sans-serif; font-size: 12px; }
.forminp span { font-size: 10px !important; font-weight: normal !important; ine-height: 14px !important; }
.forminp .checkbox { width:20px }
.info { background: #FFFFCC; border: 1px dotted #D8D2A9; padding: 10px; color: #333; }
.info a { color: #333; text-decoration: none; border-bottom: 1px dotted #333 }
.info a:hover { color: #666; border-bottom: 1px dotted #666; }
.warning { background: #FFEBE8; border: 1px dotted #CC0000; padding: 10px; color: #333; font-weight: bold; }

</style>
<?php }

// VARIABLES
function woo_options(){
$themename = "NewsPress";
$shortname = "woo";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/newspress/';
$options = array();

$template_path = get_bloginfo('template_directory');

$layout_path = TEMPLATEPATH . '/layouts/'; 
$layouts = array();

$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();

$functions_path = TEMPLATEPATH . '/functions/';

$ads_path = TEMPLATEPATH . '/images/ads/';
$ads = array();

$pn_categories_obj = get_categories('hide_empty=0');
$pn_categories = array();

$woo_pages_obj = get_pages('sort_column=post_parent,menu_order');
$woo_pages = array();

if ( is_dir($layout_path) ) {
	if ($layout_dir = opendir($layout_path) ) { 
		while ( ($layout_file = readdir($layout_dir)) !== false ) {
			if(stristr($layout_file, ".php") !== false) {
				$layouts[] = $layout_file;
			}
		}	
	}
}	

if ( is_dir($alt_stylesheet_path) ) {
	if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
		while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
			if(stristr($alt_stylesheet_file, ".css") !== false) {
				$alt_stylesheets[] = $alt_stylesheet_file;
			}
		}	
	}
}	

if ( is_dir($modules_path) ) {
	if ($modules_dir = opendir($modules_path) ) { 
		while ( ($module_file = readdir($modules_dir)) !== false ) {
			if(stristr($module_file, ".php") !== false) {
				$file_tmp = substr($module_file, 0, -4);
				$modules[$file_tmp] = $module_file;
			}
		}	
	}
}

if ( is_dir($ads_path) ) {
	if ($ads_dir = opendir($ads_path) ) { 
		while ( ($ads_file = readdir($ads_dir)) !== false ) {
			if((stristr($ads_file, ".jpg") !== false) || (stristr($ads_file, ".png") !== false) || (stristr($ads_file, ".gif") !== false)) {
				$ads[] = $ads_file;
			}
		}	
	}
}

foreach ($pn_categories_obj as $pn_cat) {
	$pn_categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
}

foreach ($woo_pages_obj as $woo_page) {
	$woo_pages[$woo_page->ID] = $woo_page->post_name;
}

$other_entries = array("Select a Number:","1","2","3","4","5","6","7","8","9","10");
$categories_tmp = array_unshift($pn_categories, "Select a category:");
$woo_pages_tmp = array_unshift($woo_pages, "Select a page:");

// THIS IS THE DIFFERENT FIELDS

$options = array (

				array(	"name" => "General Settings",
						"type" => "heading"),

				array(	"name" => "Theme Stylesheet",
						"desc" => "Please select your colour scheme here.",
					    "id" => $shortname."_alt_stylesheet",
					    "std" => "",
					    "type" => "select",
					    "options" => $alt_stylesheets),

				array(	"name" => "Use Gravatars?",
						"desc" => "Check this box if you wish to use <a href='http://www.gravatar.com'>Gravatars</a> for Author & Commenter profiles.",
						"id" => $shortname."_gravatar",
						"std" => "false",
						"type" => "checkbox"),

				array(	"name" => "Custom Logo",
						"desc" => "Paste the full URL of your custom logo image, should you wish to replace our default logo.",
						"id" => $shortname."_logo",
						"std" => "",
						"type" => "text"),												    

				array(	"name" => "Google Analytics",
						"desc" => "Please paste your Google Analytics (or other) tracking code here.",
			    		"id" => $shortname."_google_analytics",
			    		"std" => "",
			    		"type" => "textarea"),		

				array(	"name" => "Feedburner RSS URL",
						"desc" => "Enter your Feedburner URL here.",
			    		"id" => $shortname."_feedburner_url",
			    		"std" => "",
			    		"type" => "text"),								

				array(	"name" => "Feedburner ID",
						"desc" => "Enter your Feedburner ID here. To find your Feedburner ID, please see <a href='http://www.woothemes.com/tutorials/#4'>This Tutorial</a>.",
			    		"id" => $shortname."_feedburner_id",
			    		"std" => "",
			    		"type" => "text"),					

				array(	"name" => "Archives Page",
						"desc" => "Please select your archive page. TIP: Add your archive by creating a new page (Write > Page), and selecting the 'Archive' page template.",
						"id" => $shortname."_archives",
						"std" => "Select a page:",
						"type" => "select",
						"options" => $woo_pages),

				array(	"name" => "Front Page Layout",
						"type" => "heading"),

				array(	"name" => "Front Page Layout",
						"desc" => "Choose the layout of to be used for the other entries on your homepage.",
			    		"id" => $shortname."_layout",
			    		"std" => "",
			    		"type" => "select",
			    		"options" => $layouts),

				array(	"name" => "Homepage Entries",
						"desc" => "Select the number of entries that should appear below the Featured Entries or Video Panel.",
			    		"id" => $shortname."_other_entries",
			    		"std" => "Select a Number:",
			    		"type" => "select",
			    		"options" => $other_entries),												

				array(	"name" => "Display Video?",
						"desc" => "Check this box if you wish to display the video panel on your homepage.",
						"id" => $shortname."_show_video",
						"std" => "false",
						"type" => "checkbox"),
						
				array( 	"name" => "Video Category",
					   	"desc" => "Select the category that you would like to have displayed in the video panel on your homepage.",
						"id" => $shortname."_video_category",
						"std" => "Select a category:",
						"type" => "select",
						"options" => $pn_categories),

				array(	"name" => "Featured posts",
						"type" => "heading"),

				array( 	"name" => "Featured Category",
					   	"desc" => "Select the category that you would like to have displayed in the featured section on your homepage.",
						"id" => $shortname."_featured_category",
						"std" => "Select a category:",
						"type" => "select",
						"options" => $pn_categories),

				array(	"name" => "Featured Entries",
						"desc" => "Select the number of entries that should appear as featured entries on the homepage.",
			    		"id" => $shortname."_featured_entries",
			    		"std" => "Select a Number:",
			    		"type" => "select",
			    		"options" => $other_entries),						

				array(	"name" => "Banner Ad Management",
						"type" => "heading"),

				array(	"name" => "Advertising Page",
						"desc" => "Please select the WordPress page that contains your advertising information &amp; rates.",
						"id" => $shortname."_ad_page",
						"std" => "Select a page:",
						"type" => "select",
						"options" => $woo_pages),

				array(	"name" => "Display top of sidebar",
						"desc" => "Check this box if you would like to display top 2 banner ads in the sidebar.",
						"id" => $shortname."_show_ads_top",
						"std" => "false",
						"type" => "checkbox"),

				array(	"name" => "Banner Ad #1 - Image Location",
						"desc" => "Enter the URL for this banner ad.",
						"id" => $shortname."_ad_image_1",
						"std" => $template_path . "/images/ad-125x125.gif",
						"type" => "text"),
						
				array(	"name" => "Banner Ad #1 - Destination",
						"desc" => "Enter the URL where this banner ad points to.",
			    		"id" => $shortname."_ad_url_1",
						"std" => "http://example.com/ads/ad1_destination.html",
			    		"type" => "text"),						

				array(	"name" => "Banner Ad #2 - Image Location",
						"desc" => "Enter the URL for this banner ad.",
						"id" => $shortname."_ad_image_2",
						"std" => $template_path . "/images/ad-125x125.gif",
						"type" => "text"),
						
				array(	"name" => "Banner Ad #2 - Destination",
						"desc" => "Enter the URL where this banner ad points to.",
			    		"id" => $shortname."_ad_url_2",
						"std" => "http://example.com/ads/ad1_destination.html",
			    		"type" => "text"),

				array(	"name" => "Banner Ad #3 - Image Location",
						"desc" => "Enter the URL for this banner ad.",
						"id" => $shortname."_ad_image_3",
						"std" => $template_path . "/images/ad-125x125.gif",
						"type" => "text"),
						
				array(	"name" => "Banner Ad #3 - Destination",
						"desc" => "Enter the URL where this banner ad points to.",
			    		"id" => $shortname."_ad_url_3",
						"std" => "http://example.com/ads/ad1_destination.html",
			    		"type" => "text"),

				array(	"name" => "Display bottom of sidebar",
						"desc" => "Check this box if you would like to display bottom 2 banner ads in the sidebar.",
						"id" => $shortname."_show_ads_bottom",
						"std" => "false",
						"type" => "checkbox"),

				array(	"name" => "Banner Ad #4 - Image Location",
						"desc" => "Enter the URL for this banner ad.",
						"id" => $shortname."_ad_image_4",
						"std" => $template_path . "/images/ad-125x125.gif",
						"type" => "text"),
						
				array(	"name" => "Banner Ad #4 - Destination",
						"desc" => "Enter the URL where this banner ad points to.",
			    		"id" => $shortname."_ad_url_4",
						"std" => "http://example.com/ads/ad1_destination.html",
			    		"type" => "text"),

				array(	"name" => "Banner Ad #5 - Image Location",
						"desc" => "Enter the URL for this banner ad.",
						"id" => $shortname."_ad_image_5",
						"std" => $template_path . "/images/ad-125x125.gif",
						"type" => "text"),
						
				array(	"name" => "Banner Ad #5 - Destination",
						"desc" => "Enter the URL where this banner ad points to.",
			    		"id" => $shortname."_ad_url_5",
						"std" => "http://example.com/ads/ad1_destination.html",
			    		"type" => "text"),

				array(	"name" => "Banner Ad #6 - Image Location",
						"desc" => "Enter the URL for this banner ad.",
						"id" => $shortname."_ad_image_6",
						"std" => $template_path . "/images/ad-125x125.gif",
						"type" => "text"),
						
				array(	"name" => "Banner Ad #6 - Destination",
						"desc" => "Enter the URL where this banner ad points to.",
			    		"id" => $shortname."_ad_url_6",
						"std" => "http://example.com/ads/ad1_destination.html",
			    		"type" => "text")
																														
		  );
		  
$options[] = array(	"name" => "Image Resizer settings",
					"type" => "heading");

$options[] = array(	"name" => "Disable Image Resizer",
					"desc" => "If you disable the image resizer, you will need to manually add 'thumb' as key in the posts custom field with the url to the thumbnail in the value field.",
					"id" => $shortname."_resize",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Thumbnail Width",
					"desc" => "<strong>Default = 75px</strong>. Enter an integer value i.e. 250 for the desired width which will be used when dynamically creating the images. ",
					"id" => $shortname."_thumb_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Thumbnail Height",
					"desc" => "<strong>Default = 75px</strong>. Enter an integer value i.e. 250 for the desired width which will be used when dynamically creating the images. ",
					"id" => $shortname."_thumb_height",
					"std" => "",
					"type" => "text");	
                    
                    																		    																																		
//Update Options

update_option('woo_template',$options);      
update_option('woo_themename',$themename);   
update_option('woo_shortname',$shortname);  
                                                                                             
// Easytube
require_once ($functions_path . '/easytube.php');
}
add_action('init','woo_options');       

require_once (TEMPLATEPATH . '/functions/custom.php');       
// ADMIN PANEL

function woothemes_add_admin() {

    $options =  get_option('woo_template');      
    $themename =  get_option('woo_themename');      
    $shortname =  get_option('woo_shortname');      
	
	if ( $_GET['page'] == basename(__FILE__) ) {	
        if ( 'save' == $_REQUEST['action'] ) {
	
                foreach ($options as $value) {
					if($value['type'] != 'multicheck'){
                    	update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
					}else{
						foreach($value['options'] as $mc_key => $mc_value){
							$up_opt = $value['id'].'_'.$mc_key;
							update_option($up_opt, $_REQUEST[$up_opt] );
						}
					}
				}

                foreach ($options as $value) {
					if($value['type'] != 'multicheck'){
                    	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } 
					}else{
						foreach($value['options'] as $mc_key => $mc_value){
							$up_opt = $value['id'].'_'.$mc_key;						
							if( isset( $_REQUEST[ $up_opt ] ) ) { update_option( $up_opt, $_REQUEST[ $up_opt ]  ); } else { delete_option( $up_opt ); } 
						}
					}
				}
						
				header("Location: admin.php?page=functions.php&saved=true");								
			
			die;

		} else if ( 'reset' == $_REQUEST['action'] ) {
			delete_option('sandbox_logo');
			
			header("Location: admin.php?page=functions.php&reset=true");
			die;
		}

	}

add_menu_page($themename." Options", $themename." Options", 'edit_themes', basename(__FILE__), 'woothemes_page');

}

function woothemes_page (){

		global  $manualurl;
        $options =  get_option('woo_template');      
        $themename =  get_option('woo_themename');      
        $shortname =  get_option('woo_shortname');      
		?>

<div class="wrap">

    			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

						<h2><?php echo $themename; ?> Options</h2>

						<?php if ( $_REQUEST['saved'] ) { ?><div style="clear:both;height:20px;"></div><div class="warning"><?php echo $themename; ?>'s Options has been updated!</div><?php } ?>
						<?php if ( $_REQUEST['reset'] ) { ?><div style="clear:both;height:20px;"></div><div class="warning"><?php echo $themename; ?>'s Options has been reset!</div><?php } ?>						
						
						<div style="clear:both;height:20px;"></div>
						
						<div class="info">
						
							<div style="width: 70%; float: left; display: inline;padding-top:4px;"><strong>Stuck on these options?</strong> <a href="<?php echo $manualurl; ?>" target="_blank">Read The Documentation Here</a> or <a href="http://forum.woothemes.com" target="blank">Visit Our Support Forum</a></div>
							<div style="width: 30%; float: right; display: inline;text-align: right;"><input name="save" type="submit" value="Save changes" /></div>
							<div style="clear:both;"></div>
						
						</div>	    			
						
						<!--START: GENERAL SETTINGS-->
     						
     						<table class="maintable">
     							
							<?php foreach ($options as $value) { ?>
	
									<?php if ( $value['type'] <> "heading" ) { ?>
	
										<tr class="mainrow">
										<td class="titledesc"><?php echo $value['name']; ?></td>
										<td class="forminp">
		
									<?php } ?>		 
	
									<?php
										
										switch ( $value['type'] ) {
										case 'text':
		
									?>
									
		        							<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
		
									<?php
										
										break;
										case 'select':
		
									?>
		
	            						<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
	                					<?php foreach ($value['options'] as $option) { ?>
	                						<option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
	                					<?php } ?>
	            						</select>
		
									<?php
		
										break;
										case 'textarea':
										$ta_options = $value['options'];
		
									?>
									
										<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="8"><?php  if( get_settings($value['id']) != "") { echo stripslashes(get_settings($value['id'])); } else { echo $value['std']; } ?></textarea>
		
									<?php
										
										break;
										case "radio":
		
 										foreach ($value['options'] as $key=>$option) { 
				
													$radio_setting = get_settings($value['id']);
													
													if($radio_setting != '') {
		    											
		    											if ($key == get_settings($value['id']) ) { $checked = "checked=\"checked\""; } else { $checked = ""; }
													
													} else {
													
														if($key == $value['std']) { $checked = "checked=\"checked\""; } else { $checked = ""; }
									} ?>
									
	            					<input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />
		
									<?php }
		 
										break;
										case "checkbox":
										
										if(get_settings($value['id'])) { $checked = "checked=\"checked\""; } else { $checked = ""; }
									
									?>
		            				
		            				<input type="checkbox" class="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
		
									<?php
		
										break;
										case "multicheck":
		
 										foreach ($value['options'] as $key=>$option) {
 										
	 											$pn_key = $value['id'] . '_' . $key;
												$checkbox_setting = get_settings($pn_key);
				
 												if($checkbox_setting != '') {
		    		
		    											if (get_settings($pn_key) ) { $checked = "checked=\"checked\""; } else { $checked = ""; }
				
												} else { if($key == $value['std']) { $checked = "checked=\"checked\""; } else { $checked = ""; }
				
									} ?>
									
	            					<input type="checkbox" class="checkbox" name="<?php echo $pn_key; ?>" id="<?php echo $pn_key; ?>" value="true" <?php echo $checked; ?> /><label for="<?php echo $pn_key; ?>"><?php echo $option; ?></label><br />
									
									<?php }
		 
										break;
										case "heading":

									?>
									
										</table> 
		    							
		    									<h3 class="title"><?php echo $value['name']; ?></h3>
										
										<table class="maintable">
		
									<?php
										
										break;
										default:
										break;
									
									} ?>
	
									<?php if ( $value['type'] <> "heading" ) { ?>
	
										<?php if ( $value['type'] <> "checkbox" ) { ?><br/><?php } ?><span><?php echo $value['desc']; ?></span>
										</td></tr>
	
									<?php } ?>		
	
							<?php } ?>	
							
							</table>	

							<p class="submit">
								<input name="save" type="submit" value="Save changes" />    
								<input type="hidden" name="action" value="save" />
							</p>							
							
							<div style="clear:both;"></div>		
						
						<!--END: GENERAL SETTINGS-->						
             
            </form>

</div><!--wrap-->

<div style="clear:both;height:20px;"></div>
 
 <?php

};

function woothemes_wp_head() { 
     $style = $_REQUEST[style];
     if ($style != '') {
          ?> <link href="<?php bloginfo('template_directory'); ?>/styles/<?php echo $style; ?>.css" rel="stylesheet" type="text/css" /><?php 
     } else { 
          $stylesheet = get_option('woo_alt_stylesheet');
          if($stylesheet != ''){
               ?><link href="<?php bloginfo('template_directory'); ?>/styles/<?php echo $stylesheet; ?>" rel="stylesheet" type="text/css" /><?php         
          }
     }     
}

add_action('wp_head', 'woothemes_wp_head');
add_action('admin_menu', 'woothemes_add_admin');
add_action('admin_head', 'woothemes_admin_head');	

// OTHER FUNCTIONS

if ( function_exists('register_sidebar') )
    register_sidebars(3,array(
        'before_widget' => '<div class="list3">',
        'after_widget' => '</div><!--/widget-->',
        'before_title' => '<h2 class="hl">',
        'after_title' => '</h2>',
    ));

$bm_trackbacks = array();
$bm_comments = array();

function split_comments( $source ) {

    if ( $source ) foreach ( $source as $comment ) {

        global $bm_trackbacks;
        global $bm_comments;

        if ( $comment->comment_type == 'trackback' || $comment->comment_type == 'pingback' ) {
            $bm_trackbacks[] = $comment;
        } else {
            $bm_comments[] = $comment;
        }
    }
} 


// Use legacy comments on versions before WP 2.7
add_filter('comments_template', 'legacy_comments');

function legacy_comments($file) {

	if(!function_exists('wp_list_comments')) : // WP 2.7-only check
		$file = TEMPLATEPATH . '/comments-legacy.php';
	endif;

	return $file;
}
 
?>