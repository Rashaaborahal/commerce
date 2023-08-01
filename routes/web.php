<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/view_category',[AdminController::class,'view_category']);
Route::post('/add_category',[AdminController::class,'add_category']);
Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
Route::get('/addd_product',[ProductController::class,'addd_product']);
Route::post('/add_product',[ProductController::class,'add_product']);
Route::get('/show_product',[ProductController::class,'show_product']);
Route::get('/delete_product/{id}',[ProductController::class,'delete_product']);
Route::get('/update_product/{id}',[ProductController::class,'update_product']);
Route::post('/edit_product/{id}',[ProductController::class,'edit_product']);
Route::get('/product_details/{id}',[ProductController::class,'product_details']);
Route::post('/add_cart/{id}',[ProductController::class,'add_cart']);
Route::get('/show_cart',[ProductController::class,'show_cart']);
Route::get('/remove_cart/{id}',[ProductController::class,'remove_cart']);
Route::get('/cash_order',[ProductController::class,'cash_order']);
Route::get('/stripe/{total}',[ProductController::class,'stripe']);
Route::post('/stripe/{total}',[ProductController::class,'stripePost'])->name('stripe.post');
Route::get('/order',[ProductController::class,'order']);
Route::get('/delivered/{id}',[ProductController::class,'delivered']);
Route::get('/print/{id}',[ProductController::class,'print']);
Route::get('/send_email/{id}',[ProductController::class,'send_email']);
Route::post('/send_user_email/{id}',[ProductController::class,'send_user_email']);
Route::get('/search',[ProductController::class,'search']);
Route::get('/show_order_user',[HomeController::class,'show_order_user']);

Route::get('/update_del/{id}',[HomeController::class,'update_del']);
Route::post('/add_comment',[ProductController::class,'add_comment']);
Route::post('/add_reply',[ProductController::class,'add_reply']);
Route::get('/search_product',[ProductController::class,'search_product']);
Route::get('/products',[ProductController::class,'product']);
Route::get('/product_search',[ProductController::class,'product_search']);