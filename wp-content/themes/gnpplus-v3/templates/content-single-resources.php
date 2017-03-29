<?php
// GET THE SCHEMA VALUES
$publication_title = get_post_meta(get_the_ID(), "publication_title", true);
$publication_date = get_post_meta(get_the_ID(), "publication_date", true);
$publisher = get_post_meta(get_the_ID(), "publisher", true);
$document_type = get_post_meta(get_the_ID(), "document_type", true);
$author = get_post_meta(get_the_ID(), "author", true);
$keywords = get_post_meta(get_the_ID(), "keywords", true);
$publication_url = get_post_meta(get_the_ID(), "publication_url", true);
?>



    <div class="about-gnp single-recuorces">
<!--        <div id="content-single-resources">-->
        <div class="container">
            <div class="row">
            <div class="col-md-12">



                <div class="back-to-previous"><a href="/resources/">Back to publication browser</a></div>

            </div>
            </div>



        <div class="row">

    <?php while (have_posts()) :the_post(); ?>



        <div class="col-md-8 col-sm-7">



            <div class="about-left"<?php post_class(); ?>>

                <div class="title-article">
                    <?php the_title(); ?>
                </div>

<!--                        <div class="entry-content">-->

                            <div class="about-desc">
                                <?php the_content(); ?>
                            </div>
                <div class="download-book" itemscope itemtype="http://schema.org/Book">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-3">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail(); ?>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-4">
                            <div class="book-title">
                                <div class="book-p">
                                    <?php if ($publication_title != "") { ?>
                                        <p>Publication title:</p>
                                    <?php } ?>
                                    <?php if ($author != "") { ?>
                                        <p>Author:</p>
                                    <?php } ?>
                                    <?php if ($publication_date != "") { ?>
                                        <p>Date:</p>
                                    <?php } ?>
                                    <?php if ($publisher != "") { ?>
                                        <p>Publisher:</p>
                                    <?php } ?>
                                    <?php if ($document_type != "") { ?>
                                        <p>Document Type:</p>
                                    <?php } ?>
                                    <p>Download link:</p>
                                </div>
                                <div class="button-down">
                                    <a href="<?php $directory ?>" class="downloud-link link-hover">Download</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4 col-xs-5">
                            <div class="book-desc">
                                <?php if ($publication_title != "") { ?>
                                    <p><a href="<?php the_permalink(); ?>"><?php echo $publication_title; ?></a></p>
                                <?php } ?>
                                <?php if ($author != "") { ?>
                                    <p><?php $author; ?></p>
                                <?php } ?>
                                <?php if ($publication_date != "") { ?>
                                    <p><?php echo $publication_date; ?></p>
                                <?php } ?>
                                <?php if ($document_type != "") { ?>
                                    <p><?php echo $publisher; ?></p>
                                <?php } ?>
                                <?php if ($document_type != "") { ?>
                                    <p><?php echo $document_type; ?></p>
                                <?php } ?>
                                <p><?php do_shortcode("[show_me_one_list postid='" . get_the_ID() . "' ]"); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
<!---->
<!--                            <div class="meta-section" itemscope itemtype="http://schema.org/Book">-->
<!---->
<!--                                <div class="resources-cover">-->
<!---->
<!--                                    <div class="resources-cover-wrapper">-->
<!---->
<!--    --><?php //the_post_thumbnail(); ?>
<!---->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!---->
<!--                                <ul class="meta-list list-unstyled">-->
<!--                                    --><?php //if ($publication_title != "") { ?>
<!--                                    <li><span class="meta-label">Publication title: </span><span class="meta-value meta-value-title" itemprop="name">--><?php //echo $publication_title;?><!--</span> </li>-->
<!--                                    --><?php //} ?>
<!--                                    --><?php //if ($author != "") { ?>
<!--                                    <li><span class="meta-label">Author: </span><span class="meta-value meta-value-date" itemprop="author">--><?php //echo $author;?><!--</span> </li>-->
<!--                                    --><?php //} ?>
<!--                                    --><?php //if ($publication_date != "") { ?>
<!--                                    <li><span class="meta-label">Date: </span><span class="meta-value meta-value-date" itemprop="date">--><?php //echo $publication_date;?><!--</span> </li>-->
<!--                                    --><?php //} ?>
<!--                                    --><?php //if ($publisher != "") { ?>
<!--                                    <li><span class="meta-label">Publisher: </span><span class="meta-value meta-value-publisher" itemprop="publisher">--><?php //echo $publisher;?><!--</span> </li>-->
<!--                                    --><?php //} ?>
<!--                                    --><?php //if ($document_type != "") { ?>
<!--                                    <li><span class="meta-label">Document Type: </span><span class="meta-value meta-value-publisher" itemprop="learningResourceType">--><?php //echo $document_type;?><!--</span> </li>-->
<!--                                    --><?php //} ?>
<!--                                    -->
<!--                                    --><?php //do_shortcode("[show_me_one_list postid='".get_the_ID()."' ]");?>
<!--                                    -->
<!--                                     -->
<!--                                </ul>-->
<!---->
<!---->
<!--<!--                            </div>-->
<!---->
<!---->
<!---->
<!--                        </div>-->
                        <footer>

    <?php
    wp_link_pages(array(
        'before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'),
        'after' => '</p></nav>'
    ));
    ?>
                            <?php the_tags('<ul class="entry-tags"><li>', '</li><li>', '</li></ul>'); ?>

                        </footer>

                        <?php //get_template_part("/templates/components/comp-share-buttons"); ?>
                        <?php
                    $show_share_links = get_post_meta(get_the_ID(), 'show', TRUE);
                    if (!isset($show_share_links) || $show_share_links != "no") {
                        echo do_shortcode('[wbb-share-links]');
                    }
                    ?>

<!--                    </article>-->



                </div>
            <?php endwhile; ?>

            <div class="col-xs-12 col-sm-4 col-md-4">



            </div>
        </div>

        </div>

    </div>
<!--</div>-->
