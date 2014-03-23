<?php

// =============================== Blog Large widget (Home) ======================================
function blog_largeWidget()
{
	$settings = get_option("widget_blog_largewidget");

	$title = $settings['title'];
	$number = $settings['number'];	

?>

	<div id="blog_large">
		
		<div class="title">
			<h3><?php if ( $title <> "" ) { echo $title; } else { echo 'Latest from my blog...'; } ?></h3>
			<span class="rss"><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>"><img src="<?php bloginfo('template_directory'); ?>/images/ico-rss.gif" alt="Subscribe to the RSS Feed" /></a></span>
			<div class="fix"></div>
		</div><!-- /title -->
		
		<?php query_posts('cat=-' . $GLOBALS[portfolio_cat] . '&showposts=' . $number); ?>
		
		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		
			<div class="post">
				
				<div class="category"><?php the_category(', '); ?></div><!-- /category -->
				
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="meta">Posted on <?php the_time('d F Y'); ?> <span class="comments"><a href="<?php comments_link(); ?>" title="View comments for this post"><?php comments_number('(0)','(1)','(%)'); ?></a></span></div><!-- /meta -->
				
				<div class="entry">
					<?php if ( get_option('woo_content_home') ) { the_content('[...]'); } else { the_excerpt(); ?>
					<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">Continue Reading...</a></p>
					<?php } ?>
				</div><!-- /entry -->
			
			</div><!-- /post -->
		
		<?php endwhile; endif; ?>
		
		<div class="fix"></div>
	
	</div><!-- /blog_large -->

<?php
}

function blog_largeWidgetAdmin() {

	$settings = get_option("widget_blog_largewidget");

	// check if anything's been sent
	if (isset($_POST['update_blog_large'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['blog_large_title']));
		$settings['number'] = strip_tags(stripslashes($_POST['blog_large_number']));

		update_option("widget_blog_largewidget",$settings);
	}

	echo '<p>
			<label for="blog_large_title">Widget Title:
			<input id="blog_large_title" name="blog_large_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<p>
			<label for="blog_large_number">Number of posts to display:
			<input id="blog_large_number" name="blog_large_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';			
	echo '<p>Remember to set the other settings for this widget on the Geometric Options tab.</p>';
	echo '<input type="hidden" id="update_blog_large" name="update_blog_large" value="1" />';

}

register_sidebar_widget('Woo - Blog Large (Home)', 'blog_largeWidget');
register_widget_control('Woo - Blog Large (Home)', 'blog_largeWidgetAdmin', 400, 200);


// =============================== Blog Small widget (Home) ======================================
function blog_smallWidget()
{
	$settings = get_option("widget_blog_smallwidget");

	$title = $settings['title'];
	$number = $settings['number'];	

?>

	<div id="blog_small">
		
		<div class="title">
			<h3><?php if ( $title <> "" ) { echo $title; } else { echo 'Latest from my blog...'; } ?></h3>
			<span class="rss"><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>"><img src="<?php bloginfo('template_directory'); ?>/images/ico-rss.gif" alt="Subscribe to the RSS Feed" /></a></span>
			<div class="fix"></div>
		</div><!-- /title -->
		
		<div class="grid_6 alpha">
		
		<?php query_posts('cat=-' . $GLOBALS[portfolio_cat] . '&showposts=1'); ?>
		
		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		
			<div class="post">
				
				<div class="category"><?php the_category(', '); ?></div><!-- /category -->
				<div class="meta"><?php the_time('d M Y'); ?> <span class="comments"><a href="<?php comments_link(); ?>" title="View comments for this post"><?php comments_number('(0)','(1)','(%)'); ?></a></span></div><!-- /meta -->
				
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				
				<div class="entry">
					<?php the_excerpt(); ?>
					<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">Continue Reading...</a></p>
				</div><!-- /entry -->
			
			</div><!-- /post -->
		
		<?php endwhile; endif; ?>
		
		</div><!-- /grid_6 -->

		<div id="more" class="grid_6 omega">
		
		<div class="more">More posts from my blog...</div><!-- /more -->
		<div class="fix"></div>
		
		<?php query_posts('cat=-' . $GLOBALS[portfolio_cat] . '&offset=1&showposts=' . $number); ?>
		
		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		
			<div class="post">
				
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="meta">Posted on <?php the_time('d F Y'); ?> <span class="comments"><a href="<?php comments_link(); ?>" title="View comments for this post"><?php comments_number('(0)','(1)','(%)'); ?></a></span></div><!-- /meta -->
			
			</div><!-- /post -->
		
		<?php endwhile; endif; ?>
		
		</div><!-- /grid_6 -->
		
		<div class="fix"></div>
	
	</div><!-- /blog_small -->

<?php
}

