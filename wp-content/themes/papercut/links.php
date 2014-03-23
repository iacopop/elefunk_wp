<?php
/*
Template Name: Links
*/
?>
<?php get_header(); ?>
		<div id="content" class="clearfix">
			<div id="left-col">
				<div id="left-top">
					<div class="left-content">
						<h2 class="pink">Links:</h2>
							<div class="divider"></div>
						<ul>
							<?php get_links_list(); ?>
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