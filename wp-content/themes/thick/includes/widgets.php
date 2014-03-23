<?php

//Category List Widget
function CatListWidget()
{

?>

<ul>
	
	<li  class="widget">
	<h2>Categories</h2>	
		
	<ul id="categories">
	
	<?php
		$getcats = get_categories('hierarchical=0&hide_empty=0&include=' . get_inc_categories("woo_cat_nav_"));
		$count = 1;
		foreach($getcats as $thecat) {
			echo '<li><a href="'.get_category_link($thecat->term_id).'" title="View Posts in &quot;'.$thecat->name.'&quot;: '.$thecat->description.'">'.$thecat->name.'</a>'.$thecat->description.'</li>';
			$count++;
		}
	?>	
	</ul>
	
	</li>

</ul>

<?php

}

register_sidebar_widget('Detailed Category List (Left Sidebar)', 'CatListWidget');

// Games Widget
function GamesWidget()
{
	$settings = get_option("widget_gameswidget");

	$title = $settings['title'];
	$cat = $settings['cat'];
	$resize = $settings['resize'];

?>

	<h2 class="toggle"><?php echo $title; ?></h2>
	<ul>

			<?php DisplayBookmarks($cat,$resize,64,91); ?>	
	
	</ul>											

<?php
}

function GamesWidgetAdmin() {

	$settings = get_option("widget_gameswidget");

	// check if anything's been sent
	if (isset($_POST['update_games'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['games_title']));
		$settings['cat'] = strip_tags(stripslashes($_POST['games_category']));
		$settings['resize'] = strip_tags(stripslashes($_POST['games_resize']));

		update_option("widget_gameswidget",$settings);
	}


	echo '<p>
			<label for="games_title">Title:
			<input id="games_title" name="games_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	
	DisplayLinkCats('games',$settings['cat']);
	
	DisplayResizeOption('games',$settings['resize']);
	
	echo '<input type="hidden" id="update_games" name="update_games" value="1" />';

}

register_sidebar_widget('Favourite Games', 'GamesWidget');
register_widget_control('Favourite Games', 'GamesWidgetAdmin', 400, 200);

// Movies Widget
function MoviesWidget()
{
	$settings = get_option("widget_movieswidget");

	$title = $settings['title'];
	$cat = $settings['cat'];
	$resize = $settings['resize'];

?>

	<h2 class="toggle"><?php echo $title; ?></h2>
	<ul>

			<?php DisplayBookmarks($cat,$resize,64,91); ?>	
	
	</ul>											

<?php
}

function MoviesWidgetAdmin() {

	$settings = get_option("widget_movieswidget");

	// check if anything's been sent
	if (isset($_POST['update_movies'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['movies_title']));
		$settings['cat'] = strip_tags(stripslashes($_POST['movies_category']));
		$settings['resize'] = strip_tags(stripslashes($_POST['movies_resize']));

		update_option("widget_movieswidget",$settings);
	}


	echo '<p>
			<label for="movies_title">Title:
			<input id="movies_title" name="movies_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	
	DisplayLinkCats('movies',$settings['cat']);
	
	DisplayResizeOption('movies',$settings['resize']);
	
	echo '<input type="hidden" id="update_movies" name="update_movies" value="1" />';

}

register_sidebar_widget('Favourite Movies', 'MoviesWidget');
register_widget_control('Favourite Movies', 'MoviesWidgetAdmin', 400, 200);

// Books Widget
function BooksWidget()
{
	$settings = get_option("widget_bookswidget");

	$title = $settings['title'];
	$cat = $settings['cat'];
	$resize = $settings['resize'];

?>

	<h2 class="toggle"><?php echo $title; ?></h2>
	<ul>

			<?php DisplayBookmarks($cat,$resize,64,91); ?>	
	
	</ul>											

<?php
}

