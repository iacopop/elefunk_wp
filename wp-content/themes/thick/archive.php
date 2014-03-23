<?php get_header(); ?>

		<!-- content -->        
		<div id="content" class="grid_9 alpha omega content">

		<?php if(have_posts()) : ?>
			
			<!-- post -->
			<div class="post index">
							
				<?php $post = $posts[0]; ?>

				<?php
					if(isset($_GET['author_name'])) :
						$curauth = get_userdatabylogin(get_the_author_login());
					else :
						$curauth = get_userdata(intval($author));
					endif;
				?>				
				
				<?php if (is_category()) { ?>
					<h1>Browsing all posts in <strong><?php single_cat_title(); ?></strong>.</h1>
				<?php } elseif( is_tag() ) { ?>
					<h1>Browsing all posts in <strong>"<?php single_tag_title(); ?>"</strong>.</h1>
				<?php } elseif (is_month()) { ?>	
					<h1>Browsing all posts in <strong><?php the_time('F, Y'); ?></strong>.</h1>
				<?php } elseif (is_author()) { ?>
					<h1>Browsing all posts in <strong><?php echo $curauth->display_name; ?></strong>.</h1>
				<?php } ?>
			
			</div>
			<!-- /post -->					
		
			<?php while(have_posts()) : the_post() ?>		
						
			<!-- post -->
			<div class="post index">
				
				<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="post-meta"><?php the_time('j/m/y'); ?> <span>|</span> <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></div>

				<p><?php the_excerpt(); ?></p>
				
			</div>
			<!-- /post -->
			
			<?php endwhile; ?>
			
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
				<div id="postnavigation">
				
					<div class="fl"><?php next_posts_link('&laquo; Older Entries') ?></div>
					<div class="fr"><?php previous_posts_link('Newer Entries &raquo;') ?></div>			
					<div class="fix"></div>
					
				</div>	
			<?php } ?>				
		
		<?php endif; ?>
			
		</div>
		<!-- /content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>