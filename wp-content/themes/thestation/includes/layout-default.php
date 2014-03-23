		<?php if ( get_option( 'woo_slider' ) == 'false' ) { include( TEMPLATEPATH . '/includes/featured-tabs.php' ); } else { include( TEMPLATEPATH . '/includes/featured-page-slider.php' );  } ?>
		
		<div class="clear"></div>
		
		<div id="main_content">
			
			<?php if ( get_option( 'woo_intro_page' ) <> "" ) { ?>
		
			<div id="top">
				
				<?php query_posts('page_id=' . get_option( 'woo_intro_page' ) ); while (have_posts()) : the_post(); ?>
					
					<h2><?php the_title(); ?></h2>
					
					<div class="entry">
						<?php the_content(); ?>
					</div><!-- /entry -->	
				
				<?php endwhile; ?>
				
			</div><!-- /top -->
			
			<?php } ?>
			
			<div id="two-col">
				
				<?php if ( get_option( 'woo_intro_page_left' ) <> "" ) { ?>
			
				<div class="left">
				
				<?php query_posts('page_id=' . get_option( 'woo_intro_page_left' ) ); while (have_posts()) : the_post(); ?>
					
					<h3><?php the_title(); ?></h3>
					
					<div class="entry">
						<?php the_content(); ?>
					</div><!-- /entry -->

					<?php if ( get_post_meta($post->ID, "button_text", $single = true) <> "" and get_post_meta($post->ID, "button_link", $single = true) <> "" ) { ?>
						<a class="signup" href="<?php echo get_post_meta($post->ID, "button_link", $single = true); ?>" title="<?php echo get_post_meta($post->ID, "button_text", $single = true); ?>"><?php echo get_post_meta($post->ID, "button_text", $single = true); ?></a>
					<?php } ?>						
				
				<?php endwhile; ?>
				
				</div><!-- /left -->
				
				<?php } ?>
				
				<?php if ( get_option( 'woo_intro_page_right' ) <> "" ) { ?>
				
				<div class="right">
					
				<?php query_posts('page_id=' . get_option( 'woo_intro_page_right' ) ); while (have_posts()) : the_post(); ?>
					
					<h3><?php the_title(); ?></h3>
					
					<div class="entry">
						<?php the_content(); ?>
					</div><!-- /entry -->

					<?php if ( get_post_meta($post->ID, "button_text", $single = true) <> "" and get_post_meta($post->ID, "button_link", $single = true) <> "" ) { ?>
						<a class="signup" href="<?php echo get_post_meta($post->ID, "button_link", $single = true); ?>" title="<?php echo get_post_meta($post->ID, "button_text", $single = true); ?>"><?php echo get_post_meta($post->ID, "button_text", $single = true); ?></a>
					<?php } ?>						
				
				<?php endwhile; ?>
				
				</div><!-- / right -->
				
				<?php } ?>
			
			</div><!-- /two-col -->
			
			<div class="clear"></div>
			
		</div><!-- /main_content -->
		
		<?php $wp_query->is_home = true; ?>
		<?php get_sidebar(); ?>
		
		<div class="clear"></div>
