<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;
class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::User()->usertype;
if($usertype == '1'){

    $totalproduct=Product::all()->count();
    $totalorder=Order::all()->count();
    $totaluser=User::all()->count();
    $order=Order::all();
    $total_revenue=0;
    foreach($order as $order){
        $total_revenue= $total_revenue + $order->price;

    }
    $total_de=Order::where('delivery_status','Delivery')->get()->count();
    $total_pr=Order::where('delivery_status','processing')->get()->count();

    
    return view('admin.dashboard', compact('totalproduct','totalorder','totaluser','total_revenue','total_de','total_pr'));
}
elseif($usertype == '0'){
    if(Auth::id()){

        $id=Auth::user()->id;
        $carts=Cart::where('user_id','=',$id)->get()->count();
        $product=Product::paginate(2);
        $comment=Comment::all();
        $reply=Reply::orderBy('id', 'desc')->limit(3)->get();
        return view('home.userpage',compact('product','carts','comment','reply'));
    }
    else{
    $product=Product::paginate(2);
    $comment=Comment::all();
    $reply=Reply::orderBy('id', 'desc')->limit(3)->get();
    return view('home.userpage',compact('product','comment','reply'));
    }

      
    
   
   
}
    }
    public function index(){
        if(Auth::id()){

            $id=Auth::user()->id;
            $carts=Cart::where('user_id','=',$id)->get()->count();
            $product=Product::paginate(2);
            $comment=Comment::all();
            $reply=Reply::orderBy('id', 'desc')->limit(3)->get();
            return view('home.userpage',compact('product','carts','comment','reply'));
        }
        else{
            $comment=Comment::all();
        $product=Product::paginate(2);
        $reply=Reply::orderBy('id', 'desc')->limit(3)->get();
        return view('home.userpage',compact('product','comment','reply'));
        }
    }

    public  function show_order_user(){
        if(Auth::id()){
            $id=Auth::user()->id;
            $order=Order::where('user_id','=',$id)->get();
            $carts=Cart::where('user_id','=',$id)->get()->count();
            return view('home.order',compact('order','carts'));

        }
        else{
           return redirect('login') ;
        }
    }

    public function update_del($id){
        $order =Order::find($id);
        $order->delivery_status="sucessful delivery";
        $order->save();
        return redirect()->back() ;


    }
}
