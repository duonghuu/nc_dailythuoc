$('.about-slider-for').on({
    beforeChange: function(event, slick, currentSlide, nextSlide) {
        myLazyLoad.update();
    }
}).slick({
    lazyLoad: 'ondemand',
    infinite: true,
    accessibility: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 3000,
    speed: 1000,
    vertical: false,
    arrows: false,
    centerMode: false,
    dots: false,
    draggable: true,
    fade: true,
    asNavFor: '.about-slider-nav'
});
$('.about-slider-nav').on({
      beforeChange: function(event, slick, currentSlide, nextSlide) {
          myLazyLoad.update();
      }
  }).slick({
      lazyLoad: 'ondemand',
      infinite: true,
      accessibility: false,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 3000,
      speed: 1000,
      arrows: true,
      centerMode: false,
      dots: false,
      draggable: true,
      asNavFor: '.about-slider-for',
      focusOnSelect: true,
  });
$('.spnoibat-main').on({
      beforeChange: function(event, slick, currentSlide, nextSlide) {
          myLazyLoad.update();
      }
  }).slick({
      lazyLoad: 'ondemand',
      infinite: true,
      accessibility: false,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      speed: 1000,
      arrows: true,
      centerMode: false,
      dots: false,
      draggable: true,
      responsive: [{
          breakpoint: 800,
          settings: {
              slidesToShow: 3,
          }
      }, {
          breakpoint: 430,
          settings: {
              slidesToShow: 1
          }
      }, {
          breakpoint: 330,
          settings: {
              slidesToShow: 1
          }
      }]
  });
  $('.vlog-main').on({
      beforeChange: function(event, slick, currentSlide, nextSlide) {
          myLazyLoad.update();
      }
  }).slick({
      lazyLoad: 'ondemand',
      infinite: true,
      accessibility: false,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 3000,
      speed: 1000,
      vertical: false,
      arrows: true,
      centerMode: false,
      dots: false,
      draggable: true,
  });
  $('.tinnb-main').on({
      beforeChange: function(event, slick, currentSlide, nextSlide) {
          myLazyLoad.update();
      }
  }).slick({
     lazyLoad: 'ondemand',
           infinite: true,
           accessibility: false,
           slidesToShow: 2,
           slidesToScroll: 1,
           vertical: false,
           autoplay: true,
           autoplaySpeed: 3000,
           speed: 1000,
           arrows: true,
           centerMode: false,
           dots: false,
           draggable: true,
  });