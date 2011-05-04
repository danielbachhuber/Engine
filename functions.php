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
			wp_enqueue_style( 'dub_fonts_css', 'http://fonts.googleapis.com/css?family=Ubuntu:light,regular,500', false, DUB_VERSION );
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
	
	if ( is_single() ) {
		global $post;
		$title = get_the_title( $post->ID );
	}
	
	echo '<title>' . $title . '</title>';
	
} // END dub_head_title()

/**
 * dub_get_post_format()
 */
function dub_get_post_format( $post_id = null ) {
	
	if ( !isset( $post_id ) ) {
		global $post;
		$post_id = $post->ID;
	}
	
	if ( 'status' == get_post_format( $post_id ) || in_category( array( 'statuses', 'status' ) ) ) {
		return 'status';
	} else if ( 'aside' == get_post_format( $post_id ) || in_category( array( 'asides', 'aside' ) ) ) {
		return 'aside';
	} else if ( 'photo' == get_post_format( $post_id ) || in_category( array( 'photos', 'photo' ) ) ) {
		return 'photo';
	} else {
		return 'post';
	}
	
} // END dub_get_post_format()

/**
 * dub_print_if_active()
 */
function dub_print_if_active( $location ) {
	
	if ( is_single() ) {
		$actual_post_format = dub_get_post_format();
		if ( $actual_post_format == $location ){
			echo 'active';
		}
	} else if ( is_home() && $location == 'home' ) {
		echo 'active';
	}
	
} // END dub_print_if_active()

/**
 * dub_timestamp()
 */
function dub_timestamp( $post_id = null ) {
	
	if ( !isset( $post_id ) ) {
		global $post;
		$post_id = $post->ID;
	}
	
	$post_timestamp = get_the_time( 'U', $post_id );
	$current_timestamp = time();

	// Only do the relative timestamps for 7 days or less, then just the month and day
	if ( $post_timestamp > ( $current_timestamp - 604800 ) ) {
		echo human_time_diff( $post_timestamp ) . ' ago';
	} else if ( $post_timestamp > ( $current_timestamp - 220752000 ) ) {
		the_time( 'F jS' );
	} else {
		the_time( 'F j, Y' );
	}

	
} // END dub_timestamp()

?>