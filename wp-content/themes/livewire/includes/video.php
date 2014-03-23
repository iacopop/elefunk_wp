<?php
	$showvideo = get_option('woo_show_video');
	
	if ($showvideo) { ?>

	<div id="video-frame">

		<?php include(TEMPLATEPATH . '/includes/version.php'); ?>
        
		<h2>Video Content</h2>
	
	<?php query_posts('showposts=1&cat=' . $ex_vid); ?>
	
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>	
	
			<div id="video-<?php the_ID(); ?>" class="video_box">
            <h3><?php the_title(); ?></h3>
				<?php the_content('Read the rest of this entry &raquo;'); ?>
			</div>
		
		<?php endwhile; ?>
        
        <h4>Other Videos:</h4>
		
		<?php query_posts('showposts=5&offset=1&cat=' . $ex_vid); ?>
	
		<?php if (have_posts()) : ?>
		
			<ul class="mootabs_title">
	
			<?php while (have_posts()) : the_post(); ?>	
		
				<li><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
			
			<?php endwhile; ?>
			
			</ul>	
		
		<?php endif; ?>
	
	<?php endif; ?>
	
	</div><!--/video-frame -->

<?php } ?>