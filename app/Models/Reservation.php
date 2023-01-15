<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'client_id', 'start_date', 'end_date'];

    // Relation to rooms
    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }

    // Relation to user
    public function clients()
    {
        return $this->belongsTo(User::class);
    }
}
