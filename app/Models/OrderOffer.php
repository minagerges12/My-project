<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderOffer extends Model
{
    use HasFactory;
    protected $fillable = [
        'Order_Id',
        'Offer_Id',
        'Qty',
        'Total'
    ];
    public function Order()
    {
        return $this->belongsTo(Order::class); 
    }
    public function Offer()
    {
        return $this->hasOne(Offer::class,'id','Offer_Id'); 
    }
}
