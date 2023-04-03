<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public static function handleReservationInvoice(){
        $new_invoice = Invoice::create();
        $invoice_id = $new_invoice->id;

        return $invoice_id;
    }
}
