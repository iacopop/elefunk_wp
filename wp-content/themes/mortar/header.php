<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

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

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/960.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" media="all" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />

<!--[if IE 6]>
<script src="<?php bloginfo('template_url'); ?>/includes/js/pngfix.js"></script>
<script type="text/javascript">
  DD_belatedPNG.fix('img');
</script>
<![endif]--> 
<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/menu.js"></script>
<![endif]-->


<?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>



    
</head>

<body <?php if ( is_front_page() ) { ?> id="home"<?php } ?> class="custom">

<div id="tile">

<div class="container_16">

	<div id="header" class="grid_16">

    	 <div class="grid_7 alpha">
    	 	<div id="logo">
    	  	 	<h1><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><img src="<?php if ( get_option('woo_logo') <> "" ) {  echo get_option('woo_logo'); } else { ?><?php bloginfo('stylesheet_directory'); ?>/<?php woo_style_path(); ?>/logo.png<?php } ?>" alt="" /></a></h1>
         	</div>
         </div>
         
          <div class="grid_9 omega">
            <?php 
            
            if (get_option('woo_ad_top') == 'true') { include (TEMPLATEPATH . "/ads/top_ad.php");}
            else {
                 if(get_option('woo_twitter_enable') == 'true'){ 
            ?>
            
            <div id="twitter">
                
                <ul id="twitter_update_list"><li></li></ul>
                <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
                <script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo get_option('woo_twitter_username'); ?>.json?callback=twitterCallback2&amp;count=1"></script>
                <div class="fix"></div>
                
            </div><!-- /#twitter -->
          
            
            <?php } }  ?>
            </div> 

         
	</div>
    
    <div class="grid_16 nav_wrapper">
            
            <ul id="nav">
                <li<?php if(is_home()) echo ' class="current_page_item"'; ?>><a href="<?php bloginfo('url'); ?>">Home</a></li>
                
                <?php
                
                if(get_option('woo_cat_menu') == 'true')
                {

                     wp_list_categories('title_li='); 
                     
                }
                else 
                {
                
                    if(get_option('woo_enable_blog_category') == 'true') {
                    $cat_id = get_cat_id(get_option('woo_blog_category'));
                    $cats = get_category_children($cat_id,',');
                    wp_list_categories('include=' .$cat_id . $cats .'&title_li='); 
                    }
                    
                    if(get_option('woo_enable_all_category') == 'true') {
                        wp_list_categories('hide_empty=1&title_li=<span>'. get_option('woo_all_category_title').'</span>'); 
                
                    }
                    
                    wp_list_pages('sort_column=menu_order&depth=3&title_li=&exclude='.get_option('woo_nav_exclude')); 
                    
                }
                

                ?>
            </ul>
        
  </div><!-- / #nav_wrapper -->
  
  <div id="content" class="grid_16">
