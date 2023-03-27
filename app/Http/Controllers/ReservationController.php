<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Contact;
use Illuminate\View\View;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function viewReservationCreate($room, $contact){
        return view('reservation.create', ['room' => $room, 'contact' => $contact]);
    }
 
    public function viewReservationOverview() {
        $reservations = Reservation::getAllReservationData();

        return view('reservation.overview', ['reservations' => $reservations]);
    }

    public function handleCreateReservation(Request $request) {
        dd($contact);
        $validated = $request->validate([
            //'contact' => 'required', // TODO: Fix, this is currently empty and gives an error
            'arrival' => 'required',
            'departure' => 'required'
        ]);

        // $this->storeReservation($request);
        // return redirect(route('reservation.overview'));
    }

    public function storeReservation(Request $request) {
        $room = Reservation::create([
            'contact_id' => $request->contact,
            'date_of_arrival' => $request->arrival,
            'date_of_departure' => $request->departure, 
        ]);
    }
    
    public function viewReservationInfo(int $id) {
        $reservation = null;

        return view('reservation.info', ['reservation' => $reservation]);
    }
}
