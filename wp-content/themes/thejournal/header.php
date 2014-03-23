<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

    <title>
    <?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
    <?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Search Results<?php } ?>
    <?php if ( is_author() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Author Archives<?php } ?>
    <?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
    <?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?>
    <?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
    <?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php the_time('F'); ?><?php } ?>
    <?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
    </title>
    
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
       
    <!--[if IE 6]>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/pngfix.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/menu.js"></script>
    <![endif]-->
       
    <?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>

</head>

<body class="custom">
<div id="wrap">
    <div id="top">
    
    	<div id="top-meta">
        
        	<div class="date"><?php echo date('l, jS F Y'); ?></div>
            
            
            

             <?php if(get_option('woo_contact_page_id') != "") { ?>
            <div class="contact-link">
            	<a href="<?php echo get_page_link(get_option('woo_contact_page_id')) ?>">Contact us</a>
            </div>
            <?php } ?>
        
            <div class="rss">
                <a href="<?php if ( get_option('woo_custom_rss_url') <> "" ) { echo get_option('woo_custom_rss_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>">Subscribe RSS Feed</a>
            </div>
             
             <div class="search">
            
            <form id="topSearch" method="get" action="<?php bloginfo('url'); ?>">
                    
                <p class="fields">
                    <input type="text" value="Search" name="s" id="s" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" />
                    <button class="replace" type="submit" name="submit">Search</button>
                </p>

            </form>
            
            </div>
        </div> 
         
         <!-- Highlights starts -->
         <?php $highlights_tag = get_settings('woo_highlights_tag');  ?>      
         <?php if (get_settings('woo_highlights_show') == 'true' && !empty($highlights_tag)){ ?>
        <div id="highlights">	  
             
        	<h3>Highlights ></h3>
            <?php 
            global $wpdb;
            $resulting = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name = '$highlights_tag'");
            $term_id = (int)$resulting;
            ?>
            
            <span class="more"><a href="<?php echo get_tag_link($term_id); ?>">More Highlights</a></span>
            <div class="fix"></div>
            
         	<?php 
            $image_height = get_option('woo_hightlights_image_dimentions_height');
            $highlights_limit = 6;
            $highlights_limit = get_settings('woo_highlights_tag_amount');   
            $new_posts = get_posts("tag=$highlights_tag&numberposts=$highlights_limit");
            foreach($new_posts as $post){

             $counter++; ?>
            
            <div class="post <?php if ( $counter == 3 ) { echo 'last'; } ?>">
            	<div class="image">
                	<a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php woo_get_image('image','135',$image_height,'thumbnail',90,null,'img'); ?></a>
                </div>
                <div class="content">
                	<p><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p>
                    <p class="read_more"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark">MORE +</a></p>
                </div>
            </div>
            <?php if ( $counter == 3 ) { $counter = 0; echo '<div class="fix"></div>'; } ?> 
            
            <?php } ?>
            
            <div class="fix"></div>
             
        </div>
        <!-- Highlights ends --> 
        
        <?php } ?>  
        	       
        <div id="header">
            
            <div class="logo">
            	<a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><img src="<?php if ( get_option('woo_logo') <> "" ) {  echo get_option('woo_logo'); } else { ?><?php bloginfo('stylesheet_directory'); ?>/<?php woo_style_path(); ?>/logo.png<?php } ?>" alt="" /></a>
            </div>
                       
             <?php 
             $ad_yes =     get_option('woo_ad_header');
             $ad_code =      get_option('woo_ad_header_code');
             $ad_image =     get_option('woo_ad_header_image');
             $ad_url =      get_option('woo_ad_header_url');
             
             if($ad_yes == 'true'){
             ?>
            <div id="header-banner-ad">
            <?php 
            if($ad_code != ''){ echo stripcslashes($ad_code); }
            else { 
            ?>
            <a href="<?php echo $ad_url;  ?>" title="Advert"><img class="title" src="<?php echo $ad_image; ?>" alt="" /></a>
            <?php
             } 
             ?>
            </div>
            <?php }
            
            else {
              include (TEMPLATEPATH . '/insert-recent-entries.php');        
            
            } ?>
            
          
            
        </div>
        
        <!-- Page Nav Starts -->
        <div id="top-nav" class="wrap">
            <div class="fl">
                <ul id="nav">
                    <?php if (is_page()) { $highlight = "page_item"; } else {$highlight = "page_item current_page_item"; } ?>
                    <li class="<?php echo $highlight; ?>"><a href="<?php bloginfo('url'); ?>">Home</a></li>
                    <?php 
					if (get_option('woo_cat_menu') == 'true') 
						wp_list_categories('sort_column=menu_order&depth=3&title_li=&exclude='.get_option('woo_nav_exclude')); 
                    else
						wp_list_pages('sort_column=menu_order&depth=3&title_li=&exclude='.get_option('woo_nav_exclude')); 
					?>
                </ul>
            </div>
        </div>
        <!-- Page Nav Ends -->
        
    </div>

    

