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
    
    var mySwiper = new Swiper(".property-details-main .swiper-container", {
        spaceBetween: 1,
        // slidesPerView: 3,
        centeredSlides: true,
        roundLengths: true,
        loop: true,
        loopAdditionalSlides: 30,
        speed: 3000,
        autoplay: {
            delay: 6500,
            disableOnInteraction: false,
        },
        navigation: {
        nextEl: ".property-details-main .swiper-button-next",
        prevEl: ".property-details-main .swiper-button-prev"
        },
        breakpoints: {
            767: {
                slidesPerView: 2,
                // spaceBetween: 30,
            },
            1200: {
                slidesPerView: 3,
            },
        },
    });

    let homeSlideSwiper = new Swiper(".home-slide .swiper", {
        spaceBetween: 0,
        speed: 500,
        loop: false,
        //  autoplay: {
        //      delay: 3500,
        //      disableOnInteraction: false,
        //      pauseOnMouseEnter: true
        //  },
        navigation: {
            nextEl: ".home-slide .swiper .swiper-button-next",
            prevEl: ".home-slide .swiper .swiper-button-prev"
        },
        mousewheel: false,
        keyboard: false,
    });

    let proSlideSwiper = new Swiper(".pro-details-slide .swiper", {
        slidesPerView: 1,
        spaceBetween: 0,
        speed: 3000,
        loop: true,
        autoplay: {
            delay: 6500,
            disableOnInteraction: false,
            // pauseOnMouseEnter: true
        },
        effect:"fade",
        coverflowEffect: {
            rotate: 90,
            slideShadows: false,
        },
        navigation: {
            nextEl: ".pro-details-slide .swiper .swiper-button-next",
            prevEl: ".pro-details-slide .swiper .swiper-button-prev"
        },
        mousewheel: false,
        keyboard: false,
    })

    /*** agent-swiper ***/
    let agentslider = new Swiper(".agent-swiper .swiper", {
        slidesPerView: 2,
        spaceBetween: 50,
        speed: 500,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        mousewheel: false,
        keyboard: false,
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            992: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            1199: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
        },
    })

    // Slider 3
         var slider = new Swiper ('.home-slide2 .gallery-slider', {
            slidesPerView: 1,
            centeredSlides: true,
            loop: true,
            loopedSlides: 6,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        //サムネイルスライド
        var thumbs = new Swiper ('.home-slide2 .gallery-thumbs', {
            slidesPerView: 'auto',
            spaceBetween: 10,
            centeredSlides: true,
            loop: true,
            slideToClickedSlide: true,
        });

        //3系
        //slider.params.control = thumbs;
        //thumbs.params.control = slider;

        //4系～
        slider.controller.control = thumbs;
        thumbs.controller.control = slider;
    
});

