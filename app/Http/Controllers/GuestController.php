<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{

    public function handleCreateGuest (int $reservationId, Request $request) {

        $this->validateGuest($request);

        $this->storeGuest($request);

        return redirect(route('guest.create',['id' => $reservationId]));

    }
    
    public function handleUpdateGuest(Request $request) {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_id' => 'nullable',
            'nationality' => 'required',
            'passport_number' => 'required',
            'date_of_birth' => 'required',
            'checked_in' => 'nullable',   
        ]);

        $this->updateGuest($request);
    }
    public function viewEditGuest(Reservation $reservation, Guest $guest){
        return view('guest.edit', ['reservation' => $reservation, 'guest' => $guest]);
    }

    public function viewAddGuest(int $id) {

        $reservation = Reservation::getReservationData($id);
        
        // dd($reservation);
        return view('guest.create', ['reservation' => $reservation]);
    }

    private function validateGuest(Request $request) {
        // TODO: Apply validators across all relevant controllers
        // $existingReservations = Reservation::getReservationDataByRoomId($request->room);
        // dd($existingReservations);
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'contact_id' => 'nullable',
            'nationality' => 'required|string',
            'passport_number' => 'required|string',
            'dateofbirth' => 'required|date',
            'checked_in' => 'nullable',   
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
    }

    private function updateGuest(Request $request, Guest $guest) {
        $guest->update([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'nationality' => $request->nationality,
            'first_name' => $request->firstname,
            'passport_checked' => isset($request->passport_checked)
        ]);
    }

    private function storeGuest($request,$reservationId) {
        $guest = Guest::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'nationality' => $request->nationality,
            'first_name' => $request->firstname,
        ]);
    }
}
