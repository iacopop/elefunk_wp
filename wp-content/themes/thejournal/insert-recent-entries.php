
      <div class="recent-entries">
                <div class="archives">
                    <h3>Recent Entries</h3>
                    <?php 
                    $recent_archives = get_settings('woo_recent_archives');
                    if($recent_archives != ' ') { ?>     
                    <p>Go to the <a href="<?php echo $recent_archives; ?>">Archives</a> <br />
                  to see more entries</p>
                  <?php } ?>
              </div>
                <ul>
                <?php 
                 $featured_tag = get_settings('woo_featured_tag'); 
                 $highlights_tag = get_settings('woo_highlights_tag');
                 
                 $featured_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name = '$featured_tag'"); 
                 $highlights_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name = '$highlights_tag'"); 
                   
                 $new_posts = get_posts(array(
                     'tag__not_in' => array($featured_id,$highlights_id),
                      'showposts' => 3,
                      'order' => 'DESC' 
                      )
                  );
                   
                foreach($new_posts as $post){
                ?>
                    <li>
                        <div class="category"><?php the_category(', ') ?></div>
                        <h4><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
                    </li>
                    <?php }?>
                </ul>
            </div>
      <div class="fix"></div>
