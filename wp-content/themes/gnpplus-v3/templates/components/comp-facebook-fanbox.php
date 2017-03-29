<div class="comp comp-small comp-facebook-fanbox <?php if(is_front_page() ){echo "masonry-news-item";} ?>">
    <div class="block">
    

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_EN/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div 
        class="fb-like-box" 
        data-href="https://www.facebook.com/<?php echo $variation["facebook_account"]?>" 
        data-width="232" 
        data-height="290" 
        data-colorscheme="light" 
        data-show-faces="true" 
        data-header="false" 
        data-stream="false" 
        data-show-border="false"
    ></div>

    </div>
    
</div>
