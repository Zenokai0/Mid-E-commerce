<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // since your table is `product` not `products`
    protected $table = 'product';

    protected $fillable = [
        'name',
        'price',
        'category',
        'image',
        'description',
    ];
}
