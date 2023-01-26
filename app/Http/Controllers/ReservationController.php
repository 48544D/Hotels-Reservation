<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // create a reservation
    public function create(Request $request)
    {
        $formFields = $request->validate([
            'hotel_id' => 'required',
            'people_number' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        // adding standard rooms to the reservation
        if (in_array("standard", $request->rooms)) {
            // standard room that are not reserved
            $standardAvailableRooms = Room::where('type', 'standard')
                ->where('hotel_id', $formFields['hotel_id'])
                ->whereNotIn('id', function ($query) use ($formFields) {
                    $query->select('room_id')
                        ->from('reservations')
                        ->where('start_date', '<=', $formFields['start_date'])
                        ->where('end_date', '>=', $formFields['end_date']);
                })->get('id');

            // creating the reservations
            for ($i=0; $i < $request->standard_number; $i++) { 
                Reservation::create([
                    'room_id' => $standardAvailableRooms[$i]->id,
                    'client_id' => auth()->user()->id,
                    'start_date' => $formFields['start_date'],
                    'end_date' => $formFields['end_date']
                ]);
            }
        }

        // adding deluxe rooms to the reservation
        if (in_array("deluxe", $request->rooms)) {
            // deluxe room that are not reserved
            $deluxeAvailableRooms = Room::where('type', 'deluxe')
                ->where('hotel_id', $formFields['hotel_id'])
                ->whereNotIn('id', function ($query) use ($formFields) {
                    $query->select('room_id')
                        ->from('reservations')
                        ->where('start_date', '<=', $formFields['start_date'])
                        ->where('end_date', '>=', $formFields['end_date']);
                })->get('id');

            // creating the reservations
            for ($i=0; $i < $request->deluxe_number; $i++) { 
                Reservation::create([
                    'room_id' => $deluxeAvailableRooms[$i]->id,
                    'client_id' => auth()->user()->id,
                    'start_date' => $formFields['start_date'],
                    'end_date' => $formFields['end_date']
                ]);
            }
        }

        // adding vip rooms to the reservation
        if (in_array("vip", $request->rooms)) {
            // vip room that are not reserved
            $vipAvailableRooms = Room::where('type', 'vip')
                ->where('hotel_id', $formFields['hotel_id'])
                ->whereNotIn('id', function ($query) use ($formFields) {
                    $query->select('room_id')
                        ->from('reservations')
                        ->where('start_date', '<=', $formFields['start_date'])
                        ->where('end_date', '>=', $formFields['end_date']);
                })->get('id');

            // creating the reservations
            for ($i=0; $i < $request->vip_number; $i++) { 
                Reservation::create([
                    'room_id' => $vipAvailableRooms[$i]->id,
                    'client_id' => auth()->user()->id,
                    'start_date' => $formFields['start_date'],
                    'end_date' => $formFields['end_date']
                ]);
            }
        }

        return redirect()->route('home')->with('message', 'Reservation created successfully');
    }

    // delete a reservation
    public function delete(Request $request)
    {
        $formFields = $request->validate([
            'id' => 'required'
        ]);

        Reservation::where('id', $formFields['id'])->delete();

        return redirect()->back()->with('message', 'Reservation deleted successfully');
    }
}
