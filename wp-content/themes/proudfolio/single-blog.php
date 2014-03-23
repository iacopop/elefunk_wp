<?php while ( have_posts() ) : the_post() ?>
						<div class="singlePost">
							<div class="post">
								<h2 class="entry-title"><?php the_title() ?> <span><a href="#comments">{ <?php echo $post->comment_count; ?> }</a></span></h2>
								<p class="entry-meta">
									<abbr class="published"><?php the_time('l, j F Y') ?></abbr>
									<abbr class="category">| Filed under <?php the_category(', ') ?></abbr>									
								</p>
								<div class="entry-content">
									<?php the_content(); ?>
								</div>
							</div><!-- .post -->
							<?php comments_template(); ?>
						</div>

<?php endwhile ?>

<?php get_sidebar() ?>