<?php get_header(); ?>
<?php while ( have_posts() ) : the_post() ?>
						<div class="singlePost">
							<div class="post">
								<h2 class="entry-title"><?php the_title() ?></h2>
								<div class="entry-content">
									<?php the_content(); ?>
								</div>
							</div><!-- .post -->
						</div>
<?php endwhile ?>

<?php get_sidebar() ?>
<?php get_footer(); ?>