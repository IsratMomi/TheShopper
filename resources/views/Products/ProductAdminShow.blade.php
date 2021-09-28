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

    <title>Products</title>
  </head>


@section('section')

  <body>

    <div class="container">

            <h1> Product Table </h1>
            <table class="table table-hover">
                <thead>
                  <tr class="table-success">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Supplier name</th>
                    <th scope="col">Company name</th>
                    <th scope="col">Product_code</th>
                    <th scope="col">Catagory</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Available image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $product as $products )
                  <tr class="table-danger">
                    <td>{{$products->id}}</td>
                    <td>{{$products->name}}</td>
                    <td>{{$products->Vendor_name}}</td>
                    <td>{{$products->Company_name}}</td>
                    <td>{{$products->product_code}}</td>
                    <td>{{$products->catagory}}</td>
                    <td>{{$products->Type}}</td>
                    <td>{{$products->description}}</td>
                    <td>{{$products->quantity}}</td>
                    <td>{{$products->price}}</td>
                    <td> <img src="{{ asset('/images/'. $products->image) }}" width="100px;" height="100px;"></td>
                    @if ($products->quantity<3)

                    <td><a data-pid="{{$products->id}}" data-name="{{$products->name}}"
                        data-sellerid="{{$products->Vendor_id}}" data-quantity="{{$products->quantity}}"
                        data-code="{{$products->product_code}}" data-company="{{$products->Company_name}}" data-toggle="modal" data-target="#sendVoucher" type="button" class="btn btn-info btn-sm">Send voucher</a>

                      </td>
                    @elseif ($products->quantity==3)
                    <td>Stock is getting low, please contact vendor</td>
                    @else
                    <td> Product is available</td>
                    @endif


                  </tr>
                  @endforeach
                </tbody>

              </table>

        </div>
        <script>

            @if (session('status'))
            alertify.set('notifier','position','top-right');
            alertify.success("{{ session('status') }}");
            @endif
        </script>


</body>



@endsection
