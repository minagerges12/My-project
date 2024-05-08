<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories= Category::all();
        return view('admin.Category.index',["Categories" => $Categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $ImageName = time().'.'.$request->Image->extension();  
     
        $request->Image->move(public_path('images'), $ImageName);

        Category::create([
            'Name' => $request->Name,
            'Description' => $request->Description,
            'Image' => $ImageName,
        ]);
  
        return redirect()->route('Category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        return view('Category',["Category" => $Category]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        return view('admin.Category.edit',['Category' => $Category]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $Category)
    {
        $ImageName = $Category->Image;

        if($request->Image){
            try{
                unlink(public_path('images') . '\\' . $Category->Image);
            }
            catch (\Exception $e){}
    
            $ImageName = time().'.'.$request->Image->extension();  
        
            $request->Image->move(public_path('images'), $ImageName);
        }

        $Category->update([
            'Name' => $request->Name,
            'Description' => $request->Description,
            'Image' => $ImageName,
        ]);
        return redirect()->route('Category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        unlink(public_path('images') . '\\' . $Category->Image);
        $Category->delete();
        return redirect()->route('Category.index');
    }
}
