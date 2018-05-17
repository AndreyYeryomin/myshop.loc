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
		    });			
		}		
	});
});