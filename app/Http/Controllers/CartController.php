<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function CartShow(Request $request)
    {
        $Cart = $request->session()->get('Cart');
        return view('Cart' , ["Cart" => $Cart]);
    }

    public function AddToCart(Request $request, Product $Product)
    {
        if($request->session()->has('Cart'))
        {
            $OldCart= $request->session()->get('Cart');
        }
        else
            $OldCart = null;
        $Cart = new Cart($OldCart);
        $Cart->add($Product,$Product->id);
        $request->session()->put('Cart', $Cart);
        return redirect()->back();
    }

    public function RemoveFromCart(Request $request,$id)
    {
        if($request->session()->has('Cart'))
        {
            $Items = $request->session()->get('Cart')->Items;

            $ItemTotalQty = $Items[$id]['Qty'];
            $ItemTotalprice = $Items[$id]['Price'];
            $request->session()->get('Cart')->TotalQty -= $ItemTotalQty;
            $request->session()->get('Cart')->TotalPrice -= $ItemTotalprice;

            unset($Items[$id]);
            $request->session()->get('Cart')->Items = $Items;

            return redirect()->back();
        }
    }

    public function AddOfferToCart(Request $request, Offer $Offer)
    {
        if($request->session()->has('Cart'))
        {
            $OldCart= $request->session()->get('Cart');
        }
        else
            $OldCart = null;
        $Cart = new Cart($OldCart);
        $Cart->AddOffer($Offer,$Offer->id);
        $request->session()->put('Cart', $Cart);
        return redirect()->back();
    }
    public function RemoveOfferFromCart(Request $request,$id)
    {
        if($request->session()->has('Cart'))
        {
            $Items = $request->session()->get('Cart')->OffersItems;

            $ItemTotalQty = $Items[$id]['Qty'];
            $ItemTotalprice = $Items[$id]['Price'];
            $request->session()->get('Cart')->TotalQty -= $ItemTotalQty;
            $request->session()->get('Cart')->TotalPrice -= $ItemTotalprice;

            unset($Items[$id]);
            $request->session()->get('Cart')->OffersItems = $Items;

            return redirect()->back();
        }
    }
}
