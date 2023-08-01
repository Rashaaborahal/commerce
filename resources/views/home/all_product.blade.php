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
      
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         <!-- end slider section -->
      
      <!-- why section -->
    
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product_view')

      
      <!-- end product section -->

      <div  style="text-align:center; margin-bottom:40px;">
      <h1 style="text-align:center;font-size:30px; padding-top:30px;"> Comments</h1>
      <form action="{{url('add_comment')}}" method="post">
      @csrf
      <textarea   style="width:650px; height:200px;" placeholder="Write Comment" name="comment"> 
     

      </textarea>
      <br>
      <input type="submit"  class="btn btn-info"  value="Send">

      </form>

      </div>
      @if(session()->has('message'))
         
         <div class="alert alert-warning text-white">
         <button type="button" style="color:white;" class="close" data-dismiss="alert" aria-hidden="true">X
                    </button>
         {{session()->get('message')}}
         
         </div>
         @endif

      <div  style="text-align:center; margin-bottom:40px;">
      <h1 style="text-align:center;font-size:30px; padding-top:30px;">All  Comments</h1>
      @foreach($comment as $comment)
      <div style="text-align:center;">
     
      <b> {{$comment->name}}</b>
      <p> {{$comment->comment}} </p>
      <a href="javascript::void(0);" class="btn btn-secondary"  onclick="reply(this)" data-CommentId="{{$comment->id}}" >Reply</a>
      @foreach($reply as $rep)
@if($rep->comment_id == $comment->id)
      <div style="text-align:center;">
      <b> {{$rep->name}}</b>
      <b> {{$rep->reply}}</b>
      <a href="javascript::void(0);" class="btn btn-secondary"  onclick="reply(this)" data-CommentId="{{$comment->id}}" >Reply</a>
      </div>
      @endif
      @endforeach

      </div>
      </div>
    @endforeach

       





<div style="display:none;" class="replyDiv">

<form action="{{url('add_reply')}}" method="post">
@csrf
<input type="text" id="commentId" name="commentId" hidden=""> 
<textarea   style="width:350px; height:100px;" placeholder="Write Comment" name="reply">  </textarea>
<br>

      <button type="submit"  class="btn btn-info"  >Reply </button>
      <a href="javascript::void(0);" class="btn btn-primary" onClick="close(this)" >Close</a>
      </form>
</div>
      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>

      <script type="text/javascript">

      function reply(caller){
            document.getElementById('commentId').value=$(caller).attr('data-CommentId');
          $('.replyDiv').insertAfter($(caller));
          $('.replyDiv').show();
      }
      
      function close(caller){
         
          $('.replyDiv').hide();
      }


      </script>

      <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
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