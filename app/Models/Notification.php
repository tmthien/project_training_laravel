<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'booking_id',
        'type'
    ];

    public function users() {
        return $this->belongsTo(Customer::class,'user_id');
    }

    public function bookings() {
        return $this->belongsTo(Booking::class,'booking_id');
    }
}
