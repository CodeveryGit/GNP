<?php

//$defaults = array(
//    'theme_location' => '',
//    'menu' => 'Push Menu',
//    'container' => 'div',
//    'container_class' => '',
//    'container_id' => '',
//    'menu_class' => 'top-navigation list-unstyled',
//    'menu_id' => '',
//    'echo' => true,
//    'fallback_cb' => 'wp_page_menu',
//    'before' => '',
//    'after' => '',
//    'link_before' => '',
//    'link_after' => '',
//    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
//    'depth' => 0,
//    'walker' => ''
//);
//wp_nav_menu($defaults);

//$defaults = array(
//'theme_location' => '',
//'menu' => 'Push Menu',
//'container' => 'div',
//'container_class' => 'collapse navbar-collapse',
//'container_id' => 'bs-example-navbar-collapse-1',
//'menu_class' => 'nav navbar-nav',
//'fallback_cb' => 'wp_page_menu',
//'before' => '',
//'after' => '',
//'link_before' => '',
//'link_after' => '',
//'depth' => 2,
//'walker' => '');//new wp_bootstrap_navwalker()) ;
//wp_nav_menu($defaults);?>
<?php  wp_nav_menu( array(
        'menu'              => 'Push Menu',
        'theme_location'    => '',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
        'menu_class'        => 'nav navbar-nav',
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker())
);
?>