<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Supplier;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Product::all();
        return view('admin.Product.index',["Products" => $Products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Category::all();
        $Suppliers = Supplier::all();
        return view('admin.Product.create',["Categories" => $Categories,'Suppliers' => $Suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $ImageName = time().'.'.$request->Image->extension();  
     
        $request->Image->move(public_path('images'), $ImageName);

        Product::create([
            'Name' => $request->Name,
            'Description' => $request->Description,
            'Model' => $request->Model,
            'Price' => $request->Price,
            'Qty' => $request->Qty,
            'Color' => $request->Color,
            'Image' => $ImageName,
            'Category_Id' => $request->Category_Id,
            'Supplier_Id' => $request->Supplier_Id
        ]);
        return redirect()->route('Product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $Product)
    {
        $Categories = Category::all();
        $Suppliers = Supplier::all();
        return view('admin.Product.edit',["Categories" => $Categories,'Suppliers' => $Suppliers,'Product' => $Product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $Product)
    {
        $ImageName = $Product->Image;

        if($request->Image){
            try{
                unlink(public_path('images') . '\\' . $Product->Image);
            }
            catch (\Exception $e){}
    
            $ImageName = time().'.'.$request->Image->extension();  
        
            $request->Image->move(public_path('images'), $ImageName);

        }

        $Product->update([
            'Name' => $request->Name,
            'Description' => $request->Description,
            'Model' => $request->Model,
            'Price' => $request->Price,
            'Qty' => $request->Qty,
            'Color' => $request->Color,
            'Image' => $ImageName,
            'Category_Id' => $request->Category_Id,
            'Supplier_Id' => $request->Supplier_Id
        ]);
        return redirect()->route('Product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $Product)
    {
        unlink(public_path('images') . '\\' . $Product->Image);
        $Product->delete();
        return redirect()->route('Product.index');

    }
}
