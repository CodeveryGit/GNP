<div class="comp comp-small comp-twitter-feed <?php if(is_front_page() ){echo "masonry-news-item";} ?>">

        <div class="block">

            <div class="title title-block">

                <h2>TWITTER</h2>

            </div>

            <ul class="list list-twitter list-unstyled">

                <?php
                if( !isset( $variation["n_tweets"] ) )
                {
                    $variation["n_tweets"] = 3;
                }
                
                $twitter_account = get_option("_default_twitter_account", true);
                
                $tweets = WBB_Twitter::get_n_tweets_from($twitter_account, $variation["n_tweets"]);
                
                for( $t = 0; $t < count($tweets); $t++ )
                {
                    ?>
                    <li class="item item-twitter">
                        
                        <?php echo $tweets[$t]["text"];?>
                        <div class="twitter-time"><?php echo date("d/m/y", $tweets[$t]["date"]);?></div>

                    </li>
                    <?php
                        
                }
                
                ?>

            </ul>

            <div class="twitter-footer">

                <a href="https://twitter.com/gnpplus">Check more updates <br/> on twitter</a>

            </div>

        </div>


</div>
