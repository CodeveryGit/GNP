<?php
$bg_images = get_option('post_type_image');
if (!empty($bg_images[get_post_type()])) {
    $bg_image = $bg_images[get_post_type()];
}
// Check if there are any posts to display
if (have_posts()) : ?>
    <div
        class="main-image news-image" <?php echo isset($bg_image) ? "style='background-image: url(\"$bg_image\")'" : ""; ?>>
        <div class="white-line"></div>
        <div class="container">
            <div class="page-title">
                <p><?php single_cat_title(); ?></p>
            </div>
        </div>
    </div>
    <div class="news-gnp">
        <div class="container">
            <div class="row">
                <div class="hidden-lg hidden-md hidden-sm  col-xs-12">
                    <div class="news-categories">
                        <?php get_template_part("/templates/sidebar"); ?>
                    </div>
                </div>
                <div class="col-md-8 col-sm-7 col-xs-12">
                    <?php

                    // The Loop
                    while (have_posts()) : the_post(); ?>

                        <?php get_template_part("/templates/components/comp-media-item-category"); ?>


                    <?php endwhile; // End Loop ?>


                    <?php wbb_pagination(); ?>
                </div>


                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="news-categories">
                        <?php get_template_part("/templates/sidebar"); ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
<?php else: ?>
    <div
        class="main-image news-image" <?php echo isset($bg_image) ? "style='background-image: url(\"$bg_image\")'" : ""; ?>>
        <div class="white-line"></div>
        <div class="container">
            <div class="page-title">
                <p><?php single_cat_title(); ?></p>
            </div>
        </div>
    </div>
    <div class="news-gnp">
        <div class="container">
            <div class="row">
                <div class="hidden-lg hidden-md hidden-sm  col-xs-12">
                    <div class="news-categories">
                        <?php get_template_part("/templates/sidebar"); ?>
                    </div>
                </div>
                <div class="col-md-8 col-sm-7 col-xs-12">

                    <p>Sorry, no posts matched your criteria.</p>
                </div>


                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="news-categories">
                        <?php get_template_part("/templates/sidebar"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
<?php //dynamic_sidebar('social'); ?>

<?php
$show_share_links = get_post_meta(get_the_ID(), 'show', TRUE);
if (!isset($show_share_links) || $show_share_links != "no") {
    echo do_shortcode('[wbb-share-links]');
}
?>