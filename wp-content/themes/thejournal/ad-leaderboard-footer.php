             
             <?php 
             $ad_yes =     get_option('woo_ad_leaderboard_f');
             $ad_code =      get_option('woo_ad_leaderboard_f_code');
             $ad_image =     get_option('woo_ad_leaderboard_f_image');
             $ad_url =      get_option('woo_ad_leaderboard_f_url');
             
             if($ad_yes == 'true'){
             ?>
            <div id="leaderboard_ad">
            <?php 
            if($ad_code != ''){ echo stripcslashes($ad_code); }
            else { 
            ?>
            <a href="<?php echo $ad_url;  ?>" title="Advert"><img class="title" src="<?php echo $ad_image; ?>" alt="" /></a>
            <?php
             } 
             ?>
            </div>
            <?php } ?>