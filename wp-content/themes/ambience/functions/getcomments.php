<?php

function woothemes_get_comments($limit = 7, $stops = 65) {
	global $wpdb;

	$getcomments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' ORDER BY comment_date DESC LIMIT 0,".$limit);
	
	foreach($getcomments as $thecomments) {
		if ( strlen ( $thecomments->comment_content ) <= $stops ) {
			$comment = $thecomments->comment_content;
		} else {
			$comment = substr($thecomments->comment_content, 0, strrpos(substr($thecomments->comment_content, 0, $stops), ' ')) . '...';
		}
		
		echo '<li><a href="'.get_permalink($thecomments->comment_post_ID).'">'.$comment.'</a> by '.$thecomments->comment_author.'</li>';
	}
}

?>