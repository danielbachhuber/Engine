<div class="content">

<?php if ( have_posts() ): ?>
	
	<?php
	global $wp_query;
	if ( $wp_query->query_vars['paged'] > 1 ) : ?>
		<div class="pagination top-pagination">
			<div class="previous-posts-link pagination-link major-link float-left"><?php previous_posts_link( __( '&laquo; Previous' ) ); ?></div>
			<div class="next-posts-link pagination-link minor-link float-right"><?php next_posts_link( __( 'Next &raquo;' ) ); ?></div>
			<div class="clear-both"></div>
		</div>
	<?php else: ?>
	
	<?php if ( is_tag() ): ?>
		<?php
			$term = get_queried_object();
		?>
		<h2 class="view-title"><span class="label">Topic:</span> <?php single_term_title(); ?></h2>
		<?php if ( !empty( $term->description ) ): ?>
		<div class="view-description"><?php echo wpautop( $term->description ); ?></div>
		<?php endif; ?>
	<?php endif; ?>
		
	<?php endif; ?>
	
	<div class="posts-stream">

<?php while ( have_posts() ): the_post(); ?>
	
	<?php $post_format = engine_get_post_format(); ?>
	
	<div id="post-<?php the_id(); ?>" <?php post_class( 'post-format-' . $post_format ); ?>>
	
	<div class="meta top-meta float-left"><span class="timestamp"><a href="<?php the_permalink(); ?>"><span class="permalink hidden">&#8734; permalink</span><span class="timestamp-text"><?php engine_timestamp(); ?></span></a></span></div>	
	
	<?php if ( 'status' == $post_format ) : ?>
		
		<div class="entry">
			<?php the_content(); ?>
		</div>
		
	<?php elseif ( 'gallery' == $post_format ): ?>
		
		<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		
		<?php
			$args = array(
				'post_type' => 'attachment',
				'post_parent' => get_the_id(),
				'posts_per_page' => -1,
				'post_status' => 'inherit',
				'order' => 'ASC',
				'orderby' => 'menu_order ID',
				'exclude' => get_post_thumbnail_id(),
			);
			$gallery_images = get_posts( $args );
		?>
		<?php if ( count( $gallery_images ) ): ?>
		
		<div class="gallery-images entry">
		
		<?php if ( count( $gallery_images ) > 6 ): ?>	
		
		<?php if ( has_post_thumbnail() ): ?>
			<div class="featured-image float-left post-thumbnail">
			<a href="<?php echo get_permalink( get_post_thumbnail_id() ); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
			</div>
		<?php endif; ?>

		<?php foreach ( $gallery_images as $key => $gallery_image ) : ?>			
			<?php if ( $key >= 6 ) continue; ?>
			<?php if ( !has_post_thumbnail() && $key == 0 ): ?>
				<div class="featured-image float-left post-thumbnail">
				<a href="<?php echo get_permalink( $gallery_image->ID ); ?>"><?php echo wp_get_attachment_image( $gallery_image->ID, 'medium' ); ?></a>
				</div>
				<?php continue; ?>
			<?php endif; ?>

		<div class="gallery-thumbnail post-thumbnail float-left">
			<a href="<?php echo get_permalink( $gallery_image->ID ); ?>"><?php echo wp_get_attachment_image( $gallery_image->ID, array( 75, 75 ) ); ?></a>
		</div>

		<?php endforeach; ?>
		
		<?php if ( count( $gallery_images ) ): ?>
		<a class="gallery-thumbnail float-left gallery-count" href="<?php the_permalink(); ?>"><?php echo count( $gallery_images ); ?> images total</a>
		<?php endif; ?>

		<?php else: ?>
			
		<?php foreach ( $gallery_images as $key => $gallery_image ) : ?>

		<div class="gallery-thumbnail post-thumbnail float-left">
			<a href="<?php echo get_permalink( $gallery_image->ID ); ?>"><?php echo wp_get_attachment_image( $gallery_image->ID, array( 75, 75 ) ); ?></a>
		</div>

		<?php endforeach; ?>			
			
			
		<?php endif; ?>
		
		<div class="clear-left"></div>		
		
		</div><!-- .gallery-images -->
		
		<?php endif; ?>
		
		<?php if ( $post->post_excerpt ): ?>
		<div class="entry">
			<?php the_excerpt(); ?>
		</div>
		<?php endif; ?>		
	
	<?php elseif ( 'aside' == $post_format ) : ?>

		<div class="entry">
			<?php the_content(); ?>
		</div>
	
	<?php elseif ( 'photo' == $post_format ) : ?>

		<div class="entry">
			<?php the_content(); ?>
		</div>
	
	<?php else: ?>

		<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

		<div class="entry">
			<?php the_excerpt(); ?>
		</div>	
	
	<?php endif; ?>
	
		<div class="meta">
			<span class="tags"><?php the_category( ', '); ?>, <?php the_tags( '', ', ', '' ); ?></span>
		</div>

	</div><!-- END .post -->

<?php endwhile; ?>

	</div><!-- END .posts-stream -->

	<?php if ( $wp_query->query_vars['paged'] > 1 ) : ?>
	<div class="pagination bottom-pagination">
		<div class="previous-posts-link pagination-link minor-link float-left"><?php previous_posts_link( __( '&laquo; Previous' ) ); ?></div>
		<div class="next-posts-link pagination-link major-link float-right"><?php next_posts_link( __( 'Next &raquo;' ) ); ?></div>
		<div class="clear-both"></div>
	</div>
	<?php else: ?>
	<div class="pagination bottom-pagination">
		<div class="next-posts-link pagination-link"><?php next_posts_link( __( 'Next &raquo;' ) ); ?></div>
	</div>
	<?php endif; ?>

<?php endif; ?>

</div><!-- END .content -->