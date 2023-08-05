<header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="/images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                      
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('products')}}">Products</a>
                        </li>
                      
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_cart')}}">Cart</a>
                          
                        </li>
                        @if(isset($carts))
                        <h3 id="hhhh" class="nav-link" style="padding-left:0px !important;">{{$carts}}</h3>
                       
                       
                        @else
                        <span class="nav-link">0</span>
                        @endif
                       
                      
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_order_user')}}">Order</a>
                     
                        
                        </li>
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                           @if (Route::has('login'))
                           @auth
                           <li class="nav-item">
                          <x-app-layout>
                              
                              
</x-app-layout>
                        </li>
                       
                        @else
                          
                        <li class="nav-item">
                           <a class="btn btn-primary" style="margin-right:10px;" href="{{ route('login') }}">login</a>
                        </li>
                        
                        <li class="nav-item">
                           <a class="btn btn-light" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                        @endif
                      
                      
                        
                      
                     
                        <form class="form-inline">
                          
                        </form>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>