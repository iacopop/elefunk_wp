<?php
/**
 * @package WordPress
 * @subpackage myWebBlog_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	
	<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php if (get_settings('woo_feedburner_url')){echo get_settings('woo_feedburner_url');} else{ bloginfo('rss2_url');} ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	    
	<!--[if lt IE 7]>
	<script src="<?php bloginfo( 'template_directory' ); ?>/includes/js/pngfix.js" type="text/javascript"></script>
    <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php bloginfo( 'template_directory'); ?>/includes/js/menu.js"></script>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie.css" type="text/css" media="screen" /> 
    <![endif]-->
    
    
	
		
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	
	<?php mwb_style(); ?>
	<?php wp_head(); ?>

</head>

<body>

	<div id="body-top-left">
	
		<div id="container">
		
			<div id="header" class="clearfix">
		
				<div id="logo">
					<h1><a href="<?php bloginfo( 'home' ); ?>"><img alt="<?php bloginfo(); ?>" src="<?php if(get_settings('woo_logo')){echo get_settings('woo_logo');} else { echo get_bloginfo('template_url') .'/images/logo.png';} ?>" /></a></h1>
				</div>
				<!-- End logo -->
				
				<p id="about">
					<?php bloginfo( 'description' ); ?>
				</p><!-- End about -->
				
			</div><!-- End header -->
			
			<div id="top-nav">
			
				<ul id="categories" class="clearfix">
				
					<?php
						$getcats = get_categories( 'hierarchical=1&hide_empty=1&include=' . get_inc_categories("woo_cat_nav_") );
						foreach( $getcats as $thecat ) {
							if ( $thecat->category_parent == '0' ) {
								echo '
								<li'.(single_cat_title( "", false ) == $thecat->name ? ' class="current_page_item"' : '').'>
									<a href="' . get_category_link( $thecat->term_id ) . '" title="View Posts in &quot;' . $thecat->name . '&quot;: ' . $thecat->description . '">
										' . $thecat->name . '
										<span>' . $thecat->description . '</span>
									</a>';
								
									 if (get_category_children($thecat->cat_ID) ) {
										echo'<ul>';
											wp_list_categories('title_li&child_of=' . $thecat->cat_ID );
										echo'</ul>';
									}
								echo'</li>';
							}
						}
					?>
				
					
				
				</ul><!-- End categories -->
				
				<div id="top-meta" class="clearfix">
				
					<?php include( TEMPLATEPATH . '/searchform-header.php' ); ?>
					
					<p id="subscribe">Stay Updated: <a href="<?php bloginfo( 'rss2_url' ); ?>">Posts</a> | <a href="<?php bloginfo( 'comments_rss2_url' ); ?>">Comments</a> </p>
				
				</div><!-- End top-meta -->
			
			</div><!-- End top-nav -->
			
			<div id="main-content" class="clearfix">

				<?php if( is_home() ) : ?>
					<?php 
						if( function_exists( 'lifestream_latest_widget' ) ) {
							lifestream_latest_widget(); 
						}
					?>
				<?php endif; ?>
				
				<div class="col-642 left">
								
					<ul id="navigation" class="clearfix">
						<li<?php if( is_home() ) { echo' class="current_page_item"'; } ?>><a href="<?php bloginfo( 'home' ); ?>"><span>Home</span></a></li>
						<?php wp_list_pages( 'title_li=&depth=&link_before=<span>&link_after=</span>' ); ?>
					</ul><!-- End navigation -->