function blog_smallWidgetAdmin() {

	$settings = get_option("widget_blog_smallwidget");

	// check if anything's been sent
	if (isset($_POST['update_blog_small'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['blog_small_title']));
		$settings['number'] = strip_tags(stripslashes($_POST['blog_small_number']));

		update_option("widget_blog_smallwidget",$settings);
	}

	echo '<p>
			<label for="blog_small_title">Widget Title:
			<input id="blog_small_title" name="blog_small_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<p>
			<label for="blog_small_number">Number of "more" posts to display:
			<input id="blog_small_number" name="blog_small_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';			
	echo '<p>Remember to set the other settings for this widget on the Geometric Options tab.</p>';
	echo '<input type="hidden" id="update_blog_small" name="update_blog_small" value="1" />';

}

register_sidebar_widget('Woo - Blog Small (Home)', 'blog_smallWidget');
register_widget_control('Woo - Blog Small (Home)', 'blog_smallWidgetAdmin', 400, 200);


// =============================== Portfolio widget ======================================
function portfolio_homeWidget()
{
	$settings = get_option("widget_portfolio_homewidget");

	$title = $settings['title'];

?>

	<div id="portfolio">
		
		<div class="title">
			<h3><?php if ( $title <> "" ) { echo $title; } else { echo 'Latest from my portfolio...'; } ?></h3>
			<span class="rss"><a href="<?php get_category_rss_link(true, $GLOBALS[portfolio_cat]); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/ico-rss.gif" alt="Subscribe to the RSS Feed for my Portfolio" /></a></span>
			<div class="fix"></div>
		</div><!-- /title -->
		
		<?php $counter = 0; ?>
		<?php query_posts('cat=' . $GLOBALS[portfolio_cat] . '&showposts=' . get_option('woo_portfolio_posts') ); ?>
		
		<?php if (have_posts()) :  while (have_posts()) : the_post(); $counter++; ?>
		
		<?php
            
   		$layout = get_option('woo_layout');

			include( TEMPLATEPATH . '/portfolio-layouts/' . $layout );
            
		?>
		
		<?php endwhile; endif; ?>
		
		<div class="fix"></div>
	
	</div><!-- /portfolio -->	

<?php
}

function portfolio_homeWidgetAdmin() {

	$settings = get_option("widget_portfolio_homewidget");

	// check if anything's been sent
	if (isset($_POST['update_portfolio_home'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['portfolio_home_title']));
		$settings['number'] = strip_tags(stripslashes($_POST['portfolio_home_number']));

		update_option("widget_portfolio_homewidget",$settings);
	}

	echo '<p>
			<label for="portfolio_home_title">Widget Title:
			<input id="portfolio_home_title" name="portfolio_home_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<p>Remember to set the other settings for this widget on the Geometric Options tab.</p>';
	echo '<input type="hidden" id="update_portfolio_home" name="update_portfolio_home" value="1" />';

}

register_sidebar_widget('Woo - Portfolio (Home)', 'portfolio_homeWidget');
register_widget_control('Woo - Portfolio (Home)', 'portfolio_homeWidgetAdmin', 400, 200);


