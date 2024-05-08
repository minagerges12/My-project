<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'Description',
        'Model',
        'Price',
        'Qty',
        'Color',
        'Image',
        'Category_Id',
        'Supplier_Id'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
