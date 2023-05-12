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


        return view('reservation.create', ['room' => $room, 'contact' => $contact, 'new_contact' => $request->contact, 'date_of_arrival' => $request->date_of_arrival, 'date_of_departure' => $request->date_of_departure]);
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
    public function viewReservationOverview(Request $request) {

        $reservations = $this->filterReservationResults($request);
        $rooms = Room::getAllRoomData();

        return view('reservation.overview', ['reservations' => $reservations, 'rooms' => $rooms]);
    }

    public function handleCreateReservation(Request $request) {
        $this->validateCreateReservation($request);

        $invoice_id = InvoiceController::handleReservationInvoice();

        $contactController = new ContactController();
        $contact = $contactController->handleGetOrCreateContact($request);

        $reservation = $this->storeReservation($request, $invoice_id, $contact);

        $contact->saveContact($reservation);

        $this->handleReservationRoom($request, $reservation);

        return redirect(route('guest.create', ['id' => $reservation->id]));
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

    public function handleDeleteReservation(Request $request) {
        // dd($request->id);

        if (UserController::isPasswordCorrect($request->password)) {

            Reservation::deleteReservation($request->id);
            return redirect(route('reservation.overview', ['notification' => 'Reservation is deleted']));
        } else {
            return redirect(route('reservation.edit', ['id' => $request->id, 'notification' => 'The reservation is not removed']));

        }
    }

    private function handleReservationRoom(Request $request, $reservation) {
        $room = Room::getRoomData($request->room);
        $reservation->rooms()->sync($room);
    }

    public function viewReservationInfo(int $id) {
        $reservation = Reservation::getReservationData($id);

        return view('reservation.info', ['reservation' => $reservation, 'currentRooms' => $reservation->rooms]);
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

        $this->updateReservationRooms($request, $request->id);
        return redirect(route('reservation.overview'));
    }

    public function updateReservationRooms(Request $request, int $id) {
        $reservation = Reservation::getReservationData($id);

        $roomIdsDatabase = $reservation->rooms->map(function ($element) {
            return $element->id;
        });

        $roomIdsForm = array_keys($request->room);
        if ($roomIdsDatabase != $roomIdsForm) {
            ReservationRoom::where('reservation_id', '=', $reservation->id)->delete();

            foreach ($roomIdsForm as $roomId) {
                ReservationRoom::create([
                    'reservation_id' => $id,
                    'room_id' => $roomId,
                ]);
            }
        }
        ;

        $reservation = $this->updateReservation($request, $id);
        $contact = $this->updateContact($request);
        $contact->saveContact($reservation);
    }

    public function updateReservation(Request $request, int $id) {
        $reservation = Reservation::getReservationData($id);
        $reservation->update([
            'date_of_arrival' => $request->date_of_arrival,
            'date_of_departure' => $request->date_of_departure,
        ]);
        return $reservation;
    }

    public function updateContact(Request $request) {
        $contact = Contact::getContactById($request->contact_id);
        $contact->update([
            'first_name' => ucfirst($request->firstname),
            'last_name' => ucfirst($request->lastname),
            'email' => $request->email,
            'telephone_number' => $request->telephone,
            'address' => $request->address,
            'nationality' => ucfirst($request->nationality),
            'passport_checked' => isset($request->passport_checked)
        ]);
        return $contact;
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

    public static function getAvailableRoomsDuringTimeInterval($date_of_arrival, $date_of_departure) {
        $reservations = Reservation::getAllReservationsInTimeinterval($date_of_arrival, $date_of_departure);
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

    private function filterReservationResults(Request $request) {

        // dd($request);

        $filterQuery = Reservation::with(['contact', 'rooms', 'guests']);
        if ($this->hasFilter($request->room_id))
            $filterQuery->withRoom($request->room_id);
        if ($this->hasFilter($request->date_of_arrival))
            $filterQuery->withDateOfArrival($request->date_of_arrival);
        if ($this->hasFilter($request->date_of_departure))
            $filterQuery->withDateOfDeparture($request->date_of_departure);



        return $filterQuery->get();
    }

    private function hasFilter($param) {
        return $param != "";
    }



}