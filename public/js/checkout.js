Stripe.setPublishableKey('pk_test_SS5s0LiB8rqflgtvr04Q6yd200dt362x48');

var $form = $('#checkout-form');
$form.submit(function(event){
    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name:$('#card-name').val()
    }, stripeResponseHandler);
});