// =============================== About / Social widget (Home) ======================================
function personalWidget()
{
	$settings = get_option("widget_personalwidget");

	$title = $settings['title'];
	$title2 = $settings['title2'];	

?>

	<div id="personal">
	
		<div id="about" class="grid_6 alpha">
			
			<div class="title">
				<h3><?php if ( $title <> "" ) { echo $title; } else { echo 'About Me'; } ?></h3>
			</div>
			
			<div class="entry">
			
				<div class="wp-caption alignright"><img src="<?php echo get_option('woo_gravatar'); ?>" alt="About Me" /></div>
				
				<?php echo stripslashes( get_option('woo_about') ); ?>
							
			</div><!-- /entry -->
		
		</div><!-- /about -->

		<div id="social" class="grid_6 omega">

			<div class="alt-title">
				<h3><?php if ( $title2 <> "" ) { echo $title2; } else { echo 'My Social Profiles'; } ?></h3>
			</div>
			
			<div class="entry">
				
				<ul>
					<?php if ( get_option('woo_delicious') <> "" ) { ?><li><a class="icon-delicious" href="http://delicious.com/<?php echo get_option('woo_delicious'); ?>" target="_blank">Delicious</a></li><?php } ?>
					<?php if ( get_option('woo_digg') <> "" ) { ?><li><a class="icon-digg" href="<?php echo get_option('woo_digg'); ?>" target="_blank">Digg</a></li><?php } ?>
					<?php if ( get_option('woo_facebook') <> "" ) { ?><li><a class="icon-facebook" href="<?php echo get_option('woo_facebook'); ?>" target="_blank">Facebook</a></li><?php } ?>
					<?php if ( get_option('woo_flickr') <> "" ) { ?><li><a class="icon-flickr" href="http://www.flickr.com/photos/<?php echo get_option('woo_flickr'); ?>" target="_blank">Flickr</a></li><?php } ?>
					<?php if ( get_option('woo_lastfm') <> "" ) { ?><li><a class="icon-lastfm" href="<?php echo get_option('woo_lastfm'); ?>" target="_blank">Last.fm</a></li><?php } ?>
					<?php if ( get_option('woo_linkedin') <> "" ) { ?><li><a class="icon-linkedin" href="<?php echo get_option('woo_linkedin'); ?>" target="_blank">LinkedIn</a></li><?php } ?>
					<?php if ( get_option('woo_twitter') <> "" ) { ?><li><aclass="icon-twitter" href="http://www.twitter.com/<?php echo get_option('woo_twitter'); ?>" target="_blank">Twitter</a></li><?php } ?>
					<?php if ( get_option('woo_youtube') <> "" ) { ?><li><a class="icon-youtube" href="<?php echo get_option('woo_youtube'); ?>" target="_blank">YouTube</a></li><?php } ?>
					<?php if ( get_option('woo_stumble') <> "" ) { ?><li><a class="icon-stumble" href="<?php echo get_option('woo_stumble'); ?>" target="_blank">StumbleUpon</a></li><?php } ?>								
				</ul>
				
			</div><!-- /entry -->
		
		</div><!-- /social -->	
		
		<div class="fix"></div>	
	
	</div><!-- /personal -->

<?php
}

function personalWidgetAdmin() {

	$settings = get_option("widget_personalwidget");

	// check if anything's been sent
	if (isset($_POST['update_personal'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['personal_title']));
		$settings['title2'] = strip_tags(stripslashes($_POST['personal_title2']));

		update_option("widget_personalwidget",$settings);
	}

	echo '<p>
			<label for="personal_title">About Widget Title:
			<input id="personal_title" name="personal_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<p>
			<label for="personal_title2">Social Profiles Widget Title:
			<input id="personal_title2" name="personal_title2" type="text" class="widefat" value="'.$settings['title2'].'" /></label></p>';			
	echo '<p>Remember to set the other settings for this widget on the Geometric Options tab.</p>';
	echo '<input type="hidden" id="update_personal" name="update_personal" value="1" />';

}

register_sidebar_widget('Woo - About / Social (Home)', 'personalWidget');
register_widget_control('Woo - About / Social (Home)', 'personalWidgetAdmin', 400, 200);


