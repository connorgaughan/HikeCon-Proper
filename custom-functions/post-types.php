<?php
// Register Speakers
add_action('init', 'speakers_register');  
    function speakers_register() {  
    $labels = array(
            'name'                  => _x('Speakers', 'post type general name'),
            'singular_name'         => _x('Speaker', 'post type singular name'),
            'add_new'               => _x('Add New Speaker', 'Speaker'),
            'add_new_item'          => __('Add New Speaker'),
            'edit_item'             => __('Edit Speaker'),
            'new_item'              => __('New Speaker'),
            'view_item'             => __('View Speaker'),
            'search_items'          => __('Search Speakers'),
            'not_found'             => __('No Speakers found'),
            'not_found_in_trash'    => __('Nothing found in Trash'),
            'parent_item_colon'     => ''
    );
               
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'query_var'             => true,
        'menu_icon'             => 'dashicons-groups',
        'rewrite'               => array('slug'=>'speaker'),
        'capability_type'       => 'post',
        'hierarchical'          => false,
        'menu_position'         => null,
        'supports'              => array('title','editor','thumbnail', 'excerpt', 'author', 'revisions'),
    );
    register_post_type( 'speakers' , $args );
}  

// Register Speaker Locations
function speakers_taxonomy() {
    register_taxonomy(
        'location',
        'speakers',
        array(
            'hierarchical'          => true, 
            'label'                 => 'Speakers Location',
            'public'                => true,
            'query_var'             => true,
            'show_ui'               => true,
            'rewrite'               => true
        )
    );
}
add_action('init', 'speakers_taxonomy');


// Register Sponsors
add_action('init', 'sponsors_register');  
    function sponsors_register() {  
    $labels = array(
            'name'                  => _x('Sponsors', 'post type general name'),
            'singular_name'         => _x('Sponsor', 'post type singular name'),
            'add_new'               => _x('Add New Sponsor', 'Sponsor'),
            'add_new_item'          => __('Add New Sponsor'),
            'edit_item'             => __('Edit Sponsor'),
            'new_item'              => __('New Sponsor'),
            'view_item'             => __('View Sponsor'),
            'search_items'          => __('Search Sponsors'),
            'not_found'             => __('No Speakers found'),
            'not_found_in_trash'    => __('Nothing found in Trash'),
            'parent_item_colon'     => ''
    );
               
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'query_var'             => true,
        'menu_icon'             => 'dashicons-awards',
        'rewrite'               => array('slug'=>'event'),
        'capability_type'       => 'post',
        'hierarchical'          => false,
        'menu_position'         => null,
        'supports'              => array('title','thumbnail'),
    );
    register_post_type( 'sponsors' , $args );
}  

// Register Sponsors Locations
function sponsors_taxonomy() {
    register_taxonomy(
        'tiers',
        'sponsors',
        array(
            'hierarchical'          => true, 
            'label'                 => 'Sponsor Tiers',
            'public'                => true,
            'query_var'             => true,
            'show_ui'               => true,
            'rewrite'               => true
        )
    );
}
add_action('init', 'sponsors_taxonomy');


// Register Board & Volunteer
add_action('init', 'member_register');  
    function member_register() {  
    $labels = array(
            'name'                  => _x('Board and Volunteers', 'post type general name'),
            'singular_name'         => _x('Board and Volunteer', 'post type singular name'),
            'add_new'               => _x('Add New Board or Volunteer Member', 'Board or Volunteer Member'),
            'add_new_item'          => __('Add New Board or Volunteer Member'),
            'edit_item'             => __('Edit Board or Volunteer Member'),
            'new_item'              => __('New Board or Volunteer Member'),
            'view_item'             => __('View Board and Volunteer Members'),
            'search_items'          => __('Search Board and Volunteer Members'),
            'not_found'             => __('No Speakers found'),
            'not_found_in_trash'    => __('Nothing found in Trash'),
            'parent_item_colon'     => ''
    );
               
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'query_var'             => true,
        'menu_icon'             => 'dashicons-id-alt',
        'rewrite'               => array('slug'=>'member'),
        'capability_type'       => 'post',
        'hierarchical'          => false,
        'menu_position'         => null,
        'supports'              => array('title','thumbnail','editor'),
    );
    register_post_type( 'member' , $args );
}  


// Register Board & Volunteer Categories
function member_taxonomy() {
    register_taxonomy(
        'level',
        'member',
        array(
            'hierarchical'          => true, 
            'label'                 => 'Member Level',
            'public'                => true,
            'query_var'             => true,
            'show_ui'               => true,
            'rewrite'               => true
        )
    );
}
add_action('init', 'member_taxonomy');

?>