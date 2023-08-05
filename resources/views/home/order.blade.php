<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('/home/images/favicon.png')}}" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
        
         <!-- end slider section -->
      <
      <!-- why section -->
    
      <!-- footer end -->
      

<div class="row" style="margin:auto; text-align:center; padding:30px;">
<table style="border:2px solid black;">
<tr style="border:2px solid black;"> 
<th class="tht">product title </th>
<th class="tht">quantity </th>
<th class="tht">payment status</th>
<th class="tht"> Deliver status</th>
<th class="tht">image</th>
<th class="tht">update delivery staus</th>
</tr>

@foreach($order as $order)
<tr style="border:2px solid black;">
<td style="border:2px solid black;"> {{$order->product_title}} </td>
<td style="border:2px solid black;">  {{$order->quantity}}</td>
<td style="border:2px solid black;">  {{$order->payment_status}} </td>
<td style="border:2px solid black;">  {{$order->delivery_status}} </td>

<td style="border:2px solid black;"> <img style="width:100px; height:100px;" src="/product/{{$order->image}}"></td>

  @if($order->delivery_status=='processing')
<td><a href="{{url('update_del',$order->id)}}" class="btn btn-danger">Sucessful DElivery </a> </td>
@else
<td><span>Sucessful DElivery </span> </td>
@endif
</tr>

@endforeach


</table>
</div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>