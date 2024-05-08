<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'User_Id',
        'Address',
        'Total_Price',
        'Total_Qty'
    ];

    public function Products()
    {
        return $this->hasMany(OrderProduct::class);
    }
    
    public function Offers()
    {
        return $this->hasMany(OrderOffer::class);
    }
    
    public function User()
    {
        return $this->belongsTo(User::class,"User_Id");
    }
    
}
