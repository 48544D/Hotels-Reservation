<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Reservation;
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

        // store the logo in the public folder
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

        $hotel = Hotel::find($formFields['hotel_id']);

        // join the rooms table with the reservations table
        // and get the number of reserved rooms for each type
        $standardReservedRooms = Reservation::join('rooms', 'reservations.room_id', '=', 'rooms.id')
            ->where('rooms.type', 'standard')
            ->where('rooms.hotel_id', $formFields['hotel_id'])
            ->where('reservations.start_date', '<=', $formFields['start_date'])
            ->where('reservations.end_date', '>=', $formFields['end_date'])
            ->count();

        $deluxeReservedRooms = Reservation::join('rooms', 'reservations.room_id', '=', 'rooms.id')
            ->where('rooms.type', 'deluxe')
            ->where('rooms.hotel_id', $formFields['hotel_id'])
            ->where('reservations.start_date', '<=', $formFields['start_date'])
            ->where('reservations.end_date', '>=', $formFields['end_date'])
            ->count();

        $vipReservedRooms = Reservation::join('rooms', 'reservations.room_id', '=', 'rooms.id')
            ->where('rooms.type', 'vip')
            ->where('rooms.hotel_id', $formFields['hotel_id'])
            ->where('reservations.start_date', '<=', $formFields['start_date'])
            ->where('reservations.end_date', '>=', $formFields['end_date'])
            ->count();

        // The hotel rooms that are available
        $standardAvailableRooms = $hotel->rooms->where('type', 'standard')->count() - $standardReservedRooms;
        $deluxeAvailableRooms = $hotel->rooms->where('type', 'deluxe')->count() - $deluxeReservedRooms;
        $vipAvailableRooms = $hotel->rooms->where('type', 'vip')->count() - $vipReservedRooms;

        // append the available rooms to the form fields
        $formFields['standard_rooms'] = $standardAvailableRooms;
        $formFields['deluxe_rooms'] = $deluxeAvailableRooms;
        $formFields['vip_rooms'] = $vipAvailableRooms;

        return view('rooms.choose', $formFields);
    }
}
