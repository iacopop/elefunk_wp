<?php $show = get_option('woo_show_ads_bottom'); ?>

<?php if ( $show ) { ?>

<div class="ads">

	<h2>Site Sponsors</h2>
    
	<a <?php do_action('woo_external_ad_link'); ?> href="<?php echo "$dest_url[3]"; ?>"><img src="<?php echo "$img_url[3]"; ?>" alt="" /></a>

	<a <?php do_action('woo_external_ad_link'); ?> href="<?php echo "$dest_url[4]"; ?>"><img src="<?php echo "$img_url[4]"; ?>" alt="" class="last" /></a>

</div><!--/ads-->

<?php } ?>