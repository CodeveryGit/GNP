/**
 * Created by softmixt on 14/11/13.
 */
jQuery(document).ready(function($) {
//declare functions here
    $.fn.filterFunction = function(ulClass, containerResult) {

        $(this).click(function() {
            var filters_country = [];

            var filters_evidences = [];

            var filters_topics = [];

            var filters_region = [];

            var filters_population = [];

            var filters_search = "";

            var filters_year = "";

            //Add Check Mark to the right item
            if ($(this).attr('data-filter') === "all") {

                $(ulClass + ' li').removeClass("active");

                $(this).addClass("active");

            }
            else {

                $(ulClass + " [data-filter='all']").removeClass("active");

                if ($(this).hasClass("active")) {

                    $(this).removeClass("active")

                }
                else {
                    $(this).addClass("active")
                }

                if (!$(ulClass + ' li').hasClass("active")) {

                    $(ulClass + ' li').first().addClass("active");
                }

            }


            $(".sort-list-country .active").each(function() {

                if ($(".sort-list-country li").hasClass("active")) {
                    filters_country.push($(this).attr('data-filter'));
                }

            });

            $(".sort-list-evidences .active").each(function() {

                if ($(".sort-list-evidences li").hasClass("active")) {
                    filters_evidences.push($(this).attr('data-filter'));
                }

            });

            $(".sort-list-topics .active").each(function() {

                if ($(".sort-list-topics li").hasClass("active")) {
                    filters_topics.push($(this).attr('data-filter'));
                }

            });

            $(".sort-list-region .active").each(function() {

                if ($(".sort-list-region li").hasClass("active")) {
                    filters_region.push($(this).attr('data-filter'));
                }

            });

            $(".sort-list-population .active").each(function() {

                if ($(".sort-list-population li").hasClass("active")) {
                    filters_population.push($(this).attr('data-filter'));
                }

            });

//            var page = $(".total_results").attr("page");
            var page = 1

            var filters_search = $('#resources_search').val();

            var filters_year = $('#year_search').val();

            initials(filters_country, filters_evidences, filters_topics, filters_region, filters_population, page, filters_search, filters_year, containerResult);

        });


    }

    function initials(filters_country, filters_evidences, filters_topics, filters_region, filters_population, page, filters_search, filters_year, filterContainer) {
        //Start Ajax Filters Call
        var data = {
            action: 'getMePost',
            filters_country: filters_country,
            filters_evidences: filters_evidences,
            filters_topics: filters_topics,
            filters_region: filters_region,
            filters_population: filters_population,
            page: page,
            filters_search: filters_search,
            filters_year: filters_year,
            n_elements: 4
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        $.post(MyAjax.ajaxurl, data, function(response) {
            $(".total_results").attr("data-page", page);
            var containerResult = filterContainer;
            $(containerResult).fadeOut(250, function() {

                $(containerResult).html(response);

                $(containerResult).fadeIn(250)

            });

        });
    }


    $(".sort-list-country li").filterFunction('.sort-list-country ', "#filterContainer ul");

    $(".sort-list-evidences li").filterFunction('.sort-list-evidences ', "#filterContainer ul");

    $(".sort-list-topics li").filterFunction('.sort-list-topics ', "#filterContainer ul");

    $(".sort-list-region li").filterFunction('.sort-list-region ', "#filterContainer ul");

    $(".sort-list-population li").filterFunction('.sort-list-population ', "#filterContainer ul");

    initials(['all'], ['all'], ['all'], ['all'], ['all'], 1, '', '', '#filterContainer ul');


    jQuery(document).on("click", ".filters_pagination_front li", function() {

        $(".total_results").attr("data-page", $(this).attr('data-page'));


        var ulClass = '.filters_pagination_front';
        var filters_country = [];

        var filters_evidences = [];

        var filters_topics = [];

        var filters_region = [];

        var filters_population = [];

        //Add Check Mark to the right item
        if ($(this).attr('data-filter') === "all") {

            $(ulClass + 'filters_pagination_front li').removeClass("active");

            $(this).addClass("active");

        }
        else {

            $(ulClass + " [data-filter='all']").removeClass("active");

            if ($(this).hasClass("active")) {

                $(this).removeClass("active")

            }
            else {
                $(this).addClass("active")
            }

            if (!$(ulClass + ' li').hasClass("active")) {

                $(ulClass + ' li').first().addClass("active");
            }

        }


        $(".sort-list-country .active").each(function() {

            if ($(".sort-list-country li").hasClass("active")) {
                filters_country.push($(this).attr('data-filter'));
            }

        });

        $(".sort-list-evidences .active").each(function() {

            if ($(".sort-list-evidences li").hasClass("active")) {
                filters_evidences.push($(this).attr('data-filter'));
            }

        });

        $(".sort-list-topics .active").each(function() {

            if ($(".sort-list-topics li").hasClass("active")) {
                filters_topics.push($(this).attr('data-filter'));
            }

        });

        $(".sort-list-region .active").each(function() {

            if ($(".sort-list-region li").hasClass("active")) {
                filters_region.push($(this).attr('data-filter'));
            }

        });

        $(".sort-list-population .active").each(function() {

            if ($(".sort-list-population li").hasClass("active")) {
                filters_population.push($(this).attr('data-filter'));
            }

        });

        var page = $(".total_results").attr("data-page");

        var filters_search = $('#resources_search').val();

        var filters_year = $('#year_search').val();

        initials(filters_country, filters_evidences, filters_topics, filters_region, filters_population, page, filters_search, filters_year, '#filterContainer ul');

    });

    $('.search_box').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            alert("Enter key pressed");
        }
    });
    // ADD FOR SEARCH INPUT BOX
