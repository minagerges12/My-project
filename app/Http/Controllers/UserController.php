<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Models\Purchase;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::all();
        return view("admin.user.index",["Users" => $Users]);
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
        return redirect()->route('User.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePurchaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        User::create([
            'Fname' => $request->Fname,
            'Lname' => $request->Lname,
            'Phone' => $request->Phone,
            'Gender' => $request->Gender,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
            'Role' => "User"
        ]);
        return redirect()->route('User.index');
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
    public function edit(User $User)
    {
        return view('admin.User.edit',['User'=> $User]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchaseRequest  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $User)
    {
        $User->update([
            'Fname' => $request->Fname,
            'Lname' => $request->Lname,
            'Phone' => $request->Phone,
            'Email'=> $request->Email,
        ]);
        return redirect()->route('User.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        $User->delete();
        return redirect()->route('User.index');
    }
}
