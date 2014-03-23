<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>
	
	<?php if ( get_option( 'woo_breadcrumbs' ) == 'true') { yoast_breadcrumb('<div id="breadcrumb"><p>','</p></div>'); } ?>
	
	<div id="content">
		
		<div id="main_content">
		
			<div id="page" class="no_sub_nav">
			
				<h2 class="title"><?php the_title(); ?></h2>
				
				<div class="entry sitemap">
					
					<ul>
					
						<li>
							<h3>Pages</h3>
							<ul><?php wp_list_pages('sort_column=menu_order&depth=0&title_li='); ?></ul>
						</li>

						<li>
							<h3>Blog / News Categories</h3>
							<ul><?php wp_list_categories('depth=0&title_li=&show_count=1'); ?></ul>
						</li>		

						<li>
							<h3>Blog / News Monthly Archives</h3>
							<ul><?php wp_get_archives('type=monthly&limit=12'); ?> </ul>
						</li>												
					
					</ul>
				
				
				</div><!-- /entry -->		
			
			</div><!-- /page -->
			
		</div><!-- /main_content -->
		
		<?php get_sidebar(); ?>
		
		<div class="clear"></div>
		
	</div><!-- /content -->

<?php get_footer(); ?>