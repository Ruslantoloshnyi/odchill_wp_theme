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

