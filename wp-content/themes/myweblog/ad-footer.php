    <?php 
    if(get_settings('woo_ad_footer') == 'true'){
    ?>
    
    <div class="ad-block clearfix">
                                
        <p>
        <?php if(get_settings('woo_ad_footer_adsense') == 'true'){ echo get_settings('woo_ad_footer_adsense'); } else {?>
        <a href="<?php echo get_settings('woo_ad_footer_url') ?>"><img src="<?php echo get_settings('woo_ad_footer_image') ?>" alt="Ad" /></a>
        <?php } ?>
        </p>
                            
    </div><!-- End ad-block -->
    
    <?php  } ?>