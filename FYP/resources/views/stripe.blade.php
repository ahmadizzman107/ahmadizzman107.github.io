<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe</title>
    
    <script src="https://js.stripe.com/v3/"></script>
    
    <style>.StripeElement {
    box-sizing: border-box;

    height: 40px;

    padding: 10px 12px;

    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;

    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
    border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
    }
</style>
</head>
<body>
<form id="payment-form">
<div class="sr-payment-form">
          <div class="sr-combo-inputs-row">
            <div class="sr-input sr-card-element StripeElement StripeElement--empty" id="card-element"><div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important;"><iframe frameborder="0" allowtransparency="true" scrolling="no" name="__privateStripeFrame5" allowpaymentrequest="true" src="https://js.stripe.com/v3/elements-inner-card-1cdd0510f979d893c0258b8cd358739f.html#style[base][color]=%2332325d&amp;style[base][fontFamily]=%22Helvetica+Neue%22%2C+Helvetica%2C+sans-serif&amp;style[base][fontSmoothing]=antialiased&amp;style[base][fontSize]=16px&amp;style[base][::placeholder][color]=%23aab7c4&amp;style[invalid][color]=%23fa755a&amp;style[invalid][iconColor]=%23fa755a&amp;componentName=card&amp;wait=false&amp;rtl=false&amp;keyMode=test&amp;apiKey=pk_test_51GvH0KB2cbv0CiieehJMju85jeXy4hszs3oSCdfnnILJMcNZ6oI99kcA8Qu5DZkL0GJ3nKzk9mVGyHNW5yO3iuji005W9s7Lgf&amp;origin=https%3A%2F%2Fstripe.com&amp;referrer=https%3A%2F%2Fstripe.com%2Fdocs%2Fpayments%2Faccept-a-payment&amp;controllerId=__privateStripeController1" title="Secure payment input frame" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; height: 19.1875px;"></iframe><input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: 0px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;"></div></div>
          </div>
          <div class="sr-field-error" id="card-errors" role="alert"></div>
          <button class="submit" id="submit">
            <div class="spinner hidden" id="spinner"></div>
            <span id="button-text">Pay Now</span><span id="order-amount"></span>
          </button>
          <button class="sr-pill fill-card"><i></i><span>Prefill card details</span></button>
        </div>
</form>
<script>
    function(){
        var stripe = Stripe('pk_test_51GvH0KB2cbv0CiieehJMju85jeXy4hszs3oSCdfnnILJMcNZ6oI99kcA8Qu5DZkL0GJ3nKzk9mVGyHNW5yO3iuji005W9s7Lgf');
        var elements = stripe.elements();

        var style = {
        base: {
            color: "#32325d",
        }
        };
        var card = elements.create("card", { style: style });
        card.mount("#card-element");

        card.on('change', ({error}) => {
        const displayError = document.getElementById('card-errors');
        if (error) {
            displayError.textContent = error.message;
        } else {
            displayError.textContent = '';
        }
        });

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(ev) {
            ev.preventDefault();
            stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                card: card,
                billing_details: {
                    name: 'Jenny Rosen'
                }
                }
            }).then(function(result) {
                    if (result.error) {
                    // Show error to your customer (e.g., insufficient funds)
                    console.log(result.error.message);
                    } else {
                    console.log("Processing...");
                    if (result.paymentIntent.status === 'succeeded') {
                        console.log("Success!!!")
                    }
                    }
            });
        });
    };
</script>
</body>
</html>