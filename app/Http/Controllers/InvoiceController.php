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

    public static function handleReservationInvoice() {
        $new_invoice = Invoice::create();
        $invoice_id = $new_invoice->id;

        return $invoice_id;
    }
}