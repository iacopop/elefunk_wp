<div class="sidebar <?php if ( get_option('woo_right_sidebar') == 'false' ) { echo 'sidebar_left'; } else { echo 'sidebar_right'; } ?>">
    
    	<?php  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

		<?php endif; ?>
    
</div>