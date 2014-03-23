<?php if ( get_option('woo_show_ads_bottom')) { ?>

<div class="box">
	<div class="box-top"></div>
	
	<div class="spacer ads">

		<a <?php do_action('premiumnews_external_ad_link'); ?> href="<?php echo "$dest_url[4]"; ?>"><img src="<?php echo "$img_url[4]"; ?>" alt="" /></a>
	
		<a <?php do_action('premiumnews_external_ad_link'); ?> href="<?php echo "$dest_url[5]"; ?>"><img src="<?php echo "$img_url[5]"; ?>" alt="" /></a>
		
		<a <?php do_action('premiumnews_external_ad_link'); ?> href="<?php echo "$dest_url[6]"; ?>"><img src="<?php echo "$img_url[6]"; ?>" alt="" /></a>
	
		<div class="ar"><a href="<?php echo get_option('home'); ?>/<?php echo "$ad_page"; ?>">Advertising information</a></div>

	</div><!--/spacer -->
	
	<div class="box-bot"></div>

</div><!--/box -->

<?php } ?>