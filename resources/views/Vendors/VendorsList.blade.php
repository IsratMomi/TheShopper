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

    <title>Vendors</title>
  </head>


@section('section')

  <body>

    <div class="container">
        <div class="jumbotron">
            <h1> Vendors </h1>
            <table class="table table-hover">
                <thead>
                  <tr class="table-success">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $vendors as $vendor )
                  <tr class="table-danger">
                    <th>{{$vendor->id}}</th>
                    <th>{{$vendor->name}}</th>
                    <th>{{$vendor->email}}</th>
                    <th>{{$vendor->role_as}}</th>

                    <th>
                        <form action="{{ route('vendors.destroy', $vendor->id)}}" method="post">
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
