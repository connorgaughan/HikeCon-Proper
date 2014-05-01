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
	require_once( 'custom-functions/sponsor-form.php' );
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

	//Admin Colors
	function custom_colors() {
		echo '
			<style type="text/css">
				.the-list-custom tr:nth-child(odd){background:#f9f9f9;}
			</style>
		';
	}

	add_action('admin_head', 'custom_colors');


	// Add Shortcodes
	function simple_table( $atts ) {
	    extract( shortcode_atts( array(
	        'time' => '',
	        'event' => '',
	        'location' => '',
	        'location_link' => '',
	        'details' => '',
	    ), $atts ) );
	    $time = $time;
	    $event = $event;
	    $location = $location;
	    $location_link = $location_link;
	    $details = $details;

	    $output .= '<div class="row">';
	    $output .= '<div class="schedule-time time">'.$time.'</div>';
	    $output .= '<div class="schedule-location">
	    				<p class="no-padding event">'.$event.'</p>';				
	    if($details){
	    	$output .= '<p class="details no-padding">'.$details.'</p>';
	    }
	    if($location){
	    	if($location_link){
	    		$output .= '<p class="no-padding is-uppercase details"><span class="location"></span><a href="'.$location_link.'">'.$location.'</a></p>';
	    	}else{
	    		$output .= '<p class="no-padding is-uppercase details"><span class="location"></span>'.$location.'</p>';
	    	}
	    }				
	    $output .= '</div></div>';
	    return $output;
	}
	add_shortcode( 'row', 'simple_table' );


	// Add Volunteers Output
	function volunteers(){
        add_menu_page('Volunteers Data','Volunteers Data','edit_pages','chc-volunteer','volunteer_admin','dashicons-category',74);
    }
    add_action('admin_menu', 'volunteers');

    function volunteer_admin(){
        
        $location = $_SERVER['DOCUMENT_ROOT'];
 
		include ($location . '/wp-config.php');
		include ($location . '/wp-load.php');
		include ($location . '/wp-includes/pluggable.php');
		global $wpdb;
 
		$form_results = $wpdb->get_results( " SELECT * FROM volunteers " );
 
		echo '
			<div class="wrap">
                <h2>Volunteers Data</h2>
				<table class="wp-list-table widefat fixed posts" cellpadding="0" cellspacing="0" border="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Location</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Timestamp</th>
						</tr>
					</thead>
					<tbody class="the-list-custom">
		';
 
		foreach ($form_results as $form_results) {
		
			echo '
						<tr>
							<td>' .$form_results->id . '</td>
							<td>' .$form_results->location . '</td>
							<td>' .$form_results->first . '</td>
							<td>' .$form_results->last . '</td>
							<td>' .$form_results->email . '</td>
							<td>' .$form_results->timestamp . '</td>
						</tr>
			';
 		}

 		echo '</tbody></tr></table></div>';
    }

    // Add Volunteers Output
	function sponsors(){
        add_menu_page('Sponsors Data','Sponsors Data','edit_pages','chc-sponsor','sponsor_admin','dashicons-category',75);
    }
    add_action('admin_menu', 'sponsors');

    function sponsor_admin(){
        
        $location = $_SERVER['DOCUMENT_ROOT'];
 
		include ($location . '/wp-config.php');
		include ($location . '/wp-load.php');
		include ($location . '/wp-includes/pluggable.php');
		global $wpdb;
 
		$form_results = $wpdb->get_results( " SELECT * FROM sponsors " );
 
		echo '
			<div class="wrap">
                <h2>Sponsors Data</h2>
				<table class="wp-list-table widefat fixed posts" cellpadding="0" cellspacing="0" border="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Location</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Company</th>
							<th>Sponsor Type</th>
							<th>Timestamp</th>
						</tr>
					</thead>
		';
 
		foreach ($form_results as $form_results) {
		
			echo '
						<tr>
							<td>' .$form_results->id . '</td>
							<td>' .$form_results->location . '</td>
							<td>' .$form_results->first . '</td>
							<td>' .$form_results->last . '</td>
							<td>' .$form_results->email . '</td>
							<td>' .$form_results->phone . '</td>
							<td>' .$form_results->company . '</td>
							<td>' .$form_results->tier . '</td>
							<td>' .$form_results->timestamp . '</td>
						</tr>
			';
 		}

 		echo '</tr></table></div>';
 	}
?>