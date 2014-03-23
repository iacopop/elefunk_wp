<?php

// Category News Boxes
function get_exclude_categories($label) {
    
    $include = array();
    $counter = 0;
    $cats = get_categories('hide_empty=0');
    
    foreach ($cats as $cat) {
        
        $counter++;
        
        if ( get_option( $label.$cat->cat_ID ) ) {
            
                $exclude[] = $cat->cat_ID;
            }
        }
        if(!empty($exclude)){
        $exclude = implode(',',$exclude);
        }
    return $exclude;

}

 
function woo_get_related($post) {

            global $wpdb;
            $now = current_time('mysql', 1);
            $tags = wp_get_post_tags($post->ID);
            $show_date = 0;
            $limit = 10;
            $show_comments_count = 0;
            
            $taglist = "'" . $tags[0]->term_id. "'";
            $tagcount = count($tags);
            if ($tagcount > 1) {
                for ($i = 1; $i <= $tagcount; $i++) {
                    $taglist = $taglist . ", '" . $tags[$i]->term_id . "'";
                }
            }
                            
            $q = "SELECT p.ID, p.post_title, p.post_date, p.comment_count, count(t_r.object_id) as cnt FROM $wpdb->term_taxonomy t_t, $wpdb->term_relationships t_r, $wpdb->posts p WHERE t_t.taxonomy ='post_tag' AND t_t.term_taxonomy_id = t_r.term_taxonomy_id AND t_r.object_id  = p.ID AND (t_t.term_id IN ($taglist)) AND p.ID != $post->ID AND p.post_status = 'publish' AND p.post_date_gmt < '$now' GROUP BY t_r.object_id ORDER BY cnt DESC, p.post_date_gmt DESC LIMIT $limit;";

            $related_posts = $wpdb->get_results($q);
             
             foreach ($related_posts as $related_post ){
                
                    $output .= '<li>';
                    
                    if ($show_date){
                        $dateformat = get_option('date_format');
                        $output .=   mysql2date($dateformat, $related_post->post_date) . " -- ";
                    }
                    
                    $output .=  '<a href="'.get_permalink($related_post->ID).'" title="'.wptexturize($related_post->post_title).'">'.wptexturize($related_post->post_title).'';
                    
                    if ($show_comments_count){
                        $output .=  " (" . $related_post->comment_count . ")";
                    }
                    
                    $output .=  '</a></li>';
                }
    
    $output = '<ul class="related_post">' . $output . '</ul>';
    
    return $output;
    
}      
   
?>