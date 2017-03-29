<?php
add_action ( 'init' , 'resources_register' );
function resources_register ()
{
	$args = array(
		'label'           => __ ( 'Resources' ) ,
		'singular_label'  => __ ( 'resources' ) ,
		'public'          => TRUE ,
		'show_ui'         => TRUE ,
		'capability_type' => 'post' ,
		'has_archive'     => TRUE ,
		'hierarchical'    => FALSE ,
		'rewrite'         => TRUE ,
		'supports'        => array(
			'title' ,
			'editor' ,
			'excerpt' ,
			'thumbnail'
		)
	);
	register_post_type ( 'resources' , $args );
}

add_action ( 'init' , 'country_tax' );


// NEW METABOX FOR SCHEMA
// The Callback
function add_custom_meta_box_resources() {

    add_meta_box('custom_meta_box_resources', // $id
            'Resources Extra Fields', // $title
            'show_custom_meta_box_resources', // $callback
            'resources', // $page
            'normal', // $context
            'high'); // $priority
}
$custom_meta_fields_resources = array(
        array(
                'label' => 'Featured',
                'name' => 'featured',
                'id' => 'featured',
                'type' => 'select',
                'options' => array(
                    array('label' => 'No', 'value' => 'no',),
                    array('label' => 'Yes', 'value' => 'yes',),
                    
                ),
                'desc' => 'Do you want this publication featured?'
            ),
    array(
        'label' => 'Publication title',
        'name' => 'publication_title',
        'id' => 'publication_title',
        'type' => 'text',
        'desc' => 'Publication title'
    ),
    array(
        'label' => 'Publication date',
        'name' => 'publication_date',
        'id' => 'publication_date',
        'type' => 'text',
        'desc' => 'Publication date'
    ),
    array(
        'label' => 'Publisher',
        'name' => 'publisher',
        'id' => 'publisher',
        'type' => 'text',
        'desc' => 'Publisher'
    ),
    array(
        'label' => 'Document type',
        'name' => 'document_type',
        'id' => 'document_type',
        'type' => 'text',
        'desc' => 'Document type'
    ),
    array(
        'label' => 'Author',
        'name' => 'autthor',
        'id' => 'author',
        'type' => 'text',
        'desc' => 'Author'
    ),
    array(
        'label' => 'Keywords',
        'name' => 'keywords',
        'id' => 'keywords',
        'type' => 'textarea',
        'desc' => 'Keywords separate by commas'
    ),
        array(
        'label' => 'Publication url',
        'name' => 'publication_url',
        'id' => 'publication_url',
        'type' => 'text',
        'desc' => 'Publication url'
    ),
    
        array(
                'label' => 'Only for Board Members',
                'name' => 'board_member',
                'id' => 'board_member',
                'type' => 'select',
                'options' => array(
                    array('label' => 'No', 'value' => 'no',),
                    array('label' => 'Yes', 'value' => 'yes',),
                    
                ),
                'desc' => 'Do you want this publication only for board members?'
            ),

    
);

function show_custom_meta_box_resources() {

    global $custom_meta_fields_resources;
    
    global $post;


    // Use nonce for verification
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($custom_meta_fields_resources as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], TRUE);
        // begin a table row with
        echo '<tr>
				<th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>
				<td>';
        switch ($field['type']) {
            // textarea
            case 'textarea':
                $content = '';
                $editor_id = $field['id'];
                //wp_editor( $content, $editor_id );
                echo '<textarea name="' . $field['id'] . '" id="' . $field['id'] . '" cols="80" rows="4">' . $meta . '</textarea>
                                                    <br /><span class="description">' . ( isset($field['desc']) ? $field['desc'] : '' ) . '</span>';
                break;
            
            
            // text
            case 'text':
                echo '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="30" />
                                                <br /><span class="description">' . ( isset($field['desc']) ? $field['desc'] : '' ) . '</span>';
                break;
            
             // checkbox
            case 'checkbox':
                echo '<input type="checkbox" name="' . $field['id'] . '" id="' . $field['id'] . '" ', $meta ? ' checked="checked"' : '', '/>
        <label for="' . $field['id'] . '">' . $field['desc'] . '</label>';
                break;
            
            
            // select
            case 'select':
                echo '<select name="' . $field['id'] . '" id="' . $field['id'] . '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="' . $option['value'] . '">' . $option['label'] . '</option>';
                }
                echo '</select><br /><span class="description">' . ( isset($field['desc']) ? $field['desc'] : '' ) . '</span>';
                break;
                
                
            // image
            case 'image':
                $image = get_stylesheet_directory_uri() . '/assets/img/logo.png';
                echo '<span class="custom_default_image" style="display:none">' . $image . '</span>';
                if ($meta) {
                    $image = wp_get_attachment_image_src($meta, 'medium');
                    $image = $image[0];
                }
                echo '<input name="' . $field['id'] . '" type="hidden" class="custom_upload_image" value="' . $meta . '" />
                                                                <img src="' . $image . '" class="custom_preview_image" alt="" /><br />
                                                                        <input class="custom_upload_image_button button" type="button" value="Choose Image" />
                                                                        <small> <a href="#" class="custom_clear_image_button">Remove Image</a></small>
                                                                        <br clear="all" /><span class="description">' . ( isset($field['desc']) ? $field['desc'] : '' ) . '';
                break;
                
            // date    
//            case 'date':
//                echo '<input type="text" class="datepicker" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="30" />
//                                                <br /><span class="description">' . ( isset($field['desc']) ? $field['desc'] : '' ) . '</span>';
//                break;
            // case items will go here
        } //end switch
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}

// Save the Data
function save_custom_meta_box_resources($post_id) {

    global $custom_meta_fields_resources;


    // verify nonce
//    if (isset($_POST['custom_meta_box_nonce']) && !wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) {
//        wp_die("a");
//        return $post_id;
//    }
//    
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
//        wp_die("b");
        return $post_id;
    }
    // check permissions
    if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
//            wp_die("c");
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
//        wp_die("d");
        return $post_id;
    }

    // loop through fields and save the data
    foreach ($custom_meta_fields_resources as $field) {
        $old = get_post_meta($post_id, $field['id'], TRUE);
        $new = isset($_POST[$field['id']]) ? $_POST[$field['id']] : '';
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}

add_action('add_meta_boxes', 'add_custom_meta_box_resources');

add_action('save_post', 'save_custom_meta_box_resources');

?>