function BooksWidgetAdmin() {

	$settings = get_option("widget_bookswidget");

	// check if anything's been sent
	if (isset($_POST['update_books'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['books_title']));
		$settings['cat'] = strip_tags(stripslashes($_POST['books_category']));
		$settings['resize'] = strip_tags(stripslashes($_POST['books_resize']));

		update_option("widget_bookswidget",$settings);
	}


	echo '<p>
			<label for="books_title">Title:
			<input id="books_title" name="books_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	
	DisplayLinkCats('books',$settings['cat']);
	
	DisplayResizeOption('books',$settings['resize']);
	
	echo '<input type="hidden" id="update_books" name="update_books" value="1" />';

}

register_sidebar_widget('Favourite Books', 'BooksWidget');
register_widget_control('Favourite Books', 'BooksWidgetAdmin', 400, 200);

// Music Widget
function MusicWidget()
{
	$settings = get_option("widget_musicwidget");

	$title = $settings['title'];
	$cat = $settings['cat'];
	$resize = $settings['resize'];

?>

	<h2 class="toggle"><?php echo $title; ?></h2>
	<ul>

			<?php DisplayBookmarks($cat,$resize,64,64); ?>	
	
	</ul>											

<?php
}

function MusicWidgetAdmin() {

	$settings = get_option("widget_musicwidget");

	// check if anything's been sent
	if (isset($_POST['update_music'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['music_title']));
		$settings['cat'] = strip_tags(stripslashes($_POST['music_category']));
		$settings['resize'] = strip_tags(stripslashes($_POST['music_resize']));

		update_option("widget_musicwidget",$settings);
	}


	echo '<p>
			<label for="music_title">Title:
			<input id="music_title" name="music_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	
	DisplayLinkCats('music',$settings['cat']);
	
	DisplayResizeOption('music',$settings['resize']);
	
	echo '<input type="hidden" id="update_music" name="update_music" value="1" />';

}

register_sidebar_widget('Favourite Music', 'MusicWidget');
register_widget_control('Favourite Music', 'MusicWidgetAdmin', 400, 200);

//Flickr Widget (Right)
function FlickrWidget()
{
	$settings = get_option("widget_flickrwidget");

	$photos = $settings['photos'];

?>

	<li class="widget">
		
		<h2>Recent Photos</h2>

		<div id="photos2">
			<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $photos; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo get_option('woo_flickr_id'); ?>"></script>
		</div>

	</li>
		
<?php

}

function FlickrWidgetAdmin() {

	$settings = get_option("widget_flickrwidget");

	// check if anything's been sent
	if (isset($_POST['update_flickr'])) {
		$settings['photos'] = strip_tags(stripslashes($_POST['flickr_photos']));

		update_option("widget_flickrwidget",$settings);
	}


	echo '<p>
			<label for="flickr_photos">Select the amount of Flickr photos to be displayed:
			<input id="flickr_photos" name="flickr_photos" type="text" class="widefat" value="'.$settings['photos'].'" /></label></p>';
	
	echo '<input type="hidden" id="update_flickr" name="update_flickr" value="1" />';

}


register_sidebar_widget('Flickr Photos (Right Sidebar)', 'FlickrWidget');
register_widget_control('Flickr Photos (Right Sidebar)', 'FlickrWidgetAdmin', 400, 200);

