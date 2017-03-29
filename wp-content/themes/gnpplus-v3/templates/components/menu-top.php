<?php
/**
 * Project Name: webberty-theme-framework
 * File name: menu-top.php
 * Created by www.webberty.com
 * User: Baghina Radu Adrian
 * Email: adrian@webberty.com
 * User Website: www.webberty.com
 * Date: 9/10/13
 * Time: 21:12
 */

wp_nav_menu ( array(
	'menu_class' => 'nav navbar-nav' ,
	'walker'     => new Bootstrap_Walker()
) );
?>
<?php // wp_nav_menu( array(
//		'menu'              => '',
//		'theme_location'    => '',
//		'depth'             => 2,
//		'container'         => 'div',
//		'container_class'   => 'collapse navbar-collapse',
//		'container_id'      => 'bs-example-navbar-collapse-1',
//		'menu_class'        => 'nav navbar-nav',
//		'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
//		'walker'            => new wp_bootstrap_navwalker())
//);
//?>