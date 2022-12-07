<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'category_id',
        'img',
        'description',
        'content',
        'sale_price',
        'old_price',
        'quantity'
    ];

    public function category () {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
