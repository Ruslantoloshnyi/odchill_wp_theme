
jQuery(document).ready(function($) {
    $('.carousel').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        prevArrow: '<button type="button" class="slick-prev">&#60;</button>',
        nextArrow: '<button type="button" class="slick-next">&#62;</button>',
    });
});
