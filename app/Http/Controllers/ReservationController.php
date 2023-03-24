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
    
    public function viewReservationInfo(int $id) {
        $reservation = null;

        return view('reservation.info', ['reservation' => $reservation]);
    }

    public function handleUpdateReservation(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
            'date_of_arrival' => 'required',
            'date_of_departure' => 'required',
            'invoice_id' => 'required',
        ]);
        
        dd("test");
        dd($request);

        $this->updateReservation($request);

        // return redirect('reservation.overview');
    }

    public function updateReservation(Request $request) {
        
        // TODO functie reservationId om $id op te halen uit db, deze functie komt in model
        $id = 1;

        dd($reservation);

        $reservation = Reservation::getReservationData($id);

        // $reservation = Reservation::with('rooms')->find($id);
        // // $reservation->room->

        // $reservation->date_of_arrival = '2023-02-23';
        // $reservation->date_of_departure = '2023-02-25';

        // // $reservation->rooms()->attach($roomId);


        // $reservation->rooms()->updateExistingPivot($id, ['room_id' => 250]);
        
        // // $reservation->rooms->room_number = 'test';
        // // $reservation->reservation_rooms->updateExistingPivotTable(5);
        
        // dd($reservation);



        // // $reservation->date_of_arrival = $_POST['date_of_arrival'];
        // // $reservation->date_of_departure = $_POST['date_of_departure'];

        // $reservation->save();

    }
}