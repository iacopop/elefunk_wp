<div class="widget">
<h3 id="popular">Popular blog posts</h3>
<ul class="news">

	<?php
$now = gmdate("Y-m-d H:i:s",time());
$lastmonth = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m")-12,date("d"),date("Y")));
$number = get_option('woo_popular_posts');
$popularposts = "SELECT ID, post_title, SUBSTRING(post_content,1,100) AS post_ex, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT ".$number;
$posts = $wpdb->get_results($popularposts);
$popular = '';
if($posts){
	foreach($posts as $wppost){
		query_posts('p='.$wppost->ID); 
		while (have_posts()) : the_post(); 

		?>
		<li>
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<p><?php the_excerpt(); ?></p>
		</li>
        
<?php endwhile;
	}
}
?>

</ul>
</div>