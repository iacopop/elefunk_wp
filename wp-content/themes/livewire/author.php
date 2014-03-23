<?php get_header(); ?>

		<div class="col1">
		
		<?php
			if(isset($_GET['author_name'])) :
			$curauth = get_userdatabylogin($author_name);
			else :
			$curauth = get_userdata(intval($author));
			endif;
		?>

		<?php if (have_posts()) : ?>
		
                <div id="archivebox" class="author_info">
                	
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
                </div>
	
			<?php while (have_posts()) : the_post(); ?>		

				<div class="post-alt blog" id="post-<?php the_ID(); ?>">
		
					<?php if (!get_option('woo_resize')) : ?>

					<?php if ( get_post_meta($post->ID, 'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
						
						<img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&h=57&w=100&zc=1&q=90" alt="" class="th" />			
						
					<?php } else { ?> <!-- DISPLAY THE DEFAULT IMAGE, IF CUSTOM FIELD HAS NOT BEEN COMPLETED -->
						
						<img src="<?php bloginfo('template_directory'); ?>/images/no-img-thumb.jpg" alt="" class="th" />
						
					<?php } ?> 	
                    
                    <?php endif; ?>	                    	
					
					<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p class="posted_on">Posted on <?php the_time('d F Y'); ?></p>
		
					<div class="entry">
						<?php the_excerpt('<p class="continue">Read the full story</p>'); ?> 
					</div>
                    
                     <?php if (function_exists('the_tags')) { ?><p class="singletags"><?php the_tags('Tags: ', ', ', ''); ?></p><?php } ?>
		
					<div class="postmeta">
        				<span class="posted_in"><?php the_category(', ') ?></span>
        				<span class="comments"><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?></span>
					</div>
				
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