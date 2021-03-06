<?php get_header(); ?>

		<div id="centercol" class="grid_10">
		
		<?php
			if(isset($_GET['author_name'])) :
			$curauth = get_userdatabylogin($author_name);
			else :
			$curauth = get_userdata(intval($author));
			endif;
		?>

		<?php if (have_posts()) : ?>

			<div class="box">
                	
                <h3><em>Author Archives |</em> <?php echo $curauth->nickname; ?></h3>
                
                <div class="fix"></div>         	
                
                    <?php
                        // Determine which gravatar to use for the user
                        $email = $curauth->user_email;
                        $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($email). "&default=".urlencode($GLOBALS['defaultgravatar'] )."&size=48";
                            $usegravatar = get_option('woo_gravatar');
                    ?>
                    
                <?php  if ( $usegravatar ) { ?><span class="author_photo"><img src="<?php echo $grav_url; ?>" width="48" height="48" alt="" /></span><?php } ?>
                <p><?php echo $curauth->nickname; ?> - who has written <?php the_author_posts(); ?> posts on <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>.</p>
                <p><?php echo $curauth->description; ?> <br style="clear:both;" /></p>
                <p class="author_email"><a href="mailto:<?php echo $curauth->user_email; ?>">Contact the author</a></p>
	
			</div><!--/box-->
			<?php while (have_posts()) : the_post(); ?>		

                <div class="post box" id="post-<?php the_ID(); ?>">
                
                    <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    
                    <div class="date-comments">
                        <p class="fl"><?php the_time('l, F j, Y'); ?></p>
                        <p class="fr"><span class="comments"></span><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></p>
                    </div>        
                
                    <?php if ( get_post_meta($post->ID,'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
                        
                        <img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=75&amp;w=75&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" class="fl" style="margin-top:5px;" />			
                        
                    <?php } ?> 
                
                    <p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>
                    
                    
                    <span class="continue"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>">Continue reading...</a></span>    				
    
                    
                </div><!--/post-->


		<?php endwhile; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>		
	
	<?php endif; ?>							

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>