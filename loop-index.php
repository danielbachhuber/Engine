<div class="content">

<?php if ( have_posts() ): ?>

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
		
		<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

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
			<span class="timestamp"><a href="<?php the_permalink(); ?>"><?php engine_timestamp(); ?></a></span> <span class="tags"><?php the_tags( '', ', ', '' ); ?></span>
		</div>

	</div><!-- END .post -->

<?php endwhile; ?>

	<div class="pagination">
		<?php posts_nav_link( ' - ', '&laquo; Newer', 'Older &raquo;' ); ?>
	</div>

<?php endif; ?>

</div><!-- END .content -->