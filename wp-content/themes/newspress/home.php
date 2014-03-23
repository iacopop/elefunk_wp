<?php get_header(); ?>

		<div class="col1">
			
			<h1>Home</h1>

			<?php include(TEMPLATEPATH . '/includes/featured.php'); ?>

			<?php
				
				$layout = get_option('woo_layout');
				if ($layout == "default.php")
					include('layouts/default.php');
				elseif ($layout == "blog.php")
					include('layouts/blog.php');
				else
					include('layouts/default.php');
				
			?>

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>