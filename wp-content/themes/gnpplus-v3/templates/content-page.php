<?php
$thumb = wp_get_attachment_url( get_post_thumbnail_id() );
$backgrounds = get_header_page_image(get_the_ID(),true);
if($backgrounds){
    shuffle($backgrounds);
    $thumb = reset($backgrounds)['background']['url'];
    $color = reset($backgrounds)['text_color'];
}
?>
<div class="main-image about-image" <?php echo !empty($thumb)?'style="background-image: url(\''.$thumb.'\')";':'style="background-color: #FFD401 "';?>>
    <?php if(!empty($thumb)): ?>
    <div class="white-line"></div>
    <?php endif; ?>
    <div class="container">
        <div class="page-title" <?php echo !empty($color)?'style="color:'.$color.'";':'';?>>
            <p><?php the_title(); ?></p>
        </div>
    </div>
</div>
<div class="about-gnp 111">
    <div class="container">
        <div class="row">
            <div class="hidden-lg hidden-md hidden-sm col-xs-12 ">
                <?php get_template_part("/templates/sidebar"); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <div class="about-left"<?php post_class(); ?>>
                    <div class="title-article">
                        <?php the_title(); ?>
                    </div>
                    <div class="about-desc">
                        <?php the_content(); ?>
                    </div>
                        <?php
                        // Find connected pages
                        $connected = new WP_Query(array(
                            'connected_type' => 'page_to_resource',
                            'connected_items' => $post,
                            'nopaging' => true
                        ));

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

                            <?php
                        endwhile;

                            wp_reset_postdata(); // set $post back to original post
                        ?>
                </div>
            </div>
            <div class="col-md-4 col-sm-5 hidden-xs">
                <?php get_template_part("/templates/sidebar"); ?>
            </div>
        </div>
    </div>
</div>
<?php
$show_share_links = get_post_meta(get_the_ID(), 'show', TRUE);
if (!isset($show_share_links) || $show_share_links != "no") {
    echo do_shortcode('[wbb-share-links]');
}
?>