<?php get_header(); ?>

	<div id="columns">
		<div id="centercol">

            <div class="content">
                <?php if(have_posts()) : ?><?php while(have_posts()) : the_post() ?>
    
                <div id="post-<?php the_ID(); ?>" class="box post">

                    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                    <div class="hl"></div>
                    
                    <div class="entry">                   
    
                    <?php if ( get_post_meta($post->ID,'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
                    
                    <div class="pic">
                        <a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=<?php if ( get_option('woo_thumb_height') <> "" ) { echo get_option('woo_thumb_height'); } else { ?>150<?php } ?>&amp;w=<?php if ( get_option('woo_thumb_width') <> "" ) { echo get_option('woo_thumb_width'); } else { ?>440<?php } ?>&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" /></a>       
                    </div>   	
                    
                    <?php } ?>										
                    
                    <?php the_content(); ?>
                    
                    </div>
                
                </div>
                <!--/box-->
    
                <?php endwhile; else : ?>
    
                <div class="post box">
                    <div class="entry-head"><h2>404 - Not Found</h2></div>
                    <div class="entry-content"><p>The page you are looking for is not here.</p></div>
                </div>
    
                <?php endif; ?>
            </div>
    
		</div>
		<!--/centercol -->

<?php get_sidebar(); ?>
    
		<div class="fix"></div>
	</div>
	<!--/columns -->

<?php get_footer(); ?>