<?php
if (is_singular("board_member") && !is_user_logged_in()) {
    wp_redirect(home_url());
}
if (is_singular('resources')) {
    get_template_part("/templates/content-single-resources");
} else {
    ?>
    <div class="news1-gnp">

        <div class="container">

            <div class="row">

                <div class="hidden-lg hidden-md hidden-sm col-xs-12">
                    <?php dynamic_sidebar('article_link'); ?>
                </div>
                <div class="col-md-8 col-sm-7 col-xs-12">

                    <?php while (have_posts()) :the_post(); ?>

                        <div class="article">
                            <p class="date"><?php the_date("d M Y"); ?></p>
                            <div class="title">
                                <p><?php the_title(); ?></p>
                            </div>
                            <div class="text-article">
                                <?php the_content(); ?>
                            </div>
                            <div class="related_resources">
                                <?php
                                // Find connected pages
                                if (is_singular("board_member")) {
                                    $connected = new WP_Query(array(
                                        'connected_type' => 'board_member_to_resource',
                                        'connected_items' => $post,
                                        'nopaging' => true
                                    ));
                                } else {
                                    $connected = new WP_Query(array(
                                        'connected_type' => 'post_to_resource',
                                        'connected_items' => $post,
                                        'nopaging' => true
                                    ));
                                }
//                                wp_reset_query();
                                // Display connected pages


                                while ($connected->have_posts()) : $connected->the_post();

                                    $publication_title = get_post_meta(get_the_ID(), "publication_title", true);
                                    $publication_date = get_post_meta(get_the_ID(), "publication_date", true);
                                    $publisher = get_post_meta(get_the_ID(), "publisher", true);
                                    $document_type = get_post_meta(get_the_ID(), "document_type", true);
                                    $author = get_post_meta(get_the_ID(), "author", true);
                                    $keywords = get_post_meta(get_the_ID(), "keywords", true);
                                    $publication_url = get_post_meta(get_the_ID(), "publication_url", true);
                                    ?>
                                    <div class="meta-section" itemscope itemtype="http://schema.org/Book">

                                        <div class="resources-cover">

                                            <div class="resources-cover-wrapper">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail(); ?>
                                                </a>
                                            </div>

                                        </div>

                                        <ul class="meta-list list-unstyled">
                                            <?php if ($publication_title != "") { ?>
                                                <li><span class="meta-label">Publication title: </span><span
                                                        class="meta-value meta-value-title" itemprop="name"> <a
                                                            href="<?php the_permalink(); ?>"><?php echo $publication_title; ?></a></span>
                                                </li>
                                            <?php } ?>
                                            <?php if ($author != "") { ?>
                                                <li><span class="meta-label">Author: </span><span
                                                        class="meta-value meta-value-date"
                                                        itemprop="author"><?php echo $author; ?></span></li>
                                            <?php } ?>
                                            <?php if ($publication_date != "") { ?>
                                                <li><span class="meta-label">Date: </span><span
                                                        class="meta-value meta-value-date"
                                                        itemprop="date"><?php echo $publication_date; ?></span></li>
                                            <?php } ?>
                                            <?php if ($publisher != "") { ?>
                                                <li><span class="meta-label">Publisher: </span><span
                                                        class="meta-value meta-value-publisher"
                                                        itemprop="publisher"><?php echo $publisher; ?></span></li>
                                            <?php } ?>
                                            <?php if ($document_type != "") { ?>
                                                <li><span class="meta-label">Document Type: </span><span
                                                        class="meta-value meta-value-publisher"
                                                        itemprop="learningResourceType"><?php echo $document_type; ?></span>
                                                </li>
                                            <?php } ?>


                                            <?php do_shortcode("[show_me_one_list postid='" . get_the_ID() . "' ]"); ?>
                                        </ul>
                                    </div>

                                    <?php
                                endwhile;

                                wp_reset_postdata(); // set $post back to original post
                                ?>
                            </div>
                            <footer>
                                <?php
                                wp_link_pages(array(
                                    'before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'),
                                    'after' => '</p></nav>'
                                ));
                                ?>
                                <?php the_tags('<ul class="entry-tags"><li>', '</li><li>', '</li></ul>'); ?>
                            </footer>

                            <?php //get_template_part("/templates/components/comp-share-buttons");?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="col-md-4 col-sm-5  hidden-xs">
                    <?php dynamic_sidebar('article_link'); ?>
                </div>
            </div>
        </div>
    </div>
<!--    --><?php //dynamic_sidebar('social'); ?>
    <?php
    $show_share_links = get_post_meta(get_the_ID(), 'show', TRUE);
    if (!isset($show_share_links) || $show_share_links != "no") {
        echo do_shortcode('[wbb-share-links]');
    }
    ?>

<?php } ?>
