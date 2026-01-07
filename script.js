

    
document.addEventListener('DOMContentLoaded', function () {
    $(".review-cards.owl-carousel").owlCarousel({
        items: 1,
        center: true,
        dots: false,
        loop: true,
        center: true,
        nav: true,
        navText: [
            '<div class="arrow-container"><img src="./Assets/images/pre-arrow.png" alt=""></div>',
            '<div class="arrow-container"><img src="./Assets/images/next-arrow.png" alt=""></div>'
        ]
    })

    $(".packages-grid.owl-carousel").owlCarousel({
        responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 2
        },
        1024: {
            items: 3
        }
    },
        dots: false,
        loop: true,
        center: true,
        nav: true,
        margin: 20,
        // autoWidth: true,
        navText: [
            '<div class="arrow-container"><img src="Assets/images/pre-arrow.png" alt=""></div>',
            '<div class="arrow-container"><img src="Assets/images/next-arrow.png" alt=""></div>'
        ]
    })
});

function loadVideo(img) {
    const iframe = img.parentElement.querySelector("iframe");
    iframe.src = "https://www.youtube.com/embed/l1Cnz4Jeq5Q?si=LBwWIZAI-xTFB5WG?autoplay=1";
    iframe.style.display = "block";
    img.style.display = "none";
}

$('.feeds.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
})

$('body#website-analysis section.website-analysis .row.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,

    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        768: {
            items: 2
        },

        1000: {
            items: 4.5
        }
    }
})


 $('section.feedback .row.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: [
                '<div class="arrow-container"><img src="Assets/images/pre-arrow.png" alt=""></div>',
                '<div class="arrow-container"><img src="Assets/images/next-arrow.png" alt=""></div>'
            ],

            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })

document.addEventListener('DOMContentLoaded', function () {
    $(".google-reviews .owl-carousel").owlCarousel({
        items: 1,
        center: true,
        dots: false,
        loop: true,
        center: true,
        nav: true,
        navText: [
            '<div class="arrow-container"><img src="Assets/images/pre-arrow.png" alt=""></div>',
            '<div class="arrow-container"><img src="Assets/images/next-arrow.png" alt=""></div>'
        ]
    })
    $(".our-clients .owl-carousel").owlCarousel({
        items: 2,
        dots: false,
        loop: true,
        center: false,
        // autoWidth: true,
        margin: 20,
        // video:true,
        nav: true,
           responsive: {
            // breakpoint from 0 up
            0: {
                items: 1,
            },
            // breakpoint from 480 up
            480: {
                items: 1,
            },
            // breakpoint from 768 up
            768: {
                items: 1,
            }
        },
        navText: [
            '<div class="arrow-container"><img src="Assets/images/pre-arrow.png" alt=""></div>',
            '<div class="arrow-container"><img src="Assets/images/next-arrow.png" alt=""></div>'
        ]
    })

    $(".stats-img.owl-carousel").owlCarousel({
        items: 1,
        dots: false,
        loop: true,
        center: true,
        // autoWidth: true,
        // margin: 20,
        nav: true,
        responsive: {
            // breakpoint from 0 up
            0: {
                items: 1,
            },
            // breakpoint from 480 up
            480: {
                items: 1,
            },
            // breakpoint from 768 up
            768: {
                items: 1,
            }
        },
        navText: [
            '<div class="arrow-container"><img src="./images/white-left-arrow.png" alt=""></div>',
            '<div class="arrow-container"><img src="./images/white-right-arrow.png" alt=""></div>'
        ],

    })
});



document.addEventListener('DOMContentLoaded', function () {
    $(".review-cards.owl-carousel").owlCarousel({
        items: 1,
        center: true,
        dots: false,
        loop: true,
        center: true,
        nav: true,
        navText: [
            '<div class="arrow-container"><img src="./Assets/images/pre-arrow.png" alt=""></div>',
            '<div class="arrow-container"><img src="./Assets/images/next-arrow.png" alt=""></div>'
        ]
    })
    $(".packages-grid.owl-carousel").owlCarousel({
        items: 3,
        dots: false,
        loop: true,
        center: true,
        nav: true,
        margin: 25,
        // autoWidth: true,
        navText: [
            '<div class="arrow-container"><img src="./Assets//images/pre-arrow.png" alt=""></div>',
            '<div class="arrow-container"><img src="./Assets//images/next-arrow.png" alt=""></div>'
        ]
    })
});


jQuery(".hamburger").click(function () {
    jQuery(".nav-menu").addClass("active");
});

jQuery(".cross_icon img").click(function () {
    jQuery(".nav-menu").removeClass("active");
});

jQuery('.dropbtn').on('click', function() {
    jQuery(this).toggleClass('img-rotate');
    jQuery(this).siblings('.dropdown-content').toggleClass('active');
});
