<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                    <?php get_template_part("/templates/components/comp-branding"); ?>
            </div>

            <div class="col-sm-6 list-collapse">

                <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <div class="collapse-search-form">
                                <a  class="link-hover donate" href="/donate"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets1/img/plus_w.png" alt=""></span>Donate
                                </a>
                                <?php get_search_form() ?>
                            </div>
                        </li>
                    </ul>
                    <?php  wp_nav_menu( array(
                            'menu'              => 'Push Menu',
                            'theme_location'    => '',
                            'depth'             => 2,
                            'container'         => 'div',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new wp_bootstrap_navwalker())
                    );
                    ?>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="donate_search">

                    <div class="search-form">
                        <a class="link-hover donate" href="/donate">
                            <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets1/img/plus_w.png" alt=""></span>Donate
                        </a>
                        <?php get_search_form() ?>
                    </div>
                    <button aria-controls="navbar" aria-expanded="false" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="link-hover navbar-toggle collapsed" type="button">
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="margin-top-header"></div>
<?php
if(is_front_page()){
    get_template_part("/templates/components/comp-carousel");
}
?>

