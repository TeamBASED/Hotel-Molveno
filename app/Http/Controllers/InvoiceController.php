<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class InvoiceController extends Controller {

    // Views

    public function viewInvoiceInfo(Reservation $reservation) {
        $invoice = $reservation->invoice;
        $daysReserved = $reservation->getDurationInDays();
        $roomPrices = $this->calculateRoomCostsOfStay($reservation->rooms, $daysReserved);

        return view("invoice.info", [
            'invoice' => $invoice,
            'daysReserved' => $daysReserved,
            'roomPrices' => $roomPrices,
        ]);
    }

    public function viewInvoiceEdit(Reservation $reservation) {
        $invoice = $reservation->invoice;
        $paymentMethods = PaymentMethod::getAllPaymentMethods();
        $daysReserved = $reservation->getDurationInDays();
        $roomPrices = $this->calculateRoomCostsOfStay($reservation->rooms, $daysReserved);

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

        $this->validateUpdateInvoice($request);

        $this->updateInvoice($invoice, $request);
        return redirect(route('invoice.info', $reservation->id));
    }

    private function validateUpdateInvoice(Request $request) {
        return $request->validate([
            'payment_method' => 'required',
            'value_added_tax' => 'required',
            'description' => 'required',
        ]);
    }

    public function handleRecalculateInvoice(Reservation $reservation, Request $request) {
        $invoice = $reservation->invoice;

        $this->validateUpdateInvoice($request);

        $invoice->update([
            'value_added_tax' => $request->value_added_tax,
            'final_amount' => $this->calculateTotalInvoiceCosts($invoice, $request->value_added_tax),
        ]);

        return redirect(route('invoice.edit', $reservation->id));
    }

    // Methods

    public function createInvoiceForReservation(int $reservationId) {
        // TODO: fill in all values, remove use of factory
        Invoice::factory()->create([
            'reservation_id' => $reservationId,
        ]);
    }

    private function updateInvoice(Invoice $invoice, Request $request) {
        $totalCosts = $this->calculateTotalInvoiceCosts($invoice, $request->value_added_tax);

        $invoice->update([
            'value_added_tax' => $request->value_added_tax,
            'payment_method_id' => $request->payment_method,
            'description' => $request->description,
            'is_paid' => isset($request->is_paid),
            'final_amount' => $totalCosts,
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

    private function calculateTotalInvoiceCosts(Invoice $invoice, float $taxAmount) {
        $costsOfRooms = $this->calculateTotalCostsOfRooms(
            $invoice->reservation->rooms,
            $invoice->reservation->getDurationInDays()
        );

        $costsOfAdjustments = $this->calculateTotalCostsOfAdjustments(
            $invoice->costAdjustments
        );

        $costsBeforeTax = $costsOfRooms + $costsOfAdjustments;
        $costsAfterTax = $costsBeforeTax + $costsBeforeTax * $taxAmount / 100;

        return $costsAfterTax;
    }

    private function calculateTotalCostsOfRooms(Collection $roomsInReservation, int $daysReserved) {
        $totalCosts = 0;
        foreach ($roomsInReservation as $room) {
            $totalCosts += $room->base_price_per_night * $daysReserved;
        }
        return $totalCosts;
    }

    private function calculateTotalCostsOfAdjustments(Collection $costAdjustments) {
        $totalCosts = 0;
        foreach ($costAdjustments as $costAdjustment) {
            $totalCosts += $costAdjustment->amount;
        }
        return $totalCosts;
    }

}