<div id="content">    
    <div class="container clearfix">
        <div id="left-col">
            <?php if (have_posts()) : $count = 0; $count2 = 0; ?>
                <ul class="post-list clearfix">
                <?php while (have_posts()) : the_post(); $preview = get_post_meta($post->ID, 'preview', true); ?>
					<?php if ( $GLOBALS['exclude'] <> $post->ID ) : ?> 
                    <li class="post clearfix">
                        <div class="meta">
                            <h3><?php the_category(', ') ?></h3>
                                <p>Posted on <?php the_time('F jS, Y') ?></p>
                                <p>Written by <?php the_author_posts_link(); ?></p>
            
                            <h4 class="related-posts">Related Posts</h4>
                                <ul class="related_posts">
                                    <?php rp_related_posts(''); ?>
                                </ul>
                        </div>
                        <div class="post-content">
                            <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                            <!-- Custom setting image -->
                            <?php if (get_post_meta($post->ID, "image", $single = true)) { ?>
                            <a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=<?php if ( get_option('woo_image_height') <> "" ) { echo get_option('woo_image_height'); } else { ?>145<?php } ?>&amp;w=<?php if ( get_option('woo_image_width') <> "" ) { echo get_option('woo_image_width'); } else { ?>218<?php } ?>&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" class="post-preview left" /></a>   
                            <?php } ?>       	
                            
                            <?php if ( get_option('woo_the_content') ) { the_content('Continue Reading...'); } else { the_excerpt(); } ?>
                            
                        </div>
                    </li>
                    <?php endif; ?>
                <?php $count++; endwhile; ?>

                    <li class="archives clearfix">
                    
                        <h2 class="gray left"><?php next_posts_link('Older Posts <span class="extrasmall georgia lightgray block">Yeah! There are more posts, check them out.</span>') ?></h2>
                        <h2 class="gray right textright"><?php previous_posts_link('Newer Posts <span class="extrasmall georgia lightgray block">Yeah! There are more posts, check them out.</span>') ?></h2>

                    </li>
                </ul>
            <?php endif; ?>
        </div>
        <div id="right-col">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<!-- /content -->        