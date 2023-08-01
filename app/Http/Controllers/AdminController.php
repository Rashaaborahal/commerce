<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function view_category(){
        if(Auth::id()){
        $data=Category::all();
        return view ('admin.category',compact('data'));}
        else{
            return redirect('login');
        }
    }


    public function add_category( Request $request){
        if(Auth::id()){
        $data= new Category;
        $data->category_name=$request->category_name;
        $data->save();
        return redirect()->back()->with('message','category addded successfuly');}
        else{
            return redirect('login');
        }
    }
   

    public function delete_category($id){
        $data=Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','category deleted successfuly');
    }
   
}
