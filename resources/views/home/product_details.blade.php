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
    

      <div class="row">
            @foreach($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; padding:30px; width:50%; ">
                  <div class="box">
                   
                     <div class="img-box">
                        <img style="width:300px;height:200px; " src="/product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box" >
                        <h5>
                        {{$products->title}}
                        </h5>

                        @if($products->discount_price!=null)
                        <h6 style="color:red;">
                     Discount_price
                        </h6>
                       <br>
                            <h6 style="color:red;">
                        {{$products->discount_price}}
                        </h6>
                        <h6 style="color:red;">
                   price
                        </h6>
                        <br>
                        <h6 style="text-decoration:line-through;color:blue;">
                        {{$products->price}}
                        </h6>
                      

                       @else
                       <h6 style="color:red;">
                   price
                        </h6>
                        </hr>
                        <h6  style="color:red;">
                        {{$products->price}}
                        </h6>
                        @endif
                     </div>
                  </div>
               </div>
              @endforeach
           
              
          </div>
          <a href=""class="btn btn-info" style="margin:auto;">ADD to cart </a>
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