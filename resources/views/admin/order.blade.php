<!DOCTYPE html>
<html lang="en">
  <head>

  <style>

  .imgsize{
    height:200px; 
    width:600px;
  }
  </style>


    <!-- Required meta tags -->
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @if(session()->has('message'))
          <button type="button" style="color:white;" class="close" data-dismiss="alert" aria-hidden="true">X
           </button>
<div class="alert alert-danger text-white">
{{session()->get('message')}}

</div>



          @endif
          <div> 
          <h1 style="color:white; text-align:center; padding-top:40px; font-size:40px; padding-bottom:30px;"> Show Order </h1>
          </div>

          <div style="padding-left:400px; padding-bottom:30px;">
          <form action="{{url('search')}}" method="get">
          @csrf
          <input type="text" name="search" placeholder="search">
          <input type="submit" value="search" class="btn btn-danger bg-danger">
          </form>
          </div>
         

          <table style="margin:auto;width:90%;color:white; text-align:center; margin-top:30px; border: 3px solid white;">

          <tr  class="bg-info" style="border:2px solid white;">  
          <td >  User name</td>
          <td> User email </td>
          <td >  User address</td>
          <td >  user phone</td>
          <td >  user id</td>
          <td >  product title</td>
          <td >  product price</td>
          <td >  product quantity</td>
          <td >  product id </td>
          <td >  product img</td>
          <td >  payment status</td>
          <td >  delivery status</td>
          <td >  Delivered</td>
          <td >  Print Pdf</td>
          <td >  Send email</td>
         
            </tr>
           @forelse($order as $order)
            <tr >
           <td>{{$order->name}}  </td>
            <td>{{$order->email}}  </td>
            <td>{{$order->phone}}  </td>
            <td>{{$order->address}}  </td>
            <td>{{$order->user_id}}  </td>
            <td>{{$order->product_title}}  </td>
            <td>{{$order->price}}  </td>
            <td>{{$order->quantity}}  </td>
            <td>{{$order->product_id}}  </td>
            <td ><img  class="imgsize"src="/product/{{$order->image}} ">  </td>
            <td>{{$order->payment_status}}  </td>
             
            <td>{{$order->delivery_status}}  </td>
    
            <td>
            @if($order->delivery_status=='processing')
            <a href="{{url('delivered',$order->id)}}" class="btn btn-warning" onclick="return confirm ('are yoy sure the product is delivered')">Delivered </a> 
            @else
            <p>Delivered</p>

            @endif
            </td>
            <td>
           
            <a href="{{url('print',$order->id)}}" class="btn btn-warning" >Print Pdf </a> 
           
            </td>
            <td>
           
           <a href="{{url('send_email',$order->id)}}" class="btn btn-info" >Send Email </a> 
          
           </td>
            </tr>

            @empty
            <tr>
           <td colspan="16">No Data Found </td>
             </tr>
            @endforelse
          </table>
          </div>
          </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>