<?php get_header(); ?>

		<?php include(TEMPLATEPATH . '/includes/featured.php'); ?>

		<div id="centercol">

			<?php
				
				$layout = get_option('woo_layout');
				if ($layout == "default.php")
					include('layouts/default.php');
				elseif ($layout == "blog.php")
					include('layouts/blog.php');
				else
					include('layouts/default.php');
				
			?>

		</div><!--/centercol-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>