<?php get_header(); ?>

		<div class="col1">

			<?php include(TEMPLATEPATH . '/includes/featured.php'); ?>

            <?php
				$showplace = get_option('woo_show_video_feat');
				if ( $showplace ) { include(TEMPLATEPATH . '/includes/video.php'); }
			?>

			<?php
				
				$layout = get_option('woo_layout');
				if ($layout == "default.php")
					include('layouts/default.php');
				elseif ($layout == "blog.php")
					include('layouts/blog.php');
				else
					include('layouts/default.php');
				
			?>
            
            <?php
				$showplace = get_option('woo_show_video_feat');
				if ( !$showplace ) { include(TEMPLATEPATH . '/includes/video.php'); }
			?>

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>