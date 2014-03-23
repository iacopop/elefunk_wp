					<?php 
						$no_show = get_option('woo_not_mpu'); 
						$block_img = get_option('woo_block_image');
            		$block_url = get_option('woo_block_url');
					?>
					<?php if ( $no_show == 'false' ) { ?>
					<div class="featured">
						<a href="<?php echo "$block_url"; ?>"><img src="<?php echo "$block_img"; ?>" alt="Ad" /></a>
					</div><!--/featured-->
					<?php } ?>