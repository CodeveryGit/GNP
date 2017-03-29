<div class="slideshow-item">

    <div class="item <?echo ( $flag ) ? "active" : "";
          ( $flag ) ? $flag = false : "";?>">

          <div class="row">

                <div class="col-md-12">

                    <div class="slideshow-content">
                        <? if($t_link == 1){ ?> 
                          <a href="<?php echo $linkurl_slideshow ?>">

                                <span class="h2 titleSlideshow"> <?php the_title (); ?></span>

                          </a>
                        <? }  else{ ?> 
                        <span class="h2 PtitleSlideshow"> <?php the_title (); ?></span>
                         <? } ?>
                    </div>

                    <div class="slideshow-image">
                          <? if($t_link == 1){ ?> 
                            <a href="<?php echo $linkurl_slideshow ?>">

                                  <img class="carousel-image" src="<?php echo $url; ?>"/>

                            </a>
                          <? }  else{ ?>   
                                <img class="carousel-image" src="<?php echo $url; ?>"/>
                          <? } ?>
                    </div>
                </div>

          </div>

    </div>

</div>


