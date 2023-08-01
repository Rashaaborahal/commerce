<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8" />
    

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
          <h1 style="color:white; text-align:center; padding-top:40px; font-size:40px; padding-bottom:30px;"> Show Product </h1>
          </div>
         

          <table style="margin:auto;width:90%;color:white; text-align:center; margin-top:30px; border: 3px solid white;">

          <tr  class="bg-info" style="border:2px solid white;">  
          <td >  product title</td>
          <td >  product descriptipn</td>
          <td >  product price</td>
          <td >  product quantity</td>
          <td >  product dis</td>
          <td >  product category</td>
          <td >  product img</td>
          <td>  Delete </td>
          <td>  Edit </td>
            </tr>
           @foreach($product as $product)
            <tr >
            <td>{{$product->title}}  </td>
            <td>{{$product->description}}  </td>
            <td>{{$product->price}}  </td>
            <td>{{$product->quantiti}}  </td>
            <td>{{$product->discount_price}}  </td>
            <td>{{$product->category}}  </td>
            <td ><img  class="imgsize"src="/product/{{$product->image}} ">  </td>
            <td><a class="btn btn-danger"  onclick="return confirm('Are you sure to delete')" href="{{url('delete_product',$product->id)}}">Delete </a> </td>
            <td><a class="btn btn-success"  onclick="return confirm('Are you sure to update')" href="{{url('update_product',$product->id)}}">Edit </a> </td>
            </tr>
            @endforeach
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