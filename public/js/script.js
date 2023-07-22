jQuery(function ($) {

  $(document).ready(function () {
    $('.depoimentos').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3500,
      arrows: false,
      dots: true,
      dotsClass: 'dots-feedbacks',
      pauseOnHover: false
    });
  });
  console.log('oi')
});