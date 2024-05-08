<?php

use App\Models\Category;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $Categories = Category::all();
    $Offers = Offer::all();
    return view('welcome',["Categories" => $Categories,"Offers" => $Offers]);
});

Route::get('/Staff', function (){
    return view('Staff');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('ChangeRole/{User}', [App\Http\Controllers\HomeController::class, 'ChangeUserRole']);
Route::get('/User/Change/{User}', [App\Http\Controllers\UserController::class, 'ChangeUserRole']);
Route::resource('/Category', App\Http\Controllers\CategoryController::class);
Route::resource('/User', App\Http\Controllers\UserController::class);
Route::resource('/Offer', App\Http\Controllers\OfferController::class);
Route::resource('/Product', App\Http\Controllers\ProductController::class);
Route::resource('/Supplier', App\Http\Controllers\SupplierController::class);
Route::resource('/Order', App\Http\Controllers\OrderController::class);

Route::get('/cart', [App\Http\Controllers\CartController::class, 'CartShow'])->name('cart');

Route::get('/checkout', [App\Http\Controllers\HomeController::class, 'Showcheckout'])->name('showcheckout');
Route::post('/checkout', [App\Http\Controllers\HomeController::class, 'SaveOrder'])->name('saveorder');

Route::get('/add-to-cart/{Product}', [App\Http\Controllers\CartController::class, 'AddToCart'])->name('AddToCart');
Route::get('/remove-from-cart/{id}', [App\Http\Controllers\CartController::class, 'RemoveFromCart'])->name('RemoveFromCart');


Route::get('/add-Offer-to-cart/{Offer}', [App\Http\Controllers\CartController::class, 'AddOfferToCart'])->name('AddOfferToCart');
Route::get('/remove-Offer-from-cart/{id}', [App\Http\Controllers\CartController::class, 'RemoveOfferFromCart'])->name('RemoveOfferFromCart');








// Route::get('/Check-Out', 'Pagescontroller@showcheckout')->name('showcheckout');
//     public function showcheckout(Request $request)
//     {
//         $cart = $request->session()->get('cart');

//         return view('checkout')->with('cart',$cart);
//     }


// Route::post('/Check-Out', 'Pagescontroller@saveorder')->name('saveorder');
//     public function saveorder(Request $request)
//     {
//         $cart = $request->session()->get('cart');

//         $this->validate($request,[
//             "name"=>"required",
//             "phone"=>"required",
//             "address"=>"required",
//         ]);
//         $order = new Order();
//         $order->user_name=$request->input('name');
//         $order->phone=$request->input('phone');
//         $order->address=$request->input('address');
//         $order->total_price=$cart->totalprice;
//         $order->save();
//         foreach ($cart->items as $item)
//         {
//             $order->products()->attach($item['item']['id'],array( 'qty'=>$item['qty']));
//         }

//         //$text="the event is fired";
//         //event(new Notify());
//         $request->session()->forget('cart');
//         return redirect(route('products'));
//     }








// Route::get('/update-order-item/{id}', [App\Http\Controllers\CartController::class, 'UpdateOrder'])->name('updateorder');