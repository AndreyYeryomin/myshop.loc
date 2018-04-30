
$( document ).ready(function() {
  $('.slick-slider').slick({
      dots: true
      }
  );

  $('.basket > a').text("");
  $('.basket > a').append("<img src='wp-content/themes/twentyseventeen-child/assets/img/Basket_icon.png'>");

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