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

        dd($room);

        return view('reservation.create', ['room' => $room, 'contact' => $contact, 'new_contact' => $request->contact]);
    }
    public function viewReservationEdit(int $id): View {
        $reservation = Reservation::getReservationData($id);

        return view('reservation.edit', ['reservation' => $reservation, 'rooms' => $reservation->rooms, 'contact' => $reservation->contact]);
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

        return view('reservation.info', ['reservation' => $reservation]);
    }


    public function handleUpdateReservation(Request $request) {

        $request->validate([
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

        $roomNumbersDatabase = $this->getRoomNumbersFromReservation($reservation);
        $roomNumbersForm = collect($request->room)->filter();
        
        if ($roomNumbersDatabase != $roomNumbersForm) {
            ReservationRoom::where('reservation_id', '=', $reservation->id)->delete();

            foreach ($roomNumbersForm as $roomNumber) {
                if (Room::getRoomByNumber($roomNumber)) {
                    $room = Room::getRoomByNumber($roomNumber);
                    $reservation->rooms()->save($room);
                }
            }
        }

        Reservation::updateReservation($request, $id);
        Contact::updateContact($request, $id);
    }

    public function getRoomNumbersFromReservation(Reservation $reservation) {
        return collect($reservation->rooms)->map(function ($element) {
            return $element->room_number;
        });
    }




}