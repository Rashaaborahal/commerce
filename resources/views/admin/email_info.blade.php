<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
    <!-- Required meta tags -->
   @include('admin.css')
   <style>

   label{
     display:inline-block;
     width:500px;
     margin:auto;
     padding-left:200px;
   }
   </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')

         <div class="main-panel">
          <div class="content-wrapper">
          <h1 style="color:white;text-align:center;"> Send email to {{$order->email}} </h1>
        <form action="{{url('send_user_email',$order->id)}}" method="post">
        @csrf
          <div style="padding-left:30px;padding-top:30px;">  
          <label style="color:white"> Email Greeting  </label>
          <input type="text" name="greeting">

          </div>
          <div style="padding-left:30px;padding-top:30px;">  
          <label style="color:white"> Email Firstling  </label>
          <input type="text" name="firstline">

          </div>
          <div style="padding-left:30px;padding-top:30px;">  
          <label style="color:white"> Email Body </label>
          <input type="text" name="body">
          </div>
          <div style="padding-left:30px;padding-top:30px;">  
          <label style="color:white"> Email button </label>
          <input type="text" name="button">

          </div>
         
          <div style="padding-left:30px;padding-top:30px;">  
          <label style="color:white"> Email Url  </label>
          <input type="text" name="url">

          </div>
          <div style="padding-left:30px;padding-top:30px;">  
          <label style="color:white"> Email lastline </label>
          <input type="text" name="lastline">

          </div>
          <div style="padding-left:30px;padding-top:30px;">  
         
          <input type="submit"value="send" class="btn btn-primary">

          </div>
         
          </form>

          </div>
          </div>
        <!-- partial -->
      
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