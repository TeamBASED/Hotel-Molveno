<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Models\Reservation;
use Illuminate\Http\Request;

class InvoiceController extends Controller {
    public function viewInvoiceInfo(Reservation $reservation) {
        $invoice = Invoice::getInvoiceByReservationId($reservation->id);
        // TODO: get rooms of reservation, to display price per night

        return view("invoice.info", [
            // 'rooms' => $rooms,
            'invoice' => $invoice,
        ]);
    }

    public function viewInvoiceEdit(Reservation $reservation) {
        $invoice = Invoice::getInvoiceByReservationId($reservation->id);
        $paymentMethods = PaymentMethod::getAllPaymentMethods();
        // TODO: get rooms to display prices

        return view("invoice.edit", [
            'invoice' => $invoice,
            'paymentMethods' => $paymentMethods,
        ]);
    }

    public function createInvoiceForReservation(int $reservationId) {
        // TODO: fill in all values, remove use of factory
        Invoice::factory()->create([
            'reservation_id' => $reservationId,
        ]);
    }

    public function handleUpdateInvoice(Reservation $reservation, Request $request) {
        dd("Update functionality is not yet implemented");
    }
}