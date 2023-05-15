<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Reservation;
use Illuminate\Http\Request;

class InvoiceController extends Controller {
    public function viewInvoiceInfo(Reservation $reservation) {
        $invoice = Invoice::getInvoiceByReservationId($reservation->id);
        // TODO: get rooms of reservation

        return view("invoice.info", [
            // 'rooms' => $rooms,
            'invoice' => $invoice,
        ]);
    }

    public function createInvoiceForReservation(int $reservationId) {
        // TODO: fill in all values, remove use of factory
        Invoice::factory()->create([
            'reservation_id' => $reservationId,
        ]);
    }
}