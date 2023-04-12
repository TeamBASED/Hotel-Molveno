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
        $this->validateGuest($request);

        $this->updateGuest($request);

        return redirect(route('reservation.info',['id' => $request->reservation_id]));
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
            'first_name' => ucfirst($request->firstname),
            'last_name' => ucfirst($request->lastname),
            'nationality' => ucfirst($request->nationality),
            'passpord_number' => $request->passport_number,
            'date_of_birth' => $request->date_of_birth,
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
