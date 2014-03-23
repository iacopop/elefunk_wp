<?php

// =============================== Flickr widget ======================================
function flickrWidget()
{
    $settings = get_option("widget_flickrwidget");

    $id = $settings['id'];
    $number = $settings['number'];

?>

<li id="flickr" class="widget widget_pages">
    <h4>Photos on Flickr</h4>
    <div class="sidebar_ul clearfix">
        <div class="fix"></div>
        <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>        
        <div class="fix"></div>
    </div>
</li>

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
            <label for="flickr_number">Number of photos:
            <input id="flickr_number" name="flickr_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
    echo '<input type="hidden" id="update_flickr" name="update_flickr" value="1" />';

}

register_sidebar_widget('Woo - Flickr', 'flickrWidget');
register_widget_control('Woo - Flickr', 'flickrWidgetAdmin', 400, 200);




// =============================== Tags (Home) ======================================
function tags_homeWidget()
{
?>

            <li id="tags" class="box">
            
                <h4>Tags</h4>
                <div class="sidebar_ul">
                <?php if (function_exists('wp_tag_cloud')) { wp_tag_cloud('smallest=10&largest=18'); } ?>
                </div>
            </li><!-- /tags -->

<?php

}

// =============================== Ad Space ======================================
function adSpaceWidget()
{
?>

            <li id="woo_adspace" class="box">
            
                <div class="sidebar_ul">
                <?php for($i = 1;$i <= 4; $i++){
                
                $ad_img = get_settings('woo_sidebar_ad_img_'.$i);
                $ad_href = get_settings('woo_sidebar_ad_href_'.$i);
                
                    if(!empty($ad_img) && !empty($ad_href)){
                       echo "<a href='$ad_href' class='ad_single'><img alt='Advert' src='$ad_img' /></a>"; 
                    }
                }               
                ?>
                <div class="clear spacer"></div>
                </div>
            </li><!-- /ads -->

<?php

}

// =============================== Popular Posts ======================================
function popularPostsWidget()
{

    $settings = get_option("widget_popularposts");

    $text = $settings['title'];
    if ($text == '' or $text == null) $text = 'Popular Posts'; 
    $amount = $settings['amount'];
    if ($amount == '' or $amount == null) $amount = 6;    

?>

                        <li id="popular"><h4><?php echo $text; ?></h4>
                            <ul>
                                <?php 
                                    global $wpdb, $post; 
                                    $getposts = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY comment_count DESC LIMIT 0,$amount" );
                                    
                                        foreach($getposts as $thepost) :
                                            $category = get_the_category( $thepost->ID );    
                                    ?>
                                        <li>
                                            <p style="border-left:2px solid #<?php echo get_settings( 'woo_cat_color_' . $category[0]->cat_ID ); ?>;"><?php echo $thepost->post_title; ?></p>
                                            <a href="<?php echo get_permalink( $thepost->ID ); ?>"><?php echo $thepost->comment_count; ?> Replies</a>
                                        </li>
                                <?php endforeach; ?>        
                                
                            </ul>
                        </li><!-- End Popular Posts -->

<?php

}

function popularPostsWidgetAdmin() {

    $settings = get_option("widget_popularposts");

    // check if anything's been sent
    if (isset($_POST['update_popularposts'])) {
        $settings['title'] = strip_tags(stripslashes($_POST['popularposts_title']));        
        $settings['amount'] = strip_tags(stripslashes($_POST['popularposts_amount']));        

        update_option("widget_popularposts",$settings);
    }
    
    echo '<p>
            <label for="popularposts_title">Title:
            <input id="popularposts_title" name="popularposts_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';         
    echo '<p>
            <label for="popularposts_amount">Amount of Posts:
            <input id="popularposts_amount" name="popularposts_amount" type="text" class="widefat" value="'.$settings['amount'].'" /></label></p>';         
    echo '<input type="hidden" id="update_popularposts" name="update_popularposts" value="1" />';

}



//====== end =====





register_sidebar_widget('Woo - Flickr', 'flickrWidget');
register_widget_control('Woo - Flickr', 'flickrWidgetAdmin', 400, 200);

register_sidebar_widget('Woo - Popular Posts', 'popularPostsWidget');
register_widget_control('Woo - Popular Posts', 'popularPostsWidgetAdmin', 400, 200);

register_sidebar_widget('Woo - Tags', 'tags_homeWidget');

register_sidebar_widget('Woo - Adspace', 'adSpaceWidget');

?>