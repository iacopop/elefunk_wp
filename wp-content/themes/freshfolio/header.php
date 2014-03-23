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
        
    <!--[if lt IE 7]>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/unitpngfix.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/ie6.css" media="screen" />
   <![endif]--> 
    
    <?php wp_head(); ?>

</head>

<body>

<?php include(TEMPLATEPATH . '/includes/version.php'); ?>

<div id="background">

<div id="page">

	<div id="header">

		<div id="logo">
            <h1><a href="<?php bloginfo('url'); ?>"><img src="<?php if ( get_option('woo_logo') <> "" ) { echo get_option('woo_logo'); } else { ?><?php bloginfo('template_directory'); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a></h1>			
			<p id="description"><?php bloginfo('description') ?> <a href="<?php bloginfo('wpurl'); ?>/?page_id=<?php echo $GLOBALS['about_id']; ?>" title="Read more...">Read more &#187;</a></p>
		</div>
		<!--/logo-->

		<div id="menu">
			<div id="nav1">
				<ul>
                    <li <?php if ( is_home() ) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_option('home'); ?>/"><span>Home</span></a></li>
                    <?php
					$pages = wp_list_pages('sort_column=menu_order&title_li=&echo=0&depth=1&exclude='.$GLOBALS['archives_id']);
                    $pages = preg_replace('%<a ([^>]+)>%U','<a $1><span>', $pages);
                    $pages = str_replace('</a>','</span></a>', $pages);
                    echo $pages;
                    ?>
				</ul>
			</div>
			<!--/nav1-->
        </div>
        <!--menu-->

		<!-- Featured portfolio item -->
		<?php include(TEMPLATEPATH . '/includes/featured.php'); ?>
        
	</div>
	<!--/header -->