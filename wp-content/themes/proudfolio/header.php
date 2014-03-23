<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>

<head profile="http://gmpg.org/xfn/11">
		
		<title><?php bloginfo('name'); if ( is_404() ) : _e(' &raquo; ', 'sandbox'); _e('Not Found', 'sandbox'); elseif ( is_front_page() || is_home() ) : _e('', 'sandbox'); else : wp_title(); endif; ?></title>
		<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
		<link rel="alternate" type="application/rss+xml" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Posts RSS feed', 'sandbox'); ?>" />
		<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Comments RSS feed', 'sandbox'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
		<!--[if lte IE 7]>
			<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style/css/ie.css" />
		<![endif]-->
		<!--[if lte IE 6]>
			<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style/css/ie6.css" />
		<![endif]-->
		
		<?php if ( get_option('woo_altone') ) { ?><link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style/css/alternative01.css" /><?php } ?>
		<?php if ( get_option('woo_alttwo') ) { ?><link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style/css/alternative02.css" /><?php } ?>		
	
		<?php wp_head() ?>
		
		<?php include('includes/cat-info.php'); ?>

</head>
	
	<body class="<?php sandbox_body_class() ?> hfeed">
	
		<div class="wrapper">
			<h1><a href="<?php echo get_option('home') ?>/" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo('name') ?></a></h1>
			<p class="description"><?php bloginfo('description') ?> <a href="<?php echo get_option('woo_about'); ?>" title="Read more about me...">Read more &#187;</a></p>
			<ul class="nav">
				<?php if ( is_single() ) { include ('includes/cat-single.php'); } else { include ('includes/cat-archive.php'); } ?>
            	<li <?php if ( is_home() ) { ?> class="current_page_item" <?php } ?> id="homeButton"><a href="<?php echo get_option('home'); ?>/">Home</a></li>
            	<li <?php if ( $display_portfolio ) { ?> class="current_page_item" <?php } ?>><a href="<?php echo $GLOBALS['portfolio_link']; ?>">Portfolio</a></li>
            	<li <?php if ( $display_blog ) { ?> class="current_page_item" <?php } ?>><a href="<?php echo $GLOBALS['blog_link']; ?>">Blog</a></li>
            <?php wp_list_pages('sort_column=menu_order&title_li='); ?>
			</ul><!-- .nav -->			