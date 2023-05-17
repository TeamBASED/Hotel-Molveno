<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Models\Reservation;
use Illuminate\Http\Request;

class InvoiceController extends Controller {

    // Views

    public function viewInvoiceInfo(Reservation $reservation) {
        $invoice = $reservation->invoice;
        // TODO: get rooms of reservation, to display price per night

        return view("invoice.info", [
            // 'rooms' => $rooms,
            'invoice' => $invoice,
        ]);
    }

    public function viewInvoiceEdit(Reservation $reservation) {
        $invoice = $reservation->invoice;
        $paymentMethods = PaymentMethod::getAllPaymentMethods();
        $daysReserved = $reservation->getDurationInDays();
        $roomPrices = $this->calculateRoomPrices($reservation->rooms, $daysReserved);

        return view("invoice.edit", [
            'invoice' => $invoice,
            'paymentMethods' => $paymentMethods,
            'daysReserved' => $daysReserved,
            'roomPrices' => $roomPrices,
        ]);
    }

    // Handlers

    public function handleUpdateInvoice(Reservation $reservation, Request $request) {
        $invoice = $reservation->invoice;
        // dd($request);
        $validated = $request->validate([
            'payment_method' => 'required',
            'value_added_tax' => 'required',
            'description' => 'required',
        ]);

        $this->updateInvoice($invoice, $request);
        return redirect(route('invoice.info', $reservation->id));
    }

    public function handleRecalculateInvoice(Reservation $reservation, Request $request) {
        dd("Recalculate functionality is not yet implemented");
    }

    // Methods

    public function createInvoiceForReservation(int $reservationId) {
        // TODO: fill in all values, remove use of factory
        Invoice::factory()->create([
            'reservation_id' => $reservationId,
        ]);
    }

    private function updateInvoice(Invoice $invoice, Request $request) {
        // calculate final amount in new function
        // set final_amount to that value


        $invoice->update([
            'value_added_tax' => $request->value_added_tax,
            'payment_method_id' => $request->payment_method,
            'description' => $request->description,
            'is_paid' => isset($request->is_paid),
            // 'final_amount'
        ]);
    }

    // Calculations

    private function calculateRoomCostsOfStay($rooms, int $daysReserved) {
        $result = [];

        foreach ($rooms as $room) {
            $calculatedPrice = $room->base_price_per_night * $daysReserved;
            $arrayEntry = [
                "room_number" => $room->room_number,
                "price_per_night" => $room->base_price_per_night,
                "price" => $calculatedPrice
            ];
            array_push($result, $arrayEntry);
        }

        return $result;
    }

    private function calculateTotalCosts(Invoice $invoice) {
        // TODO: get total base costs of rooms, get total costs of adjustments, add these 2 together, add taxes, and return final amount
    }



}