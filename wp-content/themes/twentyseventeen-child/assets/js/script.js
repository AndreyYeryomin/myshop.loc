

$( document ).ready(function() {
    $('.scroll-bar > .svg2').css(
        "height",'0px'
    ).animate({
        height: "77px"
    }, 1500 );
  var t = $('.slick-slider').slick({
      dots: true,
      autoplay: true,
      autoplaySpeed: 1500,
      pauseOnFocus: false,
      pauseOnHover: false,
      pauseOnDotsHover: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      cssEase: 'linear'

      }
  );
    t.on('beforeChange', function(event, slick, currentSlide, nextSlide) {

        $('.scroll-bar > .svg2').css(
            "height",'0px'
        ).animate({
            height: "77px"
        }, 1500 );
    });
    $('.slider_related').slick({
        slidesToShow: 2,
        autoPlay: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 550,
                settings: {
                    arrows: false,
                    slidesToShow: 1
                }
            },
        ]
    });


    $('.basket > a').text("");
    $('.basket > a').append("<img src='http://myshop.loc/wp-content/themes/twentyseventeen-child/assets/img/Basket_icon.png'>");

  length = 100 / $('.slick-dots > li').length;
  $('.slick-dots > li').css({'width':length + '%',"display":"inline-block"});

$('.icon').on('click',function () {
    var menu = $('#primary-menu');
    if (menu.hasClass('responsive-menu')){
        menu.removeClass('responsive-menu');
    }else{
        menu.addClass('responsive-menu');
    }
})

});