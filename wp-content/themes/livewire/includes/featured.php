
<div id="featured">

<?php 
	include(TEMPLATEPATH . '/includes/version.php');
	
	$the_query = new WP_Query('cat=' . $ex_feat . '&showposts=1&orderby=post_date&order=desc');
			
	while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
?>

    <div class="imageElement" id="post-<?php the_ID(); ?>">
   
      <div class="lead-image-wrapper">
      	
        <h2>Breaking Story</h2>
      	<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
        <h4><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?></h4>
      	<img alt="<?php the_title_attribute(); ?>" src="<?php if (!get_option('woo_resize')) : ?>
<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=200&amp;w=375&amp;zc=1&amp;q=90<?php else: echo get_post_meta($post->ID, "image", $single = true); endif; ?>" />
        
      </div>
    
    </div>
    
			<p class="posted_on">Posted on <?php the_time('d F Y'); ?> <?php edit_post_link(__('Edit'), ' &#183; ', ''); ?></p>

			<div class="entry">
				<?php the_excerpt(); ?>
			</div>

			<div class="postmeta">
        		<span class="posted_in"><?php the_category(', ') ?></span>
        		<span class="comments">&nbsp;</span>
			</div>

<?php endwhile; ?>

</div>