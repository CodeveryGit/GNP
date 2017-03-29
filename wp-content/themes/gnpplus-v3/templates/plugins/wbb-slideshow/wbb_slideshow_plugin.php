<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="block-large-slideshow">
    <div id="carousel-example-generic" class="carousel carousel-fade slide" data-ride="carousel" data-interval="5000">
        <!-- Indicators -->


        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php wbb_slideshow_loop($slide_id, $content); ?>
        </div>

        <!-- Controls -->
        <?php wbb_slideshow_controls($slide_id); ?>

    </div>

</div>
