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
        
        
        // dd($request);

        $this->storeGuest($request, $reservationId);

        return redirect(route('guest.create',['id' => $reservationId]));

    }
    
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

    public function viewAddGuest(int $id, $showContact = false) {

        $reservation = Reservation::getReservationData($id);
        
        // dd($reservation);
        return view('guest.create', ['reservation' => $reservation, 'showContact' => $showContact]);
    }

    private function validateGuest(request $request) {
        // TODO: Apply validators across all relevant controllers
        // $existingReservations = Reservation::getReservationDataByRoomId($request->room);
        // dd($existingReservations);
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'nationality' => 'required|string',
            'passportnumber' => 'required|string',
            'dateofbirth' => 'required|date',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
    }

    private function storeGuest(request $request, int $reservationId) {
        // dd($request);
        $guest = Guest::create([
            'first_name' => ucfirst($request->firstname),
            'last_name' => ucfirst($request->lastname),
            'nationality' => ucfirst($request->nationality),
            'id_number' => $request->passport_number,
            'date_of_birth' => $request->date_of_birth,
            'contact_id' => $request->contact_id,
            'checked_in' => false,
        ]);

        $guest->reservation()->sync($reservationId);


    }
}
