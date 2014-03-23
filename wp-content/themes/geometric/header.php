<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<title>
<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
<?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Search Results<?php } ?>
<?php if ( is_author() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Author Archives<?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() && !is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?>
<?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
<?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php the_time('F'); ?><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
</title>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/reset.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/960.css" type="text/css" />	
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

<link rel="icon" type="image/png" href="<?php echo get_option('woo_favicon'); ?>" /> 

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
   
<!--[if lt IE 7]>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/includes/js/pngfix.js" type="text/javascript">></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/includes/js/pngelements.js" type="text/javascript">></script>
<![endif]--> 

<?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>

<body>

<!-- Get Portfolio Category -->
<?php $cat = get_option('woo_portfolio_category'); $GLOBALS[portfolio_cat] = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name='$cat'"); ?>

<div id="bg-wrapper">
	
	<div class="container_16">
	
		<div id="header">
		
			<div id="slogan">
			
				<span><?php bloginfo('description'); ?></span>
		
			</div><!-- /slogan -->
			
			<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
			
			<div id="logo">
				
				<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php if ( get_option('woo_logo') <> "" ) { echo get_option('woo_logo').'"'; } else { bloginfo('template_directory'); ?>/<?php echo woo_style_path(); ?>/logo-trans.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a>
			
			</div><!-- /logo -->
			
			<div id="nav">
			
				<ul id="navigation">
						
						<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
						
						<?php 
							if (get_option('woo_cat_menu') == 'true') 
								wp_list_categories('sort_column=menu_order&depth=-1&title_li=&exclude='.get_option('woo_nav_exclude')); 
							else
								wp_list_pages('sort_column=menu_order&depth=-1&title_li=&exclude='.get_option('woo_nav_exclude')); 
						?>
						<span class="clear"></span>
				</ul>
			
			</div>
	
		</div><!-- /header -->
		
		<div class="fix"></div>