// =============================== Ad 125x125 widget (Home) ======================================
function adsWidget()
{

	include( TEMPLATEPATH . '/ads/advert125x125.php' );

}
register_sidebar_widget('Woo - Ads 125x125 (Home)', 'adsWidget');


// =============================== Portfolio widget (Sidebar) ======================================
function portfolioWidget()
{
	$settings = get_option("widget_portfoliowidget");

	$title = $settings['title'];
	$number = $settings['number'];

?>

	<div id="portfolio_widget" class="block widget">
	
		<h2><?php if ( $title <> "" ) { echo $title; } else { echo 'My Portfolio Projects'; } ?></h2>
		
		<ul>

			<?php
				 global $post;
				 $myposts = get_posts('numberposts=' . $number . '&category=' . $GLOBALS[portfolio_cat] );
				 foreach($myposts as $post) :
 			?>
 			
    			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			
			 <?php endforeach; ?>		
		
		</ul>
	
	</div><!-- /widget -->

<?php
}

function portfolioWidgetAdmin() {

	$settings = get_option("widget_portfoliowidget");

	// check if anything's been sent
	if (isset($_POST['update_portfolio'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['portfolio_title']));
		$settings['number'] = strip_tags(stripslashes($_POST['portfolio_number']));

		update_option("widget_portfoliowidget",$settings);
	}

	echo '<p>
			<label for="portfolio_title">Widget Title:
			<input id="portfolio_title" name="portfolio_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<p>
			<label for="portfolio_number">Number of portfolio items:
			<input id="portfolio_number" name="portfolio_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<p>Remember to set the other settings for this widget on the Geometric Options tab.</p>';			
	echo '<input type="hidden" id="update_portfolio" name="update_portfolio" value="1" />';

}

register_sidebar_widget('Woo - Portfolio / Projects', 'portfolioWidget');
register_widget_control('Woo - Portfolio / Projects', 'portfolioWidgetAdmin', 400, 200);


// =============================== Social Profiles (Sidebar) ======================================
function socialWidget()
{
	$settings = get_option("widget_socialwidget");

	$title = $settings['title'];

?>

	<div id="social_widget" class="widget block">
	
		<h2><?php if ( $title <> "" ) { echo $title; } else { echo 'My Social Profiles'; } ?></h2>
		
		<ul>

					<?php if ( get_option('woo_delicious') <> "" ) { ?><li><a class="icon-delicious" href="http://delicious.com/<?php echo get_option('woo_delicious'); ?>" target="_blank">Delicious</a></li><?php } ?>
					<?php if ( get_option('woo_digg') <> "" ) { ?><li><a class="icon-digg" href="<?php echo get_option('woo_digg'); ?>" target="_blank">Digg</a></li><?php } ?>
					<?php if ( get_option('woo_facebook') <> "" ) { ?><li><a class="icon-facebook" href="<?php echo get_option('woo_facebook'); ?>" target="_blank">Facebook</a></li><?php } ?>
					<?php if ( get_option('woo_flickr') <> "" ) { ?><li><a class="icon-flickr" href="http://www.flickr.com/photos/<?php echo get_option('woo_flickr'); ?>" target="_blank">Flickr</a></li><?php } ?>
					<?php if ( get_option('woo_lastfm') <> "" ) { ?><li><a class="icon-lastfm" href="<?php echo get_option('woo_lastfm'); ?>" target="_blank">Last.fm</a></li><?php } ?>
					<?php if ( get_option('woo_linkedin') <> "" ) { ?><li><a class="icon-linkedin" href="<?php echo get_option('woo_linkedin'); ?>" target="_blank">LinkedIn</a></li><?php } ?>
					<?php if ( get_option('woo_twitter') <> "" ) { ?><li><aclass="icon-twitter" href="http://www.twitter.com/<?php echo get_option('woo_twitter'); ?>" target="_blank">Twitter</a></li><?php } ?>
					<?php if ( get_option('woo_youtube') <> "" ) { ?><li><a class="icon-youtube" href="<?php echo get_option('woo_youtube'); ?>" target="_blank">YouTube</a></li><?php } ?>
					<?php if ( get_option('woo_stumble') <> "" ) { ?><li><a class="icon-stumble" href="<?php echo get_option('woo_stumble'); ?>" target="_blank">StumbleUpon</a></li><?php } ?>								
		
		</ul>
	
	</div><!-- /widget -->

<?php
}

