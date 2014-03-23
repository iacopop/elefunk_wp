<?php get_header(); ?>

        	<div id="content">

			  <?php if (have_posts()) : ?>
              
			  <?php if ( get_option( 'woo_breadcrumbs' ) == 'true') { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>
                      
              <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
              <?php /* If this is a category archive */ if (is_category()) { ?>
                <h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>
              <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                <h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
              <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                <h1>Archive for <?php the_time('F jS, Y'); ?></h1>
              <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                <h1>Archive for <?php the_time('F, Y'); ?></h1>
              <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                <h1>Archive for <?php the_time('Y'); ?></h1>
              <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                <h1>Author Archive</h1>
              <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                <h1>Blog Archives</h1>
              <?php } ?>
        
                <?php while (have_posts()) : the_post(); ?>
        
                <div class="post archive" id="post-<?php the_ID(); ?>">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    <p class="meta">Posted on <?php the_time('F jS, Y') ?> by <?php the_author() ?></p>
        
                    <div class="entry">
						<?php if (get_option('woo_image_archives') == 'true' ) woo_get_image('image',get_option('woo_archive_width'),get_option('woo_archive_height'),'thumbnail alignleft'); ?>

                        <?php if ( get_option('woo_content_archives') == 'true' ) 
							the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); 
						else {
							the_excerpt(); 
							echo '<a href="'. get_permalink() .'"><span class="serif">Read the rest of this entry &raquo;</span></a>';
						} ?>
 						
                        
                    </div>
                    <div class="fix"></div>
                </div>
        
                <?php endwhile; ?>
        
                <ul id="prev-next">
                    <li><?php posts_nav_link('','','&laquo; Previous Entries') ?></li>
                    <li><?php posts_nav_link('','Next Entries &raquo;','') ?></li>
                </ul>
        
            <?php else : ?>
        
                <p>Sorry, no posts matched your criteria.</p>
        
            <?php endif; ?>

            </div><!--content-->		

<?php get_sidebar(); ?>
<?php get_footer(); ?>