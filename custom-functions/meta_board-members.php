<?php

$prefix = 'dbt_';
    
$meta_box = array(
	'id' => 'my-meta-box',
    'title' => 'Member Details',
    'page' => 'member',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
    array(
    	'name' => 'Position Title',
    	'std' =>  '',
    	'id' => $prefix . 'position',
    	'type' => 'text'
    ),
    array(
    	'name' => 'Company',
    	'std' =>  '',
    	'id' => $prefix . 'company',
    	'type' => 'text'
    ),
    array(
    	'name' => 'Twitter Handle',
    	'std' =>  '@',
    	'id' => $prefix . 'twitter',
    	'type' => 'text'
    ))
);


add_action('admin_menu', 'member_add_box');
    
    // Add meta box
    function member_add_box() {
    global $meta_box;
    	add_meta_box($meta_box['id'], $meta_box['title'], 'member_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
    }
    
    
    // Callback function to show fields in meta box
    function member_show_box() {
    global $meta_box, $post;
    	// Use nonce for verification
    	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    	echo '<table class="form-table">';
    
    	foreach ($meta_box['fields'] as $field) {
	    	
	    	// get current post meta data
	    	$meta = get_post_meta($post->ID, $field['id'], true);
	    	echo '<tr>',
	    		'<td><label for="', $field['id'], '">', $field['name'], '</label>', '<br />';    
	    	switch ($field['type']) {
		    case 'text':
		    	echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
			break;
			case 'select':
				echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
					foreach ($field['options'] as $option) {
						echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
					}
				echo '</select><br /><span class="description">'.$field['desc'].'</span>';
			break;
    
		}
    
		echo '</td>', '</tr>';
    
		}
		
		echo '</table>';
    }
    
add_action('save_post', 'member_save_data');
	
	// Save data from meta box
	function member_save_data($post_id) {
	global $meta_box;

	// verify nonce
	if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
    }
    
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	    return $post_id;
    }
    
    // check permissions
    if ('page' == $_POST['post_type']) {
	    if (!current_user_can('edit_page', $post_id)) {
		    return $post_id;
		}
    
    } elseif (!current_user_can('edit_post', $post_id)) {
    	return $post_id;
    }
    
    foreach ($meta_box['fields'] as $field) {
    	$old = get_post_meta($post_id, $field['id'], true);
    	$new = $_POST[$field['id']];
    		if ($new && $new != $old) {
	    		update_post_meta($post_id, $field['id'], $new);
	    	} elseif ('' == $new && $old) {
		    	delete_post_meta($post_id, $field['id'], $old);
		    }
		}
    }
    
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return $post_id;
    }
?>