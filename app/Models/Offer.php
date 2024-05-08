<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'Product_Id',
        'Description',
        'Image',
        'Qty',
        'Total'
    ];

    public function Product()
    {
        return $this->hasOne(Product::class, 'id', 'Product_Id'); 
    }
}
