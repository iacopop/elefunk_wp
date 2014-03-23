<?php 
    
/*
Plugin Name: WP-PageNavi 
Plugin URI: http://www.lesterchan.net/portfolio/programming.php 
*/ 

function woo_wp_pagenavi($before = '', $after = '') {
    global $wpdb, $wp_query;
    if (!is_single()) {
        $request = $wp_query->request;
        $posts_per_page = intval(get_query_var('posts_per_page'));
        $paged = intval(get_query_var('paged'));
        $pagenavi_options = get_option('pagenavi_options');
        $numposts = $wp_query->found_posts;
        $max_page = $wp_query->max_num_pages;
        /*
        $numposts = 0;
        if(strpos(get_query_var('tag'), " ")) {
            preg_match('#^(.*)\sLIMIT#siU', $request, $matches);
            $fromwhere = $matches[1];            
            $results = $wpdb->get_results($fromwhere);
            $numposts = count($results);
        } else {
            preg_match('#FROM\s*+(.+?)\s+(GROUP BY|ORDER BY)#si', $request, $matches);
            $fromwhere = $matches[1];
            $numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
        }
        $max_page = ceil($numposts/$posts_per_page);
        */
        if(empty($paged) || $paged == 0) {
            $paged = 1;
        }
        $pages_to_show = intval($pagenavi_options['num_pages']);
        $pages_to_show_minus_1 = $pages_to_show-1;
        $half_page_start = floor($pages_to_show_minus_1/2);
        $half_page_end = ceil($pages_to_show_minus_1/2);
        $start_page = $paged - $half_page_start;
        if($start_page <= 0) {
            $start_page = 1;
        }
        $end_page = $paged + $half_page_end;
        if(($end_page - $start_page) != $pages_to_show_minus_1) {
            $end_page = $start_page + $pages_to_show_minus_1;
        }
        if($end_page > $max_page) {
            $start_page = $max_page - $pages_to_show_minus_1;
            $end_page = $max_page;
        }
        if($start_page <= 0) {
            $start_page = 1;
        }
        if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
            $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
            $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
            echo $before.'<div class="wp-pagenavi">'."\n";
            switch(intval($pagenavi_options['style'])) {
                case 1:
                    if(!empty($pages_text)) {
                        echo '<span class="pages">&#8201;'.$pages_text.'&#8201;</span>';
                    }                    
                    if ($start_page >= 2 && $pages_to_show < $max_page) {
                        $first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
                        echo '<a href="'.clean_url(get_pagenum_link()).'" title="'.$first_page_text.'">&#8201;'.$first_page_text.'&#8201;</a>';
                        if(!empty($pagenavi_options['dotleft_text'])) {
                            echo '<span class="extend">&#8201;'.$pagenavi_options['dotleft_text'].'&#8201;</span>';
                        }
                    }
                    previous_posts_link($pagenavi_options['prev_text']);
                    for($i = $start_page; $i  <= $end_page; $i++) {                        
                        if($i == $paged) {
                            $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
                            echo '<span class="current">&#8201;'.$current_page_text.'&#8201;</span>';
                        } else {
                            $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                            echo '<a href="'.clean_url(get_pagenum_link($i)).'" title="'.$page_text.'">&#8201;'.$page_text.'&#8201;</a>';
                        }
                    }
                    next_posts_link($pagenavi_options['next_text'], $max_page);
                    if ($end_page < $max_page) {
                        if(!empty($pagenavi_options['dotright_text'])) {
                            echo '<span class="extend">&#8201;'.$pagenavi_options['dotright_text'].'&#8201;</span>';
                        }
                        $last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
                        echo '<a href="'.clean_url(get_pagenum_link($max_page)).'" title="'.$last_page_text.'">&#8201;'.$last_page_text.'&#8201;</a>';
                    }
                    break;
                case 2;
                    echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="get">'."\n";
                    echo '<select size="1" onchange="document.location.href = this.options[this.selectedIndex].value;">'."\n";
                    for($i = 1; $i  <= $max_page; $i++) {
                        $page_num = $i;
                        if($page_num == 1) {
                            $page_num = 0;
                        }
                        if($i == $paged) {
                            $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
                            echo '<option value="'.clean_url(get_pagenum_link($page_num)).'" selected="selected" class="current">'.$current_page_text."</option>\n";
                        } else {
                            $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                            echo '<option value="'.clean_url(get_pagenum_link($page_num)).'">'.$page_text."</option>\n";
                        }
                    }
                    echo "</select>\n";
                    echo "</form>\n";
                    break;
            }
            echo '</div>'.$after."\n";
        }
    }
}

