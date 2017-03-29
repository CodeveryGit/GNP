<?php //print_r($data);?>
<li class="col-sm-6">
    <div class="rec-cont">
        <div class="media-item media-item-resources">
            <a class="image-resources pull-left" href="<?php echo site_url()."/resources/".$data->post_name; ?>">
                <?php //the_post_thumbnail();
               $thumb = get_the_post_thumbnail ( $data->ID , 'resource-list' );
               echo $thumb;
                ?>
            </a>
            <div class="media-body art-desc">
                <p class="art-title">
                    <a href="<?php echo site_url()."/resources/".$data->post_name; ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                        <?php
                        //echo $data->post_title;
                        if (strlen($data->post_title) > 75) {
                            echo substr($data->post_title, 0, 75) . '...';
                        } else {
                            echo $data->post_title;
                        }
                        ?>
                    </a>
                </p>
                <p class="date">

                    <?php //the_time('F jS') ?> <?php //the_time('Y') ?>
                    <?php
                    echo mysql2date('F jS,Y', $data->post_date);
                    //echo $data->post_date;?>
                </p>
            </div>
        </div>
    </div>
</li>
