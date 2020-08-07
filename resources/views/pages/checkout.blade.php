@extends('layouts.app')

@section('my-style')
    <style>

    </style>
@endsection

@section('content')
    <div class="container mt-1 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card my-5">
                    <h2 class="text-info font-weight-bold">Checkout With Credit && Debit Card</h2>
                    <h3 class="text-info">The Total amount Price is <strong>{{$amount}}</strong></h3>
                    <div class="card-body">

                        <form action="/charge" method="post" id="payment-form">
                            @csrf
                            <div class="form-group">
                                <label for="card-element">
                                    <input type="hidden" name="amount" value="{{$amount}}">
                                    <span class="text-success font-weight-bold my-4"> Credit or debit card</span>
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display Element errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>

                            <span class="my-4 ">
                              <button class="btn btn-block btn-primary">Submit Payment</button>
                                <h5 id="loading" style="display: none;" class="my-3">Payment Loading ! it is in process ... <i class="fa fa-spinner fa-spin"></i></h5>
                          </span>
                        </form>

                    </div>
                </div>

                <div class="card mt-2">
                    <h2 class="text-warning">for checkout copier the test credit cart</h2>
                    <input class="form-control  text-danger text-center" type="text" value="4242 4242 4242 4242" id="copyMe">
                    <button class="btn btn-block btn-success" onclick="copyMyText()">Copy The Test Credit Cart</button>
                </div>

            </div>

           <div class="col-md-6">
               <div class="card my-5">
                   <h2 class="text-info font-weight-bold">Checkout With Paypal</h2>
                   <div class="card-body">
                       <span class="my-4 ">
                           <h3 class="text-info">The Total amount Price is <strong>{{$amount}}</strong></h3>
                              <button class="btn btn-block btn-primary">Payment with Paypal</button>
                          </span>
                   </div>
               </div>
           </div>
        </div>
    </div>
@endsection

@section('my-script')
    <script>
        function copyMyText() {
            //select the element with the id "copyMe", must be a text box
            var textToCopy = document.getElementById("copyMe");
            //select the text in the text box
            textToCopy.select();
            //copy the text to the clipboard
            document.execCommand("copy");
        }
    </script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        window.onload = function (){
            let stripe = Stripe('pk_test_hTyDO8JSqK5XMMoKdlQLXu7d00vgzx80q6');
            let elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            let style = {
                base: {
                    // Add your base input styles here. For example:
                    fontSize: '16px',
                    color: '#32325d',
                },
            };

            // Create an instance of the card Element.
            let card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Create a token or display an error when the form is submitted.
            let form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the customer that there was an error.
                        let errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                let form = document.getElementById('payment-form');
                let hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // show the spin loading payment
                let loading = document.getElementById('loading');
                loading.style.display = 'block';
                // Submit the form
                form.submit();
            }

        }
    </script>
@endsection

