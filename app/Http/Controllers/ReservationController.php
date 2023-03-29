<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Reservation;
use App\Models\ReservationRoom;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller {
    public function viewReservationCreate(Request $request) {
        $room = Room::getRoomData($request->roomId);
        $contact = Contact::getContactByEmail($request->contact);

        return view('reservation.create', ['room' => $room, 'contact' => $contact, 'new_contact' => $request->contact]);
    }
    public function viewReservationEdit(int $id): View {
        $reservation = Reservation::getReservationData($id);
        $availableRooms = $this->getAvailableRoomsDuringReservation($reservation);

        return view('reservation.edit', [
            'reservation' => $reservation,
            'rooms' => $reservation->rooms,
            'contact' => $reservation->contact,
            'availableRooms' => $availableRooms,
            'currentRooms' => $reservation->rooms
        ]);
    }
    public function viewReservationOverview() {
        $reservations = Reservation::getAllReservationData();

        return view('reservation.overview', ['reservations' => $reservations]);
    }

    public function handleCreateReservation(Request $request) {
        $this->validateCreateReservation($request);

        $invoice_id = InvoiceController::handleReservationInvoice();

        $contactController = new ContactController();
        $contact = $contactController->handleGetOrCreateContact($request);

        $reservation = $this->storeReservation($request, $invoice_id, $contact);

        $contact->saveContact($reservation);

        $this->handleReservationRoom($request, $reservation);

        return redirect(route('reservation.overview'));
    }

    private function validateCreateReservation(request $request) {
        // TODO: Apply validators across all relevant controllers
        // $existingReservations = Reservation::getReservationDataByRoomId($request->room);
        // dd($existingReservations);
        $validator = Validator::make($request->all(), [
            'contact' => 'required|integer',
            'arrival' => 'required|date|before:departure|after:today',
            'departure' => 'required|date|after:arrival'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
    }

    private function storeReservation(Request $request, $invoice_id, $contact) {
        $reservation = Reservation::create([
            'contact_id' => $contact->id,
            'date_of_arrival' => $request->arrival,
            'date_of_departure' => $request->departure,
            'invoice_id' => $invoice_id
        ]);
        return $reservation;
    }

    public function handleDeleteReservation(int $reservationId) {

        Reservation::deleteReservation($reservationId);
        ReservationRoom::deleteReservationRoomData($reservationId);
        return redirect(route('reservation.overview'));
    }

    private function handleReservationRoom(Request $request, $reservation) {
        $room = Room::getRoomData($request->room);
        $reservation->rooms()->sync($room);
    }

    public function viewReservationInfo(int $id) {
        $reservation = Reservation::getReservationData($id);

        $availableRooms = $this->getAvailableRoomsDuringReservation($reservation);

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
                }
                ;
            }
        }
        ;


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

    public function getAvailableRoomsDuringReservation(Reservation $reservation) {
        $reservations = Reservation::getAllReservationsInTimeinterval($reservation->date_of_arrival, $reservation->date_of_departure);
        $availableRooms = Room::getAllRoomData();

        foreach ($reservations as $reservation) {
            foreach ($reservation->rooms as $occupiedRoom) {
                $availableRooms = $availableRooms->filter(function ($item) use ($occupiedRoom) {
                    return $item->id != $occupiedRoom->id;
                });
            }
        }

        return $availableRooms;

    }
}