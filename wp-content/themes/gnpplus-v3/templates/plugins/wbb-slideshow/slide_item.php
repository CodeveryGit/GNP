<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="item <?php if($counter == 0){echo "active";}?>">
        <?php if($link != ""){?>
    <a href="<?php echo $link;?>" target="_blamk">
        <?php }?>
        <?php echo $img;?>
            <?php if($link != ""){?>
    </a>
        <?php }?>
<!--        <div class="carousel-caption">
            Caption item 1
        </div>-->
        </div>
