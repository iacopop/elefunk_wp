<?php 
    
function get_inc_categories($label) {
    
    $include = '';
    $counter = 0;
    $cats = get_categories('hide_empty=0');
    
    foreach ($cats as $cat) {
        
        $counter++;
        
        if ( get_option( $label.$cat->cat_ID ) == 'false' ) {
            if ( $counter <> 1 ) { $include .= ','; }
            $include .= $cat->cat_ID;
            }
    
    }
    
    return $include;

}

function woo_pages(){
    
    ?>
    <div class="pagination">
                <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
                <div class="wp-pagenavi">
                    <div class="alignleft readmore"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
                    <div class="alignright readmore"><?php next_posts_link(' Older Entries &raquo;') ?></div>
                    <br class="clearfix" />
                </div>
                <?php } ?> 
        </div>
    <?php
    
};

function woo_page(){
    
    ?>
    <div class="pagination">
                <div class="wp-pagenavi">
                    <div class="alignleft readmore"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?>  </div>
                    <div class="alignright readmore"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></div>

                    <br class="clearfix" />
                </div> 
        </div>
    <?php
    
};


    
        
    
?>