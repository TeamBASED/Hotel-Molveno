<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function viewReservationCreate(Request $request) : View{
        $room_id = $request->roomId;
        $room = Room::getRoomData($room_id);

        return view('reservation.create', ['room' => $room]);
    }
    public function viewReservationOverview() {
        $reservations = Reservation::getAllReservationData();

        return view('reservation.overview', ['reservations' => $reservations]);
    }

    public function handleCreateReservation(Request $request) {
        $validated = $request->validate([
            'contact' => 'required',
            'arrival' => 'required',
            'departure' => 'required',
        ]);

        $this->storeReservation($request);
        return redirect(route('reservation.overview'));
    }

    public function storeReservation(Request $request) {
        $room = Reservation::create([
            'contact_id' => $request->contact,
            'date_of_arrival' => $request->arrival,
            'date_of_departure' => $request->departure, 
        ]);
    }
}
