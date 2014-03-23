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
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/960.css" media="screen" />
    
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <!--[if lt IE 7]>
    <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/pngfix.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/suckerfish.js"></script>	
    <![endif]-->
    
	<?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
    
</head>

<body>

<?php
	// Set Global variables for use in exclude
	$asides_cat = get_option('woo_asides_category'); 
	$GLOBALS[asides_id] = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name = '$asides_cat'");
	$video_cat = get_option('woo_video_category'); 
	$GLOBALS[video_id] = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name = '$video_cat'");
?>

<div id="background">

<div id="top" class="container_16">

	<div class="grid_12">
        <ul class="nav1">
            <li <?php if ( is_home() ) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_option('home'); ?>/">Home</a></li>
            <?php wp_list_pages('sort_column=menu_order&title_li=&depth=3'); ?>
        </ul>
	    <!--/nav1-->
	</div>
	<!-- end .grid_12 -->

	<div class="grid_4">
        <span class="subscribe">Subscribe:&nbsp;&nbsp;&nbsp;<a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>">Posts</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a>&nbsp;&nbsp;&nbsp;<?php if (get_option('woo_feedburner_id') != "") { ?>|&nbsp;&nbsp;&nbsp;<a href="<?php echo get_option('woo_feedburner_id'); ?>" target="_blank">Email</a><?php } ?></span>
	</div>
	<!-- end .grid_4 -->  

</div>
<!--/top-->

<div id="page" class="container_16">

	<div id="header">
		
		<div id="title" class="grid_12">
            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><img class="logo" src="<?php if ( get_option('woo_logo') <> "" ) { echo get_option('woo_logo'); } else { bloginfo('template_directory'); ?>/images/logo-trans.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a>
            <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		</div>

		<div class="spacer grid_4">       
        
			<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
            
				<div id="search">
					<input type="text" value="Enter search keyword" onclick="this.value='';" name="s" id="s" />
					<input name="" type="image" src="<?php bloginfo('template_directory'); ?>/images/btn-search-trans.png" value="Go" class="btn"  />
				</div>
				<!--/search -->  
                                             
			</form>
            
		</div>
		<!--/spacer-->		
		
	</div>
    <!--/header -->
	
	<div id="topmenu">
    
		<ul id="nav" class="grid_15">
			<?php wp_list_categories('title_li=&exclude=' . $GLOBALS[asides_id]) ?>
            <li>&nbsp;</li>
		</ul>
        
		<div id="rss" class="grid_1 alignright">
        	<a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>"><img src="<?php bloginfo('template_directory'); ?>/images/ico-rss-trans.png" alt="RSS" /></a>
       </div><!--/rss -->
        
	</div>
    <!--/topmenu--> 
