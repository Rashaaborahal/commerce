<!DOCTYPE html>
<html lang="en">
  <head>

  

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
          <h1 style="color:white; text-align:center; padding-top:40px; font-size:40px; padding-bottom:30px;"> Add Category </h1>
          </div>
          <form style="text-align:center; padding-top:40px;" action="{{url('/add_category')}}" method="POST" > 
          @csrf
          <input type="text" name="category_name" Placeholder="Add Category name"/>
          <input type="submit" class="btn btn-primary" value="ADD" />
          </form>

          <table style="margin:auto;width:50%;color:white; text-align:center; margin-top:30px; border: 3px solid white;" id="tt">

          <tr style="border:2px solid white;">  
          <td >  Category Name </td>
          <td>  Action </td>
            </tr>
           @foreach($data as $data)
            <tr >
            <td>{{$data->category_name}}  </td>
            <td><a class="btn btn-primary"  onclick="return confirm('Are you sure to delete')" href="{{url('delete_category',$data->id)}}">Delete </a> </td>

            </tr>
            @endforeach
          </table>
          </div>
          </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <script>
    setInterval(function() {
        $("#tt").load(window.location.href + " #tt");
      
    }, 5000);

</script>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>