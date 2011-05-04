<div class="content">

<?php if ( have_posts() ): ?>

<?php while ( have_posts() ): the_post(); ?>
	
	<?php $post_format = dub_get_post_format(); ?>
	
	<div class="post post-format-<?php echo $post_format; ?>">
		<div class="format-label float-left"><?php echo $post_format; ?></div> <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		
		<div class="clear-both"></div>	
	</div>

<?php endwhile; ?>

<?php endif; ?>

</div><!-- END .content -->