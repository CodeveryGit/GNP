<?php
/*
Plugin Name: Add image
Plugin URI:
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: M
Version: 1
Author URI: http://ma.tt
*/
add_action('admin_menu', 'myplagin_settings_menu');
function myplagin_settings_menu()
{
    add_menu_page('Post types images','Post types images', 'post_type_image', 'settings_myplagin', 'myplagin_settings_page');
}

?>