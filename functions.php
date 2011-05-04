<?php

define( 'DUB_VERSION', '0.0' );

if ( !class_exists( 'dub' ) ) {

class dub {
	
	/**
	 * __construct()
	 */
	function __construct() {
		
		// Add support for post formats
		
		add_hook( 'after_setup_theme', array( &$this, 'add_post_formats' ) );
		
	} // END __construct()
	
	/**
	 * init()
	 */
	function init() {
		
	} // END init()
	
	/**
	 * add_post_formats()
	 */
	function add_post_formats() {
		
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
		
	} // END add_post_formats()
	
	
} // END class dub
	
} // END if ( !class_exists( 'dub' ) )


?>