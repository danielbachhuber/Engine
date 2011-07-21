<div class="wrap">
	
	<div class="footer">
		
		<ul class="filter-post-formats">
			<li><a class="<?php engine_print_if_active( 'home' ); ?>" href="<?php bloginfo('url'); ?>">danielbachhuber.com</a></li>
			<li><a class="<?php engine_print_if_active( 'about' ); ?>" href="<?php bloginfo('url'); ?>/about/">about</a></li>			
			<li><a class="filter-post-formats-standard <?php engine_print_if_active( 'post' ); ?>" href="<?php bloginfo('url'); ?>/content/posts/">posts</a></li>
			<li><a class="filter-post-formats-aside <?php engine_print_if_active( 'aside' ); ?>" href="<?php bloginfo('url'); ?>/content/asides/">asides</a></li>
			<li><a class="filter-post-formats-photo <?php engine_print_if_active( 'photo' ); ?>" href="<?php bloginfo('url'); ?>/content/photos/">photos</a></li>					
			<li><a class="filter-post-formats-status <?php engine_print_if_active( 'status' ); ?>" href="<?php bloginfo('url'); ?>/content/statuses/">statuses</a></li>									
		</ul>
	
	</div><!-- END .footer -->
	
</div><!-- END .wrap -->

<?php wp_footer(); ?>

</body>
</html>