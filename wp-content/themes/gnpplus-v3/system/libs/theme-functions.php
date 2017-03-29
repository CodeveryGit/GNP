<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function wbb_theme_img($img) {

    echo get_bloginfo("stylesheet_directory") . "/assets/img/$img";
}

if (!function_exists('wbb_gnpplus_resources_frontend')) {

    function wbb_gnpplus_resources_frontend() {

        $the_query = new WP_Query('post_type=resources&meta_key=featured&meta_value=yes&order=DESC&posts_per_page=10');

        while ($the_query->have_posts()) :$the_query->the_post();

            include locate_template('/templates/components/comp-resource-item-frontend.php');
        endwhile;

        wp_reset_postdata();
    }

}
if (!function_exists('is_tree')) {

    function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
        global $post;         // load details about this page
        if (is_page() && ($post->post_parent == $pid || is_page($pid)))
            return true;   // we're at the page or at a sub page
        else
            return false;  // we're elsewhere
    }

}
/* * **************************************************************************** */
/* WIDGETIZER SYSTEM :: GRID CUSTOM SYSTEM                                     */
/* * **************************************************************************** */

function wbb_get_component($path, $variation = null, $post_id = null) {

    $theme = wp_get_theme()->stylesheet;
    
    if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/wp-content/themes/$theme/templates/components/$path.php")) {


        include( locate_template("templates/components/$path.php") );
    } else {

        //Do something with paths that doesn't exist.
        include( locate_template("templates/components/component-error.php") );
    }
}

/* * **************************************************************************** */
/* WIDGETIZER SYSTEM :: UNREGISTER AND REGISTER SIDEBARS                       */
/* * **************************************************************************** */

function unregister_default_widgets() {

    unregister_widget('WP_Widget_Pages');

    unregister_widget('WP_Widget_Calendar');

    unregister_widget('WP_Widget_Archives');

    if (get_option('link_manager_enabled'))
        unregister_widget('WP_Widget_Links');

    unregister_widget('WP_Widget_Meta');

    unregister_widget('WP_Widget_Search');

//    unregister_widget('WP_Widget_Text');

    unregister_widget('WP_Widget_Categories');

//    unregister_widget('WP_Widget_Recent_Posts');

    unregister_widget('WP_Widget_Recent_Comments');

    unregister_widget('WP_Widget_RSS');

    unregister_widget('WP_Widget_Tag_Cloud');

    unregister_widget('WP_Nav_Menu_Widget');

    unregister_widget('P2P_Widget');
}

add_action('widgets_init', 'unregister_default_widgets');

// Register Sidebar NEWS
function news_masonry_sidebar() {

    $args = array(
        'id' => 'news_masonry_sidebar',
        'name' => __('News & Updates', 'text_domain'),
        'description' => __('Show items in home blue block', 'text_domain'),
        'class' => '',
    );
    register_sidebar($args);
}

add_action('widgets_init', 'news_masonry_sidebar');

// Register Sidebar FIXED RIGHT NEWS
function news_fixed_sidebar() {

    $args = array(
        'id' => 'news_fixed_sidebar',
        'name' => __('News & Updates Right Side', 'text_domain'),
        'description' => __('Show items in home blue block right side', 'text_domain'),
        'class' => '',
    );
    register_sidebar($args);
}

add_action('widgets_init', 'news_fixed_sidebar');

// Register Sidebar CAMPAIGNING
function banner_masonry_sidebar() {

    $args = array(
        'id' => 'banner_masonry_sidebar',
        'name' => __('Banner', 'text_domain'),
        'description' => __('Show items in home red block', 'text_domain'),
        'class' => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
    );
    register_sidebar($args);
}

add_action('widgets_init', 'banner_masonry_sidebar');
// Register Sidebar NEWSLETTER
function banner_newsletter_sidebar() {

    $args = array(
        'id' => 'banner_newsletter_sidebar',
        'name' => __('newsletter'),
        'description' => __('Show items in home red block', 'text_domain'),
        'class' => '',
        'before_widget' => '',
        'after_widget'  => ''
    );
    register_sidebar($args);
}

