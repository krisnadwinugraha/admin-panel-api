<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'product_id',
        'qty',
        'status',
    ];

    public function productId()
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }
}
