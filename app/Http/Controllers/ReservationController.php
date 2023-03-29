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

class ReservationController extends Controller
{
    public function viewReservationCreate($room, $contact){
        return view('reservation.create', ['room' => $room, 'contact' => $contact]);
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
        $this->validateCreateReservation($request);

        $invoice_id = $this->handleReservationInvoice();

        $contact = $this->handleReservationContact($request);

        $reservation = $this->storeReservation($request, $invoice_id, $contact);

        $contact->reservations()->save($reservation);

        $this->handleReservationRoom($request, $reservation);

        return redirect(route('reservation.overview'));
    }

    private function validateCreateReservation(request $request) {
        // TODO: Apply validators across all relevant controllers
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

    private function handleReservationInvoice(){
        $new_invoice = Invoice::create();
        $invoice_id = $new_invoice->id;

        return $invoice_id;
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

    private function handleReservationContact(Request $request) {
        if (isset($request->contact)) {
            $contact = Contact::getContactById($request->contact);
        } else {
            $contact = $this->handleCreateContact($request);
        }
        return $contact;
    }

    public function handleCreateContact(Request $request) {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required',
            'address' => 'required',
        ]);

        $this->storeContact($request);
    }

    private function storeContact(Request $request) {
        $contact = Contact::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'telephone_number' => $request->telephone,
            'address' => $request->address,
        ]);

        return $contact;
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
        
        $room_numbers_form = collect($request->room)->filter();

        if ($room_numbers_database != $room_numbers_form) {
            ReservationRoom::where('reservation_id', '=', $reservation->id)->delete();

            foreach ($room_numbers_form as $room_number) {
                if (Room::getRoomByNumber($room_number)) {
                $room_id = Room::getRoomByNumber($room_number)->id;

                ReservationRoom::create([
                    'reservation_id' => $id,
                    'room_id' => $room_id,
                ]);
                };
                //NOG GEEN VALIDATIE OF KAMERNUMMER WERKELIJK BESTAAT
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