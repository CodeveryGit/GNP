var msnry_news;
var msnry_banner;
(function ( $ ) {
    "use strict";

    $(function () {

        //PUSH MENU :: OPEN

        $(document).on("click", ".comp-push-menu a", function(event){

            event.preventDefault();
            $(".pushed-menu-container").addClass("active");

            if( $(window).width() >= 768 )
            {
                var mleft = $(".pushed-menu-container").outerWidth()-15;
                $(".site-content").css("margin-left", mleft);
            }

            $(this).fadeOut(250)

        });
        //PUSH MENU :: CLOSE
        $(document).on("click", ".push-menu-close a", function(event){

            event.preventDefault();
            $(".pushed-menu-container").removeClass("active");


            $(".site-content").css("margin-left", 0);

            $(".comp-push-menu a").fadeIn(250)

        });


        $(document).ready(function() {

            var screen_size = $(window).width()

            if( $(".js-msry-news").length > 0 && ( screen_size >= 768 ) )
            {
                init_msry_news();
            }

            if( $(".js-msry-banner").length > 0  && ( screen_size >= 768 ) )
            {
                $('.comp-banner-items .comp-small').first().parent().insertBefore($('.comp-banner-items .comp-large').parent());
                var col_width = $('.container').width()/4;
                $('.comp-small').css('width',col_width-25);
                $('.comp-large').css('width',2*col_width-25);
                $('.masonry-banner-item').css('height',"");
                init_msry_banner();
            }
            else if($(".js-msry-banner").length > 0){
                $('.comp-banner-items .comp-small').first().parent().insertAfter($('.comp-banner-items .comp-large').parent());
                var col_width = $('.container').width()/2;
                $('.comp-small').css('width',col_width-25);
                $('.comp-large').css('width',col_width*2-25);
                $('.masonry-banner-item').css('height',"");
                init_msry_banner();

            }

        });

        $(window).resize(function(){

            if( $(".js-msry-banner").length > 0  && $(window).width() >= 768 )
            {
                $('.comp-banner-items .comp-small').first().parent().insertBefore($('.comp-banner-items .comp-large').parent());
                var col_width = $('.container').width()/4;
                $('.comp-small').css('width',col_width-25);
                $('.comp-large').css('width',2*col_width-25);
                $('.masonry-banner-item').css('height',"");
                init_msry_news();
                init_msry_banner();
            }
            else if($(".js-msry-banner").length > 0 ){
                $('.comp-banner-items .comp-small').first().parent().insertAfter($('.comp-banner-items .comp-large').parent());

                var col_width = $('.container').width()/2;
                $('.comp-small').css('width',col_width-25);
                $('.comp-large').css('width',col_width*2-25);
                $('.masonry-banner-item').css('height',"");

                init_msry_news();
                init_msry_banner();
            }

        })

        function init_msry_news(){

            var container = document.querySelector('.js-msry-news');
            var col_width = $('.container').width()/4;

            if(typeof msnry_news == "object" && typeof msnry_news.element != "undefined"){
                msnry_news.destroy();

            }
            //else{
                msnry_news = new Masonry( container, {
                    // options
                    columnWidth: col_width,
                    itemSelector: '.masonry-news-item',
                    gutter: 0
                });
            //}

        }

        function init_msry_banner(){


            //Banner MASONRY
            var container = document.querySelector('.js-msry-banner');
            var col_width = $('.container').width()/4;

            if(typeof msnry_banner == "object" && msnry_banner.element != "undefined"){
                msnry_banner.destroy();
            }
           //else{
                msnry_banner = new Masonry( container, {
                    // options
                    columnWidth: col_width,
                    itemSelector: '.masonry-banner-item',
                    gutter: 0
                });
            //}

        }


    });

}(jQuery));

