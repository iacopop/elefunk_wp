<?php

// =============================== Home Recent widget ===============================

function woo_home_recent()
    {
    $settings = get_option("widget_woo_home_recent");

    $title = $settings['title'];
    $count = $settings['count'];
    $cat_exclude = $settings['exclude_cats'];
    $content = $settings['exclude_cats'];
    $archive = $settings['archive'];
    
    if(empty($count)) {$count = 1; }
    if(empty($title)) {$title = 'Recent Entries'; }
    if($cat_exclude == 'true'){
    $cat = '-' . get_cat_id(get_option('woo_portfolio_cat'));} else {$cat = '';}
       
    ?>
    <div class="module blog">
                                <h2 class="module-title"><?php echo $title; ?></h2>
                                
                                <?php
                                global $query_string;
                                query_posts($query_string . "&showposts=$count&cat=$cat");
                                if(have_posts()) : while(have_posts()) : the_post();
                                
                                ?>
                                
                                <h3 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h3>
                                <p class="entry-meta">Posted <?php the_time('F d, Y') ?> in <a href="" title="category link"><?php echo get_the_category_list(', ') ?></a></p>
                                
                                <?php
                                if($content == true)
                                {
                                    the_excerpt();
                                }
                                else 
                                {
                                 the_content('Read more...','<p class="readmore">','</p>');
                                 }
                                 ?>
                                
                                <?php 
                                if($count > 1){echo '<div class="spacer"></div>';}
                                endwhile; endif; ?>
                                
                                <?php if ( $archive <> "" ) { ?><p class="link-ancillary"><a href="<?php echo $archive; ?>">Browse the Archives &raquo;</a></p><?php } ?>
                            </div><!-- end module -->
 <?php
 }  
 
 function woo_home_recent_control() {

    $settings = get_option("widget_woo_home_recent");

    // check if anything's been sent
    if (isset($_POST['update_woo_home_cats'])) {
        $settings['title'] = strip_tags(stripslashes($_POST['woo_home_recent_title']));
        $settings['exclude_cats'] = strip_tags(stripslashes($_POST['woo_home_exclude_cats']));
        $settings['count'] = strip_tags(stripslashes($_POST['woo_home_recent_count']));
        $settings['content'] = strip_tags(stripslashes($_POST['woo_home_recent_content']));
        $settings['archive'] = strip_tags(stripslashes($_POST['woo_home_recent_archive']));


        update_option("widget_woo_home_recent",$settings);
    }
    
    if ($settings['content'] == true) {$checked = 'checked="checked"';} else {$checked = '';}
    if ($settings['exclude_cats'] == true) {$checked2 = 'checked="checked"';} else {$checked2 = '';}
    

    echo '<p>
                <label for="woo_home_recent_title">Title:
                <input id="woo_home_recent_title" name="woo_home_recent_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
    echo '<p>
                <label for="woo_home_recent_count">Number of Posts:
                <input id="woo_home_recent_count" name="woo_home_recent_count" type="text" class="widefat" value="'.$settings['count'].'" /></label></p>';
    echo '<p>
                <label for="woo_home_exclude_cats">Exclude Portfolio Category:
                <input id="woo_home_exclude_cats" name="woo_home_exclude_cats" type="checkbox" class="" value="true" '.$checked2.' /></label></p>';
            
    echo '<p>
                <label for="woo_home_recent_content">Display Excerpt:
                <input id="woo_home_recent_content" name="woo_home_recent_content" type="checkbox" class="" value="true" '.$checked.' /></label></p>';                
    echo '<p>
                <label for="woo_home_recent_archive">Archives Link (optional):
                <input id="woo_home_recent_archive" name="woo_home_recent_archive" type="text" class="widefat" value="'.$settings['archive'].'" /></label></p>';
            
    echo '<input type="hidden" id="update_woo_home_cats" name="update_woo_home_cats" value="1" />';

}
                        
register_sidebar_widget('Woo - Recent Blog Posts (Home)', 'woo_home_recent');   
register_widget_control('Woo - Recent Blog Posts (Home)', 'woo_home_recent_control', 400, 200);
  
                     
// =============================== Home Portfolio widget ===============================

