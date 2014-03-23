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

	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lte IE 6]>
	<script defer type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/pngfix.js"></script>
	<![endif]-->	
	
	<?php // if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>

</head>

<body>

	<?php
		$template_path = get_bloginfo('template_directory');
		$GLOBALS['defaultgravatar'] = $template_path . '/images/gravatar.jpg';
	?>
	
	<div class="footer">
	
	<div id="navigation">
		
		<div class="pad clearfix">
			
			<ul id="navigation-links" class="left">
				<li><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?> - Home">Home</a></li> 
				<?php wp_list_pages('title_li=&depth=1'); ?>
			</ul>
			
			<div class="right">
				<div class="rss">Subscribe: <a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" title="URL for Posts RSS 2.0 Feed">Posts</a> | <a href="<?php bloginfo('comments_rss2_url'); ?>" title="URL for comments RSS 2.0 Feed">Comments</a> | <a href="http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php $feedburner_id = get_option('woo_feedburner_id'); echo $feedburner_id; ?>" target="_blank" title="Subscribe via E-mail">E-mail</a></div>
			</div>
		
		</div>
		
	</div><!--/navigation -->
	
	<div id="categories">
	
		<ul id="categories-back">
			<?php
				$getcats = get_categories('hierarchical=0&hide_empty=0&include=' . get_inc_categories("woo_cat_nav_"));
				$count = 1;
				foreach($getcats as $thecat) {
					echo '<li'.($count == count($getcats) ? ' class="blank"' : '').'><a href="'.get_category_link($thecat->term_id).'" title="View Posts in &quot;'.$thecat->name.'&quot;: '.$thecat->description.'"><span class="h3">'.$thecat->name.'</span><span class="h5 block">'.$thecat->description.'</span></a></li>';
					$count++;
				}
			?>
		</ul>
	
	</div><!--categories-->
	
	<div id="content-back" class="clearfix">
		
		<h1><a href="<?php bloginfo('url'); ?>"><img src="<?php if ( get_option('woo_logo') <> "" ) { echo get_option('woo_logo'); } else { ?><?php bloginfo('template_directory'); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a></h1>