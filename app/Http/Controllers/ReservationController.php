<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function viewReservationOverview() {
        $reservations = Reservation::getAllReservationData();

        return view('reservation.overview', ['reservations' => $reservations]);
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