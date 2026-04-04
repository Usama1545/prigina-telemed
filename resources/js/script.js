/*
Author       : Dreamstechnologies
Template Name: PriGina Global Telemed - Bootstrap Template
Version      : 1.3
*/

(function ($) {
    "use strict";

    // Stick Sidebar

    if ($(window).width() > 767) {
        if ($(".theiaStickySidebar").length > 0) {
            $(".theiaStickySidebar").theiaStickySidebar({
                // Settings
                additionalMarginTop: 30,
            });
        }
    }

    // Sidebar

    if ($(window).width() <= 991) {
        var Sidemenu = function () {
            this.$menuItem = $(".main-nav a");
        };

        function init() {
            var $this = Sidemenu;
            $(".main-nav a").on("click", function (e) {
                if ($(this).parent().hasClass("has-submenu")) {
                    e.preventDefault();
                }
                if (!$(this).hasClass("submenu")) {
                    $("ul", $(this).parents("ul:first")).slideUp(350);
                    $("a", $(this).parents("ul:first")).removeClass("submenu");
                    $(this).next("ul").slideDown(350);
                    $(this).addClass("submenu");
                } else if ($(this).hasClass("submenu")) {
                    $(this).removeClass("submenu");
                    $(this).next("ul").slideUp(350);
                }
            });
        }

        // Sidebar Initiate
        init();
    }

    // JQuery counterUp

    if ($(".counter").length > 0) {
        $(".counter").counterUp({
            delay: 10,
            time: 2000,
        });
        $(".counter").addClass("animated fadeInDownBig");
    }

    // Textarea Text Count

    var maxLength = 100;
    $("#review_desc").on("keyup change", function () {
        var length = $(this).val().length;
        length = maxLength - length;
        $("#chars").text(length);
    });

    // Select 2

    if ($(".select").length > 0) {
        $(".select").select2({
            minimumResultsForSearch: -1,
            width: "100%",
        });
    }

    // consultation

    $(".consultation-types").on("click", function () {
        $(".consultation-types").removeClass("active");
        $(this).addClass("active");
    });

    // Date Time Picker

    $(function () {
        if ($(".datetimepicker").length > 0) {
            $(".datetimepicker").datetimepicker({
                format: "DD/MM/YYYY",
                icons: {
                    up: "fas fa-chevron-up",
                    down: "fas fa-chevron-down",
                    next: "fas fa-chevron-right",
                    previous: "fas fa-chevron-left",
                },
            });
        }
    });

    if ($(".timepicker1").length > 0) {
        $(".timepicker1").datetimepicker({
            format: "HH:mm A",
            debug: true,
            icons: {
                up: "fas fa-angle-up",
                down: "fas fa-angle-down",
                next: "fas fa-angle-right",
                previous: "fas fa-angle-left",
            },
        });
    }

    // AOS Animation

    if ($(".main-wrapper .aos").length > 0) {
        AOS.init({
            duration: 1200,
            once: true,
        });
    }

    // Floating Label

    if ($(".floating").length > 0) {
        $(".floating")
            .on("focus blur", function (e) {
                $(this)
                    .parents(".form-focus")
                    .toggleClass(
                        "focused",
                        e.type === "focus" || this.value.length > 0,
                    );
            })
            .trigger("blur");
    }

    // Mobile menu sidebar overlay

    $("body").append('<div class="sidebar-overlay"></div>');
    $(document).on("click", "#mobile_btn", function () {
        $("main-wrapper").toggleClass("slide-nav");
        $(".sidebar-overlay").toggleClass("opened");
        $("html").toggleClass("menu-opened");
        return false;
    });

    $(document).on("click", ".sidebar-overlay", function () {
        $("html").removeClass("menu-opened");
        $(this).removeClass("opened");
        $("main-wrapper").removeClass("slide-nav");
    });

    $(document).on("click", "#menu_close", function () {
        $("html").removeClass("menu-opened");
        $(".sidebar-overlay").removeClass("opened");
        $("main-wrapper").removeClass("slide-nav");
    });

    // Tooltip

    if ($('[data-bs-toggle="tooltip"]').length > 0) {
        var tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]'),
        );
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }

    // Add More Hours

    $(".hours-info").on("click", ".trash", function () {
        $(this).closest(".hours-cont").remove();
        return false;
    });

    $(".add-hours").on("click", function () {
        var hourscontent =
            '<div class="row hours-cont">' +
            '<div class="col-12 col-md-10">' +
            '<div class="row">' +
            '<div class="col-12 col-md-6">' +
            '<div class="mb-3">' +
            "<label>Start Time</label>" +
            '<select class="form-select form-control">' +
            "<option>-</option>" +
            "<option>12.00 am</option>" +
            "<option>12.30 am</option>" +
            "<option>1.00 am</option>" +
            "<option>1.30 am</option>" +
            "</select>" +
            "</div>" +
            "</div>" +
            '<div class="col-12 col-md-6">' +
            '<div class="mb-3">' +
            "<label>End Time</label>" +
            '<select class="form-select form-control">' +
            "<option>-</option>" +
            "<option>12.00 am</option>" +
            "<option>12.30 am</option>" +
            "<option>1.00 am</option>" +
            "<option>1.30 am</option>" +
            "</select>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
            "</div>";

        $(".hours-info").append(hourscontent);
        return false;
    });

    // Content div min height set

    function resizeInnerDiv() {
        var height = $(window).height();
        var header_height = $(".header").height();
        var footer_height = $(".footer").height();
        var setheight = height - header_height;
        var trueheight = setheight - footer_height;
        $(".content").css("min-height", trueheight);
    }

    if ($(".content").length > 0) {
        resizeInnerDiv();
    }

    $(window).resize(function () {
        if ($(".content").length > 0) {
            resizeInnerDiv();
        }
    });

    //owl carousel
    if ($(".owl-carousel.special").length > 0) {
        $(".owl-carousel.special").owlCarousel({
            loop: true,
            margin: 15,
            dots: true,
            nav: false,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                1000: {
                    items: 4,
                },
                1300: {
                    items: 4,
                },
            },
        });
    }

    //Eye Clicnic carousel

    if ($(".owl-carousel.eye-clinic").length > 0) {
        $(".owl-carousel.eye-clinic").owlCarousel({
            loop: true,
            margin: 15,
            dots: true,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
                1200: {
                    items: 4,
                },
            },
        });
    }

    //Eye Blog carousel

    if ($(".owl-carousel.eye-blogslider").length > 0) {
        $(".owl-carousel.eye-blogslider").owlCarousel({
            loop: true,
            margin: 15,
            dots: true,
            nav: false,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 4,
                },
            },
        });
    }

    //Eye Testimonial carousel

    if ($(".owl-carousel.eye-testislider").length > 0) {
        $(".owl-carousel.eye-testislider").owlCarousel({
            loop: true,
            margin: 15,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navContainer: ".slide-11",
            navText: [
                '<i class="fa-solid fa-arrow-left"></i>',
                '<i class="fa-solid fa-arrow-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                1300: {
                    items: 1,
                },
            },
        });
    }

    //Eye Testimonial carousel

    if ($(".owl-carousel.patient-review-slider").length > 0) {
        $(".owl-carousel.patient-review-slider").owlCarousel({
            loop: true,
            margin: 15,
            dots: true,
            nav: false,
            smartSpeed: 2000,
            navText: [
                '<i class="fa-solid fa-arrow-left"></i>',
                '<i class="fa-solid fa-arrow-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                1300: {
                    items: 1,
                },
            },
        });
    }

    // Specialities Slider

    if ($(".owl-carousel.specialities-slider-one").length > 0) {
        $(".owl-carousel.specialities-slider-one").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navContainer: ".slide-nav-1",
            navText: [
                '<i class="fas fa-chevron-left custom-arrow"></i>',
                '<i class="fas fa-chevron-right custom-arrow"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 6,
                },
            },
        });
    }

    // Feature Slider
    if ($(".owl-carousel.features-slider-sixteen").length > 0) {
        $(".owl-carousel.features-slider-sixteen").owlCarousel({
            loop: true,
            margin: 24,
            dots: true,
            nav: false,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 3,
                },
            },
        });
    }

    // Blog Slider

    if ($(".owl-carousel.blog-slider-twelve").length > 0) {
        $(".owl-carousel.blog-slider-twelve").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navContainer: ".slide-nav-16",
            navText: [
                '<i class="fa-solid fa-caret-left "></i>',
                '<i class="fa-solid fa-caret-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                575: {
                    items: 2,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 4,
                },
                1300: {
                    items: 4,
                },
            },
        });
    }

    // Our Doctor
    if ($(".owl-carousel.our-slider-thirteen").length > 0) {
        $(".owl-carousel.our-slider-thirteen").owlCarousel({
            loop: true,
            margin: 24,
            dots: true,
            nav: false,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                575: {
                    items: 2,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 3,
                },
            },
        });
    }

    // Doctor Slider

    if ($(".owl-carousel.doctor-slider-fifteen").length > 0) {
        $(".owl-carousel.doctor-slider-fifteen").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                575: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 3,
                },
            },
        });
    }

    if ($(".owl-carousel.client-says-thirteen").length > 0) {
        $(".owl-carousel.client-says-thirteen").owlCarousel({
            loop: true,
            margin: 24,
            dots: true,
            nav: false,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                575: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                1000: {
                    items: 1,
                },
                1300: {
                    items: 1,
                },
            },
        });
    }

    // Doctor Slider

    if ($(".owl-carousel.pharmacy-slider-fifteen").length > 0) {
        $(".owl-carousel.pharmacy-slider-fifteen").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                575: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 3,
                },
            },
        });
    }

    // Date Slider

    if ($(".date-slider").length > 0) {
        $(".date-slider").slick({
            dots: false,
            autoplay: false,
            infinite: true,
            variableWidth: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            swipeToSlide: true,
            responsive: [
                {
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    }

    // Testimonial Slider

    if ($(".testimonial-slider").length > 0) {
        $(".testimonial-slider").slick({
            dots: false,
            autoplay: false,
            infinite: true,
            speed: 2000,
            variableWidth: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            swipeToSlide: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    }

    // Partners Slider

    if ($(".owl-carousel.partners-slider").length > 0) {
        $(".owl-carousel.partners-slider").owlCarousel({
            loop: true,
            margin: 24,
            nav: true,
            autoplay: true,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1,
                },

                550: {
                    items: 1,
                },
                700: {
                    items: 4,
                },
                1000: {
                    items: 6,
                },
            },
        });
    }

    // Doctors Slider

    if ($(".owl-carousel.doctor-slider-one").length > 0) {
        $(".owl-carousel.doctor-slider-one").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navContainer: ".slide-nav-2",
            navText: [
                '<i class="fas fa-chevron-left custom-arrow"></i>',
                '<i class="fas fa-chevron-right custom-arrow"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 4,
                },
            },
        });
    }

    // Frequent Slider

    if ($(".owl-carousel.frequent-slider-fifteen").length > 0) {
        $(".owl-carousel.frequent-slider-fifteen").owlCarousel({
            loop: true,
            margin: 24,
            dots: true,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 3,
                },
            },
        });
    }

    // Team Slider
    if ($(".owl-carousel.team-fourteen-slider").length > 0) {
        $(".owl-carousel.team-fourteen-slider").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 4,
                },
            },
        });
    }

    // Blog Slider

    if ($(".owl-carousel.blog-slider-fourteen").length > 0) {
        $(".owl-carousel.blog-slider-fourteen").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                575: {
                    items: 2,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 3,
                },
            },
        });
    }

    // Pharmacy Slider

    if ($(".owl-carousel.pharmacy-slider-fifteen").length > 0) {
        $(".owl-carousel.pharmacy-slider-fifteen").owlCarousel({
            loop: true,
            margin: 10,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                575: {
                    items: 2,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 3,
                },
            },
        });
    }

    // Discover Slider

    if ($(".owl-carousel.discover-slider").length > 0) {
        $(".owl-carousel.discover-slider").owlCarousel({
            loop: true,
            margin: 10,
            dots: true,
            nav: false,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                575: {
                    items: 2,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 5,
                },
            },
        });
    }

    // Treatment Slider

    if ($(".owl-carousel.banner-sliderssurgery").length > 0) {
        var brandSlider = $(".banner-sliderssurgery");
        brandSlider.owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            nav: false,
            autoplay: true,
            items: 4.5,
            smartSpeed: 500,
            center: true,
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                575: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                1000: {
                    items: 4.5,
                },
                1300: {
                    items: 4.5,
                },
            },
        });
        function brandSliderClasses() {
            brandSlider.each(function () {
                var total = $(this).find(".owl-item.active").length;
                $(this).find(".owl-item").removeClass("activeset");
                $(this).find(".owl-item").removeClass("activeset");
                $(this)
                    .find(".owl-item.active")
                    .each(function (index) {
                        if (index === 2) {
                            $(this).addClass("activeset");
                        }
                    });
            });
        }
        brandSliderClasses();
        brandSlider.on("translated.owl.carousel", function (event) {
            brandSliderClasses();
        });
    }

    // Treatment Slider

    if ($(".owl-carousel.treatment-sixteen-slider").length > 0) {
        $(".owl-carousel.treatment-sixteen-slider").owlCarousel({
            loop: true,
            margin: 24,
            dots: true,
            nav: false,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                575: {
                    items: 2,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 4,
                },
            },
        });
    }

    //Choose Slider
    if ($(".about-us-section-fifteen .vertical-slider").length > 0) {
        $(".about-us-section-fifteen .vertical-slider").slick({
            dots: true,
            arrows: true,
            autoplay: false,
            centerMode: true,
            infinite: true,
            rows: 0,
            slidesToShow: 3,
            vertical: true,
            verticalSwiping: true,
        });
    }

    //slider
    if ($(" #slide-experts").length > 0) {
        $("#slide-experts").owlCarousel({
            margin: 0,
            center: true,
            loop: true,
            nav: true,
            dots: false,
            navText: [
                '<i class="fa-solid fa-chevron-left "></i>',
                '<i class="fa-solid fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                    margin: 15,
                },
                1000: {
                    items: 3,
                },
            },
        });
    }

    // Feedback Slider

    if ($(".owl-carousel.feedback-slider-fourteen").length > 0) {
        $(".owl-carousel.feedback-slider-fourteen").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fa-solid fa-chevron-left "></i>',
                '<i class="fa-solid fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                1000: {
                    items: 1,
                },
                1300: {
                    items: 1,
                },
            },
        });
    }

    // Feedback Review Slider

    if ($(".owl-carousel.feedback-review-slider").length > 0) {
        $(".owl-carousel.feedback-review-slider").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fa-solid fa-chevron-left "></i>',
                '<i class="fa-solid fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                1000: {
                    items: 1,
                },
                1300: {
                    items: 1,
                },
            },
        });
    }

    // Slick Slider
    if ($(".specialities-slider").length > 0) {
        $(".specialities-slider").slick({
            dots: true,
            autoplay: false,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            prevArrow: false,
            nextArrow: false,
            rows: 1,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 4,
                    },
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 776,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 567,
                    settings: {
                        slidesToShow: 2,
                    },
                },
            ],
        });
    }

    if ($(".doctor-slider").length > 0) {
        $(".doctor-slider").slick({
            dots: false,
            autoplay: false,
            infinite: true,
            slidesToShow: 3,
            speed: 500,
            variableWidth: false,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 776,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 567,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    }
    if ($(".features-slider").length > 0) {
        $(".features-slider").slick({
            dots: true,
            infinite: true,
            centerMode: true,
            slidesToShow: 3,
            speed: 500,
            variableWidth: true,
            arrows: false,
            autoplay: false,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    }

    // Load More Timings Open

    $(".time-slot-morning").slideUp();
    $(".load-more-morning").on("click", function () {
        $(this).toggleClass("show");
        $(".time-slot-morning").slideToggle();
    });

    $(".time-slot-afternoon").slideUp();
    $(".load-more-afternoon").on("click", function () {
        $(this).toggleClass("show");
        $(".time-slot-afternoon").slideToggle();
    });

    $(".time-slot-evening").slideUp();
    $(".load-more-evening").on("click", function () {
        $(this).toggleClass("show");
        $(".time-slot-evening").slideToggle();
    });

    // Slick Slider
    if ($(".features-slider1").length == 1) {
        $(".features-slider1").slick({
            dots: false,
            infinite: true,
            centerMode: false,
            slidesToShow: 1,
            speed: 500,
            variableWidth: true,
            arrows: true,
            autoplay: false,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    }
    if ($(".slider-1").length > 0) {
        $(".slider-1").slick();
    }

    //Home pharmacy slider
    if ($(".dot-slider").length > 0) {
        $(".dot-slider").slick({
            dots: true,
            autoplay: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                    },
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 1,
                    },
                },
                {
                    breakpoint: 776,
                    settings: {
                        slidesToShow: 1,
                    },
                },
                {
                    breakpoint: 567,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    }

    //clinic slider
    if ($(".clinic-slider").length > 0) {
        $(".clinic-slider").slick({
            dots: false,
            autoplay: false,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            rows: 2,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 776,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 567,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    }

    // Reschedule Open Popup

    $(document).ready(function () {
        $("#reschedule-book-modal").modal("show");
    });

    //browse slider
    if ($(".browse-slider").length > 0) {
        $(".browse-slider").slick({
            dots: false,
            autoplay: false,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            rows: 2,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 776,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 567,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    }

    //book doctor slider
    if ($(".book-slider").length > 0) {
        $(".book-slider").slick({
            dots: false,
            autoplay: false,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 776,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 567,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    }

    //avalable features slider
    if ($(".aval-slider").length > 0) {
        $(".aval-slider").slick({
            dots: false,
            autoplay: false,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 776,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 567,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    }
    //Home pharmacy slider
    if ($(".pharmacy-home-slider .swiper-container").length > 0) {
        var swiper = new Swiper(".pharmacy-home-slider .swiper-container", {
            loop: true,
            speed: 1000,
            pagination: {
                el: ".pharmacy-home-slider .swiper-pagination",
                dynamicBullets: true,
                clickable: true,
            },
            navigation: {
                nextEl: ".pharmacy-home-slider .swiper-button-next",
                prevEl: ".pharmacy-home-slider .swiper-button-prev",
            },
        });
    }

    // Date Range Picker
    if ($(".bookingrange").length > 0) {
        var start = moment().subtract(6, "days");
        var end = moment();

        function booking_range(start, end) {
            $(".bookingrange span").html(
                start.format("MMMM D, YYYY") +
                    " - " +
                    end.format("MMMM D, YYYY"),
            );
        }

        $(".bookingrange").daterangepicker(
            {
                startDate: start,
                endDate: end,
                ranges: {
                    Today: [moment(), moment()],
                    Yesterday: [
                        moment().subtract(1, "days"),
                        moment().subtract(1, "days"),
                    ],
                    "Last 7 Days": [moment().subtract(6, "days"), moment()],
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [
                        moment().startOf("month"),
                        moment().endOf("month"),
                    ],
                    "Last Month": [
                        moment().subtract(1, "month").startOf("month"),
                        moment().subtract(1, "month").endOf("month"),
                    ],
                },
            },
            booking_range,
        );

        booking_range(start, end);
    }
    // Chat

    var chatAppTarget = $(".chat-window");
    (function () {
        if ($(window).width() > 991) chatAppTarget.removeClass("chat-slide");

        $(document).on(
            "click",
            ".chat-window .chat-users-list a.open-chat",
            function () {
                if ($(window).width() <= 991) {
                    chatAppTarget.addClass("chat-slide");
                }
                return false;
            },
        );
        $(document).on("click", "#back_user_list", function () {
            if ($(window).width() <= 991) {
                chatAppTarget.removeClass("chat-slide");
            }
            return false;
        });
    })();

    //Increment Decrement Numberes
    var quantity = 0;
    $(".quantity-right-plus").click(function (e) {
        e.preventDefault();
        var quantity = parseInt($("#quantity").val());
        $("#quantity").val(quantity + 1);
    });

    $(".quantity-left-minus").click(function (e) {
        e.preventDefault();
        var quantity = parseInt($("#quantity").val());
        if (quantity > 0) {
            $("#quantity").val(quantity - 1);
        }
    });

    var quantity2 = 0;
    $(".quantity-right-plus2").click(function (e) {
        e.preventDefault();
        var quantity2 = parseInt($("#quantity2").val());
        $("#quantity2").val(quantity2 + 1);
    });

    $(".quantity-left-minus2").click(function (e) {
        e.preventDefault();
        var quantity2 = parseInt($("#quantity2").val());
        if (quantity2 > 0) {
            $("#quantity2").val(quantity2 - 1);
        }
    });

    var quantity3 = 0;
    $(".quantity-right-plus3").click(function (e) {
        e.preventDefault();
        var quantity3 = parseInt($("#quantity3").val());
        $("#quantity3").val(quantity3 + 1);
    });

    $(".quantity-left-minus3").click(function (e) {
        e.preventDefault();
        var quantity3 = parseInt($("#quantity3").val());
        if (quantity3 > 0) {
            $("#quantity3").val(quantity3 - 1);
        }
    });

    var quantity4 = 0;
    $(".quantity-right-plus4").click(function (e) {
        e.preventDefault();
        var quantity4 = parseInt($("#quantity4").val());
        $("#quantity4").val(quantity4 + 1);
    });

    $(".quantity-left-minus4").click(function (e) {
        e.preventDefault();
        var quantity4 = parseInt($("#quantity4").val());
        if (quantity4 > 0) {
            $("#quantity4").val(quantity4 - 1);
        }
    });

    var quantity5 = 0;
    $(".quantity-right-plus5").click(function (e) {
        e.preventDefault();
        var quantity5 = parseInt($("#quantity5").val());
        $("#quantity5").val(quantity5 + 1);
    });

    $(".quantity-left-minus5").click(function (e) {
        e.preventDefault();
        var quantity5 = parseInt($("#quantity5").val());
        if (quantity5 > 0) {
            $("#quantity5").val(quantity5 - 1);
        }
    });

    //Cart Click
    $("#cart").on("click", function (o) {
        o.preventDefault();
        $(".shopping-cart").fadeToggle();
        $(".shopping-cart").toggleClass("show-cart");
    });

    // Circle Progress Bar

    function animateElements() {
        $(".circle-bar1").each(function () {
            var elementPos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            var percent = $(this).find(".circle-graph1").attr("data-percent");
            var animate = $(this).data("animate");
            if (
                elementPos < topOfWindow + $(window).height() - 30 &&
                !animate
            ) {
                $(this).data("animate", true);
                $(this)
                    .find(".circle-graph1")
                    .circleProgress({
                        value: percent / 100,
                        size: 400,
                        thickness: 30,
                        fill: {
                            color: "#da3f81",
                        },
                    });
            }
        });
        $(".circle-bar2").each(function () {
            var elementPos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            var percent = $(this).find(".circle-graph2").attr("data-percent");
            var animate = $(this).data("animate");
            if (
                elementPos < topOfWindow + $(window).height() - 30 &&
                !animate
            ) {
                $(this).data("animate", true);
                $(this)
                    .find(".circle-graph2")
                    .circleProgress({
                        value: percent / 100,
                        size: 400,
                        thickness: 30,
                        fill: {
                            color: "#68dda9",
                        },
                    });
            }
        });
        $(".circle-bar3").each(function () {
            var elementPos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            var percent = $(this).find(".circle-graph3").attr("data-percent");
            var animate = $(this).data("animate");
            if (
                elementPos < topOfWindow + $(window).height() - 30 &&
                !animate
            ) {
                $(this).data("animate", true);
                $(this)
                    .find(".circle-graph3")
                    .circleProgress({
                        value: percent / 100,
                        size: 155,
                        thickness: 12,
                        fill: {
                            color: "#04BD6C",
                        },
                    });
            }
        });
    }

    if ($(".circle-bar").length > 0) {
        animateElements();
    }
    $(window).scroll(animateElements);

    // Preloader

    $(window).on("load", function () {
        if ($("#loader").length > 0) {
            $("#loader").delay(350).fadeOut("slow");
            $("body").delay(350).css({ overflow: "visible" });
        }
    });

    //owl carousel

    if ($(".owl-carousel.clinics").length > 0) {
        $(".owl-carousel.clinics").owlCarousel({
            loop: true,
            margin: 15,
            dots: false,
            nav: true,
            navContainer: ".slide-nav-1",
            navText: [
                '<i class="fas fa-chevron-left custom-arrow"></i>',
                '<i class="fas fa-chevron-right custom-arrow"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 3,
                },
                1000: {
                    items: 4,
                },
                1300: {
                    items: 6,
                },
            },
        });
    }
    if ($(".owl-carousel.our-doctors").length > 0) {
        $(".owl-carousel.our-doctors").owlCarousel({
            loop: true,
            margin: 15,
            dots: false,
            nav: true,
            navContainer: ".slide-nav-2",
            navText: [
                '<i class="fas fa-chevron-left custom-arrow"></i>',
                '<i class="fas fa-chevron-right custom-arrow"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1200: {
                    items: 4,
                },
            },
        });
    }
    if ($(".owl-carousel.clinic-feature").length > 0) {
        $(".owl-carousel.clinic-feature").owlCarousel({
            loop: true,
            margin: 15,
            dots: false,
            nav: true,
            navContainer: ".slide-nav-3",
            navText: [
                '<i class="fas fa-chevron-left custom-arrow"></i>',
                '<i class="fas fa-chevron-right custom-arrow"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 3,
                },
                1000: {
                    items: 4,
                },
                1300: {
                    items: 5,
                },
            },
        });
    }
    if ($(".blogs-three").length > 0) {
        $(".blogs-three .blogs").owlCarousel({
            loop: true,
            margin: 15,
            dots: false,
            nav: true,
            navContainer: ".slide-nav-4",
            navText: [
                '<i class="fas fa-chevron-left custom-arrow"></i>',
                '<i class="fas fa-chevron-right custom-arrow"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
            },
        });
    }
    if ($(".owl-carousel.blogs").length > 0) {
        $(".owl-carousel.blogs").owlCarousel({
            loop: true,
            margin: 15,
            dots: false,
            nav: true,
            navContainer: ".slide-nav-4",
            navText: [
                '<i class="fas fa-chevron-left custom-arrow"></i>',
                '<i class="fas fa-chevron-right custom-arrow"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 4,
                },
            },
        });
    }

    if ($(".header-trans.custom").length > 0) {
        $(document).ready(function () {
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll > 95) {
                    $(".header-trans").css("background", "#2b6ccb");
                } else {
                    $(".header-trans").css("background", "transparent");
                }
            });
        });
    }

    // Header Fixed

    if ($(".header-one").length > 0) {
        $(document).ready(function () {
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll > 35) {
                    $(".header-one").addClass("header-space");
                } else {
                    $(".header-one").removeClass("header-space");
                }
            });
        });
    }

    if ($(".header-trans.custom").length > 0) {
        $(document).ready(function () {
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll > 95) {
                    $(".header-trans").css("background", "#2b6ccb");
                } else {
                    $(".header-trans").css("background", "transparent");
                }
            });
        });
    }

    // Header Fixed

    if ($(".header-one").length > 0) {
        $(document).ready(function () {
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll > 35) {
                    $(".header-one").addClass("header-space");
                } else {
                    $(".header-one").removeClass("header-space");
                }
            });
        });
    }

    if ($(".inner-header").length > 0) {
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll > 35) {
                $(".inner-header").addClass("fixed");
            } else {
                $(".inner-header").removeClass("fixed");
            }
        });
    }

    // Header Fixed
    if ($("header").length > 0) {
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll > 35) {
                $("header").addClass("fixed");
            } else {
                $("header").removeClass("fixed");
            }
        });
    }

    // Pharmacy Header

    $(window).scroll(function () {
        var sticky = $(".header"),
            scroll = $(window).scrollTop();
        if (scroll >= 150) sticky.addClass("pharmacy-header");
        else sticky.removeClass("pharmacy-header");
    });

    //for slider
    $(window).on("load resize", function () {
        var window_width = $(window).outerWidth();
        var container_width = $(".container").outerWidth();
        var full_width = window_width - container_width;
        var right_position_value = full_width / 2;
        $(".slider-service").css("padding-left", right_position_value);
    });

    //BMI Status
    if ($("#bmi-status").length > 0) {
        var options = {
            series: [
                {
                    name: "BMI",
                    data: [10, 41, 35, 51, 49, 62, 69, 91, 148],
                },
            ],
            chart: {
                height: 350,
                type: "line",
                zoom: {
                    enabled: false,
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "straight",
            },
            title: {
                align: "left",
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
                    opacity: 0.5,
                },
            },
            xaxis: {
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                ],
            },
        };

        var chart = new ApexCharts(
            document.querySelector("#bmi-status"),
            options,
        );
        chart.render();
    }

    //Heart Rate Status
    if ($("#heartrate-status").length > 0) {
        var options = {
            series: [
                {
                    name: "HeartRate",
                    data: [
                        4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2,
                        7, 5,
                    ],
                },
            ],
            chart: {
                height: 350,
                type: "line",
            },
            stroke: {
                width: 7,
                curve: "smooth",
            },
            xaxis: {
                type: "datetime",
                categories: [
                    "1/11/2000",
                    "2/11/2000",
                    "3/11/2000",
                    "4/11/2000",
                    "5/11/2000",
                    "6/11/2000",
                    "7/11/2000",
                    "8/11/2000",
                    "9/11/2000",
                    "10/11/2000",
                    "11/11/2000",
                    "12/11/2000",
                    "1/11/2001",
                    "2/11/2001",
                    "3/11/2001",
                    "4/11/2001",
                    "5/11/2001",
                    "6/11/2001",
                ],
                tickAmount: 10,
            },
            title: {
                align: "left",
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    gradientToColors: ["#0de0fe"],
                    shadeIntensity: 1,
                    type: "horizontal",
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100],
                },
            },
            markers: {
                size: 4,
                colors: ["#15558d"],
                strokeColors: "#fff",
                strokeWidth: 2,
                hover: {
                    size: 7,
                },
            },
            yaxis: {
                min: -10,
                max: 40,
                title: {},
            },
        };

        var chart = new ApexCharts(
            document.querySelector("#heartrate-status"),
            options,
        );
        chart.render();
    }

    //FBC Status
    if ($("#fbc-status").length > 0) {
        var options = {
            series: [
                {
                    name: "FBC",
                    data: [
                        2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5,
                        0.2,
                    ],
                },
            ],
            chart: {
                height: 350,
                type: "bar",
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    dataLabels: {
                        position: "top", // top, center, bottom
                    },
                },
            },
            dataLabels: {
                enabled: true,
                formatter: function (val) {
                    return val + "%";
                },
                offsetY: -20,
                style: {
                    fontSize: "12px",
                    colors: ["#304758"],
                },
            },

            xaxis: {
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                position: "top",
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                crosshairs: {
                    fill: {
                        type: "gradient",
                        gradient: {
                            colorFrom: "#0de0fe",
                            colorTo: "#0de0fe",
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        },
                    },
                },
                tooltip: {
                    enabled: true,
                },
            },
            yaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                    formatter: function (val) {
                        return val + "%";
                    },
                },
            },
            title: {
                floating: true,
                offsetY: 330,
                align: "center",
                style: {
                    color: "#444",
                },
            },
        };

        var chart = new ApexCharts(
            document.querySelector("#fbc-status"),
            options,
        );
        chart.render();
    }

    //Weight Status
    if ($("#weight-status").length > 0) {
        var options = {
            series: [
                {
                    name: "Weight",
                    data: [34, 44, 54, 21, 12, 43, 33, 23, 66, 66, 58],
                },
            ],
            chart: {
                type: "line",
                height: 350,
            },
            stroke: {
                curve: "stepline",
            },
            dataLabels: {
                enabled: false,
            },
            title: {
                align: "left",
            },
            markers: {
                hover: {
                    sizeOffset: 4,
                },
            },
        };

        var chart = new ApexCharts(
            document.querySelector("#weight-status"),
            options,
        );
        chart.render();
    }

    // Signup Toggle
    $(function () {
        $("#is_registered").click(function () {
            if ($(this).is(":checked")) {
                $("#preg_div").show();
            } else {
                $("#preg_div").hide();
            }
        });
    });

    //Increment Decrement value
    $(".inc.button").click(function () {
        var $this = $(this),
            $input = $this.prev("input"),
            $parent = $input.closest("div"),
            newValue = parseInt($input.val()) + 1;
        $parent.find(".inc").addClass("a" + newValue);
        $input.val(newValue);
        newValue += newValue;
    });
    $(".dec.button").click(function () {
        var $this = $(this),
            $input = $this.next("input"),
            $parent = $input.closest("div"),
            newValue = parseInt($input.val()) - 1;
        console.log($parent);
        $parent.find(".inc").addClass("a" + newValue);
        $input.val(newValue);
        newValue += newValue;
    });

    // Signup Profile
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#prof-avatar").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile_image").change(function () {
        readURL(this);
    });

    // Datepicker
    var maxDate = $("#maxDate").val();
    if ($("#dob").length > 0) {
        $("#dob").datepicker({
            startView: 2,
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true,
            endDate: maxDate,
        });
    }
    if ($("#editdob").length > 0) {
        $("#editdob").datepicker({
            startView: 2,
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true,
            endDate: maxDate,
        });
    }

    // Search Bar

    $(document).ready(function () {
        $(".searchbar a").click(function () {
            $(".togglesearch").slideToggle();
            $(".top-search").focus();
        });
    });

    if ($("#more-view2").length > 0) {
        const button = document.getElementById("more-view2");
        const container = document.getElementById("fill-more2");

        let isLess = true;

        function showMoreLess() {
            if (isLess) {
                isLess = false;
                container.style.height = "auto";
                button.innerHTML =
                    "Show less <i class='feather-chevrons-right ms-1'>";
            } else {
                isLess = true;
                container.style.height = "100px";
                button.innerHTML =
                    "Show more <i class='feather-chevrons-right ms-1'></i>";
            }
        }
        button.addEventListener("click", showMoreLess);
    }

    if ($("#more-view").length > 0) {
        const button = document.getElementById("more-view");
        const container = document.getElementById("fill-more");

        let isLess = true;

        function showMoreLess() {
            if (isLess) {
                isLess = false;
                container.style.height = "auto";
                button.innerHTML =
                    "Show less <i class='feather-chevrons-right ms-1'>";
            } else {
                isLess = true;
                container.style.height = "100px";
                button.innerHTML =
                    "Show more <i class='feather-chevrons-right ms-1'></i>";
            }
        }
        button.addEventListener("click", showMoreLess);
    }

    if ($("#more-view1").length > 0) {
        const button = document.getElementById("more-view1");
        const container = document.getElementById("fill-more1");

        let isLess = true;

        function showMoreLess() {
            if (isLess) {
                isLess = false;
                container.style.height = "auto";
                button.innerHTML =
                    "Show less <i class='feather-chevrons-right ms-1'>";
            } else {
                isLess = true;
                container.style.height = "100px";
                button.innerHTML =
                    "Show more <i class='feather-chevrons-right ms-1'></i>";
            }
        }
        button.addEventListener("click", showMoreLess);
    }

    $(".favourite-btn .favourite-icon").on("click", function () {
        $(this).toggleClass("favourite");
    });

    $(".favourite-btn-two .favourite-icon-two").on("click", function () {
        $(this).toggleClass("favourite-two");
    });

    // Price Slider

    if ($("#price-range").length > 0) {
        $("#pricerangemin").text(10);
        $("#pricerangemax").text(10000);
        $("#price-range").slider({
            range: true,
            min: 10,
            max: 10000,
            values: [10, 5000],

            slide: function (event, ui) {
                $("#pricerangemin").text(ui.values[0]);
                $("#pricerangemax").text(ui.values[1]);
            },
        });
    }

    // Map

    $("#map-list").on("click", function () {
        $(this).closest(".container").addClass("container-fluid");
        $(this).closest(".container-fluid").removeClass("container");
        $(".map-view").removeClass("col-xl-12").addClass("col-xl-9");
        $(".map-right").css("display", "block");
        $(".time-slot-slider")[0].slick.refresh();
    });

    // Cursor

    function mim_tm_cursor() {
        var myCursor = jQuery(".mouse-cursor");
        if (myCursor.length) {
            if ($("body")) {
                const e = document.querySelector(".cursor-inner"),
                    t = document.querySelector(".cursor-outer");
                let n,
                    i = 0,
                    o = !1;
                ((window.onmousemove = function (s) {
                    (o ||
                        (t.style.transform =
                            "translate(" +
                            s.clientX +
                            "px, " +
                            s.clientY +
                            "px)"),
                        (e.style.transform =
                            "translate(" +
                            s.clientX +
                            "px, " +
                            s.clientY +
                            "px)"),
                        (n = s.clientY),
                        (i = s.clientX));
                }),
                    $("body").on(
                        "mouseenter",
                        "a, .cursor-pointer",
                        function () {
                            (e.classList.add("cursor-hover"),
                                t.classList.add("cursor-hover"));
                        },
                    ),
                    $("body").on(
                        "mouseleave",
                        "a, .cursor-pointer",
                        function () {
                            ($(this).is("a") &&
                                $(this).closest(".cursor-pointer").length) ||
                                (e.classList.remove("cursor-hover"),
                                t.classList.remove("cursor-hover"));
                        },
                    ),
                    (e.style.visibility = "visible"),
                    (t.style.visibility = "visible"));
            }
        }
    }
    mim_tm_cursor();

    // Slick Slider
    if ($(".onboard-slider").length > 0) {
        $("#onboard-slider").owlCarousel({
            items: 1,
            margin: 30,
            dots: true,
            nav: true,
            navText: false,
            loop: true,
            smartSpeed: 450,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                1170: {
                    items: 1,
                },
            },
        });
    }

    // Toggle Password

    if ($(".toggle-password").length > 0) {
        $(document).on("click", ".toggle-password", function () {
            $(this).toggleClass("feather-eye");
            var input = $(".pass-input");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    }

    if ($(".toggle-password-sub").length > 0) {
        $(document).on("click", ".toggle-password-sub", function () {
            $(this).toggleClass("feather-eye");
            var input = $(".pass-input-sub");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    }

    // Custom Country Code Selector

    if ($("#phone").length > 0) {
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            utilsScript: "build/plugins/intltelinput/js/utils.js",
        });
    }

    // Custom Country Code Selector

    if ($("#phone-number").length > 0) {
        var input = document.querySelector("#phone-number");
        window.intlTelInput(input, {
            utilsScript: "build/plugins/intltelinput/js/utils.js",
        });
    }

    // Otp Verfication

    $(".digit-group")
        .find("input")
        .each(function () {
            $(this).attr("maxlength", 1);
            $(this).on("keyup", function (e) {
                var parent = $($(this).parent());

                if (e.keyCode === 8 || e.keyCode === 37) {
                    var prev = parent.find("input#" + $(this).data("previous"));

                    if (prev.length) {
                        $(prev).select();
                    }
                } else if (
                    (e.keyCode >= 48 && e.keyCode <= 57) ||
                    (e.keyCode >= 65 && e.keyCode <= 90) ||
                    (e.keyCode >= 96 && e.keyCode <= 105) ||
                    e.keyCode === 39
                ) {
                    var next = parent.find("input#" + $(this).data("next"));

                    if (next.length) {
                        $(next).select();
                    } else {
                        if (parent.data("autosubmit")) {
                            parent.submit();
                        }
                    }
                }
            });
        });

    $(".digit-group input").on("keyup", function () {
        var self = $(this);
        if (self.val() != "") {
            self.addClass("active");
        } else {
            self.removeClass("active");
        }
    });

    // Mute Audio

    if ($(".mute-bt").length > 0) {
        $(".mute-bt").on("click", function () {
            if ($(this).hasClass("stop")) {
                $(this).removeClass("stop");
                $(".mute-bt i").removeClass("feather-mic-off");
                $(".mute-bt i").addClass("feather-mic");
            } else {
                $(this).addClass("stop");
                $(".mute-bt i").removeClass("feather-mic");
                $(".mute-bt i").addClass("feather-mic-off");
            }
        });
    }

    // Mute Video

    if ($(".mute-video").length > 0) {
        $(".mute-video").on("click", function () {
            if ($(this).hasClass("stop")) {
                $(this).removeClass("stop");
                $(".mute-video i").removeClass("feather-video-off");
                $(".mute-video i").addClass("feather-video");
            } else {
                $(this).addClass("stop");
                $(".mute-video i").removeClass("feather-video");
                $(".mute-video i").addClass("feather-video-off");
            }
        });
    }

    if ($(".win-maximize").length > 0) {
        $(".win-maximize").on("click", function (e) {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                }
            }
        });
    }

    $(document).on("click", ".btn-icon", function () {
        $(this).parent().hide();
    });
    $(document).on("click", ".delete_schedule", function () {
        $(this).parent().hide();
    });
    // Doctor Signup Wizard

    let progressVal = 0;
    let businessType = 0;

    $(".next_btn").click(function () {
        $(this).parent().parent().next().fadeIn("slow");
        $(this).parent().parent().css({
            display: "none",
        });
        progressVal = progressVal + 1;
        $(".progress-active")
            .removeClass("progress-active")
            .addClass("progress-activated")
            .next()
            .addClass("progress-active");
    });

    $(".prev_btn").click(function () {
        $(this).parent().parent().prev().fadeIn("slow");
        $(this).parent().parent().css({
            display: "none",
        });
        progressVal = progressVal - 1;
        $(".progress-active")
            .removeClass("progress-active")
            .prev()
            .removeClass("progress-activated")
            .addClass("progress-active");
    });
    // Select Favourite

    $(".fav-item").on("click", function () {
        $(this).toggleClass("selected");
        //$(this).children().toggleClass("feather-heart fa-solid fa-heart");
    });
    $(".fav-icon").on("click", function () {
        $(this).toggleClass("selected");
        //$(this).children().toggleClass("feather-heart fa-solid fa-heart");
    });
    $(".add-table-items").on("click", ".remove-btn", function () {
        $(this).closest(".add-row").remove();
        return false;
    });

    // Add More Items

    $(".add-table-items").on("click", ".trash", function () {
        $(this).closest(".test").remove();
        return false;
    });
    $("#service7").change(function () {
        if ($(this).prop("checked")) {
            $(".clinics-path").removeClass("d-none").addClass("d-block");
        } else {
            $(".clinics-path").removeClass("d-block").addClass("d-none");
        }
    });

    // Function to hide the clinics path when service8 or service9 is clicked
    $("#service8, #service9,#service10, #service11").change(function () {
        $(".clinics-path").removeClass("d-block").addClass("d-none");
    });
    $(".add-items").on("click", function () {
        var itemscontent =
            '<tr class="test">' +
            "<td>" +
            '<input type="text" class="form-control">' +
            "</td>" +
            "<td>" +
            '<input type="text" class="form-control">' +
            "</td>" +
            "<td>" +
            '<a href="javascript:void(0)" class="btn bg-danger-light trash remove-btn"><i class="far fa-trash-alt"></i></a>' +
            "</td>" +
            "</tr>";
        $(".add-table-items").append(itemscontent);
        return false;
    });

    $(".add-table-prescription").on("click", ".trash", function () {
        $(this).closest(".test").remove();
        return false;
    });
    $(".add-prescription").on("click", function () {
        var itemscontent =
            '<tr class="test">' +
            "<td>" +
            '<input class="form-control" type="text">' +
            "</td>" +
            "<td>" +
            '<input class="form-control" type="text">' +
            "</td>" +
            "<td>" +
            '<input class="form-control" type="text">' +
            "</td>" +
            "<td>" +
            '<div class="form-check form-check-inline">' +
            '<label class="form-check-label">' +
            '<input class="form-check-input" type="checkbox"> Morning' +
            "</label>" +
            "</div>" +
            '<div class="form-check form-check-inline">' +
            '<label class="form-check-label">' +
            '<input class="form-check-input" type="checkbox"> Afternoon' +
            "</label>" +
            "</div>" +
            '<div class="form-check form-check-inline">' +
            '<label class="form-check-label">' +
            '<input class="form-check-input" type="checkbox"> Evening' +
            "</label>" +
            "</div>" +
            '<div class="form-check form-check-inline">' +
            '<label class="form-check-label">' +
            '<input class="form-check-input" type="checkbox"> Night' +
            "</label>" +
            "</div>" +
            "</td>" +
            "<td>" +
            '<a href="#" class="btn bg-danger-light trash"><i class="far fa-trash-alt"></i></a>' +
            "</td>" +
            "</tr>";
        $(".add-table-prescription").append(itemscontent);
        return false;
    });

    // Swiper Slider

    if ($(".swiper-slider-banner").length > 0) {
        var swiper = new Swiper(".swiper-slider-banner", {
            effect: "cards",
            grabCursor: true,
            initialSlide: 2,
            loop: false,
            rotate: true,
            mousewheel: {
                invert: false,
            },
        });
    }

    // Doctor Consulting Slider

    if ($(".doctor-consulting-slider").length > 0) {
        $(".doctor-consulting-slider").owlCarousel({
            loop: false,
            margin: 15,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fa-solid fa-play"></i>',
                '<i class="fa-solid fa-play"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                1300: {
                    items: 1,
                },
            },
        });
    }

    if ($(".booking-lab-test-slider").length > 0) {
        $(".booking-lab-test-slider").owlCarousel({
            loop: false,
            margin: 15,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fa-solid fa-play"></i>',
                '<i class="fa-solid fa-play"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 2,
                },
                1200: {
                    items: 3,
                },
            },
        });
    }

    if ($(".popular-choice-slider").length > 0) {
        $(".popular-choice-slider").owlCarousel({
            loop: false,
            margin: 15,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fa-solid fa-play"></i>',
                '<i class="fa-solid fa-play"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1200: {
                    items: 4,
                },
            },
        });
    }

    if ($(".blog-slide-fourteen").length > 0) {
        $(".blog-slide-fourteen").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navContainer: ".blog-slide-nav",
            navText: [
                '<i class="fa-solid fa-chevron-left"></i>',
                '<i class="fa-solid fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1200: {
                    items: 3,
                },
            },
        });
    }

    if ($(".various-logo-slider").length > 0) {
        $(".various-logo-slider").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: false,
            smartSpeed: 2000,
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                1000: {
                    items: 5,
                },
                1200: {
                    items: 6,
                },
            },
        });
    }

    // Slick Testimonial Two

    if ($(".work-video-img").length > 0) {
        $(".work-video-img").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            asNavFor: ".slider-thumbnails-img",
        });
    }

    if ($(".slider-thumbnails-img").length > 0) {
        $(".slider-thumbnails-img").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: ".work-video-img",
            dots: false,
            arrows: false,
            centerMode: false,
            focusOnSelect: true,
        });
    }

    // Video Player

    $(".treatment-video a").on("click", function () {
        var currentVideo = $(this)
            .parent()
            .find(".doctor-treatment-video")
            .get(0);
        var allVideos = $(".doctor-treatment-video");
        $(this).parent().find(".doctor-treatment-video").toggleClass("active");
        $(this).toggleClass("active");
        allVideos.each(function () {
            if (currentVideo != this) this.pause();
        });
        if (currentVideo.paused) {
            currentVideo.play();
        } else {
            currentVideo.pause();
        }
    });

    $(function () {
        $("#table-filter").on("click", function (a) {
            $(".form-sorts").toggleClass("table-filter-show");
            a.stopPropagation();
        });
        $(document).on("click", function (a) {
            if ($(a.target).is(".form-sorts") === false) {
                $(".form-sorts").removeClass("table-filter-show");
            }
        });
    });
    $(".filter-dropdown-menu").click(function (event) {
        event.stopPropagation();
    });

    // Select Image

    if ($(".select-img").length > 0) {
        function formatState(state) {
            if (!state.id) {
                return state.text;
            }
            var $state = $(
                '<span><img src="' +
                    $(state.element).attr("data-image") +
                    '" class="clinic-img" / " width="32px"> ' +
                    state.text +
                    "</span>",
            );
            return $state;
        }
        $(".select-img").select2({
            minimumResultsForSearch: Infinity,
            templateResult: formatState,
            templateSelection: formatState,
        });
    }

    if ($(".select-social-img").length > 0) {
        function formatState(state) {
            if (!state.id) {
                return state.text;
            }
            var $state = $(
                '<span><img src="' +
                    $(state.element).attr("data-image") +
                    '" class="social-img" / " width="16px"> ' +
                    state.text +
                    "</span>",
            );
            return $state;
        }
        $(".select-social-img").select2({
            minimumResultsForSearch: Infinity,
            templateResult: formatState,
            templateSelection: formatState,
        });
    }

    if ($(".flag-img").length > 0) {
        function formatState(state) {
            if (!state.id) {
                return state.text;
            }
            var $state = $(
                '<span><img src="' +
                    $(state.element).attr("data-image") +
                    '" class="flag-img" / " width="16px"> ' +
                    state.text +
                    "</span>",
            );
            return $state;
        }
        $(".flag-img").select2({
            minimumResultsForSearch: Infinity,
            templateResult: formatState,
            templateSelection: formatState,
        });
    }

    // Stripe

    if ($(".stripe-box").length > 0) {
        $(".stripe-box").on("click", function () {
            $(".stripe-box").removeClass("active");
            $(this).addClass("active");
        });
    }

    //Top Online Contacts
    if ($(".top-online-contacts .swiper-container").length > 0) {
        var swiper = new Swiper(".top-online-contacts .swiper-container", {
            slidesPerView: 5,
            spaceBetween: 15,
        });
    }

    $(".add-social-media").on("click", function () {
        var servcontent =
            '<div class="social-media-links d-flex align-items-center">' +
            '<div class="input-block input-block-new select-social-link">' +
            '<select class="select-social-img">' +
            '<option data-image="build/img/icons/fb-icon.svg" selected>Facebook</option>' +
            '<option data-image="build/img/icons/linkedin-icon.svg">Linkedin</option>' +
            '<option data-image="build/img/icons/x-twitter-icon.svg">Twitter</option>' +
            '<option data-image="build/img/icons/instagram-icon.svg">Instagram</option>' +
            "</select>" +
            "</div>" +
            '<div class="input-block input-block-new flex-fill">' +
            '<input type="password" class="form-control" placeholder="Add Url">' +
            "</div>" +
            "</div>";

        $(".social-media-form").append(servcontent);

        if ($(".select-social-img").length > 0) {
            $(".select-social-img").select2({
                minimumResultsForSearch: -1,
                width: "100%",
            });
        }

        return false;
    });

    $(".start-appointment-set").on("click", ".trash", function () {
        $(this).closest(".medication-wrap").remove();
        return false;
    });
    $(".add-medical").on("click", function () {
        var servcontent =
            '<div class="col-md-12">' +
            '<div class="d-flex flex-wrap medication-wrap align-items-center">' +
            '<div class="input-block input-block-new">' +
            '<label class="form-label">Name</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            '<div class="input-block input-block-new">' +
            '<label class="form-label">Type</label>' +
            '<select class="select form-control">' +
            "<option>Select</option>" +
            "<option>Direct Visit</option>" +
            "<option>Video Call</option>" +
            "</select>" +
            "</div>" +
            '<div class="input-block input-block-new">' +
            '<label class="form-label">Dosage</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            '<div class="input-block input-block-new">' +
            '<label class="form-label">Duration</label>' +
            '<input type="text" class="form-control" placeholder="1-0-0">' +
            "</div>" +
            '<div class="input-block input-block-new">' +
            '<label class="form-label">Duration</label>' +
            '<select class="select form-control">' +
            "<option>Select</option>" +
            "<option>Not Available</option>" +
            "</select>" +
            "</div>" +
            '<div class="input-block input-block-new">' +
            '<label class="form-label">Instruction</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            '<div class="delete-row">' +
            '<a href="#" class="delete-btn delete-medication trash text-danger"><i class="fa-solid fa-trash-can"></i></a>' +
            "</div>" +
            "</div>";

        $(".meditation-row").append(servcontent);

        if ($(".select").length > 0) {
            $(".select").select2({
                minimumResultsForSearch: -1,
                width: "100%",
            });
        }

        return false;
    });

    //Chat Search Visible
    $(".chat-search-btn").on("click", function () {
        $(".chat-search").addClass("visible-chat");
    });
    $(".close-btn-chat").on("click", function () {
        $(".chat-search").removeClass("visible-chat");
    });
    $(".chat-search .form-control").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $(".chat .chat-body .messages .chats").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    // Chat
    $(".left_sides").on("click", function () {
        if ($(window).width() <= 991) {
            $(".sidebar-group").removeClass("hide-left-sidebar");
            $(".sidebar-menu").removeClass("d-none");
        }
    });
    $(".left_sides").on("click", function () {
        if ($(window).width() <= 991) {
            $(".chat-messages").removeClass("show-chatbar");
        }
    });
    $(".user-list li a").on("click", function () {
        if ($(window).width() <= 991) {
            $(".left-sidebar").addClass("hide-left-sidebar");
            $(".sidebar-menu").addClass("d-none");
            $(".chat").addClass("show-chatbar");
        }
    });

    // Get all tab links
    if ($(".tab-items").length > 0) {
        const tabLinks = document.querySelectorAll(".tab-link");

        // Get all tab contents
        const tabContents = document.querySelectorAll(".tab-items");

        // Add click event listener to each tab link
        tabLinks.forEach((tabLink) => {
            tabLink.addEventListener("click", () => {
                const tabId = tabLink.getAttribute("data-tab");

                // Toggle active class on clicked tab link
                tabLink.classList.toggle("active");
                $(".tab-items.acive input").prop("disabled", false);

                // Toggle active class on corresponding tab content
                const tabContent = document.getElementById(tabId);
                tabContent.classList.toggle("active");
            });
        });
    }

    // Appointment calender Slider

    if ($(".appointment-calender-slider").length > 0) {
        $(".appointment-calender-slider").owlCarousel({
            loop: true,
            margin: 5,
            dots: false,
            nav: true,
            navContainer: ".slide-nav",
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 2,
                },
                500: {
                    items: 2,
                },
                768: {
                    items: 5,
                },
                1000: {
                    items: 4,
                },
                1300: {
                    items: 5,
                },
            },
        });
    }

    //Past Apppintment Slider

    if ($(".past-appointments-slider").length > 0) {
        $(".past-appointments-slider").owlCarousel({
            loop: true,
            margin: 5,
            dots: false,
            nav: true,
            navContainer: ".slide-nav2",
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                1300: {
                    items: 1,
                },
            },
        });
    }

    //Eye Blog carousel

    if ($(".owl-carousel.slider-service").length > 0) {
        $(".owl-carousel.slider-service").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
            },
        });
    }

    // Doctors Slider

    if ($(".owl-carousel.doctor-slider-ten").length > 0) {
        $(".owl-carousel.doctor-slider-ten").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1400: {
                    items: 4,
                },
                1300: {
                    items: 3,
                },
            },
        });
    }

    // Testimonial Slider

    if ($(".owl-carousel.testimonial-sliders").length > 0) {
        $(".owl-carousel.testimonial-sliders").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
            },
        });
    }

    // Testimonial Slider

    if ($(".owl-carousel.blog-slider").length > 0) {
        $(".owl-carousel.blog-slider").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
            },
        });
    }

    // Feedback Review Slider

    if ($(".owl-carousel.fertility-slider").length > 0) {
        $(".owl-carousel.fertility-slider").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navText: [
                '<i class="fa-solid fa-chevron-left "></i>',
                '<i class="fa-solid fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 3,
                },
            },
        });
    }

    // Insurence Logo Slider

    if ($(".owl-carousel.insurence-logo-slider").length > 0) {
        $(".owl-carousel.insurence-logo-slider").owlCarousel({
            loop: false,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navContainer: ".slide-1",
            navText: [
                '<i class="fa-solid fa-chevron-left "></i>',
                '<i class="fa-solid fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                1000: {
                    items: 5,
                },
                1300: {
                    items: 6,
                },
            },
        });
    }
    //Eye Blog carousel

    if ($(".owl-carousel.treatment-slider").length > 0) {
        $(".owl-carousel.treatment-slider").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navContainer: ".slide-nav-02",
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                1200: {
                    items: 2,
                },
                1300: {
                    items: 2,
                },
            },
        });
    }

    // Availability Dates Slider

    if ($(".owl-carousel.availability-slots-slider").length > 0) {
        $(".owl-carousel.availability-slots-slider").owlCarousel({
            loop: false,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navContainer: ".slide-2",
            navText: [
                '<i class="fa-solid fa-chevron-left "></i>',
                '<i class="fa-solid fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                1000: {
                    items: 5,
                },
                1300: {
                    items: 6,
                },
                1400: {
                    items: 7,
                },
            },
        });
    }
    // Expert Slider

    if ($(".owl-carousel.expert-slider").length > 0) {
        $(".owl-carousel.expert-slider").owlCarousel({
            loop: true,
            margin: 24,
            nav: false,
            dots: false,
            autoplay: true,
            smartSpeed: 2000,
            navContainer: ".slide-nav-01",
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },

                550: {
                    items: 1,
                },
                700: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1300: {
                    items: 4,
                },
            },
        });
    }

    // Availability Dates Slider

    if ($(".owl-carousel.awards-slider").length > 0) {
        $(".owl-carousel.awards-slider").owlCarousel({
            loop: false,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navContainer: ".slide-3",
            navText: [
                '<i class="fa-solid fa-chevron-left "></i>',
                '<i class="fa-solid fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                1000: {
                    items: 2,
                },
                1300: {
                    items: 4,
                },
                1400: {
                    items: 4,
                },
            },
        });
    }

    if ($(".dentist-slider").length > 0) {
        $(".dentist-slider").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navContainer: ".blog-nav",
            navText: [
                '<i class="fa-solid fa-chevron-left"></i>',
                '<i class="fa-solid fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                1000: {
                    items: 2,
                },
                1300: {
                    items: 3,
                },
                1400: {
                    items: 3,
                },
            },
        });
    }

    $(".information-title-list li").on("click", function () {
        $(this).addClass("active").siblings().removeClass("active");
    });
    if ($(".customer-slider").length > 0) {
        $(".customer-slider").owlCarousel({
            loop: true,
            margin: 24,
            dots: false,
            nav: true,
            smartSpeed: 2000,
            navContainer: ".customer-nav",
            navText: [
                '<i class="fa-solid fa-chevron-left"></i>',
                '<i class="fa-solid fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
                1200: {
                    items: 3,
                },
            },
        });
    }

    // Payment
    $(".hospital-form .form-check-input").on("change", function (e) {
        var radioval = $(this).val();
        if (radioval === "all-hospital") {
            $(".all-hospital").show();
            $(".virtual-hospital").hide();
            $(".appointment-hospital").hide();
            $(".all-clinic").hide();
        } else if (radioval === "virtual") {
            $(".all-hospital").hide();
            $(".virtual-hospital").show();
            $(".appointment-hospital").hide();
            $(".all-clinic").hide();
        } else if (radioval === "appointment") {
            $(".all-hospital").hide();
            $(".virtual-hospital").hide();
            $(".appointment-hospital").show();
            $(".all-clinic").hide();
        } else {
            $(".credit-card-details").hide();
            $(".all-hospital").hide();
            $(".virtual-hospital").hide();
            $(".appointment-hospital").hide();
            $(".all-clinic").show();
        }
    });

    // Checkbox Active

    if ($(".service-item").length > 0) {
        $(".service-item").on("click", function (e) {
            e.stopPropagation();
            $(this).toggleClass("active");
            var checkbox = $(this).find('input[type="checkbox"]');
            checkbox.prop("checked", !checkbox.prop("checked"));
        });

        // Click event specifically for the checkbox input
        $('.service-item input[type="checkbox"]').on("click", function (e) {
            $(this).closest(".service-item").toggleClass("active");
            var checkbox = $(this).find('input[type="checkbox"]');
            checkbox.prop("checked", !checkbox.prop("checked"));
        });
    }

    $(document).on("click", "#filter_search", function () {
        $("#filter_inputs").slideToggle("slow");
    });

    $(".spciality-slider").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: false,
                arrows: true,
                prevArrow: $(".spciality-prev"),
                nextArrow: $(".spciality-next"),
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 6, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 4, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 576,
                        settings: { slidesToShow: 1, slidesToScroll: 1 },
                    },
                ],
            });
        }
    });

    $(".doctors-slider").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 4, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 576,
                        settings: { slidesToShow: 1, slidesToScroll: 1 },
                    },
                ],
            });
        }
    });

    $(".testimonials-slider").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: false,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 1, slidesToScroll: 1 },
                    },
                ],
            });
        }
    });

    $(".company-slider").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 6, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 4, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                ],
            });
        }
    });

    $(".categories-slider").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 4, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 576,
                        settings: { slidesToShow: 1, slidesToScroll: 1 },
                    },
                ],
            });
        }
    });

    // Click script
    document.querySelectorAll(".fav-icon").forEach((btn) => {
        btn.addEventListener("click", function () {
            const icon = this.querySelector("i");

            // toggle outline/solid
            icon.classList.toggle("fa-regular");
            icon.classList.toggle("fa-solid");

            // color on favorite (solid)
            icon.style.color = icon.classList.contains("fa-solid") ? "red" : "";
        });
    });

    // Booking Wizard
    $(document).ready(function () {
        let progressVal = 0;
        let businessType = 0;

        $(".next_btns").on("click", function () {
            $(this).parent().parent().parent().parent().next().fadeIn("slow");
            $(this).parent().parent().parent().parent().css({
                display: "none",
            });
            progressVal = progressVal + 1;
            $(".progress-active")
                .removeClass("progress-active")
                .addClass("progress-activated")
                .next()
                .addClass("progress-active");
        });
        $(".prev_btns").on("click", function () {
            $(this).parent().parent().parent().parent().prev().fadeIn("slow");
            $(this).parent().parent().parent().parent().css({
                display: "none",
            });
            progressVal = progressVal - 1;
            $(".progress-active")
                .removeClass("progress-active")
                .prev()
                .removeClass("progress-activated")
                .addClass("progress-active");
        });
    });

    // Banner slider five
    $(".banner-slider-five").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: false,
                arrows: true,
                prevArrow: $(".ban-prev"),
                nextArrow: $(".ban-next"),
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 1, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 1, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 1, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 576,
                        settings: { slidesToShow: 1, slidesToScroll: 1 },
                    },
                ],
            });
        }
    });

    // Testimonial slider five
    $(".testimonial-slider-five").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: false,
                arrows: true,
                prevArrow: $(".testimonial-prev"),
                nextArrow: $(".testimonial-next"),
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 1, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 576,
                        settings: { slidesToShow: 1, slidesToScroll: 1 },
                    },
                ],
            });
        }
    });

    // Service slider five
    $(".service-slider-eight").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: false,
                arrows: true,
                centerMode: true,
                prevArrow: $(".services-prev"),
                nextArrow: $(".services-next"),
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                ],
            });
        }
    });

    // Service slider twelve
    $(".services-twelve-slider").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: false,
                arrows: true,
                centerMode: true,
                prevArrow: $(".services-prev"),
                nextArrow: $(".services-next"),
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                ],
            });
        }
    });

    // Blog slider five
    $(".blog-slider-eight").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: false,
                arrows: true,
                centerMode: true,
                prevArrow: $(".blogs-prev"),
                nextArrow: $(".blogs-next"),
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                ],
            });
        }
    });

    // Blog slider five
    $(".team-slider-nine").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: false,
                arrows: true,
                centerMode: true,
                prevArrow: $(".team9-prev"),
                nextArrow: $(".team9-next"),
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 4, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                    {
                        breakpoint: 567,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                ],
            });
        }
    });

    // testimonial slider five
    $(".testimonial-slider-nine").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: false,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 767,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 576,
                        settings: { slidesToShow: 1, slidesToScroll: 1 },
                    },
                ],
            });
        }
    });

    // Testimonial Slider
    if ($(".testimonials-slider-twelve").length > 0) {
        $(".slider-for").slick({
            infinite: true,
            speed: 2000,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            autoplay: true,
            arrows: false,
            variableWidth: true,
            asNavFor: ".slider-nav",
        });

        $(".slider-nav").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: ".slider-for",
            dots: false,
            arrows: false,
            focusOnSelect: true,
            centerMode: true,
            centerPadding: "0px",
            infinite: true,
            variableWidth: true,
            speed: 1,
            responsive: [
                {
                    breakpoint: 992,
                    settings: { slidesToShow: 3 },
                },
                {
                    breakpoint: 768,
                    settings: { slidesToShow: 2 },
                },
                {
                    breakpoint: 576,
                    settings: { slidesToShow: 1 },
                },
            ],
        });
    }

    // Deals slider five
    $(".deals-slider-thirteen").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: false,
                arrows: true,
                centerMode: true,
                prevArrow: $(".services-prev"),
                nextArrow: $(".services-next"),
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                ],
            });
        }
    });

    // Testimonial slider five
    $(".testimonial-slider-thirteen").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                arrows: true,
                centerMode: true,
                prevArrow: $(".services-prev"),
                nextArrow: $(".services-next"),
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                ],
            });
        }
    });

    // Testimonials slider five
    $(".testimonials-slider-thirteen").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 1500,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                arrows: true,
                direction: "rtl",
                centerMode: true,
                prevArrow: $(".services-prev"),
                nextArrow: $(".services-next"),
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                ],
            });
        }
    });

    if ($("#datetimepickershow").length > 0) {
        $("#datetimepickershow").datetimepicker({
            inline: true,
            sideBySide: true,
            format: "DD-MM-YYYY",
            icons: {
                up: "fas fa-angle-up",
                down: "fas fa-angle-down",
                next: "fas fa-angle-right",
                previous: "fas fa-angle-left",
            },
        });
    }

    if ($(".viewall-one").length > 0) {
        $(".viewall-one").hide();
        $(".viewall-button-one").on("click", function () {
            $(this).text($(this).text() === "Less" ? "View More" : "Less");
            $(".viewall-one").slideToggle(900);
        });
    }
    if ($(".viewall-two").length > 0) {
        $(".viewall-two").hide();
        $(".viewall-button-two").on("click", function () {
            $(this).text($(this).text() === "Less" ? "View More" : "Less");
            $(".viewall-two").slideToggle(900);
        });
    }
    if ($(".viewall-3").length > 0) {
        $(".viewall-3").hide();
        $(".viewall-button-3").on("click", function () {
            $(this).text($(this).text() === "Less" ? "View More" : "Less");
            $(".viewall-3").slideToggle(900);
        });
    }
    if ($(".viewall-4").length > 0) {
        $(".viewall-4").hide();
        $(".viewall-button-4").on("click", function () {
            $(this).text($(this).text() === "Less" ? "View More" : "Less");
            $(".viewall-4").slideToggle(900);
        });
    }
})(jQuery);

