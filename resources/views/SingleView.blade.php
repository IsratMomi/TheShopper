@extends('layout')
@section('content')

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Sample Product, When it absolutely, positively has to be readability in your designs">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">

    <link rel="stylesheet" href="/productDetails/nicepage.css" media="screen">
<link rel="stylesheet" href="/productDetails/Home.css" media="screen">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script class="u-script" type="text/javascript" src="/productDetails/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="/productDetails/nicepage.js" defer=""></script>

    <!--<script type="text/javascript" src="/Cart/custom.js" defer=""></script>-->
    <meta name="generator" content="Nicepage 3.19.4, nicepage.com">


    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">


    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
  </head>
  <body data-home-page="Home.html" data-home-page-title="Home" class="u-body"><header class="u-clearfix u-header u-header" id="sec-3378"><div class="u-clearfix u-sheet u-sheet-1"></div></header>
    <section class="u-align-center u-clearfix u-section-1" id="carousel_d46d">
    <div class="product_data">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-xl u-sheet-1"><!--product--><!--product_options_json--><!--{"source":""}--><!--/product_options_json--><!--product_item-->
        <div class="u-container-style u-expanded-width u-product u-product-1">

          <div class="u-container-layout u-valign-bottom u-container-layout-1"><!--product_image-->
            <img alt="" class="u-image u-image-default u-product-control u-image-1" src="{{ asset('/images/'. $product->image) }}"><!--/product_image-->
            <div class="u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-group-1">
              <div class="u-container-layout u-container-layout-2"><!--product_title-->
                <h2 class="u-align-center u-custom-font u-font-playfair-display u-product-control u-text u-text-1">
                  <a class="u-product-title-link" href="#"><!--product_title_content-->{{$product->name}}<!--/product_title_content--></a>
                </h2><!--/product_title--><!--product_price-->
                <div class="u-product-control u-product-price u-product-price-1">
                  <div class="u-price-wrapper u-spacing-10"><!--product_old_price-->
                    <div class="u-hide-price u-old-price" style="text-decoration: line-through !important;"><!--product_old_price_content-->$12<!--/product_old_price_content--></div><!--/product_old_price--><!--product_regular_price-->
                    <div class="u-price u-text-palette-2-base" style="font-size: 1.875rem; font-weight: 700;"><!--product_regular_price_content-->{{$product->price}}<!--/product_regular_price_content--></div><!--/product_regular_price-->
                  </div>
                </div>
                <!--/product_price--><!--product_title-->
                @if ($product->quantity>=3)


                <h4 class="product_quantity u-align-center u-product-control u-text u-text-2" style="color: green">
                    Status:
                    <a class="u-product-title-link" href="#"><!--product_title_content-->Instock <!--/product_title_content--></a>

                  </h4>
                  <h4 class="product_quantity u-align-center u-product-control u-text u-text-2" style="color: rgb(8, 8, 8)">
                    <input type="hidden" class="product_id" value="{{$product->id}}">
                    <div class="container">
                      Quantity:
                      <input type="button" onclick="decrementValue()" value="-" />
                      <input type="text" class="qty-input" name="quantity" value="1" maxlength="2" max="10" size="1" id="number" />
                      <input type="button" onclick="incrementValue()" value="+" />
                      </div>
                    </h4>
                    <a href="#" class="add-to-cart-btn u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-product-control u-text-black u-text-hover-white u-btn-1">Add to Cart</a>
                    <a href="#" class="u-black u-border-2 u-border-black u-btn u-button-style u-hover-white u-product-control u-text-body-alt-color u-text-hover-black u-btn-2">buy it now</a>

                @else
                <h4 class="product_quantity u-align-center u-product-control u-text u-text-2" style="color: red">
                    Status:
                    <a class="u-product-title-link" href="#"><!--product_title_content-->Out of Stock <!--/product_title_content--></a>
                </h4>

                <a href="{{route('restock', $product->id)}}" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-product-control u-text-black u-text-hover-white u-btn-1">Request Restock</a>


                @endif
               <!--/product_title--><!--product_button--><!--options_json--><!--{"clickType":"add-to-cart","content":""}--><!--/options_json-->
                <!--/product_button-->
              </div>
            </div>
          </div>
        </div>
        </div><!--/product_item--><!--/product-->
     </div>
    </section>
    <section class="u-align-center u-clearfix u-section-2" id="sec-0928">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1"></div>
    </section>

    <script type="text/javascript">
      function incrementValue()
      {
          var value = parseInt(document.getElementById('number').value, 10);
          value = isNaN(value) ? 0 : value;
          if(value<10){
              value++;
                  document.getElementById('number').value = value;
          }
      }
      function decrementValue()
      {
          var value = parseInt(document.getElementById('number').value, 10);
          value = isNaN(value) ? 0 : value;
          if(value>1){
              value--;
                  document.getElementById('number').value = value;
          }

      }
      </script>
  </body>
</html>




@endsection
