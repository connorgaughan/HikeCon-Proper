<?php

	// remove junk from head
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


	// add google analytics to footer
	function add_google_analytics() {
		echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
		echo '<script type="text/javascript">';
		echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
		echo 'pageTracker._trackPageview();';
		echo '</script>';
	}
	add_action('wp_footer', 'add_google_analytics');


	// Require External Files
	require_once( 'external/starkers-utilities.php' );


	// Theme specific settings
	add_theme_support('post-thumbnails');
	add_image_size( 'people', 200, 200 );


	// Add SVG Upload Support
	function cc_mime_types( $mimes ){
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter( 'upload_mimes', 'cc_mime_types' );
	
	
	// Add nav menu
	register_nav_menus(array('primary' => 'Primary Navigation'));
	
	
	// Actions and Filters
	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );
	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );


	// Custom Post Types - include custom post types and taxonimies - for a sample file follow the path below and uncomment to use.
	require_once( 'custom-functions/post-types.php' );
	require_once( 'custom-functions/meta_board-members.php' );
	require_once( 'custom-functions/meta_speakers.php' );
	
	
	// Scripts
	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/_assets_production/js/site.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_script( 'ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'ui' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/_assets_production/css/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	


	// Comments
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}


	// Add Excerpt to Pages
	add_action( 'init', 'my_add_excerpts_to_pages' );
		function my_add_excerpts_to_pages() {
    	add_post_type_support( 'page', 'excerpt' );
	}
?>