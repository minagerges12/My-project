<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderOfferRequest;
use App\Http\Requests\UpdateOrderOfferRequest;
use App\Models\OrderOffer;

class OrderOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePurchaseProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderOfferRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseProduct  $purchaseProduct
     * @return \Illuminate\Http\Response
     */
    public function show(OrderOffer $purchaseProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseProduct  $purchaseProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderOffer $purchaseProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchaseProductRequest  $request
     * @param  \App\Models\PurchaseProduct  $purchaseProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderOfferRequest $request, OrderOffer $purchaseProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseProduct  $purchaseProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderOffer $purchaseProduct)
    {
        //
    }
}
