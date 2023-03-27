<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function viewContactVerify(Request $request){
        $room = Room::getRoomData($request->roomId);

        return view('reservation.contact', ['room' => $room]);
    }

    public function handleVerification(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
        ]);
        $room = Room::getRoomData($request->room_id);
        $contact = Contact::getContact($request->email);
        return ($contact===null) 
            ? view('reservation.create', ['room' => $room, 'new_contact' => $request->email])
            : view('reservation.create', ['room' => $room, 'contact' => $contact]);
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
