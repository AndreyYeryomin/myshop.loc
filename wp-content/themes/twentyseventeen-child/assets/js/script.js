

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


    $(document).ready(function() {
        if($('#payment_method_stripe_subscription').attr('checked')){
            $('#place_order').val('Pay vai stripe');
        }
        $('body').on('click','input[name="payment_method"]',function(){
            if($(this).val()=='stripe_subscription'){
                $('#place_order').val('Pay vai stripe');
            }
            else{
                $('#place_order').val('Place order');
            }
        });
        $('body').on('click','#place_order',function(e){
            if($(this).val()=='Pay vai stripe'){
                e.preventDefault();
                var form=$(this).parent('form');
                var billing_email=$('#billing_email').val();
                var price=$('#stripe_data').attr('data-amount');
                var charge_currency=jQuery('#stripe_data').attr('data-currency');
                var site_icon=$('#stripe_data').attr('data-image');
                var site_name=$('#stripe_data').attr('data-name');
                var access_key=$('#stripe_data').attr('data-key');
                var handler = StripeCheckout.configure({
                    key: access_key,
                    token: function(token, args){
                        $('form.woocommerce-checkout').append( '<input type="hidden" class="stripe_token" name="stripe_token" value="' + token.id + '"/>' );
                        $('form.woocommerce-checkout').submit();
                    }
                });
                handler.open({
                    amount: price,
                    email:billing_email,
                    name: site_name,
                    image:site_icon,
                    description: "place the order",
                    panelLabel: "Pay",
                    currency: charge_currency,
                    shippingAddress: true,
                    billingAddress: true,
                });
            }
        });
    });

});