<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class HotelController extends Controller
{
    public function create() {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('Hotels', 'name')],
            'email' => ['required', 'email'],
            'city' => 'required',
            'website' => 'required',
            'logo' => 'required',
            'description' => 'required',
        ]);

        $formFields['logo'] = $request->file('logo')->store('hotels/logo', 'public');

        Hotel::create($formFields);

        return view('rooms.add', ['HotelId' => DB::getPdo()->lastInsertId()]);
    }
}