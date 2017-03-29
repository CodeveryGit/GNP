<!--<div class="comp comp-small comp-media-item-small --><?php //if (is_front_page())
//{
//    echo "masonry-news-item";
//} ?><!--">-->
<!---->
<!--    <div class="media-item media-item-small media-item-small-inside">-->
<!--        <div class="block-img-item-container">-->
<!--            <a href="--><?php //echo get_permalink($variation["post"]->ID) ?><!--">-->
<!---->
<!--                --><?php
//                echo get_the_post_thumbnail($variation["post"]->ID, "small-block-frontend");
//                ?><!--           -->
<!---->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="media-body">-->
<!---->
<!--            <div class="media-date">-->
<!---->
<?php ///* <?php echo get_the_date("d/m/y",$variation["post"]->ID)?>
<!---->
<!--            </div>-->
<!---->
<!--            <h2 class="title title-media title-media-small">-->
<!---->
<!--                <a href="--><?php //echo get_permalink($variation["post"]->ID) ?><!--">-->
<!---->
<?php //echo $variation["post"]->post_title ?>
<!---->
<!--                </a>-->
<!---->
<!--            </h2>-->
<!---->
<!--            <div class="media-excerpt">-->
<!---->
<?php //echo $variation["post"]->post_excerpt; ?>
<!---->
<!--                <span class="media-read-more">-->
<!---->
<!--                    <a href="--><?php //echo get_permalink($variation["post"]->ID) ?><!--">More</a>-->
<!---->
<!--                </span>-->
<!---->
<!---->
<!--            </div>-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--        </div>-->
<!---->
<!---->
<!--    </div>-->
<!---->
<!--</div>-->
<?php

//var_dump(get_post_thumbnail_id($variation['post']->ID));
?>

<div class="col-sm-3 <?php echo is_front_page() ? "masonry-news-item" : ''; ?>">
    <div class="row">
        <div class="col-sm-12">
            <a href="<?php echo get_permalink($variation["post"]->ID) ?>">
                <div class="article2">
                    <div class="row">
                        <div class="col-xs-4 col-sm-12">
                            <div class="image"
                                 style="background: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($variation['post']->ID)); ?>  ') 50%;background-size: cover;">
                            </div>
                            <!--                        --><?php
                            //                            echo get_the_post_thumbnail($variation["post"]->ID, "small-block-frontend");
                            //                        ?>
                        </div>
                        <div class="desc col-xs-8 col-sm-12">
                            <?php echo $variation["post"]->post_title ?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>