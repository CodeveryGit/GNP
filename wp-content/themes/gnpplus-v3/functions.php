<?php if ( ! defined ( 'WPINC' ) )
{
	die;
}

/*
| ----------------------------------------------------------------------------------------------------------------------
| Required by WordPress.
| ----------------------------------------------------------------------------------------------------------------------
| Keep this file clean and only use it for requires.
|
*/

if ( ! defined ( '__DIR__' ) )
{
	define( '__DIR__' , dirname ( __FILE__ ) );
}


/**
 * Load Defined Constants
 */
require_once locate_template ( 'config/constants.php' );


/**
 * Load Theme Configuration
 */
require_once locate_template ( 'config/theme-config.php' );

/**
 * Load Theme Core Functions
 */
require_once locate_template ( 'system/WBB-Core/WBB-Core.php' );

/**
 * Load Theme Scripts and Styles
 */
require_once locate_template ( 'config/scripts.php' );

/**
 * Load extra included functions / Files
 */
require_once locate_template ( 'config/includes.php' );

register_sidebar(
	array(
		'id' => 'footer_social', // уникальный id
		'name' => 'footer_social', // название сайдбара
		'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
		'before_widget' => '<div class="footer-r">', // по умолчанию виджеты выводятся <li>-списком
		'after_widget' => '</div>',
		'before_title' => '', // по умолчанию заголовки виджетов в <h2>
		'after_title' => ''
	)
);

register_sidebar(
	array(
		'id' => 'social', // уникальный id
		'name' => 'social', // название сайдбара
		'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
		'before_widget' => '<div class="social">', // по умолчанию виджеты выводятся <li>-списком
		'after_widget' => '</div>',
		'before_title' => '', // по умолчанию заголовки виджетов в <h2>
		'after_title' => ''
	)
);


add_filter('walker_nav_menu_start_el','category_item_menu',10,4);

function category_item_menu($item_output, $item, $depth, $args){
	global $numb_menu;
	if($args->menu != 'News'){
		return $item_output;
	}
//	$attributes = '';
//	foreach ( $atts as $attr => $value ) {
//		if ( ! empty( $value ) ) {
//			$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
//			$attributes .= ' ' . $attr . '="' . $value . '"';
//		}
//	}
//	$item_output = $args->before;
//	$item_output .= '<a'. $attributes .'>';
//	/** This filter is documented in wp-includes/post-template.php */
//	$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
//	$item_output .= '</a>';

	$item_output = "<div class=\"radio\">
						<input type=\"radio\" id='optradio-{$item->ID}-{$numb_menu}' name=\"optradio-{$numb_menu}\" data-href=\"".$item->url."\" ".($item->current?" checked":"")."><label for='optradio-{$item->ID}-{$numb_menu}'>".apply_filters( 'the_title', $item->title, $item->ID )."</label>
					</div>";
	return $item_output;
}
//						<label><input type=\"radio\" name=\"optradio\" data-href=\"".$item->url."\" ".($item->current?" checked":"").">".apply_filters( 'the_title', $item->title, $item->ID )."</label>

if(!function_exists('get_header_page_image')){
	function get_header_page_image($pageId,$recursive = false){
		$backgrounds = get_field('top_background',$pageId);
		if($backgrounds){
			return $backgrounds;
		}
		elseif($recursive && $parentID = wp_get_post_parent_id($pageId)){
			return get_header_page_image($parentID,true);
		}
		else{
			return false;
		}
	}
}
// add hook
add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2 );
// filter_hook function to react on sub_menu flag
function my_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
	if ( isset( $args->sub_menu ) ) {
		$root_id = 0;

		// find the current menu item
		foreach ( $sorted_menu_items as $menu_item ) {
			if ( $menu_item->current ) {
				// set the root id based on whether the current menu item has a parent or not
				$root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
				break;
			}
		}

		// find the top level parent
		if ( ! isset( $args->direct_parent ) ) {
			$prev_root_id = $root_id;
			while ( $prev_root_id != 0 ) {
				foreach ( $sorted_menu_items as $menu_item ) {
					if ( $menu_item->ID == $prev_root_id ) {
						$prev_root_id = $menu_item->menu_item_parent;
						// don't set the root_id to 0 if we've reached the top of the menu
						if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
						break;
					}
				}
			}
		}
		$menu_item_parents = array();
		foreach ( $sorted_menu_items as $key => $item ) {
			// init menu_item_parents
			if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;
			if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
				// part of sub-tree: keep!
				$menu_item_parents[] = $item->ID;
			} else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
				// not part of sub-tree: away with it!
				unset( $sorted_menu_items[$key] );
			}
		}

		return $sorted_menu_items;
	} else {
		return $sorted_menu_items;
	}
}