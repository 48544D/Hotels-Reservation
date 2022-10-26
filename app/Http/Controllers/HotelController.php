<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class HotelController extends Controller
{
    // Show all hotels
    public function index()
    {
        return view('hotels.index', ['hotels' => Hotel::latest()->paginate(6)]);
    }

    // Create hotel page
    public function create() {
        return view('hotels.create');
    }

    // Store the hotel
    public function store(Request $request)
    {
        // $HotelInfo = [
        //     'name' => $request->Hotelname,
        //     'email' => $request->Hotelemail,
        //     'city' => $request->Hotelcity,
        //     'website' => $request->Hotelwebsite,
        //     'logo' => $request->Hotellogo,
        //     'description' => $request->Hoteldescription
        // ];

        $hotelFields = $request->validate([
            'name' => ['required', Rule::unique('Hotels', 'name')],
            'email' => ['required', 'email'],
            'city' => 'required',
            'website' => 'required',
            'logo' => 'required',
            'description' => 'required',
        ]);

        Hotel::create($hotelFields);

        // $hotel_id = DB::getPdo()->lastInsertId();
        $hotel_id = Hotel::latest()->first()['id'];

        $rooms = $request->rooms;
        foreach ($rooms as $room ) {
            if ($room == "standard")
            {
                for ($i=0; $i < $request->standard_number; $i++) {
                    Room::create(['hotel_id' => $hotel_id ,'type' => 'standard']);
                }
            }

            if ($room == "deluxe")
            {
                for ($i = 0; $i < $request->deluxe_number; $i++) {
                    Room::create(['hotel_id' => $hotel_id, 'type' => 'deluxe']);
                }
            }

            if ($room == "vip")
            {
                for ($i = 0; $i < $request->vip_number; $i++) {
                    Room::create(['hotel_id' => $hotel_id, 'type' => 'vip']);
                }
            }
        }


        return redirect('/')->with('message', 'Hotel created succesfully !');
    }
}