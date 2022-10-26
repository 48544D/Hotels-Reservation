<?php

namespace App\Http\Controllers;

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

    public function check()
    {
        return redirect('/')->with('message', 'Hotel already created !');
    }
}
