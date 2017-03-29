<?php
$bg_images = get_option('post_type_image');
if(!empty($bg_images[get_post_type()])){
    $bg_image = $bg_images[get_post_type()];
}
?>
<div class="main-image recources-image" <?php echo isset($bg_image)?"style='background-image: url(\"$bg_image\")'":"";?>>
    <div class="white-line"></div>
    <div class="container">
        <div class="page-title">
            <p>Recources</p>
        </div>
    </div>
</div>
<div class="recources">
    <div class="container">

        <div class="row">
<!--            --><?php //if(!is_post_type_archive('resources')): ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 recourse-filter">
                <div class="rec-right">
                    <?php get_search_form() ?>
                    <?php get_template_part("/templates/sidebar"); ?>
                </div>
            </div>
<!--            --><?php //endif; ?>
            <div class="col-md-8 col-sm-8 col-xs-12 resources-main-cont">
                <div class="news-title">
                    <p>Results</p>
                </div>
                <div class="recourcse-main">
                    <div class="row">
<!--                        						<div class="col-sm-6">-->


                        <!-- WordPress Loop -->
                        <?php if (have_posts()) : ?>

                            <!--	<div class="header-archive">-->
                            <!---->
                            <!--		--><?php //$post = $posts[ 0 ]; // Hack. Set $post so that the_date() works. ?>
                            <!---->
                            <!--		--><?php ///* If this is a category archive */
//		if ( is_category () )
//		{
//			?>
                            <!---->
                            <!--			<h3 class="pagetitle">Entries in --><?php //single_cat_title (); ?><!-- Category</h3>-->
                            <!---->
                            <!--			--><?php ///* If this is a tag archive */
//		}
//		elseif ( is_tag () )
//		{
//			?>
                            <!---->
                            <!--			<h3 class="pagetitle">Posts Tagged &#8216;--><?php //single_tag_title (); ?><!--&#8217;</h3>-->
                            <!---->
                            <!--			--><?php ///* If this is a daily archive */
//		}
//        elseif ( is_post_type_archive () )
//        {
//            ?>
                            <!---->
                            <!--            <h3 class="title page-title">--><?php //post_type_archive_title() ?><!--</h3>-->
                            <!---->
                            <!--            --><?php ///* If this is a post-type archive */
//        }
//		elseif ( is_day () )
//		{
//			?>
                            <!---->
                            <!--			<h3 class="pagetitle">Archive for --><?php //the_time ( 'F jS, Y' ); ?><!--</h3>-->
                            <!---->
                            <!--			--><?php ///* If this is a monthly archive */
//		}
//		elseif ( is_month () )
//		{
//			?>
                            <!--			;-->
                            <!---->
                            <!--			<h3 class="pagetitle">Archive for --><?php //the_time ( 'F, Y' ); ?><!--</h3>-->
                            <!---->
                            <!--			--><?php ///* If this is a yearly archive */
//		}
//		elseif ( is_year () )
//		{
//			?>
                            <!---->
                            <!--			<h3 class="pagetitle">Archive for --><?php //the_time ( 'Y' ); ?><!--</h3>-->
                            <!---->
                            <!--			--><?php ///* If this is an author archive */
//		}
//		elseif ( is_author () )
//		{
//			?>
                            <!---->
                            <!--			<h3 class="pagetitle">Author Archive</h3>-->
                            <!---->
                            <!--			--><?php ///* If this is a paged archive */
//		}
//		elseif ( isset( $_GET[ 'paged' ] ) && ! empty( $_GET[ 'paged' ] ) )
//		{
//			?>
                            <!---->
                            <!--			<h3 class="pagetitle">Blog Archives</h3>-->
                            <!---->
                            <!--		--><?php //} ?>
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!--	</div>-->

                            <?php if (is_post_type_archive('resources')) {
                                ?>

                                <!-- Div to load posts -->
                                <div class="total_results" id="filterContainer" data-page="1" data-per_page="12">

                                    <ul class="list list-unstyled list-resources-items row-fluid">

                                    </ul>

                                </div>

                            <?php } else { ?>


                                	<ul class="list list-unstyled list-resources-items row">

                                		<?php while ( have_posts () ) : the_post ();
                                ?>


                                	                <?php get_template_part("/templates/components/comp-media-item-category");
                                ?>



                                		<?php endwhile;
                                ?>

                                	</ul>
                                        <?php wbb_pagination();
                                ?>

                            <?php } ?>


                        <?php else : ?>
                            <h6 class="center">Not Found</h6>
                            <p class="center">Sorry, but you are looking for something that isn't here.</p>
                        <?php endif; ?>

                    </div>
                    <!--                <div id="paging">

                    <?php $previous = get_bloginfo('template_directory'); ?>

                    <ul class="navigationarrows">
                        <li class="previous"><?php previous_posts_link('<img src="' . $previous . '/images/next.png" alt="Next" title="Next" />') ?></li>
                        <li class="next"><?php next_posts_link('<img src="' . $previous . '/images/previous.png" alt="Previous" title="Previous" />') ?></li>
                    </ul>

                </div>-->

                    <!-- End WordPress Loop -->
                </div>
            </div>


<!--            <div class="col-md-4 col-sm-4 hidden-xs">-->
<!--                <div class="rec-right">-->
<!--                    --><?php //get_template_part("/templates/components/comp-resources-search"); ?>
<!--<!--                    --><?php ////get_search_form() ?>
<!--                    --><?php //get_template_part("/templates/sidebar"); ?>
<!--                </div>-->
<!--            </div>-->

        </div>

    </div>

</div>
<?php
$show_share_links = get_post_meta(get_the_ID(), 'show', TRUE);
if (!isset($show_share_links) || $show_share_links != "no") {
    echo do_shortcode('[wbb-share-links]');
}
?>