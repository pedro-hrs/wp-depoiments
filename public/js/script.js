jQuery(function ($) {

  $(document).ready(function () {
    $('.wp-depoiments').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3500,
      arrows: false,
      dots: true,
      dotsClass: 'wp-depoiments-dots',
      pauseOnHover: false
    });
  });
  console.log('oi')
});