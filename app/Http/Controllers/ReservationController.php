<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Contact;
use App\Models\Invoice;
use Illuminate\View\View;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $this->validateCreateReservation($request);

        $reservation = $this->storeReservation($request);

        $this->handleReservationContact($request, $reservation);

        $room = Room::getRoomData($request->room);
        $reservation->rooms()->sync($room);

        $invoice = $reservation->invoice()->create();

        return redirect(route('reservation.overview'));
    }

    private function handleReservationInvoice($reservation){
    
        return $invoice;
    }
    private function handleReservationContact(Request $request, $reservation) {
        if (isset($request->contact)) {
            $contact = Contact::getContactById($request->contact);
        } else {
            $contact = new Contact();
            $contact->handleCreateContact($request);
        }
        $contact->reservations()->save($reservation);
    }

    private function validateCreateReservation(request $request) {
        // TODO: Fix, this is currently empty and gives an error
        $validator = Validator::make($request->all(), [
            'contact' => 'required|integer',
            'arrival' => 'required|date',
            'departure' => 'required|date'
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
    }

    private function storeReservation(Request $request) {
        $reservation = Reservation::create([
            'contact_id' => $request->contact,
            'date_of_arrival' => $request->arrival,
            'date_of_departure' => $request->departure, 
        ]);
        return $reservation;
    }
    
    public function viewReservationInfo(int $id) {
        $reservation = null;

        return view('reservation.info', ['reservation' => $reservation]);
    }
}
