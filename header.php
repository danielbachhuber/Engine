<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>

	<?php dub_head_title(); ?>
	
	<?php
	/**
	 * ALl of the stylesheets and Javascript is enqueued in the functions.php file
	 */
	?>
	
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
	
<?php if ( !is_single() ): ?>
	
<div class="header">
	
	<div class="wrap">
		
		<div class="avatar float-left">
		<a href="<?php bloginfo('url'); ?>"><?php echo get_avatar( get_option('admin_email'), 48 ); ?></a>
		</div>
		
		<h1><a class="page-home <?php dub_print_if_active( 'home' ); ?>" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		
		<ul class="filter-post-formats">
			<li><a class="page-home <?php dub_print_if_active( 'home' ); ?>" href="<?php bloginfo('url'); ?>">Home</a></li>
			<li><a class="page-about <?php dub_print_if_active( 'about' ); ?>" href="<?php bloginfo('url'); ?>/about/">about</a></li>			
			<li><a class="filter-post-formats-standard <?php dub_print_if_active( 'post' ); ?>" href="<?php bloginfo('url'); ?>/content/posts/">posts</a></li>
			<li><a class="filter-post-formats-aside <?php dub_print_if_active( 'aside' ); ?>" href="<?php bloginfo('url'); ?>/content/asides/">asides</a></li>
			<li><a class="filter-post-formats-photo <?php dub_print_if_active( 'photo' ); ?>" href="<?php bloginfo('url'); ?>/content/photos/">photos</a></li>					
			<li><a class="filter-post-formats-status <?php dub_print_if_active( 'status' ); ?>" href="<?php bloginfo('url'); ?>/content/statuses/">statuses</a></li>
			<li><a class="filter-post-formats-gallery <?php dub_print_if_active( 'gallery' ); ?>" href="<?php bloginfo('url'); ?>/content/galleries/">galleries</a></li>										
		</ul>
		
		<div class="clear-both"></div>

	</div><!-- END .wrap -->

</div><!-- END .header -->

<?php endif; ?>