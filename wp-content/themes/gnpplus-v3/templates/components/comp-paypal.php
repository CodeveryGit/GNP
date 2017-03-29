<div class="comp comp-small comp-paypal <?php
if (is_front_page()) {
    echo "masonry-news-item";
}
?>">

    <div class="block">
        <div class="title title-block">

            <h2><?php echo $variation['title'];?></h2>

        </div>
        <div class="paypal-intro">

            <?php echo $variation['intro'];?>

        </div>
        <div class="newsletter-form">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="<?php echo $variation['button_code'];?>">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

        </div>
    </div>
</div>
