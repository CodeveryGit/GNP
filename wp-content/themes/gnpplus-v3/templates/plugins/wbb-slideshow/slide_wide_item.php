<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="item <?php
if ($counter == 0) {
    echo "active";
}

?>">
    <div class="row">
        <div class="col-md-6">
                <?php if ($link != "") { ?>
                <a href="<?php echo $link; ?>" target="_blamk">
                <?php } ?>
                <?php echo $img; ?>
                    <?php if ($link != "") { ?>
                        </a>
                    <?php } ?>
            <div class="carousel-caption">
                Caption item 1
            </div>
        </div>

        <div class="col-md-6 block-large block-large-intro background-color-<?php echo $color;?>-1">
            <div class="block-inner">
            <div class="content content-large"> 
                <?php echo $slide_content;?>
            </div>
            </div>
            
        </div>
    </div>

</div>
