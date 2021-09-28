@extends('SidebarNavbar')

@section('Section')
@include('Admin.AdminSidebar')
@endsection

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Review order</title>
  </head>


@section('section')

  <body>

    <div class="container-fluid mt-5">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0">
                            Order Review
                        </h6>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4> Order details</h4>
                        <div class="row">


                            <div class="col-md-4 mt-3">
                                <div class="border p-2">
                                    <label> Customer name</label>
                                    <h6>{{$orders->name}}</h6>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="border p-2">
                                    <label> Phone</label>
                                    <h6>{{$orders->phone}}</h6>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="border p-2">
                                    <label>Email</label>
                                    <h6>{{$orders->email}}</h6>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="border p-2">
                                    <label> Address </label>
                                    <h6>{{$orders->address}}</h6>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="border p-2">
                                    <label>Tracking id </label>
                                    <h6>{{$orders->tracking_id}}</h6>
                                </div>
                            </div>
                            <div class="col-md-3 mt-3">
                                <div class="border p-2">
                                    <label>Transaction id</label>
                                    <h6>{{isset($orders->transaction_id)== true ? $orders->transaction_id:'Null'}}</h6>
                                </div>
                            </div>
                            <div class="col-md-3 mt-3">
                                <div class="border p-2">
                                    <label> Payment option</label>
                                    <h6>{{$orders->pay_mode}}</h6>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="border p-2">
                                    <label>Order status</label>
                                    <h6>{{$orders->status}}</h6>
                                </div>
                            </div>

                        </div>
                        <hr class="bg-darl">
                        <h4>Ordered items</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderd">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item )


                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->product->name}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{ number_format((float)$item->price,2) }}</td>

                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="text-right">Grand total</td>
                                            <td>{{number_format((float)$item->price,2) *$item->quantity}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ url('order_review',$orders->id) }}" class="btn btn-success">Review Order</a>

                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>


  </body>
  @endsection
