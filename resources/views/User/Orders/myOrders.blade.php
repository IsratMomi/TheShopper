@extends('User.usersidebar')
@section('Section')
    @include('User.UserNav')
@endsection

@section('section')
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Orders</title>
  </head>




  <body>

    <div class="container">
        <div class="jumbotron">
            <h1> Orders</h1>
            <table class="table table-hover">
                <thead>
                  <tr class="table-success">

                    <th scope="col">Tracking no</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Total</th>

                    <th scope="col">Status</th>

                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>

                        <td>{{$order->tracking_id}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->amount}}</td>
                        <td>{{$order->status}}</td>
                        @if ($order->status=='On delivery')
                        <td>Order on delivery. you can not cancel your order</td>
                        @elseif($order->status=='processing'||$order->status=='Pending')

                        <td>
                            <form action="{{ route('order-delete', $order->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Cancel order</button>
                              </form>

                        </td>
                        @endif
                    </tr>
                    @endforeach




                </tbody>

              </table>

            </body>

            </html>
      @endsection
