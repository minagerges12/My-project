<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Order;
use App\Models\OrderOffer;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        if(Auth::user()->Role =="User"){
            $Categories = Category::all();
            $Offers = Offer::all();
            return view('home',["Categories" => $Categories,"Offers" => $Offers]);    
        }
        else{
            $Categories = Category::count();
            $Offers = Offer::count();
            $Users = User::all();         
            return view('admin.home',["Categories" => $Categories,"Offers" => $Offers,"Users" => $Users]);    
        }
    }

    public function ChangeUserRole(User $User)
    {
        
        if($User->Role =="User"){
            $User->update([
                "Role"=>"Admin"
            ]);
        }
        else{
            $User->update([
                "Role"=>"User"
            ]);
        }
        return redirect('/home');
    }
    
    public function Showcheckout()
    {
        return view('checkout');
    }
    
    public function SaveOrder(Request $request)
    {
        if($request->session()->has('Cart'))
        {
            $Cart = $request->session()->get('Cart');
            $Order = Order::create([
                'User_Id' => Auth::user()->id,
                'Address' => $request->Address,
                'Total_Price' => $Cart->TotalPrice,
                'Total_Qty'=> $Cart->TotalQty
            ]);
            foreach($Cart->Items as $Item){
                $product = Product::find($Item['Item']['id']);
                $product->Qty = $product->Qty - $Item['Qty'];
                $product->update([
                    'Qty'=>$product->Qty
                ]);
                OrderProduct::create([
                    'Order_Id' => $Order['id'],
                    'Product_Id' => $Item['Item']['id'],
                    'Qty' => $Item['Qty'],
                    'Total' => $Item['Qty'] * $Item['Price']
                ]);
            }
            foreach($Cart->OffersItems as $Item){
                $product = Product::find($Item['Item']['id']);
                $product->Qty = $product->Qty - ($Item['Qty']*$Item['Item']['Qty']);
                $product->update([
                    'Qty'=>$product->Qty
                ]);
                OrderOffer::create([
                    'Order_Id' => $Order['id'],
                    'Offer_Id' => $Item['Item']['id'],
                    'Qty' => $Item['Qty'],
                    'Total' => $Item['Qty'] * $Item['Price']
                ]);
            }
        }
        session()->forget('Cart');

        if(Auth::user()->Role =="User"){
            $Categories = Category::all();
            $Offers = Offer::all();
            return view('home',["Categories" => $Categories,"Offers" => $Offers,"msg"=>"تمت عمليه الشراء بنجاح"]);    
        }
        if(Auth::user()->Role =="Admin"){
            $Categories = Category::all();
            $Offers = Offer::all();
            return view('home',["Categories" => $Categories,"Offers" => $Offers,"msg"=>"تمت عمليه الشراء بنجاح"]);    
        }
    }
}
