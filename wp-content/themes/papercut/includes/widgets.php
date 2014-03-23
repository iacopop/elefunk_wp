<?php

function BlockAds()
{

$img_url = array();
$dest_url = array();
$numbers = range(1,4); 
$counter = 0;

shuffle($numbers);

foreach ($numbers as $number) {
	
	$counter++;
	
	$img_url[$counter] = get_option('woo_ad_image_'.$number);
	$dest_url[$counter] = get_option('woo_ad_url_'.$number);
	
	}
	
?>

		<li class="ads">
			<a href="<?php echo "$dest_url[1]"; ?>"><img src="<?php echo "$img_url[1]"; ?>" alt="Ad" /></a>
			<a href="<?php echo "$dest_url[2]"; ?>"><img src="<?php echo "$img_url[2]"; ?>" alt="Ad" /></a>
			<a href="<?php echo "$dest_url[3]"; ?>"><img src="<?php echo "$img_url[3]"; ?>" alt="Ad" /></a>
			<a href="<?php echo "$dest_url[4]"; ?>"><img src="<?php echo "$img_url[4]"; ?>" alt="Ad" /></a>						
		</li>

<?php
		
}

function FeaturedNews()
{

?>

		<li class="widget"><h2>Featured News</h2>
			<ul>
				
				<?php $featured = new WP_Query('category_name='.get_option('woo_featured_category').'&showposts=5&order=DESC'); ?>
				<?php while ($featured->have_posts()) : $featured->the_post(); ?> 
				
					<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="arial bold dark block"><?php the_title(); ?> <span class="georgia medium weight-normal block">by <span class="pink"><?php the_author(); ?></span> on <?php the_time('F j, Y'); ?></span></a></li>
				
				<?php endwhile; ?>
				
			</ul>
		</li>
	
<?php 	

}

function FlickrBox()
{

?>

		<li><h2>Flickr Photos</h2>
			<ul class="flickr_photos">
								
            <li class="clearfix"><script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo get_option('woo_flickr_entries'); ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo get_option('woo_flickr_id'); ?>"></script>
            </li>								
			</ul>
		</li>
	
<?php 	

}

function Papercut_Tag_Cloud()
{

?>

		<li class="widget">
        	<h2>Tag Cloud</h2>
			<ul><li class="tag_cloud clearfix"><?php if (function_exists('wp_tag_cloud')) { wp_tag_cloud('smallest=10&largest=18'); } ?></li></ul>
		</li>
	
<?php 	

}

register_sidebar_widget('125x125 Ad Blocks', 'BlockAds');
register_sidebar_widget('Featured News', 'FeaturedNews');
register_sidebar_widget('Flickr Photos', 'FlickrBox');
register_sidebar_widget('Papercut Tag Cloud', 'Papercut_Tag_Cloud');

?>