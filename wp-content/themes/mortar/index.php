<?php get_header(); ?>

	<?php if(get_option('woo_about_enable') == 'true'){ 
	if(!is_paged()){
	?>
          
     <div id="about">
        
            <h2><span><?php echo stripslashes(get_option('woo_about_header')); ?></span></h2>           
            <p><span><?php if (get_option('woo_about_photo')) { ?><img alt="" class="about_image" src="<?php echo get_option('woo_about_photo'); ?>" /><?php } ?><?php echo stripslashes(get_option('woo_about_text')); ?></span></p>
            <p style="margin-bottom:0;"><?php if (get_option('woo_about_button')) { ?><a class="about_button" href="<?php echo get_option('woo_button_link'); ?>" title="Read more about me"><?php echo stripslashes(get_option('woo_about_button')); ?></a><?php } ?></p>
            <div class="fix"></div>

    </div><!-- / #about -->
    
    <?php } } ?>

    </div><!-- / #grid_16 -->
    
    <?php
		$layout = get_option('woo_home_layout');
		 include('layouts/'.$layout);
	 ?> 
                 
    <div class="fix"></div>
    
    <div class="grid_16">
   		<div class="more_entries">
			<?php if (function_exists('woo_wp_pagenavi')) { ?><?php woo_wp_pagenavi(); ?><?php } ?>
		</div>
	</div>
        
<?php get_footer(); ?>