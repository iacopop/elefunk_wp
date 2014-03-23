<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script type="text/javascript" src="<?php echo home_url(); ?>/wp-content/themes/elefunk-twentyten/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo home_url(); ?>/wp-content/themes/elefunk-twentyten/js/s3Slider.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
   $('#s3slider').s3Slider({
      timeOut: 7000
   });
});
</script>




</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="masthead">
			<div id="branding" role="banner">
<!-- INIZIO SLIDER -->
<div id="s3slider">
   <!--<ul id="s3sliderContent">
      <li class="s3sliderImage">
          <img src="<?php echo home_url(); ?>/wp-content/themes/elefunk-twentyten/images/header_4.png" />
          <span class="right" style="display:inline;">Siamo la rivoluzione <br/>della Musica Italiana!<br/><br/>
              <a href="<?php echo home_url(); ?>/contatti">Chiamaci a suonare <br/>nella tua festa o nel tuo locale!</a>

          </span>
      </li>
      <li class="s3sliderImage">
          <img src="<?php echo home_url(); ?>/wp-content/themes/elefunk-twentyten/images/header_4.png" />
          <span class="right" style="display:inline;">La nostra Missione &egrave;<br/>
              <strong>Funkifizzare lo Stivale!</strong><br/>
              Cosa significa?<br/>
              Vieni a scoprirlo <br/>ascoltando la nostra <br/><a href="<?php echo home_url(); ?>/concerti">musica dal vivo</a>
          </span>
      </li>
      <div class="clear s3sliderImage"></div>
   </ul>-->
</div>


<!--FINE SLIDER -->




			</div><!-- #branding -->

			<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div><!-- #access -->
		</div><!-- #masthead -->
	</div><!-- #header -->
        <div class="header_bot"></div>
	<div id="main">
