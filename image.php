<?php get_header() ?>

	<div class="main">
		
		<div class="wrap">
		
		<div class="content">
			<?php if ( have_posts() ) : ?>
				<?php $image_id = get_queried_object_id(); ?>
				<?php $metadata = wp_get_attachment_metadata( $image_id ); ?>	
				<?php $meta_html = '';
				if ( isset( $metadata['image_meta']['created_timestamp'] ) && $metadata['image_meta']['created_timestamp'] )
					$meta_html .= '<span class="timestamp">' . engine_timestamp( null, false, $metadata['image_meta']['created_timestamp'] ) . '</span>, ';					
					
				if ( isset( $metadata['image_meta']['shutter_speed'], $metadata['image_meta']['aperture'] ) && $metadata['image_meta']['shutter_speed'] ) {
					$meta_html .= '<span class="shutteraperture">';
					if ( ( 1 / $metadata['image_meta']['shutter_speed'] ) > 1 ) {
						$meta_html .= "1/";
							if (number_format((1 / $metadata['image_meta']['shutter_speed']), 1) ==  number_format((1 / $metadata['image_meta']['shutter_speed']), 0)) {
								$meta_html .= number_format((1 / $metadata['image_meta']['shutter_speed']), 0, '.', '') . ' sec';
							} else {
								$meta_html .= number_format((1 / $metadata['image_meta']['shutter_speed']), 1, '.', '') . ' sec';
							}
						} else {
							$meta_html .= $metadata['image_meta']['shutter_speed'] . ' sec';
						}
					$meta_html .= ' at f' . $metadata['image_meta']['aperture'] . '</span>, ';				
				}
				
				if ( isset( $metadata['image_meta']['camera'] ) && $metadata['image_meta']['camera'] )
					$meta_html .= '<span class="camera">' . $metadata['image_meta']['camera'] . '</span>, ';				
					
				?>
				<div class="navigation">					
					<?php if ( $meta_html ): ?>
					<div class="meta float-right">
						<?php echo rtrim( $meta_html, ', ' ); ?>
					</div>
					<?php endif; ?>	
					<span class="previous-image navigation-link left-navigation"><?php previous_image_link( false, '&larr;&nbsp;&nbsp;&nbsp;' ); ?></span>
					<a class="navigation-link" href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a>	
					<span class="next-image navigation-link right-navigation"><?php next_image_link( false, '&nbsp;&nbsp;&nbsp;&rarr;' ); ?></span>
				</div>				

				<?php while ( have_posts() ) : the_post(); ?>

				<div id="image-<?php echo $image_id; ?>" <?php post_class( 'post' ); ?>>

					<?php if ( !strpos( $metadata['file'], $post->post_title ) ):  ?>
					<h2 class="image-title"><?php the_title(); ?></h2>
					<?php endif; ?>
					
					<div class="previous-image-thumbnail navigation-image-thumbnail float-left"><div class="float-right"><?php previous_image_link( array( 800, 600 ) ); ?></div></div>
					<div class="next-image-thumbnail navigation-image-thumbnail float-right"><?php next_image_link( array( 800, 600 ) ); ?></div>
					<div class="primary-image">
					<?php echo wp_get_attachment_image( $post->ID, array( 800, 600 ) ); ?>
					</div>
					
					<div class="image-meta">
						<?php if ( !empty( $post->post_excerpt ) ) : ?>
						<div class="image-caption"><?php the_excerpt(); ?></div>
						<?php endif; ?>
						<?php if ( !empty( $post->post_content ) ) : ?>
						<div class="image-description"><?php the_content(); ?></div>
						<?php endif; ?>
					</div>

					<div style="clear:both;"></div>

				</div><!-- END - .image -->
				
			<?php endwhile; ?>
			
			<?php endif; ?>

			<div class="clear-both"></div>

		</div><!-- .content -->
		
	</div><!-- .wrap -->
	
</div><!-- .main -->

<?php get_footer() ?>