<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

					<div id="content">
					
						<div id="page-meta" class="clearfix">
							
						</div><!-- End page-meta -->
						
						<div id="page-content">
												
							<h2 class="pagetitle">Site Archives</h2>
						
							<ul id="posts" class="clearfix">

								<li class="single">
																													
									<div class="post-content">
											
										<h2>Archives by Month:</h2>
											<ul>
												<?php wp_get_archives('type=monthly'); ?>
											</ul>
										
										<h2>Archives by Subject:</h2>
											<ul>
												 <?php wp_list_categories('title_li='); ?>
											</ul>
												
									</div><!-- End post-content -->
										
								</li><!-- End post -->

							</ul><!-- End posts -->
						
						</div><!-- End page-content -->
							
						<?php include( TEMPLATEPATH . '/ad-footer.php' ); ?>    
					
					</div>
					
					<?php include( TEMPLATEPATH . '/copyright.php' ); ?>
						
				</div><!-- End col-64 (Left Column) -->

				<div class="col-278 right">
				
					<?php get_sidebar(); ?>
										
				</div><!-- End col-278 (Right Column) -->

<?php get_footer(); ?>