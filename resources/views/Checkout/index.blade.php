@extends('layout')

    @section('content')
    <section style="padding: 70px;">
    </section>
    <!--<section class="bg-success">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-2 py-3">
                    <h5><a href="/" class="text-dark">Home</a> › Checkout</h5>
                </div>
            </div>
        </div>

    </section>-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <form action="{{url('place-order')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name ="name" class="form-control" placeholder="your name" value="{{Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="your email" value="{{Auth::user()->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Contact</label>
                                    <input type="text" name="contact-no" class="form-control" placeholder="Contact no" value="{{Auth::user()->contact}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Alternate contact</label>
                                    <input type="text" name="alt_contact" class="form-control" placeholder="alt contact" value="{{Auth::user()->alt_contact}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="flat no, road no" value="{{Auth::user()->address}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">City</label>
                                    <input type="text" name="city" class="form-control" placeholder="city" value="{{Auth::user()->city}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Zip code</label>
                                    <input type="text" name="zip_code" class="form-control" placeholder="city zip" value="{{Auth::user()->zip_code}}">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <button type="submit" id="Cash_on_delivery" name="place_order_btn" class="btn btn-success">place your order</button>
                            </div>

                        </div>
                    </form>
                    <section style="padding: 5px;">
                    <div class="col-md-3">
                        <a href="{{ url('sslPay') }}" name ="online_pay" class="btn btn-success btn-block checkout-btn">Pay online</a>
                    </div>
                    </section>
                </div>
                <div class="col-md-5">
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
                </div>

            </div>
        </div>
    </section>




@endsection
