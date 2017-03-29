<!--<div class="comp comp-large comp-media-item-large --><?php //if (is_front_page())
//{
//    echo "masonry-news-item";
//} ?><!--">-->
<!---->
<!--    <div class="media-item media-item-large">-->
<!--        <div class="block-img-item-container">-->
<!--            <a href="--><?php //echo get_permalink($variation["post"]->ID) ?><!--">-->
<!---->
<!--                --><?php
//                echo get_the_post_thumbnail($variation["post"]->ID, "large-block-frontend");
//                ?><!--           -->
<!---->
<!--            </a>-->
<!---->
<!--        </div>-->
<!--        <div class="media-body">-->
<!---->
<!--            <div class="media-date">-->
<!---->
<?php ///* <?php echo get_the_date("d/m/y",$variation["post"]->ID)?>
<!---->
<!--            </div>-->
<!---->
<!--            <h2 class="title title-media title-media-large">-->
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
<!--            </div>-->
<!---->
<!---->
<!--        </div>-->
<!---->
<!---->
<!--    </div>-->
<!---->
<!--</div>-->




<div class="col-sm-6 <?php echo is_front_page() ? "masonry-news-item" : ''; ?>">
<a href="<?php echo get_permalink($variation["post"]->ID) ?>">
    <div class="article1">
        <div class="row">
            <div class="image col-sm-12"

                 <?php $image_id = get_post_thumbnail_id();
//                 var_dump($image_id);  ?>
                 style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($variation['post']->ID)); ?>  ');">
            </div>
            <div class="desc col-sm-12">
                <?php echo $variation["post"]->post_title ?>
            </div>
        </div>
    </div>
</a>
</div>