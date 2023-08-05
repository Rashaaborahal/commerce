<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use Session;
use Stripe;
use PDF;
use App\Models\Reply;
use App\Notifications\EmailNotification;
use RealRashid\SweetAlert\Facades\Alert;
use Notification;
class ProductController extends Controller
{
    public function addd_product(){
        if(Auth::id()){
            $category=Category::all();
            return view ('admin.product',compact('category'));
        }
         else{
             return redirect('login');
         }
       
    }


    public function add_product(Request $request){
        if(Auth::id()){
       $product= new Product;
       $product->title=$request->title;
       $product->description=$request->description;
       $product->price=$request->price;
       $product->quantity=$request->quantity;
       $product->discount_price=$request->discount_price;
       $product->category=$request->category;
       $image=$request->image;
       $imagename=time().'.'. $image->getClientOriginalExtension();
       $request->image->move('product',$imagename);
       $product->image=$imagename;

       $product->save();
       
       return redirect()->back()->with('message','product addded successfuly');}
       else{
        return redirect('login');
    }
    }

    public function show_product(){
        if(Auth::id()){
        $product=Product::all();
        return view ('admin.show_product',compact('product'));
    }
        else{
            return redirect('login');
        }
    }


    public function delete_product($id){
        if(Auth::id()){
        $data=Product::find($id);
        $data->delete();
        return redirect()->back()->with('message','category deleted successfuly');}
        else{
            return redirect('login');
        }
    }

    public function update_product($id){
        if(Auth::id()){
        $category=Category::all();
        $product=Product::where('id',$id)->get();
        return view ('admin.update_product',compact('product','category'));

        } else{
            return redirect('login');
        }
    }

    public function edit_product( Request $request, $id ){
        if(Auth::id()){
        $product=Product::where('id',$id)->first();
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->discount_price;
        $product->category=$request->category;
        $image=$request->image;
        if( $image){
            $imagename=time().'.'. $image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;


        }
       
 
        $product->save();
        
        return redirect()->back()->with('message','product addded successfuly');
    } else{
        return redirect('login');
    }
    }
    public function product_details($id){
      
        $product=Product::where('id',$id)->get();
        return view ('home.product_details',compact('product'));
    
        
    }
    public function add_cart( Request $request,$id){
      if(Auth::id()){

      $user=Auth::user();
      $product=Product::find($id);
      $user_id=$user->id;
      $cart_id=Cart::where('user_id',$user_id)->where('product_id',$id)->get('id')->first();
      if($cart_id){
          $cart=Cart::find($cart_id)->first();
          $quantity=$cart->quantity;
          $cart->quantity=$quantity + $request->quantity;
          
          if($product->discount_price!=null){
            $cart->price = $product->discount_price * $cart->quantity;
          }
          else{
            $cart->price = $product->price * $cart->quantity;
          }
          $cart->save();
          Alert::success('product added successfuly','we have added product to the cart');
          return redirect()->back()->with('message','product added sucessfuly');
      }
      else{
      $cart=new Cart;
      $cart->name = $user->name;
      $cart->email = $user->email;
      $cart->phone = $user->phone;
      $cart->address = $user->address;
      $cart->product_title = $product->title;
      $cart->quantity = $request->quantity;
      if($product->discount_price!=null){
        $cart->price = $product->discount_price * $request->quantity;
      }
      else{
        $cart->price = $product->price * $request->quantity;
      }
    
      $cart->image= $product->image;
      $cart->product_id= $product->id;
      $cart->user_id= $user->id;
      $cart->save();
      return redirect()->back()->with('message','product added sucessfuly');;

      }
    }
      else{
        return redirect('login');
      }
    }

    public function show_cart(){

        if(Auth::id()){
            $id=Auth::user()->id;
            $cart=Cart::where('user_id',$id)->get();
            $carts=Cart::where('user_id','=',$id)->get()->count();
    
            return view('home.show_cart',compact('cart','carts'));
        }
        else{
            return redirect('login');
        }
    }

