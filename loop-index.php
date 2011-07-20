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
	<?php endif; ?>

<?php while ( have_posts() ): the_post(); ?>
	
	<?php if ( 'status' == engine_get_post_format() ) : ?>

	<div class="post post-format-status">
		
		<div class="entry">
			<?php the_content(); ?>
		</div>
	
	<?php elseif ( 'aside' == engine_get_post_format() ) : ?>
		
	<div class="post post-format-aside">

		<div class="entry">
			<?php the_content(); ?>
		</div>
	
	<?php elseif ( 'photo' == engine_get_post_format() ) : ?>
		
	<div class="post post-format-photo">

		<div class="entry">
			<?php the_content(); ?>
		</div>
	
	<?php else: ?>
		
	<div class="post post-format-standard">

		<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

		<div class="entry">
			<?php the_excerpt(); ?>
		</div>	
	
	<?php endif; ?>
	
		<div class="meta">
			<span class="timestamp"><a href="<?php the_permalink(); ?>"><?php engine_timestamp(); ?></a></span> <span class="tags"><?php the_category( ', '); ?>, <?php the_tags( '', ', ', '' ); ?></span>
		</div>

	</div><!-- END .post -->

<?php endwhile; ?>

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