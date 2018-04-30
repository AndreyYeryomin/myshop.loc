
$( document ).ready(function() {
  $('.slick-slider').slick({
      dots: true
      }
  );

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