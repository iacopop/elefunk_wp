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
<?php if ( get_option('woo_centered') == "true" ) { ?><link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/centered.css" media="screen" /><?php } ?>

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
<!--[if lt IE 7]>
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta2)/IE7.js" type="text/javascript"></script>
<![endif]-->

<?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>  
<?php wp_head(); ?>

</head>

<body>

<!-- TOP MENU STARTS -->
	<div id="top-menu-out">
	<div id="top-menu">
		<ul>
			<?php if (is_page()) { $highlight = "page_item"; } else {$highlight = "page_item current_page_item"; } ?>
			<li class="<?php echo $highlight; ?> first"><a href="<?php bloginfo('url'); ?>">Home</a></li>
			<?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
		</ul>
	</div>
	</div>
	<!-- TOP MENU ENDS -->
	<!-- HEADER STARTS -->
	<div id="header-out">
	<div id="header-bg">
	<div id="header">
		<div class="col-left">
			<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>">
            	<img src="<?php if ( get_option('woo_logo') <> "" ) { echo get_option('woo_logo'); } else { bloginfo('template_directory'); ?>/images/logo-trans.png<?php } ?>" alt="<?php bloginfo('name'); ?>" />
            </a>	
			<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		</div>
		<div class="col-right">
			<div class="date"><p><?php echo date("l, F jS, Y"); ?></p></div>
			<div id="search">
				<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
					<div>
						<label for="search">Search</label>
						<input type="text" name="s" id="s" />
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
	</div>
	<!-- HEADER ENDS -->
	<!-- MAIN MENU STARTS -->
	<div id="main-menu-out">
	<?php if (!get_option('woo_suckerfish') == "true") : ?>    
	<div id="main-menu" class="normal">
		<ul>
			<?php echo preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a>@i', '<li$1><a$2><span>$3</span></a>', wp_list_categories('echo=0&orderby=name&title_li=&depth=1')); ?>
		</ul>
	</div>
    <?php else : ?>
	<div id="main-menu" class="">
    	<ul>
        	<?php wp_list_categories('sort_column=menu_order&depth=3&title_li=&exclude='); ?>
        </ul>
    </div>
    <?php endif; ?>    
	</div>
	<!-- MAIN MENU out ENDS -->

	<?php if (!get_option('woo_suckerfish')) : ?>    
	<!-- SUB CAT STARTS -->
	<?php 
	if (is_category()) { 
		$this_category = get_category($cat); 
    	if($this_category->category_parent)
    		$this_category = wp_list_categories('orderby=id&show_count=0&title_li=&child_of='.$this_category->category_parent."&echo=0");
		else
    		$this_category = wp_list_categories('orderby=id&show_count=0&title_li=&child_of='.$this_category->cat_ID."&echo=0"); 
	}
	
	if (is_archive() && is_category() && ($this_category != "<li>No categories</li>")) { 
	?>   

	<div id="subcat-menu-out">
        <div id="subcat-menu">

			<?php if ($this_category) { ?>
            <ul class="wrap">
                <?php echo $this_category; ?>
            </ul>
            <?php }  ?> 

        </div>
	</div>

    <?php } ?>
	<!-- SUB CAT ENDS -->    
    <?php endif; ?>    
    