    public function remove_cart($id){
      $cart=Cart::find($id);
      $cart->delete();

      return redirect()->back();
    }
    public function cash_order(){
        $user=Auth::user();
        $userid=$user->id;
        $data=Cart::where('user_id',$userid)->get();
        foreach($data as $data){
            $order= new Order;
            $order->name= $data->name;
            $order->email= $data->email;
            $order->phone= $data->phone;
            $order->address= $data->address;
            $order->user_id= $data->user_id;
            $order->product_title= $data->product_title;
            $order->quantity= $data->quantity;
            $order->price= $data->price;
            $order->product_id= $data->product_id;
            $order->image= $data->image;
            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';
            $order->save();
            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();

        }
        return redirect()->back()->with('message','we  have received your order . we willconnect with you soon');

    }

    public function stripe($total){
        return view('home.stripe',compact('total'));
    }
    public function stripePost(Request $request,$total )
    {
       
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
       Stripe\Charge::create ([
                "amount" => $total* 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment." 
        ]);
      

        $user=Auth::user();
        $userid=$user->id;
        $data=Cart::where('user_id',$userid)->get();
        foreach($data as $data){
            $order= new Order;
            $order->name= $data->name;
            $order->email= $data->email;
            $order->phone= $data->phone;
            $order->address= $data->address;
            $order->user_id= $data->user_id;
            $order->product_title= $data->product_title;
            $order->quantity= $data->quantity;
            $order->price= $data->price;
            $order->product_id= $data->product_id;
            $order->image= $data->image;
            $order->payment_status='payid';
            $order->delivery_status='processing';
            $order->save();
            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();

        }
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
    public function order(){
        $order=Order::all();
        return view('admin.order',compact('order'));
    }
public function delivered($id){

    $order=Order::find($id);
    $order->delivery_status ="Delivery";
    $order->save();
    return redirect()->back();

}
public function print($id){
    $order=Order::find($id);
    $pdf = PDF::loadView('admin.pdf', compact('order'));
    return $pdf->download('order_details.pdf');
}
public function send_email($id){
    $order=Order::find($id);
return view('admin.email_info',compact('order'));
}
public function send_user_email( Request $request,$id){
    $order=Order::find($id);
    $project = [
        'greeting' => $request->greeting,
        'firstline' => $request->firstline,


        'body' => $request->body,
        'button' => $request->button,
        'url' => $request->url,

        'lastline' => $request->lastline,

       
    ];
    Notification::send($order, new EmailNotification($project));
   

}
public function search(Request $request){
$searchtest=$request->search;
$order=Order::where('name','LIKE',"%$searchtest%")->orWhere('product_title','LIKE',"%$searchtest%")->orWhere('phone','LIKE',"%$searchtest%")->get();
return view('admin.order',compact('order'));
}

public function add_comment(Request $request){

    if(Auth::id()){
        $user=Auth::user();
        $comment=new Comment;
        $comment->name=$user->name;
        $comment->comment=$request->comment;
        $comment->user_id=$user->id;
       $comment->save();
       

        return redirect()->back()->with('message','we send cooment');
    }
    else{
        return redirect('login');
    }

}

public function add_reply(Request $request){

    if(Auth::id()){
        $user=Auth::user();
        $reply=new Reply;
        $reply->name=$user->name;
        $reply->reply=$request->reply;
        $reply->comment_id=$request->commentId;
        $reply->user_id=$user->id;
       $reply->save();
       

        return redirect()->back();
    }
    else{
        return redirect('login');
    }

}
public function search_product(Request $request){
    $id=Auth::user()->id;
    $search_text=$request->search;
    $product=Product::where('title','like',"%$search_text%")->paginate(10);
    $comment=Comment::all();
    $reply=Reply::orderBy('id', 'desc')->limit(3)->get();
    $carts=Cart::where('user_id','=',$id)->get()->count();
    return view('home.userpage',compact('product','comment','reply','carts'));

}
public function product(){

    if(Auth::id()){
    $id=Auth::user()->id;
    $product=Product::paginate(10);
    $comment=Comment::all();
    $reply=Reply::orderBy('id', 'desc')->limit(3)->get();
    $carts=Cart::where('user_id','=',$id)->get()->count();
    return view('home.all_product',compact('product','comment','reply','carts'));
    }
    return redirect('login');
}
public function product_search(Request $request){
    $id=Auth::user()->id;
    $search_text=$request->search;
    $product=Product::where('title','like',"%$search_text%")->paginate(10);
    $comment=Comment::all();
    $reply=Reply::orderBy('id', 'desc')->limit(3)->get();
    $carts=Cart::where('user_id','=',$id)->get()->count();
    return view('home.all_product',compact('product','comment','reply','carts'));

}
}
