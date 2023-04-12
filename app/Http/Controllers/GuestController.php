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

    public function handleCreateGuest (int $reservationId, Request $request) {
        $this->validateGuest($request);

        $this->storeGuest($request, $reservationId);

        return redirect(route('guest.create',['id' => $reservationId]));
    }
    
    public function handleUpdateGuest(Request $request, Reservation $reservation, Guest $guest) {
        $this->validateGuest($request);

        $this->updateGuest($request, $guest);

        return redirect(route('reservation.info',['id' => $request->reservation_id]));
    }

    public function viewAddGuest(int $reservationId, $showContact = false) {
        $reservation = Reservation::getReservationData($reservationId);
        
        return view('guest.create', ['reservation' => $reservation, 'showContact' => $showContact]);
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

    public function deleteGuest(Reservation $reservation, Guest $guest){
        $guest->delete();

        return redirect(route('reservation.info',['id' => $reservation->id]));
    }

    private function updateGuest(Request $request, Guest $guest) {
        $guest->update([
            'first_name' => ucfirst($request->first_name),
            'last_name' => ucfirst($request->last_name),
            'nationality' => ucfirst($request->nationality),
            'passport_number' => $request->passport_number,
            'date_of_birth' => $request->date_of_birth,
            'contact_id' => $request->contact_id,
            'passport_checked' => isset($request->passport_checked)
        ]);
    }

    private function storeGuest(Request $request, int $reservationId) {
        $guest = Guest::create([
            'first_name' => ucfirst($request->firstname),
            'last_name' => ucfirst($request->lastname),
            'nationality' => ucfirst($request->nationality),
            'passport_number' => $request->passport_number,
            'date_of_birth' => $request->date_of_birth,
            'contact_id' => $request->contact_id,
            'passport_checked' => isset($request->passport_checked)
        ]);
        $guest->reservation()->sync($reservationId);
    }
}
