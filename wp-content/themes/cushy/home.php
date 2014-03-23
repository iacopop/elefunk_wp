<?php $wp_query->is_home = true;  $wp_query->is_page = false; ?>

<?php get_header(); ?>

					<?php if ( get_option('woo_features_page') ) : ?>
					<div class="headlines">
						
						<?php 
							$posts = get_posts( "page_id=" . get_page_id( get_option( 'woo_features_page' ) ) ); 
							if( $posts ) :
								foreach( $posts as $post ) : setup_postdata( $post );
						?>
						
						<div class="headline">
							<h2><?php the_title(); ?></h2>
							<?php if ( get_post_meta($post->ID, "excerpt", $single = true) <> "" ) { echo '<p>' . stripslashes( get_post_meta($post->ID, "excerpt", $single = true) ) . '</p>'; } else { the_content(); } ?>
							<a href="<?php echo get_permalink(  $page->ID ); ?>" class="learn-more">Learn More</a>
						</div>
						
						
					</div><!-- End headlines -->
					
					<?php if ( get_post_meta( $post->ID, "image", true ) <> "" ) { ?>
					
					<div class="latest-image">
					
						<img src="<?php bloginfo( 'template_directory' ); ?>/thumb.php?src=<?php echo get_post_meta( $post->ID, "image", true ); ?>&amp;w=444&amp;h=255&amp;zc=1" alt="<?php the_title(); ?>" />
						
						<?php if ( get_post_meta( $post->ID, "image_caption", true ) <> "" ) { ?>
						<p class="image-caption">
							<?php echo get_post_meta( $post->ID, "image_caption", true ); ?>
						</p>
						<?php } ?>
					
					</div><!-- End latest-image -->
					
					<?php } ?>
					
					<?php 
							endforeach;
						endif; 
					endif;
					?>
										
				</div><!-- End clearfix -->
								
			</div><!-- End container -->
			
			<div id="news-top"></div><!-- End news-top -->
			
			<?php include_once( TEMPLATEPATH . '/includes/news.php' ); ?>
			
			<?php include_once( TEMPLATEPATH . '/includes/featured_tabs.php' ); ?>
			
				
<?php get_footer(); ?>