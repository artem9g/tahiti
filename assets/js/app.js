jQuery(document).foundation()

//hero-slider
jQuery(document).ready(() => {
  jQuery(".hero-slider").slick({ slidesToShow: 1, autoplay: true, autoplaySpeed: 3500, dots: false, prevArrow: false, nextArrow: false })
})
//expereience-tahiti-slider
jQuery(document).ready(() => {
  jQuery(".expereience-tahiti__slider").slick({ slidesToShow: 1, autoplay: false, autoplaySpeed: 555500, dots: false, prevArrow: false, nextArrow: false })
})
//discover Tahiti  CARDS slider
jQuery(document).ready(function () {
  jQuery(".cardsslider").slick({
    dots: false,
    arrows: false,
    autoplay: true,
    pauseOnHover: false,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1220,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
      {
        breakpoint: 940,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 650,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  })
})
