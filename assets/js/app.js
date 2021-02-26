// index
$(document).ready(function () {
    // owlCarousel
    $('#slider .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        // dots:false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            }
        }
    });
    // owlCarousel2
    $('#slider2 .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        // dots:false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            }
        }
    });



    // Back to top
    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#myBtn').fadeIn(800);
        } else {
            $('#myBtn').fadeOut(800);
        }
    });

    //Click event to scroll to top
    $('#myBtn').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });

    


});
