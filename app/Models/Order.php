<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Cart;

class Order extends Model
{
    protected $fillable = [
        'product_list',
        'user_id'
    ];

}
