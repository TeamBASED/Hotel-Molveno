<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Contact;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ContactController extends Controller
{
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
            ? view('reservation.create', ['room' => $room, 'new_contact' => $request->email])
            : view('reservation.create', ['room' => $room, 'contact' => $contact]);
    }
}
