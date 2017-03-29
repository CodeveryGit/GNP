<div class="row">
<li class="col-md-12">
    <div class="comp comp-media-item-resources">

        <div class="media-item media-item-resources">

<!--            <a class="image-resources pull-left" href="#">
                

                <?php //the_post_thumbnail(); 
               $thumb = get_the_post_thumbnail ( $data->ID , 'resource-list' );
               echo $thumb;
                ?>
                
            </a>-->

            <div class="media-body">
                There are no resources
<!--                <div class="label-resources">TITLE///</div>

                <div class="title title-resources">

                    <a href="<?php echo $data->guid; ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">

                        <?php
                        //echo $data->post_title;
                        if (strlen($data->post_title) > 75) {
                            echo substr($data->post_title, 0, 75) . '...';
                        } else {
                            echo $data->post_title;
                        }
                        ?>

                    </a>

                </div>-->

<!--                <div class="label-resources">DATE///</div>

                <div class="title title-resources">

                    <?php //the_time('F jS') ?> <?php //the_time('Y') ?>
                    <?php 
                    echo mysql2date('F jS,Y', $data->post_date);
                    //echo $data->post_date;?>
                </div>-->

            </div>


        </div>

    </div>
</li>
</div>
