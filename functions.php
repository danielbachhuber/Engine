<?php

define( 'DUB_VERSION', '0.0' );

if ( !class_exists( 'dub' ) ) {

class dub {
	
	/**
	 * __construct()
	 */
	function __construct() {
		
		add_action( 'init', array( &$this, 'enqueue_resources' ) );
		
		add_action( 'after_setup_theme', array( &$this, 'after_setup_theme' ) );
		
	} // END __construct()
	
	/**
	 * init()
	 */
	function init() {
		
	} // END init()
	
	/**
	 * enqueue_resources()
	 */
	function enqueue_resources() {
		
		if ( !is_admin() ) {
			wp_enqueue_style( 'dub_primary_css', get_bloginfo('template_directory') . '/style.css', false, DUB_VERSION );
		}
		
	} // END enqueue_resources()
	
	
	/**
	 * after_setup_theme()
	 */
	function after_setup_theme() {
		
		$post_formats = array(
			'aside',
			'gallery',
			'status',
			'quote',
			'image',
			'link',
		);
		add_theme_support( 'post-formats', $post_formats );
		add_post_type_support( 'post', 'post-formats' );
		
	} // END after_setup_theme()
	
	
} // END class dub
	
} // END if ( !class_exists( 'dub' ) )

global $dub;
$dub = new dub();

/**
 * dub_head_title()
 */
function dub_head_title() {
	
	$title = get_bloginfo('name') . ' | ' . get_bloginfo('description');
	
	echo '<title>' . $title . '</title>';
	
} // END dub_head_title()


?>