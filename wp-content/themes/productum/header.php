<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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

	<?php wp_head(); ?>
    <?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
    
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/960.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" media="all" />
	<!--[if lte IE 7]><link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css" /><![endif]-->
    <!--[if lt IE 7]>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/pngfix.js"></script>
	<![endif]-->
    
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />

	
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" /> 
    
</head>

<body<?php if ( is_front_page() ) { ?> id="home"<?php } ?> class="custom">

	<div id="wrap">

		<ul class="skip">
			<li><a href="#nav">Skip to Navigation</a></li>
			<li><a href="#content">Skip to Content</a></li>
		</ul>

		<div id="header">
            
            <h1 id="logo"><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><img src="<?php if ( get_option('woo_logo') <> "" ) {  echo get_option('woo_logo'); } else { ?><?php bloginfo('stylesheet_directory'); ?>/<?php woo_style_path(); ?>/logo.png<?php } ?>" alt="" /></a></h1>

			<?php if ( !is_front_page() ) { ?><p id="tagline"><?php bloginfo('description'); ?></p><?php } ?>

	
        
			 <ul id="nav">
			
			<li<?php if(is_home()) echo ' class="current_page_item"'; ?>><a href="<?php bloginfo('url'); ?>">Home</a></li>
            <?php if ( get_option('woo_blog_permalink') == 'true' ) { ?><li <?php if ( is_category() || is_search() || is_single() || is_tag() || is_search() || is_archive() ) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_option('home'); echo get_option('woo_blog_permalink'); ?>" title="Blog"><span>Blog</span></a></li><?php } ?>
			<?php 
            if (get_option('woo_cat_nav') == 'true' ) 
                wp_list_categories('sort_column=menu_order&depth=3&title_li=&exclude='.get_option('woo_nav_exclude')); 
            else
                wp_list_pages('sort_column=menu_order&depth=3&title_li=&exclude='.get_option('woo_nav_exclude')); 
            ?>

			</ul>


<?php if ( is_front_page() ) { ?>

			<div id="featuredTxt">
			
			<h2><?php echo stripslashes(get_option('woo_about_header')); ?></h2>
                
			<p><?php echo stripslashes(get_option('woo_about_text')); ?></p>

				
			</div>

             <ul id="featuredNav">

                <?php if (get_option('woo_about_button_1')) { ?><li><a href="<?php echo get_option('woo_button_link_1'); ?>" title="Read more about me"><?php echo stripslashes(get_option('woo_about_button_1')); ?></a></li><?php } ?>
				<?php if (get_option('woo_about_button_2')) { ?><li><a href="<?php echo get_option('woo_button_link_2'); ?>" title="Read more about me"><?php echo stripslashes(get_option('woo_about_button_2')); ?></a></li><?php } ?>

			</ul>
            
            <div id="loader"></div>
				
			<div id="featuredImg">

				<p>
               <a id="featured-link" href="<?php if ( get_option('woo_featured_1_linkout') <> '' ) { echo get_option('woo_featured_1_linkout').''; } else {echo '#'; } ?>" title="<?php bloginfo('name'); ?>">
                <img id="featured" src="<?php if ( get_option('woo_featured_1') <> '' ) { echo get_option('woo_featured_1').''; } else { bloginfo('template_directory'); ?>/images/img-featured-01.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a>
                
                </p>

			</div>
<?php } ?>

		</div><!-- / #header -->

		<div id="content">

			<div id="contentWrap" class="container_16">
