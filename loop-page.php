<div class="content">

<?php if ( have_posts() ): ?>

<?php while ( have_posts() ): the_post(); ?>
		
	<div class="post page">
		
		<h2 class="post-title"><?php the_title(); ?></h2>
		
		<?php if ( !empty( $post->post_excerpt ) ) : ?>
		<div class="summary">
			<?php the_excerpt(); ?>
		</div>
		<?php endif; ?>
	
	<div class="entry">
		<?php the_content(); ?>
	</div>
	
	</div><!-- END .post -->

<?php endwhile; ?>

<?php endif; ?>

</div><!-- END .content -->