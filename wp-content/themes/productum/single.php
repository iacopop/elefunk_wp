<?php get_header(); ?>
			
			<div id="main" class="grid_8">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
            <div class="entry">
            
				<h2 class="single"><?php the_title(); ?></h2>
                <p class="post_meta"><span>Posted in <?php the_category(', ') ?>. Written by <?php the_author() ?> on <?php the_time('F jS, Y') ?></p>
				
				<?php the_content(); ?>
                
            </div>
            
<?php endwhile; endif; ?>
<?php comments_template(); ?>
			
			</div><!-- / #main -->

<?php get_sidebar(); ?>
<?php get_sidebar("2"); ?>
<?php get_footer(); ?>