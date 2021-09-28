@extends('SidebarNavbar')

@section('Section')
@include('Vendors.vendorSidebar')
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
            <h1> Vouchers </h1>
            <table class="table table-hover">
                <thead>
                  <tr class="table-success">
                    <th scope="col">ID</th>
                    <th scope="col">Product id</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product code</th>
                    <th scope="col">Requested amount</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $vouchers as $voucher )
                  <tr class="table-danger">
                    <td>{{$voucher->id}}</td>
                    <td>{{$voucher->product_id}}</td>
                    <td>{{$voucher->product_name}}</td>
                    <td>{{$voucher->product_code}}</td>
                    <td>{{$voucher->quantity}}</td>
                    <td>{{$voucher->message}}</td>

                    <th>
                        <form action="#" method="post">
                          @csrf
                          @method('DELETE')
                            <button class="btn btn-primary" type="submit">Proceed</button>
                          | <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </th>
                  </tr>
                  @endforeach
                </tbody>

              </table>

            </body>

            </html>
      @endsection
