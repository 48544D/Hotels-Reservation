<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    // Add room to the hotel page
    public function add(Request $request)
    {
        // validate the hotel form
        $hotelFields = $request->validate([
            'name' => ['required', Rule::unique('Hotels', 'name')],
            'email' => ['required', 'email'],
            'city' => 'required',
            'website' => 'required',
            'logo' => 'required',
            'description' => 'required',
        ]);

        $hotelFields['logo'] = $request->file('logo')->store('hotels/logo', 'public');

        return view('rooms.add', $hotelFields);
    }

    // Function to avoid recreating a hotel
    public function check()
    {
        return redirect('/')->with('message', 'Hotel already created !');
    }

    // Choose room for reservation
    public function choose(Request $request)
    {
        $formFields = $request->validate([
            'hotel_id' => 'required',
            'people_number' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        return view('rooms.choose', $formFields);
    }
}
