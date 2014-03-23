<div class="popular">

<?php
$now = gmdate("Y-m-d H:i:s",time());
$lastmonth = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m")-12,date("d"),date("Y")));
$number = "9";
$popularposts = "SELECT ID, post_title, SUBSTRING(post_content,1,100) AS post_ex, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT ".$number;
$posts = $wpdb->get_results($popularposts);
$popular = '';
if($posts){
	foreach($posts as $wppost){
		query_posts('p='.$wppost->ID); 
		while (have_posts()) : the_post(); 

			woo_get_image('image','80','80');
        
	endwhile;
}
}
?>

</div>
