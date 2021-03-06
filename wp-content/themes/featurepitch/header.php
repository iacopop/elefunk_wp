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
	
	<?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
	
    <!--[if IE 6]>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/pngfix.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/ie6.css" media="screen" />
	<![endif]-->
	
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/ie7.css" />
	<![endif]-->

</head>

<body id="<?php bodyclass(); ?>">

<div id="container">

	<div id="header" class="outer">
	
		<div class="inner">
			
			<div id="header-top">
			
				<h1><a href="#" title="#"><?php bloginfo('name'); ?></a></h1>
				
				<h2><?php bloginfo('description'); ?></h2>
				
				<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
					<img src="<?php if ( get_option('woo_logo') <> "" ) { echo get_option( 'woo_logo' ); } else { bloginfo('stylesheet_directory'); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" />
				</a>
				
			</div><!-- /#header-top -->
			
			<div id="nav_contain">
			
				<ul id="nav">
					<li class="home <?php if (is_home()){ ?>current_page_item<?php } ?>">	<a href="<?php bloginfo('url'); ?>" title="Go Home">Home</a></li>
					
					<?php if ( get_option('woo_blog_navigation' ) == 'true' ) { ?><?php wp_list_categories('child_of=' . get_option( 'woo_blog_cat_id' ) . '&hide_empty=true&title_li=<a href="' . get_option('home') . get_option('woo_blog_permalink') .'" title="Blog">Blog</a>'); ?><?php } ?>

					<?php $exclude = woo_exclude_pages(); ?>
					<?php wp_list_pages('sort_column=menu_order&depth=0&title_li=&link_before=&link_after=&exclude=' . $exclude . ',' . get_option( 'woo_exclude_pages_main' ) ); ?>
										
					<?php if ( get_option( 'woo_highlight_text' ) <> "" and get_option( 'woo_highlight_url' ) <> "" ) { ?>
						<li class="buynow"><a href="<?php echo get_option( 'woo_highlight_url' ); ?>" title="<?php echo get_option( 'woo_highlight_text' ); ?>"><?php echo get_option( 'woo_highlight_text' ); ?></a></li>
					<?php } ?>
				</ul><!-- /#nav -->
			
			</div><!-- /#nav -->
		
		</div><!-- /.inner -->
	
	</div><!-- /#header .outer -->