$(document).ready(function() {

    $("#owl-demo").owlCarousel({
        items : 4,
        margin: 10,
//            lazyLoad : true,
        navigation : true,
        navigationText : false
    });

    $('.head_search').on('click',function(e){
        if($(this).parent().find('.head_input').val() == ""){
            e.preventDefault();
            $(this).parent().find('.head_input').toggleClass('is-open')
        }
    })
    $('.list1').on('click',function(e){
        console.log(e.target);
        if($(e.target).parent().hasClass("accordion-all")){
            e.preventDefault();
            $('.rec-list1').toggleClass('open')
        }
    })
    $('.list2').on('click',function(e){
        console.log(e.target);
        if($(e.target).parent().hasClass("accordion-all")){
            e.preventDefault();
            $('.rec-list2').toggleClass('open')
        }
    })
    $('.list3').on('click',function(e){
        console.log(e.target);
        if($(e.target).parent().hasClass("accordion-all")){
            e.preventDefault();
            $('.rec-list3').toggleClass('open')
        }
    });
    $(window).on('resize load',function(){
        //if( $('body').width() < 751){

        //if( $('.mobile-width').is(":visible")){
           $('.margin-top-header').css('margin-top',$('.navbar.navbar-fixed-top').height())
        //}else{
        //    $('.margin-top-header').css('margin-top', 110)
        //    $('#bs-example-navbar-collapse-1').css('margin-top', 0)
        //
        //}
    });
    $('.searchandfilter div > ul > li').last().hide();
    $('.searchandfilter input').on('change',function(){
        if($(this).val() == 0){
            window.location = "/news/";
        }
        else{
            $(this).parents('form').submit();
        }
    });
    $('.menu-news input').on('change',function(){
        window.location = $(this).attr('data-href');
    });
    //$('.accordion').find('input[type=checkbox]').on('click', function () {
    //    $(this).setAttribute('checked', 'checked')
    //})
});