<?php get_header(); ?>

	<?php include('includes/cat-single.php'); // Determines which archive page this is i.e. Portfolio or Blog?>
	
	<?php if ( $display_portfolio ) { include('single-portfolio.php'); } // Display Portfolio Formatting ?>
	
	<?php if ( $display_blog ) { include('single-blog.php'); } // Display Blog Formatting ?>

<?php get_footer(); ?>