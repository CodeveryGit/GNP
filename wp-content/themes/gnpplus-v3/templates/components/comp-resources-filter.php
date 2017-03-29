<!--<div class="rec-right">-->
<?php global $acordion_numb; ?>
<?php $acordion_numb++; ?>
    <div class="panel-group comp-resources-filter" id="accordion<?php echo $acordion_numb;?>">
        <div class="panel panel-default block block-resources block-resources-publication-type">
            <div class="panel-heading">
                <h4 class="panel-title title title-filter">
                    <a data-toggle="collapse" data-parent="#accordion<?php echo $acordion_numb;?>" href="#collapseTwo<?php echo $acordion_numb;?>" class="collapsed name">
                       Publication type <span class="glyphicon glyphicon-triangle-bottom pull-right"></span>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo<?php echo $acordion_numb;?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="sort-list-topics">
                        <li class="active" data-filter="all">
                            <div class="link_container"><span><?php echo _e('Show All', 'join'); ?></span></div>
                        </li>
                        <?php
                        $i=0;
                        $wp_query = new WP_Query('post_status=publish&post_type=topic&posts_per_page=-1');
                        while ($wp_query->have_posts()) : $wp_query->the_post();
                            $query_how_many = $wpdb->get_results("SELECT * FROM  wp_p2p WHERE wp_p2p.p2p_type='topics_to_resources' AND wp_p2p.p2p_from =" . $post->ID);
                            $how_many = count($query_how_many);

                            if ($how_many > 0) {
                                ?>

                                <li data-filter="<?php echo $post->ID; ?>">

                                    <div class="link_container"><span><?php the_title(); ?></span></div>

                                </li>
                                <?php
                            }
                        endwhile;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default block block-resources block-resources-publication-country">
            <div class="panel-heading">
                <h4 class="panel-title  title title-filter">
                    <a data-toggle="collapse" data-parent="#accordion<?php echo $acordion_numb;?>" href="#collapseThree<?php echo $acordion_numb;?>" class="collapsed name">
                        Country  <span class="glyphicon glyphicon-triangle-bottom pull-right"></span>
                    </a>
                </h4>
            </div>
            <div id="collapseThree<?php echo $acordion_numb;?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="sort-list-country">
                        <li class="active" data-filter="all">

                            <div class="link_container"><span><?php echo _e('Show All', 'join'); ?></span></div>

                        </li>
                        <?php
                        $i=0;
                        $wp_query = new WP_Query('post_status=publish&post_type=world&posts_per_page=-1');
                        while ($wp_query->have_posts()) : $wp_query->the_post();

                            $query_how_many = $wpdb->get_results("SELECT * FROM  wp_p2p WHERE wp_p2p.p2p_type='world_to_resources' AND wp_p2p.p2p_from =" . $post->ID);
                            $how_many = count($query_how_many);

                            if ($how_many > 0) {
                                ?>
                                <li data-filter="<?php echo $post->ID; ?>">

                                    <div class="link_container"><span><?php the_title(); ?></span></div>

                                </li>
                                <?php
                            }
                        endwhile;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default block block-resources block-resources-publication-region">
            <div class="panel-heading">
                <p class="panel-title   title title-filter">
                    <a data-toggle="collapse" data-parent="#accordion<?php echo $acordion_numb;?>" href="#collapseFour<?php echo $acordion_numb;?>" class="collapsed name">
                        Region  <span class="glyphicon glyphicon-triangle-bottom pull-right"></span>
                    </a>
                </p>
            </div>
            <div id="collapseFour<?php echo $acordion_numb;?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="sort-list-region">
                        <li class="active" data-filter="all">

                            <div class="link_container"><span><?php echo _e('Show All', 'join'); ?></span></div>

                        </li>
                        <?php
                        $i=0;
                        $wp_query = new WP_Query('post_status=publish&post_type=network&posts_per_page=-1');
                        while ($wp_query->have_posts()) : $wp_query->the_post();
                            $query_how_many = $wpdb->get_results("SELECT * FROM  wp_p2p WHERE wp_p2p.p2p_type='network_to_resources' AND wp_p2p.p2p_from =" . $post->ID);
                            $how_many = count($query_how_many);

                            if ($how_many > 0) {
                                ?>
                                <li data-filter="<?php echo $post->ID; ?>">
                                    <div class="link_container"><span><?php the_title(); ?></span></div>
                                </li>
                                <?php
                            }
                        endwhile;
                        wp_reset_query();
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!--</div>-->
