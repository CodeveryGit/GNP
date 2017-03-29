<?php

/**

 *
 * @package   wbb-slideshow
 * @author    Webberty <support@webberty.com>
 * @license   GPL-2.0+
 * @link      http://webberty.com
 * @copyright 2014 Webberty
 *
 * @wordpress-plugin
 * Plugin Name:       WBB Slideshow
 * Plugin URI:        http://webberty.com
 * Description:       Slideshow
 * Version:           1.0.0
 * Author:            Webberty
 * Author URI:        http://webberty.com
 * Text Domain:       wbb-slideshow-domain
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/webberty/wbb-slideshow<owner>/<repo>
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
define('WBB_SLIDESHOW_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
require_once( plugin_dir_path(__FILE__) . 'public/wbb_slideshow.php' );
require_once( plugin_dir_path(__FILE__) . 'includes/helpers/pdf-helper.php' );
require_once ( WBB_SLIDESHOW_PLUGIN_DIR_PATH . 'includes/update-wbb-slideshow.php' );


/* ----------------------------------------------------------------------------*
 * Public-Facing Functionality
 * ---------------------------------------------------------------------------- */


require_once( plugin_dir_path(__FILE__) . 'public/wbb_slideshow.php' );


add_action('plugins_loaded', array('wbb_slideshow', 'get_instance'));

/* ----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 * ---------------------------------------------------------------------------- */


if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX )) {

    require_once( plugin_dir_path(__FILE__) . 'admin/wbb_slideshow-admin.php' );
    add_action('plugins_loaded', array('wbb_slideshow_Admin', 'get_instance'));
}

//function be_attachment_field_credit($form_fields, $post) {
//
//
//    $form_fields['slide-url'] = array(
//        'label' => 'Slide URL',
//        'input' => 'text',
//        'value' => get_post_meta($post->ID, 'slide_url', true),
//        'helps' => 'Add Slide Link URL',
//    );
////    $choosed_color = get_post_meta($post->ID, 'color', true);
////    the_meta();
////    echo $choosed_color;
//    
//    $form_fields["color"]["label"] = "Choose color";
//    $form_fields["color"]["input"] = "html";
//    $form_fields["color"]["html"] = "<select name='attachments[{$post->ID}][color]' id='attachments[{$post->ID}][color]'>";
//    $form_fields["color"]["html"] .= "<option value='red' ". selected(get_post_meta($post->ID, "color", true), 'default',false).">Red</option>";
//    $form_fields["color"]["html"] .= "<option value='blue'". selected(get_post_meta($post->ID, "color", true), 'default',false).">Blue</option>";
//    $form_fields["color"]["html"] .= "<option value='green'". selected(get_post_meta($post->ID, "color", true), 'default',false).">Green</option>";
//    $form_fields["color"]["html"] .= "<option value='yellow'". selected(get_post_meta($post->ID, "color", true), 'default',false).">Yellow</option>";
//    $form_fields["color"]["html"] .= "<option value='grey'". selected(get_post_meta($post->ID, "color", true), 'default',false).">Grey</option>";
//    $form_fields["color"]["html"] .= "</select>";
//    $form_fields["color"]["helps"] = "Choose Slide background color";
//    return $form_fields;
//}

//add_filter('attachment_fields_to_edit', 'be_attachment_field_credit', 10, 2);

/**
 * Save values of Photographer Name and URL in media uploader
 *
 * @param $post array, the post data for database
 * @param $attachment array, attachment fields from $_POST form
 * @return $post array, modified post data
 */
//function be_attachment_field_credit_save($post, $attachment) {
//
//
//    if (isset($attachment['slide-url'])) {
//        update_post_meta($post['ID'], 'slide_url', esc_url($attachment['slide-url']));
//    }
//    if (isset($attachment['color'])) {
//        update_post_meta($post['ID'], 'color', esc_url($attachment['color']));
//    }
//    return $post;
//}

//add_filter('attachment_fields_to_save', 'be_attachment_field_credit_save', 10, 2);
