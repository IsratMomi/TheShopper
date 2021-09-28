
<!DOCTYPE html>
<html>
   
<head>

<link href="/loginAsset/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Custom Theme files -->

<link href="/loginAsset/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shopper Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<!---- tabs---->
<link type="text/css" rel="stylesheet" href="/loginAsset/css/easy-responsive-tabs.css" />
<!--<link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->

    
   <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
<div class="navigation">
			 <ul>
                 <li><a href="{{url('/')}}">{{ __('HOME') }}</a></li>
				 <li><a href="">ABOUT</a></li>
				 <li><a href="{{route('contact')}}">CONTACT</a></li>
				 <li><a href="terms.html">TERMS & CONDITION</a></li>
				 <li><a href="man.html">SHOW TO BUY</a></li>
				 
			 </ul>
		 </div>
<div>
    @yield('content1')
</div>


<!--<script src="{{ asset('js/app.js') }}" defer></script>-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/loginAsset/js/easyResponsiveTabs.js" type="text/javascript"></script>
</head>
</html>