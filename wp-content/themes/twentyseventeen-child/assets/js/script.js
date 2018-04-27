
$( document ).ready(function() {
  $('.slick-slider').slick({
      dots: true
      }
  );
  length = 100 / $('.slick-dots > li').length;
    $('.slick-dots > li').css({'width':length + '%',"display":"inline-block"});
});