<?php get_header(); ?>

		<?php include(TEMPLATEPATH . '/includes/featured.php'); ?>

		<div id="centercol">

			<?php
				
				$layout = get_option('woo_layout');

				include('layouts/'.$layout);
				
			?>

		</div><!--/centercol-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>