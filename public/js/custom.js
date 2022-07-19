$(function () {

    $(window).on('scroll', function () {
        if ($('.header').length) {
            var headerScrollPos = 100;
            var stricky = $('.header');
            if ($(window).scrollTop() > headerScrollPos) {
                stricky.addClass('header-sticky');
            } else if ($(this).scrollTop() <= headerScrollPos) {
                stricky.removeClass('header-sticky');
            }
        }
        if ($('.scroll-to-top').length) {
            var strickyScrollPos = 100;
            if ($(window).scrollTop() > strickyScrollPos) {
                $('.scroll-to-top').fadeIn(500);
            } else if ($(this).scrollTop() <= strickyScrollPos) {
                $('.scroll-to-top').fadeOut(500);
            }
        }
  
    });





    let homeSlideSwiper = new Swiper(".home-slide .swiper", {
        spaceBetween: 0,
        speed: 500,
        loop: false,
         autoplay: {
             delay: 3500,
             disableOnInteraction: false,
             pauseOnMouseEnter: true
         },
        navigation: {
            nextEl: ".home-slide .swiper .swiper-button-next",
            prevEl: ".home-slide .swiper .swiper-button-prev"
        },
        mousewheel: false,
        keyboard: false,
    })
})