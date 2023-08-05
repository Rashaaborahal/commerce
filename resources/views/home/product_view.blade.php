<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
            
<br>
<br>
<div>
               <form method="GET" action="{{url('product_search')}}">
               @csrf
               <input type="text" name="search" placeholder="Search For Product">
               <input  class="btn btn-danger"type="submit" value="search">
               </form>
               </div>
               
            </div>

             @if(session()->has('message'))
         
         <div class="alert alert-primary text-white">
         <button type="button" style="color:black;" class="close" data-dismiss="alert" aria-hidden="true">X
                    </button>
         {{session()->get('message')}}
         
         </div>
         @endif

          

            <div class="row">
            @foreach($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                          Product Details
                           </a>
                          <form method="Post" action="{{url('add_cart',$products->id)}}">
                          @csrf
                          <div class="row">
                          <div class="col-md-4">
                          <input style="width:100px;" type="number" name="quantity"  min="1" />
                          </div>
                          <div class="col-md-4">
                          <input type="submit" value="ADD to cart" />
                          </div>
                          </div>


                          </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="/product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
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
          <span>
          {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
          </span>
         </div>
      </section>