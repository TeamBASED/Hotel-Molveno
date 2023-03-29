<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Contact;
use Illuminate\View\View;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\ReservationRoom;

class ReservationController extends Controller
{
    public function viewReservationCreate(Request $request) : View{
        $roomId = $request->roomId;
        $room = Room::getRoomData($roomId);

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

    public function handleDeleteReservation(int $reservationId) {

        Reservation::deleteReservation($reservationId);
        ReservationRoom::deleteReservationRoomData($reservationId);
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
        $reservation = Reservation::getReservationData($id);
        
        $reservations = Reservation::getAllReservationsInTimeinterval($reservation->date_of_arrival,$reservation->date_of_departure);
        $availableRooms = Room::getAllRoomData();

        foreach ($reservations as $reservation) {
            foreach ($reservation->rooms as $occupiedRoom) {
                $availableRooms = $availableRooms->filter(function($item) use ($occupiedRoom) {
                    return $item->id != $occupiedRoom->id;
                });
            }
        }



        return view('reservation.info', ['reservation' => $reservation, 'availableRooms' => $availableRooms]);
    }


    public function handleUpdateReservation(Request $request) {

        $validated = $request->validate([
            'id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'date_of_arrival' => 'required',
            'date_of_departure' => 'required',
            // 'invoice_id' => 'required',
        ]);


        $this->updateReservation($request, $request->id);

        return redirect(route('reservation.overview'));
    }

    public function updateReservation(Request $request, int $id) {
        
        $reservation = Reservation::getReservationData($id);

        $room_numbers_database = collect($reservation->rooms)->map(function ($element) {
            return $element->room_number;
        });
        
        $roomNumbersForm = collect($request->room)->filter();

        if ($room_numbers_database != $roomNumbersForm) {
            ReservationRoom::where('reservation_id', '=', $reservation->id)->delete();

            foreach ($roomNumbersForm as $roomNumber) {
                if (Room::getRoomByNumber($roomNumber)) {
                $roomId = Room::getRoomByNumber($roomNumber)->id;

                ReservationRoom::create([
                    'reservation_id' => $id,
                    'room_id' => $roomId,
                ]);
                };
            }
        };


        $reservation->update([
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