add_action('widgets_init', 'banner_newsletter_sidebar');

/* * **************************************************************************** */
/* WIDGETIZER SYSTEM :: ADD NEW WIDGETS                                        */
/* * **************************************************************************** */
require_once locate_template('widgets/widget-newsletter.php');
require_once locate_template('widgets/widget-news.php');
require_once locate_template('widgets/widget-blog.php');
require_once locate_template('widgets/widget-twitter.php');
require_once locate_template('widgets/widget-banner.php');
require_once locate_template('widgets/widget-news-banner.php');
require_once locate_template('widgets/widget-facebook-fanbox.php');
require_once locate_template('widgets/widget-paypal.php');

function wbb_user_files($user_ID) {
    $url = $_SERVER['DOCUMENT_ROOT'] . "/assets/";





    $query_board_members_args = array(
        'post_type' => 'board_member',
        'posts_per_page' => - 1,
    );
    $the_query = new WP_Query($query_board_members_args);

    while ($the_query->have_posts()) :$the_query->the_post();
//        $user_linked = get_post_meta(get_the_ID(), "link", true);
//        $board_member_id = get_the_ID();
//        $user_linked_id = $user_linked;
        ?>



        <p><a href='<?php the_permalink() ?>'><?php the_title(); ?></a></p>
        <?php
//        echo '<ul class="meta-list-wide list-unstyled">';
//        if ($user_ID == $user_linked_id) {
//            //do_shortcode("[show_me_one_list postid='" . $board_member_id . "' ]");
//        }
//        echo '</ul>';

    endwhile;
}

//function custom_login_failed ( $username )
//{
//	$referrer = $_SERVER[ 'HTTP_REFERER' ];
//
//	if ( ! empty( $referrer ) && ! strstr ( $referrer , 'wp-login' ) && ! strstr ( $referrer , 'wp-admin' )  )
//	{
//
//		// redirect to your login page, you might want to add a parameter login_failed
//		// to show an error message or something like that
//		$_SESSION[ "message" ] = "Login or password is incorrect.";
//		wp_redirect ( get_bloginfo ( "url" ) . "/user-login?error=1" );
//
//		exit;
//	}
//}
//add_action ( 'wp_login_failed' , 'custom_login_failed' );
// SESIONS //
//function myStartSession ()
//{
//	if ( ! session_id () )
//	{
//		session_start ();
//		if ( ! isset( $_SESSION[ 'message' ] ) )
//		{
//			$_SESSION[ "message" ] = "";
//		}
//
//	}
//}
//add_action ( 'init' , 'myStartSession' , 1 );
//
//function myEndSession ()
//{
//	$_SESSION[ "message" ] = "";
//	session_destroy ();
//
//}
//
//add_action ( 'wp_logout' , 'myEndSession' );
//add_action ( 'wp_login' , 'myEndSession' );
////add_action('init', 'myEndSession');
//add_action ( 'wp_login' , 'myStartSession' );
//add_action ( 'wp_login_failed' , 'custom_login_failed' );

