<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="block block-xlarge block-xlarge-slideshow">
    
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="5000">
    <!-- Indicators -->


    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php  

//        $slide_id = 150;
//        $content = "Dummy message";
        wbb_slideshow_loop($slide_id,$content, $content_background_color);?>
        
    </div>

    <!-- Controls -->
    <?php wbb_slideshow_controls($slide_id);?>
<!--    <a class="left carousel-control wide-left" href="#carousel-example-generic" data-slide="prev">
        <span class="carousel-left-button">
            <img src="<?php wbb_theme_img("slideshow-left-arrow.png"); ?>">
        </span>
    </a>
    <a class="right carousel-control wide-right" href="#carousel-example-generic" data-slide="next">
        <span class="carousel-right-button">
            <img src="<?php wbb_theme_img("slideshow-right-arrow.png"); ?>">
        </span>
    </a>-->
    </div>
    
</div>
