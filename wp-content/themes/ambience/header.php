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
		<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
	</title>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!--[if lt IE 7]>
    <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js" type="text/javascript"></script>
    <![endif]-->

	<?php wp_head(); ?>
	
    <!-- Show custom logo -->
    <?php if ( get_option('woo_logo') <> "" ) { ?><style type="text/css">#logo {background: url(<?php echo get_option('woo_logo'); ?>) no-repeat !important; }</style><?php } ?> 	
    
    <!-- Show text logo -->
    <?php if ( get_option('woo_textlogo') == 'true' ) { ?>
	<style type="text/css">
        #logo { background: none !important; margin-top: 30px !important; }
        h1, h2 { text-indent: 0px !important; }
    </style>
    <?php } ?> 	
	
</head>
<body>
	<div id="main-back">
					
		<div class="container clearfix">
				
			<div id="header">
						
				<div id="top-links">
							
                	<?php
						$contactme = get_option('woo_contactme'); // Name of the contact me page
						$GLOBALS['contactme_id'] = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$contactme'");
					?>
									
					<a href="<?php echo bloginfo('wpurl').'/?page_id='.$GLOBALS['contactme_id']; ?>">Contact Me</a> | <a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>">Subscribe</a>
				
				</div><!-- End top-links -->
						
				<div id="banner" class="clearfix">
					
						<div id="logo" class="clearfix">
							<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
							<h2><?php bloginfo('description'); ?></h2>
						</div>
							
					<?php include( TEMPLATEPATH . '/searchform-header.php' ); ?>
							
				</div><!-- End banner -->
						
				<ul id="navigation">
					<li><a href="<?php bloginfo('url'); ?>">
							Home
							<span>Where it all began</span>
						</a>
					</li>
					<?php woothemes_get_pages(); ?>
				</ul><!-- End navigation -->
						
			</div><!-- End header -->