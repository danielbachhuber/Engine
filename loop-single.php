<div class="content">

<?php if ( have_posts() ): ?>

<?php while ( have_posts() ): the_post(); ?>

	<?php if ( 'status' == dub_get_post_format() ) : ?>

	<div class="post post-format-status">
		
		<div class="entry">
			<?php the_content(); ?>
		</div>
		
		<div class="meta has-avatar">
			<div class="avatar float-left">
			<?php echo get_avatar( get_option('admin_email'), 48 ); ?>
			</div>
			<div class="primary-info">
				<span class="author"><?php the_author_link(); ?></span>
				<span class="timestamp"><?php dub_timestamp(); ?></span>
				<span class="tags"><?php the_tags( '', ', ', '' ); ?></span>				
			</div>
			<div class="clear-both"></div>			
		</div>
		
	</div><!-- END .post -->
	
	<?php elseif ( 'aside' == dub_get_post_format() ) : ?>
		
	<div class="post post-format-aside">

		<div class="entry">
			<?php the_content(); ?>
		</div>

		<div class="meta has-avatar">
			<div class="avatar float-left">
			<?php echo get_avatar( get_option('admin_email'), 48 ); ?>
			</div>
			<div class="primary-info">
				<span class="author"><?php the_author_link(); ?></span>
				<span class="timestamp"><?php dub_timestamp(); ?></span>
				<span class="tags"><?php the_tags( '', ', ', '' ); ?></span>				
			</div>
			<div class="clear-both"></div>			
		</div>

	</div><!-- END .post -->	
	
	<?php elseif ( 'photo' == dub_get_post_format() ) : ?>
		
	<div class="post post-format-photo">
		
		<h2 class="post-title"><?php the_title(); ?></h2>

		<div class="entry">
			<?php the_content(); ?>
		</div>
		
		<div class="meta has-avatar">
			<div class="avatar float-left">
			<?php echo get_avatar( get_option('admin_email'), 48 ); ?>
			</div>
			<div class="primary-info">
				<span class="author"><?php the_author_link(); ?></span>
				<span class="timestamp"><a href="<?php the_permalink(); ?>"><?php dub_timestamp(); ?></a></span>
				<span class="tags"><?php the_tags( '', ', ', '' ); ?></span>				
			</div>
			<div class="clear-both"></div>			
		</div>

	</div><!-- END .post -->
	
	<?php else: ?>
		
	<div class="post post-format-standard">
		
		<h2 class="post-title"><?php the_title(); ?></h2>
		
		<?php if ( !empty( $post->post_excerpt ) ) : ?>
		<div class="summary">
			<?php the_excerpt(); ?>
		</div>
		<?php endif; ?>
		
		<div class="meta has-avatar top-meta">
			<div class="avatar float-left">
			<?php echo get_avatar( get_option('admin_email'), 48 ); ?>
			</div>
			<div class="primary-info">
				<span class="author"><?php the_author_link(); ?></span>
				<span class="timestamp"><a href="<?php the_permalink(); ?>"><?php dub_timestamp(); ?></a></span>
				<span class="tags"><?php the_tags( '', ', ', '' ); ?></span>				
			</div>
			
			<div class="clear-both"></div>
		</div>
		
		<div class="entry">
			<?php the_content(); ?>
		</div>

	</div><!-- END .post -->	
	
	<?php endif; ?>

<?php endwhile; ?>

<?php endif; ?>

</div><!-- END .content -->