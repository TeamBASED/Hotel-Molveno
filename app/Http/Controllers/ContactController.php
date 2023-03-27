<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function viewReservationCreate($room){
        return view('reservation.create');
    }
    public function viewContactVerify(Request $request){
        return view('reservation.contact', ['roomId' => $request->roomId]);
    }

    public function handleVerification(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
        ]);
        $room = Room::getRoomData($request->roomId);
        $contact = Contact::getContact($request->email);
        return ($contact===null) 
            ? redirect()->route('reservation.create')->with(['room' => $room, 'new_contact' => $request->email])
            : redirect()->route('reservation.create')->with(['room' => $room, 'contact' => $contact]);
    }

    public function handleCreateContact(Request $request) {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required',
            'address' => 'required',
        ]);

        $this->storeContact($request);
    }

    private function storeContact(Request $request) {
        $room = Contact::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'telephone_number' => $request->telephone,
            'address' => $request->address,
        ]);
    }
}
