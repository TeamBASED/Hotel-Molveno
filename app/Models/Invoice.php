<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function getInvoiceById($id) {
        return Invoice::where('id', $id)->first();
    }

    public function reservation() { 
        return $this->belongsTo(Reservation::class);
    }
}
