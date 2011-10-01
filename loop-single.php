<div class="content">

<?php if ( have_posts() ): ?>

<?php while ( have_posts() ): the_post(); ?>
	
	<?php $post_format = engine_get_post_format(); ?>
	
	<div id="post-<?php the_id(); ?>" <?php post_class( 'post-format-' . $post_format ); ?>>	

	<?php if ( 'gallery' == $post_format || 'post' == $post_format ): ?>
		
	<div class="post post-format-standard">
		
		<h2 class="post-title"><?php the_title(); ?></h2>
	
	<?php endif; ?>
	
	<div class="entry">
		<?php the_content(); ?>
	</div>	
	
	<div class="meta has-avatar">
		<div class="avatar float-left">
		<?php echo get_avatar( get_option('admin_email'), 48 ); ?>
		</div>
		<div class="primary-info">
			<span class="author"><?php the_author_link(); ?></span>
			<span class="timestamp"><a href="<?php the_permalink(); ?>"><?php engine_timestamp(); ?></a></span>
			<span class="tags"><?php the_category( ', '); ?>, <?php the_tags( '', ', ', '' ); ?></span>				
		</div>
		<div class="clear-both"></div>			
	</div>
	
	</div><!-- END .post -->

<?php endwhile; ?>

<?php endif; ?>

</div><!-- END .content -->