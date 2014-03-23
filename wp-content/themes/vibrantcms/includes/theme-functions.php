<?php
//Categories
function inc_cats() {

		$categories = get_categories('hide_empty=0');
		$categories = array();
		$inc = '';
		$counter = 0;
		
		foreach ($categories as $cat) {
			
			$counter++;
			$inc .= $cat->cat_ID;
			
			if ( $counter <> count($categoires) ) { $inc .= ','; }
		
		}
		
		echo $inc;
	
}	

//Popular Posts
function popular_posts() {
	
	global $wpdb;
	$now = gmdate("Y-m-d H:i:s",time());
	$lastmonth = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m")-12,date("d"),date("Y")));
	$popularposts = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT 10";
	$posts = $wpdb->get_results($popularposts);
	$popular = '';
	
	if($posts){
		foreach($posts as $post){
			$post_title = stripslashes($post->post_title);
			$guid = get_permalink($post->ID);
			$popular .= '<li><a href="'.$guid.'" title="'.$post_title.'">'.$post_title.'</a></li>';
		}
	}
	
	echo $popular;
}

//Recent Comments
function recent_comments() {
	global $wpdb;
 
	$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
				comment_post_ID, comment_author, comment_date_gmt, comment_approved,
				comment_type,comment_author_url,
				SUBSTRING(comment_content,1,50) AS com_excerpt
				FROM $wpdb->comments
				LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
				$wpdb->posts.ID)
				WHERE comment_approved = '1' AND comment_type = '' AND
				post_password = ''
				ORDER BY comment_date_gmt DESC LIMIT 5";

	$comments = $wpdb->get_results($sql);
	$output = $pre_HTML;

	foreach ($comments as $comment) {

		$output .= "\n
		<li>"."<a href=\"" . get_permalink($comment->ID) .
		"#comment-" . $comment->comment_ID . "\" title=\"on " .
		$comment->post_title . "\">" .strip_tags($comment->comment_author)
		.": " . strip_tags($comment->com_excerpt)
		."...</a></li>
		";
		
	}

	$output .= $post_HTML;
 
	echo $output; 
}

?>