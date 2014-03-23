<div id="advert_300x250" class="module">

	<h2 class="module-title">Sponsor</h2>

	<?php if (get_option('woo_ad_300_adsense') <> "") { echo stripslashes(get_option('woo_ad_300_adsense')); ?>
	
	<?php } else { ?>
	
		<a href="<?php echo get_option('woo_ad_300_url'); ?>"><img src="<?php echo get_option('woo_ad_300_image'); ?>" alt="advert" /></a>
		
	<?php } ?>	

</div>