function socialWidgetAdmin() {

	$settings = get_option("widget_socialwidget");

	// check if anything's been sent
	if (isset($_POST['update_social'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['social_title']));

		update_option("widget_socialwidget",$settings);
	}

	echo '<p>
			<label for="social_title">Widget Title:
			<input id="social_title" name="social_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<p>Remember to set the other settings for this widget on the Geometric Options tab.</p>';
	echo '<input type="hidden" id="update_social" name="update_social" value="1" />';

}

register_sidebar_widget('Woo - Social Profiles (Side)', 'socialWidget');
register_widget_control('Woo - Social Profiles (Side)', 'socialWidgetAdmin', 400, 200);



// =============================== Flickr widget ======================================
function flickrWidget()
{
	$settings = get_option("widget_flickrwidget");

	$title = $settings['title'];
	$id = $settings['id'];
	$number = $settings['number'];

?>

<div id="flickr_widget" class="widget block">
	
	<h2><?php if ( $title <> "" ) { echo $title; } else { echo 'Flickr Photos'; } ?></h2>
	
	<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>        
	
	<div class="fix" style="height: 10px;"></div>
	
</div>

<?php
}

function flickrWidgetAdmin() {

	$settings = get_option("widget_flickrwidget");

	// check if anything's been sent
	if (isset($_POST['update_flickr'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['flickr_title']));
		$settings['id'] = strip_tags(stripslashes($_POST['flickr_id']));
		$settings['number'] = strip_tags(stripslashes($_POST['flickr_number']));

		update_option("widget_flickrwidget",$settings);
	}

	echo '<p>
			<label for="flickr_title">Widget Title:
			<input id="flickr_title" name="flickr_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<p>
			<label for="flickr_id">Flickr ID (<a href="http://www.idgettr.com">idGettr</a>):
			<input id="flickr_id" name="flickr_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>';
	echo '<p>
			<label for="flickr_number">Number of photos:
			<input id="flickr_number" name="flickr_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_flickr" name="update_flickr" value="1" />';

}

register_sidebar_widget('Woo - Flickr', 'flickrWidget');
register_widget_control('Woo - Flickr', 'flickrWidgetAdmin', 400, 200);


// =============================== Twitter widget ======================================
function twitterWidget()
{
	
?>

<div id="twitter_widget" class="widget block">

	<h2>Twitter Updates</h2>
	
	<ul id="twitter_update_list">
		<li></li>
	</ul>
	
	<ul>
		<li class="twitter_icon"><a href="http://www.twitter.com/<?php echo get_option('woo_twitter_user'); ?>">Follow me on Twitter</a></li>
	</ul>

</div>

<?php
}
register_sidebar_widget('Woo - Twitter', 'twitterWidget');


// =============================== Tag Cloud widget ======================================
function tagcloudWidget()
{
	
?>

<div id="tagcloud_widget" class="widget block">

	<h2>Tagcloud</h2>
	
	<?php if (function_exists('wp_tag_cloud')) { wp_tag_cloud('smallest=10&largest=18'); } ?>	

</div>

<?php
}
register_sidebar_widget('Woo - Tag Cloud', 'tagcloudWidget');

// =============================== Search widget ======================================
function searchWidget()
{

?>

<div id="search_widget" class="widget block">

    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
        <div>
        <input type="text" class="field" name="s" id="s"  value="Enter keywords..." onfocus="if (this.value == 'Enter keywords...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter keywords...';}" />
        <input type="submit" class="search_btn" value="SEARCH" name="submit" />
        </div>
    </form>
	
</div>

<?php

}
register_sidebar_widget('Woo - Search', 'SearchWidget');

?>