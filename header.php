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
		<?php echo get_avatar( get_option('admin_email'), 48 ); ?>
		</div>
		
		<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
		
		<div class="clear-both"></div>

	</div><!-- END .wrap -->

</div><!-- END .header -->

<?php endif; ?>