<div id="advert_200x200" class="wrap widget">

	<?php if (get_option('woo_ad_200_adsense') <> "") { echo stripslashes(get_option('woo_ad_200_adsense')); ?>
	
	<?php } else { ?>
	
		<a href="<?php echo get_option('woo_ad_200_url'); ?>"><img src="<?php echo get_option('woo_ad_200_image'); ?>" alt="advert" /></a>
		
	<?php } ?>	

</div>