//     jQuery(document).on("click", ".search-icon-button", function () {
    $('#resources_search').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {

            //$(".total_results").attr("page", $(this).attr('page'));
            var filters_search = $('#resources_search').val();

            var filters_year = $('#year_search').val();


            var ulClass = '.filters_pagination_front';
            var filters_country = [];

            var filters_evidences = [];

            var filters_topics = [];

            var filters_region = [];

            var filters_population = [];

            //Add Check Mark to the right item
            if ($(this).attr('data-filter') === "all") {

                $(ulClass + 'filters_pagination_front li').removeClass("active");

                $(this).addClass("active");

            }
            else {

                $(ulClass + " [data-filter='all']").removeClass("active");

                if ($(this).hasClass("active")) {

                    $(this).removeClass("active")

                }
                else {
                    $(this).addClass("active")
                }

                if (!$(ulClass + ' li').hasClass("active")) {

                    $(ulClass + ' li').first().addClass("active");
                }

            }


            $(".sort-list-country .active").each(function() {

                if ($(".sort-list-country li").hasClass("active")) {
                    filters_country.push($(this).attr('data-filter'));
                }

            });

            $(".sort-list-evidences .active").each(function() {

                if ($(".sort-list-evidences li").hasClass("active")) {
                    filters_evidences.push($(this).attr('data-filter'));
                }

            });

            $(".sort-list-topics .active").each(function() {

                if ($(".sort-list-topics li").hasClass("active")) {
                    filters_topics.push($(this).attr('data-filter'));
                }

            });

            $(".sort-list-region .active").each(function() {

                if ($(".sort-list-region li").hasClass("active")) {
                    filters_region.push($(this).attr('data-filter'));
                }

            });

            $(".sort-list-population .active").each(function() {

                if ($(".sort-list-population li").hasClass("active")) {
                    filters_population.push($(this).attr('data-filter'));
                }

            });

//            var page = $(".total_results").attr("page");
            var page = 1;

            initials(filters_country, filters_evidences, filters_topics, filters_region, filters_population, page, filters_search, filters_year, '#filterContainer ul');
        }
    });


    // ADD FOR TAGS REMOVE WHEN CLICK IN TAG
    $(document).on("click", ".fa-times", function() {
        var id_filter = $(this).parents('.filter-results-list-item').attr('data-filter');
        if (id_filter == "search") {
            $("#resources_search").val("");
            var e = jQuery.Event('keypress');
            e.which = 13; // #13 = Enter key
            $("#resources_search").focus();
            $("#resources_search").trigger(e);
        }
        else {
            $("div.comp-resources-filter li[data-filter='" + id_filter + "']").click()
        }
    })




    // ADD FOR SEARCH INPUT BOX
    jQuery(document).on("click", ".remove-tag", function() {




        //$(".total_results").attr("page", $(this).attr('page'));
        var filters_search = $('#resources_search').val();

        var filters_year = $('#year_search').val();


        var ulClass = '.filters_pagination_front';
        var filters_country = [];

        var filters_evidences = [];

        var filters_topics = [];

        var filters_region = [];

        var filters_population = [];

        var filter = $(this).attr("data-filter");
//        alert(filter);
        if (filter == "search") {
            filters_search = "";
            $('input[name=resources_search]').val('');
        }

        if (filter == "year") {
            filters_year = "";
            $('input[name=year_search]').val('');
        }
        else {

            $("ul.sort-list-evidences").find("li[data-filter='" + filter + "']").removeClass("active");
            $("ul.sort-list-topics").find("li[data-filter='" + filter + "']").removeClass("active");
            $("ul.sort-list-country").find("li[data-filter='" + filter + "']").removeClass("active");
            $("ul.sort-list-population").find("li[data-filter='" + filter + "']").removeClass("active");
            $("ul.sort-list-region").find("li[data-filter='" + filter + "']").removeClass("active");
        }

        //Add Check Mark to the right item
        if ($(this).attr('data-filter') === "all") {

            $(ulClass + 'filters_pagination_front li').removeClass("active");

            $(this).addClass("active");

        }
        else {

            $(ulClass + " [data-filter='all']").removeClass("active");

            if ($(this).hasClass("active")) {

                $(this).removeClass("active")

            }
            else {
                $(this).addClass("active")
            }

            if (!$(ulClass + ' li').hasClass("active")) {

                $(ulClass + ' li').first().addClass("active");
            }

        }


        $(".sort-list-country .active").each(function() {

            if ($(".sort-list-country li").hasClass("active")) {
                filters_country.push($(this).attr('data-filter'));
            }

        });
        if (filters_country.length == 0) {
            $("ul.sort-list-country").find("li[data-filter='all']").addClass("active");
            filters_country.push('all');
        }

        $(".sort-list-evidences .active").each(function() {

            if ($(".sort-list-evidences li").hasClass("active")) {
                filters_evidences.push($(this).attr('data-filter'));
            }

        });

        if (filters_evidences.length == 0) {
            $("ul.sort-list-evidences").find("li[data-filter='all']").addClass("active");
            filters_evidences.push('all');
        }

        $(".sort-list-topics .active").each(function() {

            if ($(".sort-list-topics li").hasClass("active")) {
                filters_topics.push($(this).attr('data-filter'));
            }

        });
        if (filters_topics.length == 0) {
            $("ul.sort-list-topics").find("li[data-filter='all']").addClass("active");
            filters_topics.push('all');
        }

        $(".sort-list-region .active").each(function() {

            if ($(".sort-list-region li").hasClass("active")) {
                filters_region.push($(this).attr('data-filter'));
            }

        });
        if (filters_region.length == 0) {
            $("ul.sort-list-region").find("li[data-filter='all']").addClass("active");
            filters_region.push('all');
        }

        $(".sort-list-population .active").each(function() {

            if ($(".sort-list-population li").hasClass("active")) {
                filters_population.push($(this).attr('data-filter'));
            }

        });
        if (filters_population.length == 0) {
            $("ul.sort-list-population").find("li[data-filter='all']").addClass("active");
            filters_population.push('all');
        }

        var page = $(".total_results").attr("data-page");

        initials(filters_country, filters_evidences, filters_topics, filters_region, filters_population, page, filters_search, filters_year, '#filterContainer ul');

    });

});

//jQuery(window).load(function() {
//    $('#loading').hide();
//  });




