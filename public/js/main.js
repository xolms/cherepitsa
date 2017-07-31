function pausevideo(t) {
    var o = document.getElementById(t);
    o.pause()
}
jQuery(document).ready(function(t) {
    t(".head__arrow").click(function(o) {
        o.preventDefault(), t("html, body").animate({
            scrollTop: t(".section_video").offset().top
        }, 500)
    }), 
    t(".sec1__bottom").click(function(o) {
        o.preventDefault(), t(this).toggleClass("active"), t(".slider__text").slideToggle(), t(".slider__text").show() && t("html, body")
    }),
    t(".sec2__bottom").click(function(o) {
        o.preventDefault(), t(this).toggleClass("active"), t(".ask__bottom").slideToggle(), t(".ask__bottom").show() && t("html, body").animate({
            scrollTop: t(".ask__bottom").offset().top
        }, 500)
    }), t(".sec5__bottom").click(function(o) {
        o.preventDefault(), t("html, body").animate({
            scrollTop: t(".section_form").offset().top
        }, 500)
    }), t(".contact-form__checkbox").change(function() {
        t(this).prop("checked") ? t(this).parent().addClass("checked") : t(this).parent().removeClass("checked")
    }), t(".contact-form__drop").click(function(o) {
        o.preventDefault(), t(".contact-form__dropdown").slideToggle()
    }), t(".input__phone").mask("+7(999) 999-9999"), t(".form__footer span").click(function(o) {
        o.preventDefault(), t(".section_map").css('height', 'auto'), t("html, body").animate({
            scrollTop: t(".section_map").offset().top
        }, 500)
    }), t(".upp").click(function(o) {
        o.preventDefault(), t("html, body").animate({
            scrollTop: t(".head").offset().top
        }, 500)
    }), t(".slider").owlCarousel({
        items: 1,
        dots: true,
        dotData: true,
        dotsEach: true,
        nav: !0,
        autoHeight: !0,
        navText: ["", ""]

    }),

    setInterval(function(){
       $(".owl-carousel").each(function(){
           $(this).data('owl.carousel')._invalidated.width = true;
           $(this).trigger('refresh.owl.carousel');
       });
   },500);
    $(".head__toogle .mobile-button").click(function () {
        $(".head__toogle .mobile-button").toggleClass("on");
        $(".nav").fadeToggle();
        $('body').toggleClass('body_fixed');
    });
    $('.nav a').click(function (e) {
        e.preventDefault();
        var href = $(this).attr('href');
        $(".head__toogle .mobile-button").removeClass('on');
        $('.nav').fadeOut();
        $('body').removeClass('body_fixed');
        t("html, body").animate({
           scrollTop: t(href).offset().top
        }, 500);
        return false;
    });
    $('.button__ask').click(function (e) {
        e.preventDefault();
        $('.modal__ask').slideDown();
    });
    $('.button__consul').click(function (e) {
        e.preventDefault();
        $('.modal__consul').slideDown();
    });
    $('.section__modal .mobile-button').click(function (e) {
       e.preventDefault();
        $('.section__modal').slideUp();
    });

    t(".blog__wrapper").owlCarousel({
        items: 3,
        dots: !0,
        nav: !0,
        navText: ["", ""],
        responsive: {
            0: {
                items: 1
            },
            992: {
                items: 3
            }
        }
    }), t(".reviews__wrapper").owlCarousel({
        items: 3,
        dots: !0,
        nav: !0,
        autoHeight: !0,
        navText: ["", ""],
        responsive: {
            0: {
                items: 1
            },
            992: {
                items: 3
            }
        }
    })

});
