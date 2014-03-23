<?php 

function woothemes_get_pages() {
	global $wpdb;

	$getcats = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE $wpdb->posts.post_type = 'page' AND $wpdb->posts.post_status = 'publish'");
	
	foreach($getcats as $thecat) {
		echo '<li><a href="'.get_permalink($thecat->ID).'">'.$thecat->post_title.'<span>'.get_post_meta( $thecat->ID, 'page-description', true ).'</span></a></li>';
	}
}	

?>