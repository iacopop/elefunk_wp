<?php get_header(); ?>

	<?php if ( get_option( 'woo_breadcrumbs' ) == 'true') { yoast_breadcrumb('<div id="breadcrumb"><p>','</p></div>'); } ?>
	
	<div id="content">
		
		<div id="main_content">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div class="post">
			
				<div class="post_head">
				
					<div class="title_meta">
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>					
						<p class="meta">Published on <?php the_time('d F Y'); ?> by <?php the_author_posts_link(); ?> in <?php the_category(', '); ?></p>
					</div><!-- /title_meta -->
					
					<span class="comments"><a href="<?php comments_link(); ?>" title="Comment on this post"><?php comments_number('0','1','%'); ?></a><span class="bg"></span></span>
				
				</div><!-- /post_head -->
				
				<?php if (  get_post_meta($post->ID, 'embed', true) <> "" ) { ?>
					<div class="video">
						<?php echo woo_get_embed('embed','619','356'); ?> 
					</div>
				<?php } ?>
				
				<div class="entry">
				
					<?php the_content(); ?>
				
				</div><!-- /entry -->
			
			</div><!-- /post -->
			
			<?php endwhile; endif; ?>
			
            <div class="clear"></div>
            
			<?php comments_template(); ?>    	
			
		</div><!-- /main_content -->
		
		<?php get_sidebar(); ?>
		
		<div class="clear"></div>
		
	</div><!-- /content -->

<?php get_footer(); ?>