<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    public function viewEditGuest(Reservation $reservation, Guest $guest){
        return view('guest.edit', ['reservation' => $reservation, 'guest' => $guest]);
    }

    public function viewAddGuest(int $id) {
        $reservation = Reservation::getReservationData($id);
        
        return view('guest.create', ['reservation' => $reservation]);
    }

    public function handleCreateGuest (int $reservationId, Request $request) {
        $this->validateGuest($request);

        $this->storeGuest($request);

        return redirect(route('guest.create',['id' => $reservationId]));
    }
    
    public function handleUpdateGuest(Request $request, Reservation $reservation, Guest $guest) {
        $this->validateGuest($request);

        $this->updateGuest($request, $guest);

        return redirect(route('reservation.info',['id' => $request->reservation_id]));
    }

    private function validateGuest(Request $request) {
        // TODO: Apply validators across all relevant controllers
        // $existingReservations = Reservation::getReservationDataByRoomId($request->room);
        // dd($existingReservations);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'contact_id' => 'nullable',
            'nationality' => 'required|string',
            'passport_number' => 'required|string',
            'dateofbirth' => 'required|date',
            'passport_checked' => 'nullable',   
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
    }

    private function updateGuest(Request $request, Guest $guest) {
        $guest->update([
            'first_name' => ucfirst($request->first_name),
            'last_name' => ucfirst($request->last_name),
            'nationality' => ucfirst($request->nationality),
            'passport_number' => $request->passport_number,
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
