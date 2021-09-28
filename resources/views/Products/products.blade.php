@extends('SidebarNavbar')

@section('Section')
@include('Vendors.vendorsidebar')
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
        <div class="jumbotron">
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
                    <th>{{$products->id}}</th>
                    <th>{{$products->name}}</th>
                    <th>{{$products->Vendor_name}}</th>
                    <th>{{$products->Company_name}}</th>
                    <th>{{$products->product_code}}</th>
                    <th>{{$products->catagory}}</th>
                    <th>{{$products->Type}}</th>
                    <th>{{$products->description}}</th>
                    <th>{{$products->quantity}}</th>
                    <th>{{$products->price}}</th>
                    <th> <img src="{{ asset('/images/'. $products->image) }}" width="100px;" height="100px;"</th>
                    <th><a href= "{{ route('products.edit', $products->id)}}" class="btn btn-success">EDIT</a></th>
                    <th>
                        <form action="{{ route('products.destroy', $products->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </th>
                  </tr>
                  @endforeach
                </tbody>

              </table>
              <div>
                <td><button onclick="location.href='{{ url('products') }}'" type="button" class="btn btn-success" name="products">Add Product</button></td>
            </div>

            </body>

            </html>
      @endsection
