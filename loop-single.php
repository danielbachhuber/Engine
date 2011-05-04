<div class="content">

<?php if ( have_posts() ): ?>

<?php while ( have_posts() ): the_post(); ?>

	<?php if ( 'status' == dub_get_post_format() ) : ?>

	<div class="post post-format-status">
		
		<div class="entry">
			<?php the_content(); ?>
		</div>
		
		<div class="meta">
			<?php dub_timestamp(); ?>
		</div>
		
	</div><!-- END .post -->
	
	<?php elseif ( 'aside' == dub_get_post_format() ) : ?>
		
	<div class="post post-format-aside">

		<div class="entry">
			<?php the_content(); ?>
		</div>

		<div class="meta">
			<div class="avatar float-left">
			<?php echo get_avatar( get_option('admin_email'), 48 ); ?>
			</div>
			<div class="primary">
				<h4 class="author"><?php the_author(); ?></h4>
				<div class="timestamp"><?php dub_timestamp(); ?></div>
			</div>
		</div>

	</div><!-- END .post -->	
	
	<?php elseif ( 'photo' == dub_get_post_format() ) : ?>
		
	<div class="post post-format-photo">

		<div class="entry">
			<?php the_content(); ?>
		</div>

		<div class="meta">
			<?php dub_timestamp(); ?>
		</div>

	</div><!-- END .post -->
	
	<?php else: ?>
		
	<div class="post post-format-standard">

		<div class="top-meta"><?php dub_timestamp(); ?></div>
		<h2 class="post-title"><?php the_title(); ?></h2>
		
		<?php if ( !empty( $post->post_excerpt ) ) : ?>
		<div class="summary">
			<?php the_excerpt(); ?>
		</div>
		<?php endif; ?>
		
		<div class="entry">
			<?php the_content(); ?>
		</div>
		
		<div class="meta">
			<?php dub_timestamp(); ?> <span class="tags"><?php the_tags( '', ', ', '' ); ?></span>
		</div>

	</div><!-- END .post -->	
	
	<?php endif; ?>

<?php endwhile; ?>

<?php endif; ?>

</div><!-- END .content -->