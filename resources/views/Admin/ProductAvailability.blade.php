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

    <title>Stock Info</title>
  </head>


@section('section')

  <body>

    <div class="container">
        <div class="jumbotron">
            <h1> Stock info</h1>
            <table class="table table-hover">
                <thead>
                  <tr class="table-success">
                    <th scope="col">ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Supplier name</th>

                    <th scope="col">Product_code</th>
                    <th scope="col">Catagory</th>
                    <th scope="col">Type</th>

                    <th scope="col">Availble Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Product picture</th>
                    <th scope="col">Comment</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ( $product as $products )
                    @php $total="0" @endphp
                   <tr class="table-danger">
                    <th>{{$products->id}}</th>
                    <th>{{$products->name}}</th>
                    <th>{{$products->Vendor_name}}</th>

                    <th>{{$products->product_code}}</th>
                    <th>{{$products->catagory}}</th>
                    <th>{{$products->Type}}</th>

                   <th>{{$total=($products->quantity-$products->orderedQuantity)}}</th>

                    <th>{{$products->price}}</th>
                    <th> <img src="{{ asset('/images/'. $products->image) }}" width="100px;" height="100px;"</th>
                    @if ($total<3)

                    <th><a href= "#" class="btn btn-success">Send Voucher to seller</a></th>

                    @else
                    <th> Product is available in stock</th>
                    @endif


                  </tr>
                  @endforeach

                </tbody>

              </table>

            </body>

            </html>
      @endsection
