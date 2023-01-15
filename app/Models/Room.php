<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['hotel_id', 'type'];

    // Relation to hotel
    public function hotels() {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    // Relation to reservation
    public function reservations()
    {
        return $this->hasOne(Reservation::class, 'room_id');
    }
}
