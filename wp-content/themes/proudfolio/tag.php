<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<h2>You are browsing entries tagged with "<?php single_tag_title("", true); ?>"</h2>

		<ul class="recentEntries tagPage">
		
		<?php while (have_posts()) : the_post(); ?>		
			
			<li>
				<div class="post">
					<?php include('includes/cat-single.php'); ?>
					<h3 class="entry-type">
						<?php if ( $display_portfolio ) { echo 'Portfolio'; }  ?>
						<?php if ( $display_blog ) { echo 'Blog'; } ?>						
					</h3>
					
					<h3 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
					<p class="entry-meta">
						<abbr class="published"><?php the_time('l, j F Y') ?></abbr>
					</p>
				</div><!-- .post -->	
			</li>	
			
		<?php endwhile; ?>								

		</ul><!-- .recentEntries -->
	
	<div id="navigation">
	
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
	
	</div><!-- /END #navigation-->
	
	<?php endif; ?>

<?php get_footer(); ?>	