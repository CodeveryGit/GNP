<div class="news-article">
    <div class="row">
        <div class="col-xs-3">

            <a class="art-img" href="<?php the_permalink() ?>" rel="bookmark"
               title="Permanent Link to <?php the_title_attribute(); ?>">

                <?php the_post_thumbnail('thumbnail'); ?>

            </a>
        </div>
        <div class="col-xs-9">
            <div class="art-desc">
                <p class="date">
                    <?php the_time('F jS') ?>, <?php the_time('Y') ?>
                </p>
                <p class="art-title">
                    <a href="<?php the_permalink() ?>" rel="bookmark"
                       title="Permanent Link to <?php the_title_attribute(); ?>">
                        <?php the_title(); ?>
                    </a>
                </p>
                <p class="art-text">
                    <?php echo get_the_excerpt(); ?>
                    <a href="<?php the_permalink() ?>" rel="bookmark"
                       title="Permanent Link to <?php the_title_attribute(); ?>">→</a>
                </p>
            </div>
        </div>
    </div>
</div>



