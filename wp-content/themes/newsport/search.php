<?php get_header(); ?>

        	<div id="content">

			<?php if (have_posts()) : ?>
                <h1>Search Results</h1>
                <p>
                    Your search topic <strong><?php echo wp_specialchars($s); ?></strong> returned the following articles:
                </p>
                <?php while (have_posts()) : the_post(); ?>
        
                    <div class="post">
                        <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        <small><?php the_time('l, F jS, Y') ?></small>
        
                        <?php the_excerpt() ?>
                        
                        <p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
                    </div>
        
                <?php endwhile; ?>
        
                <ul id="prev-next">
                    <li><?php posts_nav_link('','','&laquo; Previous Entries') ?></li>
                    <li><?php posts_nav_link('','Next Entries &raquo;','') ?></li>
                </ul>
        
            <?php else : ?>
        
                <h1>Search Results</h1>
                <p>
                    Sorry, but your search term <strong><?php echo wp_specialchars($s); ?></strong> returned <strong>0</strong> results.
                </p>
        
            <?php endif; ?>
    
            </div><!--content-->		
    

<?php get_sidebar(); ?>
<?php get_footer(); ?>