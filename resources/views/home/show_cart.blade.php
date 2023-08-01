<!DOCTYPE html>
<html>
   <head>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
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
    
      <style>
      .tht{
          background-color:info;
          border:2px solid black;
      }
      .td{
        border:2px solid black; 
      }
      </style>
   </head>
   <body>
   @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
        
         <!-- end slider section -->
        
          @if(session()->has('message'))
         
<div class="alert alert-danger text-white">
<button type="button" style="color:white;" class="close" data-dismiss="alert" aria-hidden="true">X
           </button>
{{session()->get('message')}}

</div>



          @endif
          <div> 

      <div class="row" style="margin:auto; text-align:center; padding:30px;">
      <table style="border:2px solid black;">
      <tr style="border:2px solid black;"> 
      <th class="tht">product title </th>
      <th class="tht">quantity </th>
      <th class="tht">price </th>
      <th class="tht"> image</th>
      <th class="tht">action </th>
      </tr>
      <?php $total=0; ?>
      @foreach($cart as $carts)
      <tr style="border:2px solid black;">
      <td style="border:2px solid black;"> {{$carts->product_title}} </td>
      <td style="border:2px solid black;">  {{$carts->quantity}}</td>
      <td style="border:2px solid black;">  {{$carts->price}} </td>
      <td style="border:2px solid black;"> <img style="width:100px; height:100px;" src="/product/{{$carts->image}}"></td>
      <td style="border:2px solid black;"><a href="{{url('remove_cart',$carts->id)}}" class="btn btn-danger" onclick="confirmation(event)"> Remove </a> </td> 
      </tr>
      <?php $total=$total + $carts->price ; ?>
      @endforeach
      

      </table>
      </div>
      <div style="margin:auto;">
      <h1 style=" padding-bottom:20px;" > Total price {{$total}} </h1>
      </div>
      <div style="margin:auto;"> 
<h1  style="font-size:25px; padding-bottom:20px; text-align:center;" >Pocced to order</h1>
<a href="{{url('cash_order')}} " style="max-width:200px;" class="btn btn-danger"> Cash on Delivery</a>
<a href="{{url('stripe',$total)}} " style="max-width:200px;" class="btn btn-danger"> Pay on card</a>

      </div>
          
           
              
        
      <!-- why section -->
    
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>

      <script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to cancel this product",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {


                 
                window.location.href = urlToRedirect;
               
            }  


        });

        
    }
</script>
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