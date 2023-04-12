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
        return redirect(route('reservation.create', ['roomId' => $request->roomId, 'contact' => $request->email]));
    }

    public function handleGetOrCreateContact(Request $request) {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required',
            'address' => 'required',
            'nationality' => 'required'
        ]);

        $contact = isset($request->contact) 
            ? Contact::getContactById($request->contact)
            : $this->storeContact($request);

        return $contact;
    }

    private function storeContact(Request $request) {
        $contact = Contact::create([
            'first_name' => ucfirst($request->firstname),
            'last_name' => ucfirst($request->lastname),
            'email' => $request->email,
            'telephone_number' => $request->telephone,
            'address' => $request->address,
            'nationality' => ucfirst($request->nationality),
            'passport_checked' => isset($request->passport_checked)
        ]);

        return $contact;
    }
}
