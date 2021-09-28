@extends('SidebarNavbar')

@section('Section')
@include('Vendors.vendorsidebar')
@endsection

@section('section')
<body>

    <div class="container">
        <div class="jumbotron">
            <h1> Orders</h1>
            <table class="table table-hover">
                <thead>

                  <tr class="table-success">
                    <th scope="col">Order ID</th>
                    <th scope="col">Product id</th>
                    <th scope="col">price</th>
                    <th scope="col">Quantity</th>


                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        @if ($order->vendorId == Auth::user()->id)


                        <td>{{$order->order_id}}</td>
                        <td>{{$order->product_id}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->quantity}}</td>

                        @if ($order->status == 'processing'||$order->status == 'Processing')
                        <td><a href="{{url('confirm-order')}}" class="badge btn-success">Confirm Order</a></td>

                        @else
                        <td>{{$order->status}}</td>
                        @endif
                        @endif
                    </tr>
                    @endforeach


                </tbody>

              </table>
              <script>
                   @if (session('status'))
                    alertify.set('notifier','position','bottom-right');
                    alertify.success("{{ session('status') }}");
                     @endif
            </script>
            </body>
@endsection
