<div class="push-menu-close">

    <a href="#">

        <i class="icon ion-ios7-close-empty "></i>

    </a>        

</div>


<?php

                    $defaults = array(
                            'theme_location'  => '',
                            'menu'            => 'Push Menu',
                         'container'       => '',
  'container_class' => false,
                            'menu_class'      => '',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => ''
                    );

                    wp_nav_menu( $defaults );

                    ?>

<!--<ul>

    <li>

        <a href="/">Home</a>

    </li>

    <li>

        <a href="/">Home</a>

    </li>

    <li>

        <a href="/">Home</a>

    </li>

    <li>

        <a href="/">Home</a>

    </li>

    <li>

        <a href="/">Home</a>

    </li>

    <li>

        <a href="/">Home</a>

    </li>

</ul>-->