//Social Profiles Widget (Right)
function SocialWidget()
{

?>

	<li class="widget">
		
		<h2>Social Profiles</h2>

		<ul>
			<?php if ( get_option('woo_delicious') <> "" ) { ?><li class="icon-delicious"><a href="http://delicious.com/<?php echo get_option('woo_delicious'); ?>" target="_blank">Delicious</a></li><?php } ?>
			<?php if ( get_option('woo_digg') <> "" ) { ?><li class="icon-digg"><a href="<?php echo get_option('woo_digg'); ?>" target="_blank">Digg</a></li><?php } ?>
			<?php if ( get_option('woo_facebook') <> "" ) { ?><li class="icon-facebook"><a href="<?php echo get_option('woo_facebook'); ?>" target="_blank">Facebook</a></li><?php } ?>
			<?php if ( get_option('woo_flickr') <> "" ) { ?><li class="icon-flickr"><a href="http://www.flickr.com/photos/<?php echo get_option('woo_flickr'); ?>" target="_blank">Flickr</a></li><?php } ?>
			<?php if ( get_option('woo_lastfm') <> "" ) { ?><li class="icon-lastfm"><a href="<?php echo get_option('woo_lastfm'); ?>" target="_blank">Last.fm</a></li><?php } ?>
			<?php if ( get_option('woo_linkedin') <> "" ) { ?><li class="icon-linkedin"><a href="<?php echo get_option('woo_linkedin'); ?>" target="_blank">LinkedIn</a></li><?php } ?>
			<?php if ( get_option('woo_twitter') <> "" ) { ?><li class="icon-twitter"><a href="http://www.twitter.com/<?php echo get_option('woo_twitter'); ?>" target="_blank">Twitter</a></li><?php } ?>
			<?php if ( get_option('woo_youtube') <> "" ) { ?><li class="icon-youtube"><a href="<?php echo get_option('woo_youtube'); ?>" target="_blank">YouTube</a></li><?php } ?>
			<?php if ( get_option('woo_stumble') <> "" ) { ?><li class="icon-stumble"><a href="<?php echo get_option('woo_stumble'); ?>" target="_blank">StumbleUpon</a></li><?php } ?>			
		</ul>

	</li>		
		
<?php

}

register_sidebar_widget('Your Social Profiles (Right Sidebar)', 'SocialWidget');

//120x240 Ad Widget (Right)
function Ad_120x240_Widget()
{

?>

	<li class="widget">

		<ul>
			<li><a href="<?php echo get_option('woo_side_url'); ?>"><img src="<?php echo get_option('woo_side_image'); ?>" alt="" /></a></li>
		</ul>

	</li>
		
<?php

}

register_sidebar_widget('120x240 Ad Widget (Right Sidebar)', 'Ad_120x240_Widget');

//Asides (Middle)
function AsidesWidget()
{

?>

			<h2 class="heading">Asides</h2>							
			
			<?php query_posts('showposts=' . get_option('woo_asides_entries') . '&cat=' . $GLOBALS['ex_asides'] ); ?>
			
			<?php while (have_posts()) : the_post(); ?>	
				
				<div class="post">
					<h3><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
					<?php the_excerpt(); ?>
				</div>								
			
			<?php endwhile; ?>
		
<?php

}

register_sidebar_widget('Asides (Middle)', 'AsidesWidget');

//Recent Discussion(Middle)
function RecentDiscussionWidget()
{

?>

				<h2 class="heading">Current Discussions</h2>				

				<?php
					global $wpdb;
 
					$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
									comment_post_ID, comment_author, comment_date_gmt, comment_approved,
									comment_type,comment_author_url,
									SUBSTRING(comment_content,1,50) AS com_excerpt
									FROM $wpdb->comments
									LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID)
									WHERE comment_approved = '1' AND comment_type = '' AND post_password = ''
									ORDER BY comment_date_gmt DESC LIMIT 5";

					$comments = $wpdb->get_results($sql);
					$output = $pre_HTML;

					foreach ($comments as $comment) {
						
						$output .= "\n<div class=\"post\"><p>"."<a href=\"" . get_permalink($comment->ID) ."#comment-" . $comment->comment_ID . "\" title=\"on " .$comment->post_title . "\">" .strip_tags($comment->comment_author).": " . strip_tags($comment->com_excerpt)."...</a></p></div>";
					
					}

					$output .= $post_HTML;
 
					echo $output;
				?>
		
<?php

}

register_sidebar_widget('Recent Discussion (Middle)', 'RecentDiscussionWidget');

?>