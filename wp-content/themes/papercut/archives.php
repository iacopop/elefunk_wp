<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>
		<div id="content" class="clearfix">
			<div id="left-col">
				<div id="left-top">
					<div class="left-content">
						<h2 class="pink">Archives</h2>
							<div class="divider"></div><br />
						<h2>Search:</h2>
						<?php include (TEMPLATEPATH . '/searchform.php'); ?>
						<h2>Archives by Month:</h2>
						<ul>
							<?php wp_get_archives('type=monthly'); ?>
						</ul>
						
						<h2>Archives by Subject:</h2>
						<ul>
							 <?php wp_list_categories(); ?>
						</ul>
					</div>
				</div><div id="left-bottom"></div>
			</div>
			<div id="right-col">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
