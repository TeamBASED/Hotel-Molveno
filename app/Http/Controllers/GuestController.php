<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function handleUpdateGuest(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_id',
            'nationality' => 'required',
            'id_number' => 'required',
            'date_of_birth' => 'required',
            'checked_in' => 'required',   
        ]);

        $this->updateGuest($request);
    }
}
