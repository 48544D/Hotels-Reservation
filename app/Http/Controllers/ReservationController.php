<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // create a reservation
    public function create(Request $request)
    {
        // check rooms avaibility
        $hotel = Hotel::find($request->hotel_id);
        $StandardNumber = Room::where('hotel_id', $request->hotel_id)->where('type', 'standard')->get()->count();

        $DeluxeNumber = Room::where('hotel_id', $request->hotel_id)->where('type', 'deluxe')->get()->count();

        $VipNumber = Room::where('hotel_id', $request->hotel_id)->where('type', 'vip')->get()->count();

        dd($StandardNumber);
    }
}