function woo_home_work()

    {      
    $settings = get_option("widget_woo_home_work");

    $title = $settings['title'];
    $count = $settings['count'];
    $cat = $settings['cats'];
    $archive = $settings['archive'];
    
    if(empty($count)) {$count = 1; }
    if(empty($title)) {$title = 'Recent Work'; }
    
    ?>                      
                            <div class="module">
                                <h2 class="module-title"><?php echo $title; ?></h2>
                                
                                <?php
                                global $query_string;
                                query_posts($query_string . "&showposts=$count&cat=$cat");
                                if(have_posts()) : while(have_posts()) : the_post();
                                
                                ?>
                                
                                
                                <a href="<?php the_permalink(); ?>" class="portfolio">
                                    <?php woo_get_image('image',520,170,'thumbnail',90,get_the_id(),'img') ?>
                                    <span class="portfolio-meta">
                                        <span class="portfolio-title"><?php the_title()?></span>
                                        <span class="portfolio-readmore">Read the case study &raquo;</span>
                                    </span>
                                </a>
                                
                                <?php
                                if($count > 1){echo '<div class="spacer"></div>';}
                                endwhile; endif; ?>
                                
                                <?php if ( $archive <> "" ) { ?><p class="link-ancillary"><a href="<?php echo $archive; ?>">See my complete portfolio &raquo;</a></p><?php } ?>
                            </div><!-- end module -->
                            
    <?php

    }
    
 function woo_home_work_control() {

    $settings = get_option("widget_woo_home_work");

    // check if anything's been sent
    if (isset($_POST['update_woo_home_work'])) {
        $settings['title'] = strip_tags(stripslashes($_POST['woo_home_work_title']));
        $settings['cats'] = strip_tags(stripslashes($_POST['woo_home_work_cats']));
        $settings['count'] = strip_tags(stripslashes($_POST['woo_home_work_count']));
        $settings['archive'] = strip_tags(stripslashes($_POST['woo_home_work_archive']));


        update_option("widget_woo_home_work",$settings);
    }

    echo '<p>
                <label for="woo_home_work_title">Title:
                <input id="woo_home_work_title" name="woo_home_work_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
    echo '<p>
                <label for="woo_home_work_cats">Specify Category ID: ' . get_cat_id(get_option('woo_portfolio_cat')) .'
                <input id="woo_home_work_cats" name="woo_home_work_cats" type="text" class="widefat" value="'.$settings['cats'].'" /></label></p>';
    echo '<p>
                <label for="woo_home_work_count">Number of Posts:
                <input id="woo_home_work_count" name="woo_home_work_count" type="text" class="widefat" value="'.$settings['count'].'" /></label></p>';
    echo '<p>
                <label for="woo_home_work_archive">Archives Link (optional):
                <input id="woo_home_work_archive" name="woo_home_work_archive" type="text" class="widefat" value="'.$settings['archive'].'" /></label></p>';
            
    echo '<input type="hidden" id="update_woo_home_work" name="update_woo_home_work" value="1" />';

}
                        
register_sidebar_widget('Woo - Portfolio (Home)', 'woo_home_work');   
register_widget_control('Woo - Portfolio (Home)', 'woo_home_work_control', 400, 200);


// =============================== Home Categories widget ===============================

