@extends('SidebarNavbar')
@section('Section')
@include('Admin.AdminSidebar')
@endsection
@section('section')
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Products</title>
  </head>
  <body>

    <div class="container">
        <div class="jumbotron">
            <h1> Restock Messages</h1>
            <table class="table table-hover">
                <thead>
                  <tr class="table-success">
                    <th scope="col">ID</th>
                    <th scope="col">product id</th>
                    <th scope="col">Product_code</th>
                    <th scope="col">Customer name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $messages as $message )
                  <tr class="table-danger">
                    <th>{{$message->id}}</th>
                    <th>{{$message->product_id}}</th>
                    <th>{{$message->product_code}}</th>
                    <th>{{$message->name}}</th>
                    <th>{{$message->email}}</th>
                    <th>{{$message->contact}}</th>
                    <th>
                        <form action="" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </th>
                  </tr>
                  @endforeach
                </tbody>

              </table>


            </body>

            </html>
 @endsection
