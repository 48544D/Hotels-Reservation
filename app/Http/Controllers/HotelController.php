<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
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
        $HotelInfo = [
            'name' => $request->Hotelname,
            'email' => $request->Hotelemail,
            'city' => $request->Hotelcity,
            'website' => $request->Hotelwebsite,
            'logo' => $request->Hotellogo,
            'description' => $request->Hoteldescription
        ];

        Hotel::create($HotelInfo);

        return redirect('/');
    }
}