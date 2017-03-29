<?php

//Add the Meta Box
function add_custom_meta_box_page_info($postType) {
    $screens = array('post', 'page','resources');
    if(in_array($postType, $screens)){
    add_meta_box('custom_meta_box_page_info', // $id
            'Show Share Links', // $title
            'show_custom_meta_box_page_info', // $callback
            $postType, // $page
            'normal', // $context
            'high'); // $priority
    
    }
}




// The Callback
function show_custom_meta_box_page_info() {




    $custom_meta_fields_page_info = array(
        array(
            'label' => 'Show',
            'name' => 'show',
            'id' => 'show',
            'type' => 'select',
            'options' => array(
                array('label' => 'Yes', 'value' => 'yes',),
                array('label' => 'No', 'value' => 'no',),
            ),
            'desc' => 'Do you want the social share links to appear?'
        ),
    );
    global $post;


    // Use nonce for verification
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($custom_meta_fields_page_info as $field) {
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
            // case items will go here
        } //end switch
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}

// Save the Data
function save_custom_meta_box_page_info($post_id) {
    global $post;

    $custom_meta_fields_page_info = array(
        array(
            'label' => 'Show',
            'name' => 'show',
            'id' => 'show',
            'type' => 'select',
            'options' => array(
                array('label' => 'Yes', 'value' => 'yes',),
                array('label' => 'No', 'value' => 'no',),
            ),
            'desc' => 'Do you want the social share links to appear?'
        ),
    );

    // verify nonce
//    if (isset($_POST['custom_meta_box_nonce']) && !wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) {
//        wp_die("A");
//        return $post_id;
//    }
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
  
        return $post_id;
    }
    // check permissions
    if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
       
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
    
        return $post_id;
    }

    // loop through fields and save the data
    foreach ($custom_meta_fields_page_info as $field) {
        $old = get_post_meta($post_id, $field['id'], TRUE);
        $new = isset($_POST[$field['id']]) ? $_POST[$field['id']] : '';
        if ($new && $new != $old) {

            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            wp_die("F");
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}

add_action('add_meta_boxes', 'add_custom_meta_box_page_info');

add_action('save_post', 'save_custom_meta_box_page_info');
?>
