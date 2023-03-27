<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function handleVerification(Request $request){
        $validated = $request->validate([
            'email' => 'required|email|unique',
        ]);
    }

    private function verifyContact(Request $request){

    }

    public function handleCreateContact(Request $request) {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'address' => 'required',
        ]);

        $this->storeContact($request);
    }

    private function storeContact(Request $request) {
        $room = Room::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'telephone_number' => $request->telephone,
            'address' => $request->address,
        ]);
    }
}