document.addEventListener("DOMContentLoaded", function () {
    const scrollers = document.querySelectorAll(".horizontal-slide");
    scrollers.forEach((scroller) => {
        scroller.setAttribute("data-animated", true);
        const scrollerInner = scroller.querySelector(".slide-list");
        const scrollerContent = Array.from(scrollerInner.children);
        scrollerContent.forEach((item) => {
            const duplicatedItem = item.cloneNode(true);
            duplicatedItem.setAttribute("aria-hidden", true);
            scrollerInner.appendChild(duplicatedItem);
        });
    });

    // Company Slider Two
    $(".company-slider-two").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 6, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 4, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                ],
            });
        }
    });

    // Testimonial Slider Two
    $(".testimonial-slider-two").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                autoplay: false,
                arrows: false,
                variableWidth: true,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                ],
            });
        }
    });

    // Testimonial Slider
    $(".testimonial-slider-four").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                autoplay: true,
                arrows: false,
                variableWidth: true,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                ],
            });
        }
    });

    // Partner Slider
    $(".partner-slider-four").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 6, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 4, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                ],
            });
        }
    });

    // Company Slider Two
    $(".hospital-slider-four").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 6, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 4, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                ],
            });
        }
    });

    // Image Trail
    if (typeof gsap !== "undefined") {
        const trailImages = document.querySelectorAll(".content-img");
        const interactionArea = document.querySelector(".trail-content");

        let mouseStopTimer;
        const HIDE_DELAY = 400;

        function hideTrail() {
            gsap.to(trailImages, { opacity: 0, duration: 0.5, stagger: 0.05 });
        }
        function showTrail() {
            gsap.to(trailImages, { opacity: 1, duration: 0.1 });
        }

        if (interactionArea) {
            interactionArea.addEventListener("mousemove", (e) => {
                clearTimeout(mouseStopTimer);
                showTrail();

                gsap.to(trailImages, {
                    x: e.clientX,
                    y: e.clientY,
                    stagger: 0.08,
                    duration: 0.7,
                    ease: "power3.out",
                    overwrite: "auto",
                });

                mouseStopTimer = setTimeout(hideTrail, HIDE_DELAY);
            });

            interactionArea.addEventListener("mouseleave", hideTrail);
            interactionArea.addEventListener("mouseenter", showTrail);
        }

        hideTrail();
    }

    // Service Slider
    $(".service-slider").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: false,
                arrows: true,
                prevArrow:
                    "<span class='slick-prev'><i class='isax isax-arrow-left'></i></span>",
                nextArrow:
                    "<span class='slick-next'><i class='isax isax-arrow-right-1'></i></span>",
                responsive: [
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                            centerMode: false,
                        },
                    },
                ],
            });
        }
    });

    // Wow
    if (typeof WOW !== "undefined") {
        new WOW({
            offset: 0,
            mobile: true,
        }).init();
    }

    // Skrollr animation
    var skroller;
    function initSkrollr() {
        if (typeof skrollr !== "undefined" && typeof skrollr !== null) {
            skroller = skrollr.init({
                forceHeight: false,
                smoothScrollingDuration: 1000,
                mobileCheck: function () {
                    return false;
                },
            });
        }
    }
    function destroySkrollr() {
        if (typeof skroller !== typeof undefined && skroller != "undefined") {
            skroller.destroy();
        }
    }
    if ($(window).width() >= 1200) {
        initSkrollr();
    }
    $(window).on("resize", function () {
        if ($(window).width() <= 1199) {
            destroySkrollr();
        } else {
            initSkrollr();
        }
    });

    // Aricle Hover
    const items = document.querySelectorAll(".services-item-seven");
    items.forEach((item) => {
        item.addEventListener("mouseenter", () => {
            // remove active from all
            items.forEach((i) => i.classList.remove("active"));
            // add active only to hovered one
            item.classList.add("active");
        });
    });

    // Aricle Hover
    const itemsEleven = document.querySelectorAll(".team-item-eleven");
    itemsEleven.forEach((item) => {
        item.addEventListener("mouseenter", () => {
            // remove active from all
            items.forEach((i) => i.classList.remove("active"));
            // add active only to hovered one
            item.classList.add("active");
        });
    });

    // Partner Slider
    $(".partner-slider-seven").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: { slidesToShow: 6, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 4, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 575,
                        settings: { slidesToShow: 1, slidesToScroll: 1 },
                    },
                ],
            });
        }
    });

    // Testimonial Slider
    $(".testimonial-slider-seven").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                arrows: true,
                prevArrow: $(".testimonial-prev"),
                nextArrow: $(".testimonial-next"),
                vertical: true,
                verticalSwiping: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            autoplay: false,
                        },
                    },
                ],
            });
        }
    });

    // Partner Slider
    $(".partner-slider-ten").each(function () {
        const $slider = $(this);
        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                speed: 2000,
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: { slidesToShow: 4, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 3, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 2, slidesToScroll: 1 },
                    },
                    {
                        breakpoint: 575,
                        settings: { slidesToShow: 1, slidesToScroll: 1 },
                    },
                ],
            });
        }
    });

    // Testimonial Slider
    $(".testimonial-slider-ten").each(function () {
        const $slider = $(this);

        if (!$slider.hasClass("slick-initialized")) {
            $slider.slick({
                dots: false,
                infinite: true,
                arrows: false,
                speed: 2000,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: false,
                vertical: true,
                verticalSwiping: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        },
                    },
                ],
            });
        }
    });

    // Video
    const video = document.getElementById("video");

    if (video) {
        video.addEventListener("click", function () {
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }
        });
    }

    // Vision Hover
    const vision = document.querySelectorAll(".about-vision");
    vision.forEach((item) => {
        item.addEventListener("mouseenter", () => {
            // 1. Remove 'active' class from ALL items in the collection
            vision.forEach((i) => i.classList.remove("active"));

            // 2. Add 'active' class ONLY to the current hovered item
            item.classList.add("active");
        });
    });

    // Vertical Slider
    if ($(".testimonial-slider-eleven").length > 0) {
        $(".slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: ".slider-nav",
        });

        $(".slider-nav").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: ".slider-for",
            dots: false,
            arrows: false,
            focusOnSelect: true,
            centerMode: true, // ⭐ centers active thumb
            centerPadding: "0px",
            infinite: true,
            variableWidth: true,
            speed: 1,
            responsive: [
                {
                    breakpoint: 992,
                    settings: { slidesToShow: 3 },
                },
                {
                    breakpoint: 768,
                    settings: { slidesToShow: 2 },
                },
                {
                    breakpoint: 576,
                    settings: { slidesToShow: 1 },
                },
            ],
        });
    }
});

