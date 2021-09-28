<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>Example - EasyCheckout (Popup) | SSLCommerz</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <h2>EasyCheckout (Popup) - SSLCommerz</h2>

        <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. We have provided this
            sample form for understanding EasyCheckout (Popup) Payment integration with SSLCommerz.</p>
    </div>

    <form method="POST" class="needs-validation" novalidate>

        @if(isset($cart_data))
        @if(Cookie::get('shopping_cart'))
            @php $total="0" @endphp
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart_data as $data)
                    <tr>
                        <td>{{ $data['item_name'] }}</td>
                        <td>{{ number_format((float)$data['item_price'],2) }}</td>
                        <td>{{ $data['item_quantity'] }}</td>
                        @php $total = $total + ($data["item_quantity"] * (float)$data["item_price"]) @endphp
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <div class="text-right">
                <h5>Grand Total:{{number_format($total,2) }}</h5>
            </div>
            @endif
            @else
                <div class="row">
                        <div class="col-md-12 mycard py-5 text-center">
                               <div class="mycards">
                                   <h4>Your cart is currently empty.</h4>
                                   <a href="{{route('showProduct')}}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                               </div>
                           </div>
                       </div>
            @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" id="cus_name" name ="name" class="form-control" placeholder="your name" value="{{Auth::user()->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" id="cus_email" name="email" class="form-control" readonly placeholder="your email" value="{{Auth::user()->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Contact</label>
                                <input type="text" id="cus_contact" name="contact-no" class="form-control" placeholder="Contact no" value="{{Auth::user()->contact}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alternate contact</label>
                                <input type="text" id="alt_cont" name="alt_contact" class="form-control" placeholder="alt contact" value="{{Auth::user()->alt_contact}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" id="address" name="address" class="form-control" placeholder="flat no, road no" value="{{Auth::user()->address}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">City</label>
                                <input type="text" id="cus_city" name="city" class="form-control" placeholder="city" value="{{Auth::user()->city}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Zip code</label>
                                <input type="text" id="zip" name="zip_code" class="form-control" placeholder="city zip" value="{{Auth::user()->zip_code}}">
                            </div>
                        </div>

                        <div class="col-md-12">

                                <label for="">Total amount</label>
                                <input type="text" id="total" name="total" class="form-control"  value="0">

                        </div>

                    </div>

              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                      token="if you have any token validation"
                      postdata="your javascript arrays or objects which requires in backend"
                      order="If you already have the transaction generated for current order"
                      endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
              </button>
    </form>





</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


<!-- If you want to use the popup integration, -->
<script>
    var obj = {};
    obj.cus_name = $('#cus_name').val();
    obj.cus_phone = $('#cus_contact').val();
    obj.cus_alt_phone = $('#alt_cont').val();
    obj.cus_email = $('#cus_email').val();
    obj.cus_addr = $('#address').val();
    obj.cus_city = $('#cus_city').val();
    obj.cus_zip = $('#zip').val();
    obj.amount = $('#total').val();

    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
</body>
</html>
