<?php get_header(); ?>

<div class="main">
	
	<div class="wrap">
		
		<?php get_template_part( 'loop', 'single' ); ?>
		
		<?php //comments_template( '', true ); ?>
		
	</div><!-- END .wrap -->
	
</div><!-- END .main -->

<?php get_footer(); ?>