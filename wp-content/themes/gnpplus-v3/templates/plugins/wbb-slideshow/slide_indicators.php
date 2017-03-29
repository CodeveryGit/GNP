<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$active_rows = wbb_slideshow_get_active_rows(); 
?>
<div class="slideshow-indicators">
	  <?
		while ( $active_rows >= ( $counter + 1 ) )

		{
		    ?>

		    <li data-target="#headerCarousel" data-slide-to="<? echo $counter ?>"
			  class="<? echo ( $flag ) ? "active" : "";
				( $flag ) ? $flag = false : ""; ?>"></li>
		    <?$counter ++;

		}      ?>
    </div>
