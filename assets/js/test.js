"use strict";


function activeBurger() {
  var headerBurger = document.querySelector('.header__burger');
  var headerMenu = document.querySelector('.header__menu');
  var bodyNow = document.querySelector('body');
  headerBurger.addEventListener('click', function () {   
    headerBurger.classList.toggle('active');
    headerMenu.classList.toggle('active');
    bodyNow.classList.toggle('lock');
  });
}
;
activeBurger();

$(function () {
    $(".carousel").slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        prevArrow: '<button type="button" class="slick-prev">&#60;</button>',
        nextArrow: '<button type="button" class="slick-next">&#62;</button>',
    });
});