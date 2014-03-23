<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
<meta name="description" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<title><?php bloginfo('name'); wp_title(); ?></title>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>

<body>

<!-- Wrap Starts -->
<div id="wrap-out">
<div id="wrap">

	<!-- Top Starts -->
	<div id="top">
		<!-- Menu Starts -->
		<div id="menu">
			<ul>
				<?php if (is_page()) { $highlight = "page_item"; } else {$highlight = "page_item current_page_item"; } ?>
                <li class="<?php echo $highlight; ?>"><a href="<?php bloginfo('url'); ?>">Home</a></li>
				<?php wp_list_pages('sort_column=menu_order&title_li=&exclude=' . get_option('woo_page_ex') ); ?>
			</ul>
		</div>
		<!-- Menu Ends -->
		<!-- Search Starts -->
		<div class="search">
			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
				<div>
					<input type="text" class="field" name="s" id="s" value="search" onfocus="if (this.value == 'search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'search';}" />
					<input type="image" src="<?php bloginfo('template_directory'); ?>/<?php woo_style_path(); ?>/img_search_submit.gif" class="submit" name="submit" />
				</div>
			</form>
		</div>
		<!-- Search Ends -->
	</div>
	<!-- Top Ends -->
	
	<!-- Title Starts -->
	<div id="title">
		<a href="<?php bloginfo('url'); ?>"><img src="<?php if ( get_option('woo_logo') <> "" ) { echo get_option('woo_logo'); } else { ?><?php bloginfo('stylesheet_directory'); ?>/<?php woo_style_path(); ?>/img_logo-trans.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a>
		<h1 class="hide"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
	</div>
	<!-- Title Ends -->