function woo_home_cats()
    {
    
    $settings = get_option("widget_woo_home_cats");

    $title = $settings['title'];
    $exclude = $settings['exclude'];
    $include = $settings['include'];
    
    if(empty($title)) {$title = 'Categories'; }
    
    ?>
                        <div class="module">
                        
                            <h2 class="module-title"><?php echo $title ?></h2>
                            
                            <ul id="categories">
                            <?php $cats = get_categories( array(
                                'type'                     => 'post',
                                'child_of'                 => 0,
                                'orderby'                  => 'name',
                                'order'                    => 'ASC',
                                'hide_empty'               => true,
                                'include_last_update_time' => false,
                                'hierarchical'             => 1,
                                'exclude'                  => $exclude,
                                'include'                  => $include,
                                //'number'                   => ,
                                'pad_counts'               => false                            
                            )); 

                            foreach($cats as $cat){
                            
                            $cat_id = $cat->term_id;
                            $cat_post_count = $cat->count;
                            
                            ?>
                                <li>
                                    <a href="<?php echo get_category_link($cat_id) ?>" title="<?php echo get_cat_name($cat_id) ?>">
                                        <span class="category-title"><?php echo get_cat_name($cat_id) ?></span>
                                        <span class="category-info"><?php echo $cat_post_count ?> post<?php if($cat_post_count != 1){echo 's';} ?><?php //, last updated 67 days ago ?></span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>

                        </div><!-- end module -->
                            
    <?php

    }
    
function woo_home_cats_control() {

    $settings = get_option("widget_woo_home_cats");

    // check if anything's been sent
    if (isset($_POST['update_woo_home_cats'])) {
        $settings['title'] = strip_tags(stripslashes($_POST['woo_home_cats_title']));
        $settings['exclude'] = strip_tags(stripslashes($_POST['woo_home_cats_exclude']));
        $settings['include'] = strip_tags(stripslashes($_POST['woo_home_cats_include']));


        update_option("widget_woo_home_cats",$settings);
    }
    echo '<p>
                <label for="woo_home_cats_title">Title:
                <input id="woo_home_cats_title" name="woo_home_cats_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
    echo '<p>
                <label for="woo_home_cats_exclude">Exclude categories: (comma seperated, leave include blank)
                <input id="woo_home_cats_exclude" name="woo_home_cats_exclude" type="text" class="widefat" value="'.$settings['exclude'].'" /></label></p>';
    echo '<p>
                <label for="woo_home_cats_include">Include categories: (comma seperated, leave excludes blank)
                <input id="woo_home_cats_include" name="woo_home_cats_include" type="text" class="widefat" value="'.$settings['include'].'" /></label></p>';
            
    echo '<input type="hidden" id="update_woo_home_cats" name="update_woo_home_cats" value="1" />';

}
    
register_sidebar_widget('Woo - Category List (Home)', 'woo_home_cats');
register_widget_control('Woo - Category List (Home)', 'woo_home_cats_control', 400, 200);

// =============================== Sidebar Del.icio.us ======================================
function woo_sidebar_delicious()
{
    $settings = get_option("widget_woo_sidebar_delicious");

    $username = $settings['username'];
    $count = $settings['count'];

?>
                        <div class="module">
                            <h2 class="module-title">Bookmarks</h2>
                            <ul id="bookmarks">
                            <?php
                            include_once(ABSPATH . WPINC . '/rss.php');
                            $rss = fetch_rss("http://feeds.delicious.com/v2/rss/$username?count=$count");
                            $maxitems = 30;
                            $items = array_slice($rss->items, 0, $maxitems);
                          
                                 if (empty($items)) echo '<li>No items</li>';
                                else
                                foreach ( $items as $item ) : ?>

                                <li class="theme">
                                        <a href="<?php echo $item['link']; ?>" title="<?php echo $item['title']; ?>">
                                        <span class="bookmark-date">Saved <?php echo date("F jS, Y",strtotime($item['pubdate'])); ?></span>
                                        <span class="bookmark-title"><?php echo $item['title']; ?></span>
                                        <span class="bookmark-url"><?php echo $item['link']; ?></span>
                                    </a>
                                </li>

                                <?php endforeach; ?>
                                
                            </ul>
                            <p class="link-ancillary"><a href="http://del.icio.us/<?php echo $username; ?>">Visit Del.icio.us &raquo;</a></p>
                        </div><!-- end module -->
                        
<?php
}

function woo_sidebar_delicious_control() {

    $settings = get_option("widget_woo_sidebar_delicious");

    // check if anything's been sent
    if (isset($_POST['update_woo_sidebar_delicious'])) {
        $settings['username'] = strip_tags(stripslashes($_POST['woo_sidebar_delicious_username']));
        $settings['count'] = strip_tags(stripslashes($_POST['woo_sidebar_delicious_count']));

        update_option("widget_woo_sidebar_delicious",$settings);
    }

    echo '<p>
                <label for="woo_sidebar_delicious_username">Username:
                <input id="woo_sidebar_delicious_username" name="woo_sidebar_delicious_username" type="text" class="widefat" value="'.$settings['username'].'" /></label></p>';
    echo '<p>
                <label for="woo_sidebar_delicious_count">Number of Items:
                <input id="woo_sidebar_delicious_count" name="woo_sidebar_delicious_count" type="text" class="widefat" value="'.$settings['count'].'" /></label></p>';
            
    echo '<input type="hidden" id="update_woo_sidebar_delicious" name="update_woo_sidebar_delicious" value="1" />';

}

register_sidebar_widget('Woo - Del.icio.us', 'woo_sidebar_delicious');
register_widget_control('Woo  - Del.icio.us', 'woo_sidebar_delicious_control', 400, 200);

// =============================== Flickr widget ======================================
function flickrWidget()
{
	$settings = get_option("widget_flickrwidget");

	$id = $settings['id'];
    $number = $settings['number'];
	if ($number > 10) { $number = 10;};

?>

<div id="flickr" class="module">
	<h2	class="module-title">Flickr</h2>
	
	<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>        
	
	<p class="link-ancillary"><a href="http://flickr.com/<?php echo $id; ?>">See my Flickr stream &raquo;</a></p>
</div><!-- end module -->

<?php
}

function flickrWidgetAdmin() {

	$settings = get_option("widget_flickrwidget");

	// check if anything's been sent
	if (isset($_POST['update_flickr'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['flickr_id']));
		$settings['number'] = strip_tags(stripslashes($_POST['flickr_number']));

		update_option("widget_flickrwidget",$settings);
	}

	echo '<p>
			<label for="flickr_id">Flickr ID (<a href="http://www.idgettr.com">idGettr</a>):
			<input id="flickr_id" name="flickr_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>';
	echo '<p>
			<label for="flickr_number">Number of photos: (Max 10)
			<input id="flickr_number" name="flickr_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_flickr" name="update_flickr" value="1" />';

}

register_sidebar_widget('Woo - Flickr', 'flickrWidget');
register_widget_control('Woo - Flickr', 'flickrWidgetAdmin', 400, 200);

// =============================== Twitter widget ======================================
function widget_Twidget_init() {

	if ( !function_exists('register_sidebar_widget') )
		return;

	function widget_Twidget($args) {

		// "$args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys." - These are set up by the theme
		extract($args);

		// These are our own options
		$options = get_option('widget_Twidget');
		$account = $options['account'];  // Your Twitter account name
		$title = $options['title'];  // Title in sidebar for widget
		$show = $options['show'];  // # of Updates to show

		// start
		echo '<div class="module">';
		echo '<h2 class="module-title">Twitter</h2>';              
		echo '<ul id="twitter_update_list"><li></li></ul>
		      <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>';
		echo '<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'.$account.'.json?callback=twitterCallback2&amp;count='.$show.'"></script>';
		echo '<p class="link-ancillary"><a href="http://www.twitter.com/'.$account.'/" title="Follow us on Twitter">Follow us on Twitter</a></p></div>';

	}

	// Settings form
	function widget_Twidget_control() {

		// Get options
		$options = get_option('widget_Twidget');
		// options exist? if not set defaults
		if ( !is_array($options) )
			$options = array('account'=>'woothemes', 'title'=>'Twitter Updates', 'show'=>'3');

        // form posted?
		if ( $_POST['Twitter-submit'] ) {

			// Remember to sanitize and format use input appropriately.
			$options['account'] = strip_tags(stripslashes($_POST['Twitter-account']));
			$options['title'] = strip_tags(stripslashes($_POST['Twitter-title']));
			$options['show'] = strip_tags(stripslashes($_POST['Twitter-show']));
			update_option('widget_Twidget', $options);
		}

		// Get options for form fields to show
		$account = htmlspecialchars($options['account'], ENT_QUOTES);
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$show = htmlspecialchars($options['show'], ENT_QUOTES);

		// The form fields
		echo '<p style="text-align:right;">
				<label for="Twitter-account">' . __('Account:') . '
				<input style="width: 200px;" id="Twitter-account" name="Twitter-account" type="text" value="'.$account.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="Twitter-title">' . __('Title:') . '
				<input style="width: 200px;" id="Twitter-title" name="Twitter-title" type="text" value="'.$title.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="Twitter-show">' . __('Show:') . '
				<input style="width: 200px;" id="Twitter-show" name="Twitter-show" type="text" value="'.$show.'" />
				</label></p>';
		echo '<input type="hidden" id="Twitter-submit" name="Twitter-submit" value="1" />';
	}


	// Register widget for use
	register_sidebar_widget(array('Woo - Twitter', 'widgets'), 'widget_Twidget');

	// Register settings for use, 300x200 pixel form
	register_widget_control(array('Woo - Twitter', 'widgets'), 'widget_Twidget_control', 300, 200);
}

// Run code and init
add_action('widgets_init', 'widget_Twidget_init');

// =============================== Ad 390px Wide widget ======================================
function ad125Widget()
{
include(TEMPLATEPATH . '/ads/widget_125_ad.php');
}
register_sidebar_widget('Woo - Ad 125px', 'ad125Widget');

// =============================== Ad 390px Wide widget ======================================
function ad300Widget()
{
include(TEMPLATEPATH . '/ads/widget_300_ad.php');
}
register_sidebar_widget('Woo - Ad 300x250', 'ad300Widget');



// =============================== Search widget ======================================
function searchWidget()
{
include(TEMPLATEPATH . '/search-form.php');
}
register_sidebar_widget('Woo - Search', 'SearchWidget');

/* Deregister Default Widgets */

function woo_deregister_widgets(){
    unregister_widget('WP_Widget_Search');         
}
add_action('widgets_init', 'woo_deregister_widgets');  

?>