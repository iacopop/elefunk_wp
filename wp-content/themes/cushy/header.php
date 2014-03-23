<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

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
		<?php if ( is_404() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;404&nbsp;|&nbsp;Page Not Found<?php } ?>
		<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
	</title>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!--[if IE 6]>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie6.css" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/suckerfish.js"></script> 
	<![endif]-->
	
	<!--[if IE 7]>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie7.css" type="text/css" media="screen" />
	<![endif]-->
		     	
	<?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
	
	<!-- Custom Logo -->
	<?php if ( get_option('woo_logo') <> "" ) { ?>
	
		<style>
			h1 {
				background:url(<?php echo get_option( 'woo_logo' ); ?>) no-repeat center left !important;
			}
		</style>
	
	<?php } ?>
	
</head>
<body>

	<div id="header-repeat">
		
		<div id="header-left">
		
			<div class="container">
			
				<?php include_once( TEMPLATEPATH . '/searchform-header.php' ); ?>
		
				<div id="logo">
					
					<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><img class="title" src="<?php if ( get_option('woo_logo') <> "" ) { echo get_option('woo_logo').'"'; } else { bloginfo('stylesheet_directory'); ?>/images/logo.gif<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a>
					<h1><?php bloginfo('name'); ?></h1>
				
				</div><!-- End Logo -->
													
				<ul id="navigation" class="clearfix">
				
					<li class="<?php if ( is_home() ) { echo 'current_page_item'; } ?>"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><span><span><span>Home</span></span></span></a></li>
					
					<?php
						
						$exclude = '';
						$exclude = get_option('woo_pages_ex') . ',' . get_option('woo_featured_tabs') .  ',' . get_option('woo_features_page') .  ',' . $exclude;
						wp_list_pages('title_li=&depth=2&link_before=<span><span><span>&link_after=</span></span></span>&exclude=' . $exclude);
					
					?>
				
				</ul><!-- End navigation -->									
													
			</div><!-- End container -->
		
		</div><!-- End header-left -->
	
	</div><!-- End header-repeat -->
	
	<div id="content-repeat">
	
		<div id="content-left">
	
			<div class="container clearfix">
				
				<div id="content" class="clearfix">
				