// Img slide
// --- Minimal safe fix (declares active + guards missing elements) ---
let active = false; // <-- prevents "active is not defined"

const scroller = document.querySelector(".scroller");
const wrapper = document.querySelector(".wrapper");
const after = document.querySelector(".after");

if (!scroller || !wrapper || !after) {
    // If any element is missing, stop and log a friendly warning instead of throwing.
    console.warn(
        "Init aborted: .scroller, .wrapper or .after element not found.",
    );
} else {
    scroller.addEventListener("mousedown", function () {
        active = true;
        scroller.classList.add("scrolling");
    });

    document.body.addEventListener("mouseup", function () {
        active = false;
        scroller.classList.remove("scrolling");
    });

    document.body.addEventListener("mouseleave", function () {
        active = false;
        scroller.classList.remove("scrolling");
    });

    // Mouse move
    document.body.addEventListener("mousemove", function (e) {
        if (!active) return;
        let x = e.pageX;
        scrollIt(x);
    });

    // Touch events (start/end/cancel + move)
    scroller.addEventListener("touchstart", function () {
        active = true;
        scroller.classList.add("scrolling");
    });

    document.body.addEventListener("touchend", function () {
        active = false;
        scroller.classList.remove("scrolling");
    });

    document.body.addEventListener("touchcancel", function () {
        active = false;
        scroller.classList.remove("scrolling");
    });

    document.body.addEventListener(
        "touchmove",
        function (e) {
            if (!active) return;
            const t = e.touches && e.touches[0];
            if (!t) return;
            scrollIt(t.pageX);
            // prevent accidental page scroll while dragging (optional)
            // e.preventDefault();
        },
        { passive: true },
    );

    // Keep original scrollIt behavior but calculate relative position to wrapper
    function scrollIt(x) {
        const rect = wrapper.getBoundingClientRect();
        const relativeX = x - rect.left; // x relative to wrapper
        const transform = Math.max(0, Math.min(relativeX, wrapper.offsetWidth));
        after.style.width = transform + "px";
        scroller.style.left = transform - 25 + "px"; // kept your original offset (-25)
    }

    // initial state (keeps your original)
    scrollIt(150);
}

document.querySelectorAll(".animate-button").forEach((btn) => {
    const text = btn.getAttribute("data-text");
    const container = btn.querySelector(".button-text");

    container.innerHTML = "";

    const chars = text.split("");
    const total = chars.length;
    const angle = 360 / total;

    chars.forEach((char, i) => {
        const span = document.createElement("span");
        span.textContent = char;
        span.style.setProperty("--index", i);
        span.style.setProperty("--angle", angle);
        container.appendChild(span);
    });
});
