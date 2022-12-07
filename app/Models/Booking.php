<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'user_id',
        'products',
        'address_id',
        'approve_id'
    ];

    public function users()
    {
        return $this->belongsTo(Customer::class,'user_id');
    }

    public function approve()
    {
        return $this->belongsTo(Approve::class,'approve_id');
    }
}
