(function ( $ ) {
    "use strict";

    $(function () {
        
       /*
       $(document).on("click", ".js-select-tw-tweet", function(){
           
           var account  = $(this).parents(".admin_widget_container").find(".js-tw_account").val();
           var n_tweets = 2
           
           var data = {
                  action: "get_n_tweets_from"
                , account: account
                , n_tweets: n_tweets
            };

            $.post(MyAjax.ajaxurl, data, function(tweets){

                alert(tweets)
                for(var x = 0; x < tweets.length; x++)
                {
                    //$(this).parents(".admin_widget_container").find(".tweets_list_container ul").append( tweets[x].text )
                    //$(".tweets_list_container ul").html( tweets[x].text );
                    $(".tweets_list_container ul").html( x );
                }
                

            }, "json");
           
       });     
       */
    });

}(jQuery));
