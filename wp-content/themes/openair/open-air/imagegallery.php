<?php
/*
Template Name: Image Gallery
*/
?>
<?php get_header(); ?>
		<div id="featured">
			<div class="container">
				<div class="featured-small clearfix">
					<h2 class="featured">Image Gallery</h2>
				</div>
			</div>
		</div>
		<div id="content">

            <div class="container clearfix">
                <div id="left-col">
                    <ul class="post-list clearfix">
                        <li class="post-last clearfix">
                            <div class="meta">
                                <h3>Post Images</h3>
                            </div>
                            <div class="post-content">                    
                                <?php query_posts('showposts=50'); ?>
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>				
                                    
                                    <?php if ( get_post_meta($post->ID,'image', true) ) { ?>
                                        <a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=<?php if ( get_option('woo_thumb_height') <> "" ) { echo get_option('woo_thumb_height'); } else { ?>90<?php } ?>&amp;w=<?php if ( get_option('woo_thumb_width') <> "" ) { echo get_option('woo_thumb_width'); } else { ?>90<?php } ?>&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" class="thumb-preview" /></a>
                                    <?php } ?>
                                
                                <?php endwhile; endif; ?>	
                                
                                <div style="clear:both;"></div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="right-col">
                    <?php get_sidebar(); ?>
                </div>
            </div>
		</div>

<?php get_footer(); ?>
