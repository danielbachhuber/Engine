<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>

	<?php engine_head_title(); ?>
	
	<?php
	/**
	 * ALl of the stylesheets and Javascript is enqueued in the functions.php file
	 */
	?>
	
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
	
<div class="header">
	
	<div class="wrap">
		
		<ul class="filter-post-formats">
			<li><a class="page-home <?php engine_print_if_active( 'home' ); ?>" href="<?php bloginfo('url'); ?>"><?php echo get_avatar( 'd@danielbachhuber.com', 16 ); ?>daniel bachhuber</a></li>
			<li><a class="page-about <?php engine_print_if_active( 'about' ); ?>" href="<?php bloginfo('url'); ?>/about/">about</a></li>		
			<li><a class="filter-post-formats-status <?php engine_print_if_active( 'status' ); ?>" href="<?php bloginfo('url'); ?>/content/statuses/">statuses</a></li>			
			<li><a class="filter-post-formats-standard <?php engine_print_if_active( 'post' ); ?>" href="<?php bloginfo('url'); ?>/content/posts/">posts</a></li>	
			<li><a class="filter-post-formats-aside <?php engine_print_if_active( 'aside' ); ?>" href="<?php bloginfo('url'); ?>/content/asides/">asides</a></li>
			<li><a class="filter-post-formats-photo <?php engine_print_if_active( 'photo' ); ?>" href="<?php bloginfo('url'); ?>/content/photos/">photos</a></li>
	<li><a class="filter-post-formats-gallery <?php engine_print_if_active( 'gallery' ); ?>" href="<?php bloginfo('url'); ?>/content/galleries/">galleries</a></li>
		</ul>
		
		<div class="clear-both"></div>

	</div><!-- END .wrap -->

</div><!-- END .header -->

<a id="content"></a>