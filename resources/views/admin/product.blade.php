<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8" />
     
     
<style>
label{
    display:inline-block;
    width:200px;
}
.design{
    margin-left:50px;
    padding-bottom:15px;
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
          <h1 style="color:white; text-align:center; padding-top:40px; font-size:40px; padding-bottom:30px;"> Add Product </h1>
          </div>
          <form style="text-align:center; padding-top:40px;" action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data" > 
          @csrf
          <div class="design">
          <label   style="color:white; ">Product Title</label>
          <input type="text"  style="color:black; padding-bottom:20px;" name="title" Placeholder="write a title" required=""/>
          </div>
          <div class="design">
          <label  style="color:white; ">Product Description</label>
          <input type="text"  style="color:black; padding-bottom:20px;" name="description" Placeholder="write a description"/>
          </div>
          <div class="design">
          <label  style="color:white; ">Product Price</label>
          <input type="number"  style="color:black; padding-bottom:20px;" name="price" Placeholder="write a price"/>
          </div>

           <div class="design">
          <label  style="color:white; ">Product Quantity</label>
          <input type="number"  style="color:black; padding-bottom:20px;" name="quantity" Placeholder="write a quantity"/>
          </div>
          <div class="design">
          <label  style="color:white; ">Product Discount_price</label>
          <input type="number"  style="color:black; padding-bottom:20px;" name="discount_price" Placeholder="write a discount_price"/>
          </div>


            <div class="design">
          <label  style="color:white; ">Product Category</label>
         <select style="color:black; padding-bottom:20px; width:200px; max-width:200px;" name"category">

        <option value="" selected="">   Add a product category  </option>
        @foreach($category as $category)
        <option value="{{$category->category_name}}"> {{$category->category_name}}  </option>
     
        @endforeach
         </select>
          </div>
          <div class="design">
          <label  style="color:white; ">Product Image</label>
          <input type="file"  style="color:black; padding-bottom:20px; width:200px;" name="image" />
          </div>

          <input type="submit" class="btn btn-primary" value="Add Product" />
          </form>

          <table style="margin:auto;width:50%;color:white; text-align:center; margin-top:30px; border: 3px solid white;">

          <tr style="border:2px solid white;">  
          <td >  Category Name </td>
          <td>  Action </td>
            </tr>
          
            <tr >
            <td>lll  </td>
            <td><a class="btn btn-primary"  onclick="return confirm('Are you sure to delete')" href="{{url('delete_category')}}">Delete </a> </td>

            </tr>
         
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