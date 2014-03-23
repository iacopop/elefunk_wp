<?php 
    
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