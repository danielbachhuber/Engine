<?php

define( 'ENGINE_VERSION', '0.1' );

if ( !class_exists( 'engine' ) ) {

class engine {
	
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
			wp_enqueue_style( 'engine_primary_css', get_bloginfo('template_directory') . '/style.css', false, ENGINE_VERSION );
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
	
	
} // END class engine
	
} // END if ( !class_exists( 'engine' ) )

global $engine;
$engine = new engine();

/**
 * engine_head_title()
 */
function engine_head_title() {
	
	$title = get_bloginfo('name') . ' | ' . get_bloginfo('description');
	
	if ( is_single() ) {
		global $post;
		$title = get_the_title( $post->ID );
	}
	
	echo '<title>' . $title . '</title>';
	
} // END engine_head_title()

/**
 * engine_get_post_format()
 */
function engine_get_post_format( $post_id = null ) {
	
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
	} else if ( 'standard' == get_post_format( $post_id ) || in_category( array( 'blog', 'posts', 'post' ) ) ) {
		return 'post';
	}
	
	return false;
	
} // END engine_get_post_format()

/**
 * engine_print_if_active()
 */
function engine_print_if_active( $location ) {
	
	if ( is_single() || is_category() ) {
		$actual_post_format = engine_get_post_format();
		if ( $actual_post_format == $location ){
			echo 'active';
		}
	} else if ( is_page() ) {
		global $post;
		if ( $post->post_name == $location ) {
			echo 'active';
		} 
	} else if ( is_home() && $location == 'home' ) {
		echo 'active';
	}
	
} // END engine_print_if_active()

/**
 * engine_timestamp()
 */
function engine_timestamp( $post_id = null ) {
	
	if ( !isset( $post_id ) ) {
		global $post;
		$post_id = $post->ID;
	}
	
	$post_timestamp = get_post_time( 'U', true, $post_id );
	$current_timestamp = time();

	// Only do the relative timestamps for 7 days or less, then just the month and day
	if ( $post_timestamp > ( $current_timestamp - 604800 ) ) {
		echo human_time_diff( $post_timestamp ) . ' ago';
	} else if ( $post_timestamp > ( $current_timestamp - 220752000 ) ) {
		the_time( 'F jS' );
	} else {
		the_time( 'F j, Y' );
	}

	
} // END engine_timestamp()

?>