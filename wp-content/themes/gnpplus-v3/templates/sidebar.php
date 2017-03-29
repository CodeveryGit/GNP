<?php
global $numb_menu;
$numb_menu++;
?>
<div class="sidebar">

    <?php
       
    if (is_post_type_archive( 'resources' ))

    {

//        get_template_part("/templates/components/comp-resources-search");

        get_template_part("/templates/components/comp-resources-filter");

    }

      elseif (is_singular('post')||is_category())

      {

          $defaults = array(
              'menu'            => 'News' ,
              'menu_class'      => 'menu-news' ,
              'items_wrap'      => '<h2 class="title title-menu cat-title">Category</h2><ul id="%1$s" class="%2$s list-unstyled">%3$s</ul>' ,
              'depth'           => 0 ,
          );

          wp_nav_menu ( $defaults );


      }
      else if(is_page("user-login")){

      }

    else

    {

            $defaults = array(
                'menu'            => 'About menu' ,
                'menu_class'      => 'menu-about' ,
                'items_wrap'      => '<ul id="%1$s" class="%2$s list-unstyled">%3$s</ul>' ,
                'depth'           => 0 ,
            );

            wp_nav_menu ( $defaults );


//    get_template_part("/templates/components/comp-newsletter"); ?>
<!---->
<!--    --><?php //get_template_part("/templates/components/comp-twitter-feed");

    }

    ?>

<!--    <div class="comp comp-small comp-twitter-feed ">-->
<!---->
<!--        <div class="block">-->
<!---->
<!--            --><?php //dynamic_sidebar('right_block');?>
<!---->
<!--        </div>-->
<!---->
<!---->
<!--    </div>-->

</div>
