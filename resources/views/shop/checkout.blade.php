@extends('layouts.master')

@section('title')
    Design Hub Checkout
@endsection

@yield('extra-css')
<script src="https://js.stripe.com/v3/"></script>

@section('content')
    <div class="row">
        <div class="col-md-8" style="margin-left: 50px; padding: 50px">
            <h1 style="margin-left: 20px; padding-bottom: 20px">Checkout</h1>
            <h4>Total: ${{ $total }}.00</h4>
            <div id="charge-error"
                 class="alert alert-danger" {{!\Illuminate\Support\Facades\Session::has('error')? 'hidden':''}}>
                {{ \Illuminate\Support\Facades\Session::get('error') }}
            </div>
            <form action="{{url('/checkout')}}" method="Post" id="payment-form">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="name" class="price">Name</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="address" class="price">Address</label>
                            <input type="text" id="address" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="city" class="price">City</label>
                            <input type="text" id="city" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="address_state" class="price">State</label>
                            <input type="text" id="address_state" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="postalcode" class="price">Zip Code</label>
                            <input type="text" id="postalcode" class="form-control" required>
                        </div>
                    </div>
                </div>
                <label for="card-element">
                    Credit or debit card
                </label>
                <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
                <a type="submit" class="btn btn-success" href="{{url("thankyou")}}">Submit</a>
            </form>

        </div>

    </div>

@endsection

@section('scripts')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}"/>
    <script>
        var publishable_key = '{{ env('STRIPE_PUBLISHABLE_KEY') }}';
    </script>
    <script src="{{ asset('/js/card.js') }}"></script>

    <script>
        (function () {
// Create a Stripe client.
            var stripe = Stripe('pk_test_SS5s0LiB8rqflgtvr04Q6yd200dt362x48');

// Create an instance of Elements.
            var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

// Create an instance of the card Element.
            var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

// Handle real-time validation errors from the card Element.
            card.addEventListener('change', function (event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

// Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                var options = {
                    name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('address').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('address_state').value,
                    address_zip: document.getElementById('postalcode').value,
                }

                stripe.createToken(card, ).then(function (result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

// Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        })();
    </script>
@endsection
