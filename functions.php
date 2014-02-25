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


	// Require External Files
	require_once( 'external/starkers-utilities.php' );


	// Theme specific settings
	add_theme_support('post-thumbnails');
	add_image_size( 'people', 200, 200 );

	add_filter( 'wp_mail_content_type', 'set_content_type' );
	function set_content_type( $content_type ){
		return 'text/html';
	}


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
	require_once( 'custom-functions/meta_sponsors.php' );
	require_once( 'custom-functions/volunteer-form.php' );
	
	
	// Scripts
	function starkers_script_enqueuer() {
		if( is_front_page() ){
			wp_register_script( 'g-maps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array( 'jquery' ), '', true );
			wp_enqueue_script( 'g-maps-api' );

			wp_register_script( 'g-maps', get_template_directory_uri().'/_assets_production/js/maps.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'g-maps' );
		}
		wp_register_script( 'site', get_template_directory_uri().'/_assets_production/js/site.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'site' );

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


	// Add Volunteers Output
	function volunteers(){
        add_menu_page('Volunteers Data','Volunteers Data','create_users','chc-volunteers','volunteers_admin','dashicons-category',21);
    }
    add_action('admin_menu', 'volunteers');

    function volunteers_admin(){
        
        $location = $_SERVER['DOCUMENT_ROOT'];
 
        include ($location . '/hikecon/wp-config.php');
        include ($location . '/hikecon/wp-load.php');
        include ($location . '/hikecon/wp-includes/pluggable.php');
        global $wpdb;
 
        $form_results = $wpdb->get_results( " SELECT * FROM volunteers" );

        echo '
            <div class="wrap">
                <h2>Volunteers Data</h2>
                <p>' . $form_results->last . '</p>
            </div>
        ';
    }
?>