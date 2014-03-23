<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<?php if ( get_option( 'woo_breadcrumbs' ) == 'true') { yoast_breadcrumb('<div id="breadcrumb"><p>','</p></div>'); } ?>
	
	<div id="content">
		
		<div id="main_content" class="fullwidth">
		
			<?php if ( get_option( 'woo_subnav' ) == 'true' ) { ?>
			
				<div id="sub_nav">
				
					<?php $exclude = woo_exclude_pages(); ?>
					<?php wp_page_menu('show_home=1&sort_column=menu_order&depth=0&title_li=&exclude=' . $exclude . ',' . get_option( 'woo_exclude_pages_subnav' ) ); ?>
					
				</div><!-- /sub_nav -->
			
			<?php } ?>	
		
			<div id="page" class="full_page <?php if ( get_option( 'woo_subnav' ) == 'false' ) { ?>no_sub_nav_full<?php } ?>">
			
				<h2 class="title"><?php the_title(); ?></h2>
				
				<div class="entry">
				
					<?php the_content(); ?>
				
				</div><!-- /entry -->		
			
			</div><!-- /page -->
			
		</div><!-- /main_content -->
		
		<div class="clear"></div>
		
	</div><!-- /content -->
	
	<?php endwhile; endif; ?>		

<?php get_footer(); ?>
