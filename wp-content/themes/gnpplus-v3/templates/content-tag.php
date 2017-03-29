<section id="content-category">

    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <div class="category-list-container">




                    <?php
                    // Check if there are any posts to display
                    if ( have_posts () ) : ?>

                    <div class="header-category">

                        <h2 class="title title-page"><?php single_cat_title (); ?></h2>

                    </div>
                    <ul class="list-unstyled list-category">

                        <?php

                        // The Loop
                        while ( have_posts () ) : the_post (); ?>

                            <?php get_template_part("/templates/components/comp-media-item-category"); ?>



                        <?php endwhile; // End Loop ?>

                        <?php wbb_pagination();?>

                        <?php else: ?>

                            <p>Sorry, no posts matched your criteria.</p>




                        <?php endif; ?>


                    </ul>






                </div>

            </div>

            <div class="col-md-4">

                <?php get_template_part("/templates/sidebar"); ?>

            </div>

        </div>

    </div>

</section>