add_action('init', 'woo_wp_pagenavi_init');
function woo_wp_pagenavi_init() {
    // Add Options
    $pagenavi_options = array();
    $pagenavi_options['current_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['page_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['first_text'] = __('&laquo; First','wp-pagenavi');
    $pagenavi_options['last_text'] = __('Last &raquo;','wp-pagenavi');
    $pagenavi_options['next_text'] = __('&raquo;','wp-pagenavi');
    $pagenavi_options['prev_text'] = __('&laquo;','wp-pagenavi');
    $pagenavi_options['dotright_text'] = __('...','wp-pagenavi');
    $pagenavi_options['dotleft_text'] = __('...','wp-pagenavi');
    $pagenavi_options['style'] = 1;
    $pagenavi_options['num_pages'] = 5;
    $pagenavi_options['always_show'] = 0;
    add_option('pagenavi_options', $pagenavi_options, 'PageNavi Options');
}

    
function mortar_get_image($key = 'image', $width = null, $height = null, $class = "thumbnail", $quality = 90,$id = null,$link = 'src',$repeat = 1,$offset = 0,$before = '', $after = '',$single = false, $force = false, $return = false, $height_fix = false) {

    if(empty($id))
    {
    global $post;
    $id = $post->ID;
    } 
    $output = '';

    $custom_field = get_post_meta($id, $key, true);

    $set_width = ' width="' . $width .'" ';
    $set_height = ' height="' . $height .'" ';    
    


    if(!empty($custom_field)) { // If the user set a custom field
        
    //Check for smaller images
    if ($gdv = gdVersion()) {
    
        $image_size = @getimagesize($custom_field);
        $image_size_width = $image_size[0];
        $image_size_height = $image_size[1];
        
    }
    
    if($height_fix == true && $image_size_width > 0) {
    
        $new_height = ($width / $image_size_width) * $image_size_height;
        $set_height = ' height="' . $new_height .'" ';    
    }

    if($force == false){  // Does simple check to verify if images are smaller then specified.
        if($width == null or $width > $image_size_width ){ $set_width = '';}    
        if($height == null or $height > $image_size_height){ $set_height = '';}
    }
    
        if (get_option('woo_resize') == 'true') { 
        
            $img_link = '<img src="'. get_bloginfo('template_url'). '/thumb.php?src='. $custom_field .'&amp;h='. $height .'&amp;w='. $width .'&amp;zc=1&amp;q='. $quality .'" alt="'. get_the_title($id) .'" class="'. $class .'" '. $set_height . $set_width . ' />';
            
            if($link == 'img'){  // Just output the image
                $output .= $before; 
                $output .= $img_link;
                $output .= $after;  
            }
            else {  // Default - output with link
                 if ((is_single() OR is_page()) AND $single == false) {
                    $href = $custom_field; 
                 }
                 else { 
                    $href = get_permalink($id);
                 }
                 
                 $output .= $before; 
                 $output .= '<a title="Permanent Link to '. get_the_title($id) .'" href="' . $href .'">' . $img_link . '</a>';
                 $output .= $after;  
            }
        } 
        else {  // Not Resize
            
             $img_link =  '<img src="'. $custom_field .'" alt="'. get_the_title($id) .'" '. $set_height . $set_width .' class="'. $class .'" />';
             if($link == 'img'){  // Just output the image 
             
                   $output .= $before;                   
                   $output .= $img_link; 
                   $output .= $after;  
             } 
             
             else {  // Default - output with link
                 if ((is_single() OR is_page()) AND $single == false) 
                 { 
                    $href = $custom_field;
                 }
                 else { 
                    $href = get_permalink($id);
                 }
                 
                 $output .= $before;   
                 $output .= '<a title="Permanent Link to '. get_the_title($id) .'" href="' . $href .'">' . $img_link . '</a>';
                 $output .= $after;   
            }
        }
             if($return == TRUE)
                {
                    return $output;
                }
                else 
                {
                    echo $output; // Done  
                }
        
    } 
    elseif(empty($custom_field) && get_option('woo_auto_img') == 'true'){
        
        if($offset >= 1){$repeat = $repeat + $offset;}
    
        $attachments = get_children( array(
                'post_parent' => $id,
                'numberposts' => $repeat,
                'post_type' => 'attachment',
                'post_mime_type' => 'image')
                );
        if ( empty($attachments) )
        return;
        
        $counter = -1;
        $size = 'large';
        foreach ( $attachments as $att_id => $attachment ) {
            
            $counter++;
            
            if($counter < $offset) { continue; }
        
            $output = '';
            $src = wp_get_attachment_image_src($att_id, $size, true);
            //$link = get_attachment_link($id);
            $custom_field = $src[0];
            
            //Check for smaller images
            if ($gdv = gdVersion()) {
            
                $image_size = @getimagesize($custom_field);
                $image_size_width = $image_size[0];
                $image_size_height = $image_size[1];
                
            } 
            
            if($height_fix == true) {
    
                $new_height = ($image_size_width / $width) * $image_size_height;
                $set_height = ' height="' . $new_height .'" ';    
            }
            
            if($force == false){  // Does simple check to verify if images are smaller then specified.
                if($width == null or $width > $image_size_width ){ $set_width = '';}    
                if($height == null or $height > $image_size_height){  $set_height = '';}
            }
            
            if (get_option('woo_resize') == 'true') { 
        
            $img_link = '<img src="'. get_bloginfo('template_url'). '/thumb.php?src='. $custom_field .'&amp;h='. $height .'&amp;w='. $width .'&amp;zc=1&amp;q='. $quality .'" alt="'. get_the_title($id) .'" class="'. $class .'" '. $set_height . $set_width .'   />';
            
            if($link == 'img' AND $single == false){  // Just output the image  
            
                $output .= $before; 
                $output .= $img_link;
                $output .= $after;  
            }
                
            else {  // Default - output with link
                 if ((is_single() OR is_page()) AND $single == false) {
                    $href = $custom_field; }
                 else { 
                    $href = get_permalink($id);
                 }
                 
                 $output .= $before;
                 $output .= '<a title="Permanent Link to '. get_the_title($id) .'" href="' . $href .'">' . $img_link . '</a>';
                 $output .= $after;   
            }
        } 
        else {  // Not Resize
             $img_link =  '<img src="'. $custom_field .'" alt="'. get_the_title($id) .'" '. $set_height . $set_width .' />';
             if($link == 'img'){  // Just output the image  
                $output .= $before; 
                $output .= $img_link;
                $output .= $after;  
             } 
             else {  // Default - output with link
                 if ((is_single() OR is_page()) AND $single == false) {
                    $href = $custom_field; 
                 }
                 else { 
                    $href = get_permalink($id);
                  }
                  
                $output .= $before;   
                $output .= '<a title="Permanent Link to '. get_the_title($id) .'" href="' . $href .'">' . $img_link . '</a>';
                $output .= $after; 
            }
        }
            if($return == TRUE)
            {
                return $output;
            }
            else 
            {
                echo $output; // Done  
            }
      }
      
    }
    else {
       return;
    }

}


    
?>