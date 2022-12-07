<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    
    protected $filable = [
        'product_id',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function accounts()
    {
        return $this->belongsTo(Account::class,'user_id');
    }

}
