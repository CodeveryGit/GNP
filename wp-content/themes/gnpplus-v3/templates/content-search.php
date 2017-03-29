<section id="content-archive" class="news-gnp">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-8 col-md-8">

                <div class="overview-search">

		<?php if ( have_posts () ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf ( __ ( 'Search Results for: %s' , 'webberty' ) , '<span>' . get_search_query () . '</span>' ); ?></h1>
			</header>


			<?php /* Start the Loop */ ?>

            <ul class="list list-unstyled list-search-items row">


			<?php while ( have_posts () ) : the_post (); ?>



                <?php get_template_part("/templates/components/comp-media-item-category"); ?>


			<?php endwhile; ?>

                </ul>

            <?php wbb_pagination();?>


		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e ( 'Nothing Found' , 'webberty' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e ( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.' , 'webberty' ); ?></p>
					<?php get_search_form (); ?>
				</div>
				<!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

            </div></div>

                <div class="col-xs-12 col-sm-4 col-md-4">

                    <?php get_template_part("/templates/sidebar"); ?>

                </div>

            </div>

        </div>

</section>
