<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Models\Purchase;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Offer;
use App\Models\Product;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Offers = Offer::all();
        return view('admin.Offer.index',["Offers" => $Offers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Products = Product::all();
        return view('admin.Offer.create',["Products" => $Products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePurchaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfferRequest $request)
    {
        $ImageName = time().'.'.$request->Image->extension();  
     
        $request->Image->move(public_path('images'), $ImageName);

        Offer::create([
            'Product_Id' => $request->Product_Id,
            'Description' => $request->Description,
            'Image' => $ImageName,
            'Qty' => $request->Qty,
            'Total' => $request->Total,
        ]);
  
        return redirect()->route('Offer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $Offer)
    {
        $Products = Product::all();
        return view('admin.Offer.edit',['Offer' => $Offer,'Products' => $Products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchaseRequest  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfferRequest $request, Offer $Offer)
    {
        $ImageName = $Offer->Image;

        if($request->Image){
            try{
                unlink(public_path('images') . '\\' . $Offer->Image);
            }
            catch (\Exception $e){}
    
            $ImageName = time().'.'.$request->Image->extension();  
        
            $request->Image->move(public_path('images'), $ImageName);

        }

        $Offer->update([
            'Product_Id' => $request->Product_Id,
            'Description' => $request->Description,
            'Image' => $ImageName,
            'Total' => $request->Total,
            'Qty'=> $request->Qty,
        ]);
        return redirect()->route('Offer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $Offer)
    {
        unlink(public_path('images') . '\\' . $Offer->Image);
        $Offer->delete();
        return redirect()->route('Offer.index');
    }
}
