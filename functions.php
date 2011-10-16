<?php

define( 'ENGINE_VERSION', '0.2d' );

if ( !class_exists( 'engine' ) ) {

class engine {
	
	/**
	 * __construct()
	 */
	function __construct() {
		
		add_action( 'init', array( &$this, 'enqueue_resources' ) );
		add_action( 'after_setup_theme', array( &$this, 'after_setup_theme' ) );
		//add_action( 'post_link', array( &$this, 'action_post_link' ) );
		
		// Left and right arrow keys on galleries
		add_action( 'wp_footer', array( &$this, 'gallery_keyboard_navigation' ) );
		
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
			wp_enqueue_script( 'jquery' );
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
		
		add_theme_support( 'post-thumbnails' );
		
	} // END after_setup_theme()
	
	function action_post_link( $permalink ) {
		global $post;
		
		if ( in_array( $post->post_type, array( 'post', 'page' ) ) )
			$permalink .= '#content';
		
		return $permalink;
	}
	
	/**
	 * Add left and right arrow keyboard navigation to galleries of attachments
	 *
	 * @since 0.2
	 */
	function gallery_keyboard_navigation() {
		
		if ( !is_attachment() )
			return;
		?>
		<script type="text/javascript">
		
			jQuery(document).ready(function(){
			
				jQuery(document).keyup(function(event){
					
					if ( event.keyCode == 37 ) {
						var previous_image_link = jQuery('.previous-image.navigation-link a').attr('href');
						if ( previous_image_link )
							window.location.href = previous_image_link;
					} else if ( event.keyCode == 39 ) {
						var next_image_link = jQuery('.next-image.navigation-link a').attr('href');
						if ( next_image_link )
							window.location.href = next_image_link;
					}
				});
			});
		</script>
		<?php
	}
	
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
		if ( $post->post_parent )
			$post_id = $post->post_parent;
		else
			$post_id = $post->ID;
	}
	
	if ( 'status' == get_post_format( $post_id ) || in_category( array( 'statuses', 'status' ) ) ) {
		return 'status';
	} else if ( 'aside' == get_post_format( $post_id ) || in_category( array( 'asides', 'aside' ) ) ) {
		return 'aside';
	} else if ( 'photo' == get_post_format( $post_id ) || in_category( array( 'photos', 'photo' ) ) ) {
		return 'photo';
	} else if ( 'quote' == get_post_format( $post_id ) || in_category( array( 'quotes', 'quote' ) ) ) {
		return 'quote';
	} else if ( 'gallery' == get_post_format( $post_id ) || in_category( array( 'galleries', 'gallery' ) ) ) {
		return 'gallery';		
	} else if ( 'standard' == get_post_format( $post_id ) || in_category( array( 'blog', 'posts', 'post' ) ) ) {
		return 'post';
	}
	
	return false;
	
} // END engine_get_post_format()

/**
 * engine_print_if_active()
 */
function engine_print_if_active( $location ) {
	
	if ( is_page() ) {
		global $post;
		if ( $post->post_name == $location ) {
			echo 'active';
		} 
	} else if ( is_singular() || is_category() || is_attachment() ) {	
		$actual_post_format = engine_get_post_format();
		if ( $actual_post_format == $location ){
			echo 'active';
		}
	} else if ( is_home() && $location == 'home' ) {
		echo 'active';
	}
	
} // END engine_print_if_active()

/**
 * engine_timestamp()
 */
function engine_timestamp( $post_id = null, $echo = true, $post_timestamp = null ) {
	
	if ( !isset( $post_id ) ) {
		global $post;
		$post_id = $post->ID;
	}
	if ( !$post_timestamp )
		$post_timestamp = get_post_time( 'U', true, $post_id );
	$current_timestamp = time();

	// Only do the relative timestamps for 7 days or less, then just the month and day
	if ( $post_timestamp > ( $current_timestamp - 604800 ) )
		$html = human_time_diff( $post_timestamp ) . ' ago';
	else if ( $post_timestamp > ( $current_timestamp - 220752000 ) && date( 'Y', $post_timestamp ) == date( 'Y' ) )
		$html = date( 'F jS', $post_timestamp );
	else
		$html = date( 'F j, Y', $post_timestamp );
	
	if ( $echo )
		echo $html;
	else
		return $html;
	
} // END engine_timestamp()

/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function engine_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyeleven' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'twentyeleven' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'twentyeleven' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyeleven' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}

?>