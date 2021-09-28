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
            <h1>Buyers</h1>
            <table class="table table-hover">
                <thead>
                  <tr class="table-success">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>

                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $customers as $customer )
                  <tr class="table-danger">
                    <th>{{$customer->id}}</th>
                    <th>{{$customer->name}}</th>
                    <th>{{$customer->email}}</th>
                    <th>{{$customer->address}}</th>
                    <th>{{$customer->city}}</th>
                    <th>{{$customer->contact}}</th>

                    <th>
                        <form action="{{url('remove-user',$customer->id)}}" method="post">
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
