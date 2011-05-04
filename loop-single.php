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
			<a href="<?php the_permalink(); ?>"><?php dub_timestamp(); ?></a>
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
		
	<div class="post">

		<h2 class="post-title"><?php the_title(); ?></h2>
		
		<div class="entry">
			<?php the_content(); ?>
		</div>
		
		<div class="meta">
			<?php dub_timestamp(); ?> <div class="tags"><?php the_tags( '', ', ', '' ); ?></div>
		</div>

	</div><!-- END .post -->	
	
	<?php endif; ?>

<?php endwhile; ?>

<?php endif; ?>

</div><!-- END .content -->