// ***MENU***
var menuBtn = document.querySelector('.navigation__btn'),
    spans = menuBtn.getElementsByTagName('span'),
    menu = document.querySelector('.menu');
// open menu after click in menu button
menuBtn.addEventListener('click', function (event) {
  event.stopPropagation();
  menu.classList.toggle('active');
  for (i = 0; i<spans.length; i++) {
    spans[i].classList.toggle('active');
  }
}, false);
//close menu after click somewhere
document.addEventListener('click', function () {
  if (menu.classList.contains('active')) {
    menu.classList.remove('active');
    for (i = 0; i<spans.length; i++) {
      spans[i].classList.remove('active');
    }
  }
}, false);