function my_excerpt($text, $excerpt) {

    if ($excerpt) {
        return $excerpt;
    }

    $text = strip_shortcodes($text);

    $text = apply_filters('the_content', $text);

    $text = str_replace(']]>', ']]>', $text);

    $text = strip_tags($text);

    $excerpt_length = apply_filters('excerpt_length', 55);

    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');

    $words = preg_split("/[\n]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);

    if (count($words) > $excerpt_length) {
        array_pop($words);

        $text = implode(' ', $words);

        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }

    return apply_filters('wp_trim_excerpt', $text);
}

/**
 * Custom Login Page Actions
 */
//// Change the login url sitewide to the custom login page
//add_filter( 'login_url', 'custom_login_url', 10, 2 );
//function custom_login_url( $login_url='', $redirect='' )
//{
//    $page = get_page_by_path('user-login');
//    if ( $page )
//    {
//        $login_url = get_permalink($page->ID);
//
//        if (! empty($redirect) )
//            $login_url = add_query_arg('redirect_to', urlencode($redirect), $login_url);
//    }
//    return $login_url;
//}
//
////// Redirects wp-login to custom login with some custom error query vars when needed
//add_action( 'login_head', 'custom_redirect_login', 10, 2 );
//function custom_redirect_login( $redirect_to='', $request='' )
//{
//    if ( 'wp-login.php' == $GLOBALS['pagenow'] )
//    {
//        $redirect_url = custom_login_url();
//
//        if (! empty($_GET['action']) )
//        {
//            if ( 'lostpassword' == $_GET['action'] )
//            {
//                return;
//            }
//
//        }
//        elseif (! empty($_GET['loggedout'])  )
//        {
//            $redirect_url = add_query_arg('action', 'loggedout', custom_login_url());
//        }
//
//        wp_redirect( $redirect_url );
//        exit;
//    }
//}
//
////// Updates login failed to send user back to the custom form with a query var
//add_action( 'wp_login_failed', 'custom_login_failed', 10, 2 );
//function custom_login_failed( $username )
//{
//    $referrer = wp_get_referer();
//
//    if ( $referrer && ! strstr($referrer, 'wp-login') && ! strstr($referrer, 'wp-admin') )
//    {
//        if ( empty($_GET['loggedout']) )
//        wp_redirect( add_query_arg('action', 'failed', custom_login_url()) );
//        else
//        wp_redirect( add_query_arg('action', 'loggedout', custom_login_url()) );
//        exit;
//    }
//}
//
//
////// Updates authentication to return an error when one field or both are blank
////add_filter( 'authenticate', 'custom_authenticate_username_password', 30, 3);
//function custom_authenticate_username_password( $user, $username, $password )
//{
//    if ( is_a($user, 'WP_User') ) { return $user; }
//
//    if ( empty($username) || empty($password) )
//    {
//        $error = new WP_Error();
//        $user  = new WP_Error('authentication_failed', __('<strong>ERROR</strong>: Invalid username or incorrect password.'));
//
//        return $error;
//    }
//}
//
//
////// Automatically adds the login form to "login" page
////add_filter( 'the_content', 'custom_login_form_to_login_page' );
//function custom_login_form_to_login_page( $content )
//{
//    if ( is_page('login') && in_the_loop() )
//    {
//        $output = $message = "";
//        if (! empty($_GET['action']) )
//        {
//            if ( 'failed' == $_GET['action'] )
//                $message = "There was a problem with your username or password.";
//            elseif ( 'loggedout' == $_GET['action'] )
//                $message = "You are now logged out.";
//            elseif ( 'recovered' == $_GET['action'] )
//                $message = "Check your e-mail for the confirmation link.";
//        }
//
//        if ( $message ) $output .= '<div class="message"><p>'. $message .'</p></div>';
//        $output .= wp_login_form('echo=0&redirect='. site_url());
//        $output .= '<a href="'. wp_lostpassword_url( add_query_arg('action', 'recovered', get_permalink()) ) .'" title="Recover Lost Password">Lost Password?</a>';
//
//        $content .= $output;
//    }
//    return $content;
//}
//
//
//


function app_output_buffer() {
	ob_start();
} // soi_output_buffer
add_action('init', 'app_output_buffer');

// exclude search filter
function fb_search_filter($query) {
    if ( !$query->is_admin && $query->is_search) {
        $query->set('post_type', array('post', 'news', 'resources', 'page') ); // id of page or post
    }
    return $query;
}
add_filter( 'pre_get_posts', 'fb_search_filter' );
register_sidebar(
    array(
        'id' => 'article_link', // уникальный id
        'name' => 'article link', // название сайдбара
        'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
        'before_widget' => '<div class="news-categories">', // по умолчанию виджеты выводятся <li>-списком
        'after_widget' => '</div>',
        'before_title' => '<div class="title"><p>', // по умолчанию заголовки виджетов в <h2>
        'after_title' => '</p></div>'
    )
);