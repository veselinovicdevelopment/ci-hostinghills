$(document).ready(function () {

    var domain_name = '';
    var type = '';
    var domain_name = '';
    var error = false;
    var name = '';


    $('.vertical li:has(ul)').addClass('parent');
    $('.horizontal li:has(ul)').addClass('parent');


    $('#Transfer').on('click', function (e) {
        e.preventDefault();
        name = $('#searchBar').val();
        if (checkName(name)) {
            type = 'Domain Transfer';

            if (name != '') {
                var ext = $('#ext').find('option:selected').val();
                domain_name = name + "." + ext;
                $(this).hide();
                $('#checking').show();
                checkAvailability();
            }
            else {
                swal("Empty Search!", "Please enter a domain name", "warning");
            }
        }

    });





    $('#btnSearch').on('click', function (e) {
        e.preventDefault();
        name = $('#searchBar').val();
        if (checkName(name)) {
            type = 'Domain Registration';

            if (name != '') {
                var ext = $('#ext').find('option:selected').val();
                domain_name = name + "." + ext;
                $(this).hide();
                $('#checking').show();
                checkAvailability();
            }
            else {
                swal("Empty Search!", "Please enter a domain name", "warning");
            }
        }

    });








    $.fn.searchAgain = function () {
        $('#response').hide(500);
    }



    //The actual request to check availability
    function checkAvailability() {

        $.ajax({
            url: base_url + 'domains/check_availability',
            type: 'POST',
            data: {
                domain: domain_name,
                type: type
            },
            dataType: 'json',
            success: function (data) {
                $('#domain').val(data.domain);
                $('#price').val(data.price);
                $('#type').val(type);
                $('#checking').hide();
                $('#btnSearch').show();
                $('#continue').hide();
                $('#searchBar').val('');
                $('#Transfer').show();
                $('#textBar').val('');
                $('#response').html(data.result).slideDown(500);
            },

            error: function (data) {
                $('#checking').hide();
                $('#btnSearch').show();
                $('#Search').show();
                $('#Transfer').show();
            }
        });
    }




    function checkName(name) {
        if (name.indexOf('.') !== -1) {
            swal("Invalid Domain!", "Please enter the name only and select the extension", "warning");
            $('#checking').hide();
            $('#btnSearch').show();
            $('#Transfer').show();
            return false;
        }

        return true;

    }



    $('#cart').on('click', '#add_available', function () {
        $('#cart').submit();
    });




    $.fn.continueOrder = function () {
         
       if (window.location.href == base_url + 'cart/domain') {
            $('.search_form').submit();
        }

        else {
            $.ajax({
                url: base_url + 'cart/add_domain',
                type: 'post',
                data: $("#search_form").serialize(),
                success: function (data) {
                    $('#response').slideUp(500);
                    $('#continue').slideDown(500);
                },
                error: function (data) {

                }
            });
        }
    }




    $('.carousel').carousel({
        interval: 4000
    });




    var winScroll = $(window).scrollTop();
    winScroll > 1 ? $("#to-top").css({
        bottom: "10px"
    }) : $("#to-top").css({
        bottom: "-100px"
    }), $(window).on("scroll", function () {
        winScroll = $(window).scrollTop(), winScroll > 1 ? $("#to-top").css({
            opacity: 1,
            bottom: "30px"
        }) : $("#to-top").css({
            opacity: 0,
            bottom: "-100px"
        })
    }), $("#to-top").on('click', function () {
        return $("html, body").animate({
            scrollTop: "0px"
        }, 800), !1
    });


});