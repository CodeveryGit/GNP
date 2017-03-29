<?php
/*
  Template Name:  Home
 */
?>
<div class="news-updates">
    <div class="container">
        <div class="row">
            <div class="news-title">
                <p>News & updates</p>
            </div>

            <div class="news-articles">
                    <?php get_template_part("/templates/components/comp-news-items"); ?>
            </div>
        </div>
    </div>
</div>
<?php dynamic_sidebar('banner_newsletter_sidebar'); ?>
<div class="campaigns">
    <div class="container">
        <div class="row">
            <div class="news-title">
                <p>Campaigns</p>
            </div>

            <div class="banner-items">

                <?php get_template_part("/templates/components/comp-banner-items"); ?>
            </div>
        </div>
    </div>
</div>
<?php get_template_part("/templates/components/comp-resources-items"); ?>
