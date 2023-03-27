<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Contact;
use Illuminate\View\View;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function viewReservationCreate(Request $request) : View{
        $room_id = $request->roomId;
        $room = Room::getRoomData($room_id);

        return view('reservation.create', ['room' => $room]);
    }
    public function viewReservationEdit(int $id) : View{
        $reservation = Reservation::getReservationData($id);

        return view('reservation.edit', ['reservation' =>$reservation, 'rooms' => $reservation->rooms, 'contact' => $reservation->contact]);
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
        // $reservation = null;

        return view('reservation.info', ['reservation' => $reservation]);
    }
    // public function viewReservationEdit(int $id) {
    //     $reservation = 1;

    //     return view('reservation.edit', ['reservation' => $reservation]);
    // }

    public function handleUpdateReservation(Request $request) {

        $validated = $request->validate([
            'id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'date_of_arrival' => 'required',
            'date_of_departure' => 'required',
            // 'invoice_id' => 'required',
        ]);
        
        
        // dd("test");
        // dd($request);

        $this->updateReservation($request, $request->id);

        return redirect(route('reservation.overview'));
    }

    public function updateReservation(Request $request, int $id) {
        
        // TODO functie reservationId om $id op te halen uit db, deze functie komt in model
        $reservation = Reservation::getReservationData($id);
        // dd($request);

        $reservation->update([
            // 'first_name' => $request->firstname,
            // 'last_name' => $request->lastname,
            'date_of_arrival' => $request->date_of_arrival,
            'date_of_departure' => $request->date_of_departure,
            

        ]);

        $reservation->contact->update([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'telephone_number' => $request->telephone,
            'address' => $request->address,
        ]);


    }
}