@extends('layout')
@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<div> <h1> this is product page</h1></div>
<div>

    <div class="products">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="filters">
                <h4> Our Exclusive Collection</h4>
              </div>

            </div>

            <div class="col-md-12">
              <div class="filters-content">
                  <div class="row grid">
                    @foreach ( $product as $products )
                      <div class="col-lg-4 col-md-4 all des">

                        <div class="product-item">

                          <a href="#"><img src="{{ asset('/images/'. $products->image) }}"  width="80px;" height="200px;" alt=""></a>
                          <div class="down-content">
                            <h5>{{$products->name}}</h5>
                            <h6>{{$products->price}}</h6>
                            <h4>Catagory: {{$products->catagory}}</h4>
                            <h4>Type: {{$products->Type}}</h4>
                            <h7>Product Description: {{$products->description}}</h7>
                          </div>
                          <a href= "{{ route('productView', $products->id)}}" class="btn btn-info">View Product</a>

                        </div>

                      </div>
                      @endforeach

          </div>
          <div class="float-right">
            {{$product->links()}}
          </div>


        </div>

      </div>

</div>


@endsection
