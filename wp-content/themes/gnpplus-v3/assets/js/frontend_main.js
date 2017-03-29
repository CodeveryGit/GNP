(function ($) {
    "use strict";






    $(document).ready(function () {

        $('.sub-menu li').each(function () {
            if ($(this).hasClass("current-menu-item"))
            {
                $(this).parents(".sub-menu").addClass('visible');
            } else {
            }
        });


    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 1) {
            $('.header-container').addClass("sticky");
        }
        else {
            $('.header-container').removeClass("sticky");
        }
    });


    $("#signup-form").submit(function (e) {
        e.preventDefault();

        var $form = $(this),
                name = $form.find('input[name="name"]').val(),
                email = $form.find('input[name="email"]').val(),
                url = $form.attr('action');

        $.post(url, {name: name, email: email},
        function (data) {
            if (data)
            {
                if (data == "Some fields are missing.")
                {
                    $("#status").text("Please fill in your name and email.");
                    $("#status").css("color", "red");
                }
                else if (data == "Invalid email address.")
                {
                    $("#status").text("Your email address is invalid.");
                    $("#status").css("color", "red");
                }
                else if (data == "Invalid list ID.")
                {
                    $("#status").text("Your list ID is invalid.");
                    $("#status").css("color", "red");
                }
                else if (data == "Already subscribed.")
                {
                    $("#status").text("You're already subscribed!");
                    $("#status").css("color", "red");
                }
                else
                {
                    $("#status").text("You're subscribed!");
                    $("#status").css("color", "green");
                }
            }
            else
            {
                alert("Sorry, unable to subscribe. Please try again later!");
            }
        }
        );
    });
    $("#signup-form").keypress(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            $(this).submit();
        }
    });
    $("#submit-btn").click(function (e) {
        e.preventDefault();
        $("#signup-form").submit();
    });




    $(document).on("click", "a", function (e)
    {

       
        var link = this.href;
        if (link.indexOf('#advocacy') != -1) {
             //e.preventDefault();
            $('html, body').animate({scrollTop: $('#advocacy').offset().top -200 }, 'slow');
        }
        
        if (link.indexOf('#knowledge_management') != -1) {
             //e.preventDefault();
            $('html, body').animate({scrollTop: $('#knowledge').offset().top -200 }, 'slow');
        }
        
        
        if (link.indexOf('#community_development') != -1) {
             //e.preventDefault();
            $('html, body').animate({scrollTop: $('#community').offset().top -200 }, 'slow');
        }

    });




}(jQuery));

