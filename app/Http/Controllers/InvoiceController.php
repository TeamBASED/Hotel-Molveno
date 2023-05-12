<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Reservation;
use Illuminate\Http\Request;

class InvoiceController extends Controller {
    public function viewInvoiceInfo(Reservation $reservation) {
        $invoice = Invoice::getInvoiceByReservationId($reservation->id);
        // return view()
    }

    public function createInvoiceForReservation(int $reservationId) {
        // TODO: fill in all values, remove use of factory
        Invoice::factory()->create([
            'reservation_id' => $reservationId,
        ]);
    }
}