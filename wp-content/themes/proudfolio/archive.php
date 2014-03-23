<?php get_header(); ?>
	
	<?php $GLOBALS['paged'] = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

	<?php include('includes/cat-blog.php'); // Determines which archive page this is i.e. Portfolio or Blog?>
	
	<?php if ( $display_portfolio ) { include('archive-portfolio.php'); 
	
	 } elseif ( $display_blog )  { include('archive-blog.php'); 
	
	 } else  { include('archive-blogs.php'); } ?>

<?php get_footer(); ?>