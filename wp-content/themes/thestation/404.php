<?php get_header(); ?>
	
	<?php if ( get_option( 'woo_breadcrumbs' ) == 'true') { yoast_breadcrumb('<div id="breadcrumb"><p>','</p></div>'); } ?>
	
	<div id="content">
		
		<div id="main_content">
		
			<?php if ( get_option( 'woo_subnav' ) == 'true') { ?>
			
			<div id="sub_nav">
			
				<?php $exclude = woo_exclude_pages(); ?>
				<?php wp_page_menu('show_home=1&sort_column=menu_order&depth=0&title_li=&exclude=' . $exclude . ',' . get_option( 'woo_exclude_pages_subnav' ) ); ?>

			</div><!-- /sub_nav -->
			
			<?php } ?>	
		
			<div id="page" <?php if ( get_option( 'woo_subnav' ) == 'false' ) { ?>class="no_sub_nav"<?php } ?>>
			
				<h2 class="title">Sorry...</h2>
				
				<div class="entry">
				
					<p>The page doesn't exist...</p>
				
				</div><!-- /entry -->		
			
			</div><!-- /page -->
			
		</div><!-- /main_content -->
		
		<?php get_sidebar(); ?>
		
		<div class="clear"></div>
		
	</div><!-- /content -->

<?php get_footer(); ?>
